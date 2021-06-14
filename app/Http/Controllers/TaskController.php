<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
   public function index()
   {
       $tasks = Task::all();
       $all = count($tasks);
       $completed = count(Task::all()->where('status','Completed'));
       $inprogress = count(Task::all()->where('status','In Progress'));

       return view('index',['tasks' => $tasks, 'all' => $all, 'completed' => 
       $completed, 'inprogress' => $inprogress] );
   }

   public function create()
   {
       return view('createtask');
   }

   public function store(Request $request)
   {
     $data = new Task;
     $data->title = $request->title;
     $data->description = $request->description;
     $data->status = $request->status;
     $data->progress = $request->progress;
     $data->save();
     return redirect('/');
   }

   public function edit($id)
   {
       $data = Task::find($id);
       return view('edittask',['data' => $data]);
   }

   public function update(Request $request, $id)
   {
        $data = Task::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->progress = $request->progress;
        $data->save();
        return redirect('/');
        
   }

   public function editall()
   {
       $tasks = Task::all();
       return view('editalltask',['tasks' => $tasks]);
   }

   public function destroy($id)
   {
        $tasks = Task::find($id);
        $tasks->delete();
        return redirect('/');
   }

   public function completed()
   {
       $tasks = Task::all()->where('status','Completed');
       return view('specifictask',['tasks' => $tasks]);
   }

   public function inprogress()
   {
       $tasks = Task::all()->where('status','In Progress');
       return view('specifictask',['tasks' => $tasks]);
   }

   public function calculate()
   {
       $total = (Task::all());
       $final = $total->count();
       return $final;
       $completed = count(Task::all()->where('status','Completed'));
       $inprogress = count(Task::all()->where('status','In Progress'));
       

   }
}