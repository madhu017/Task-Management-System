<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::all();
       $post = count($posts);
       if($post == 0)
       {
           return view('posts.nopost');
           
       }
       else
       {
        
        return view('posts.index',['posts' => $posts]);
       }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $data = new Post;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('posts.create')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
            //return Post::find($id);
        $post->update($request->all());
            /* $data = Post::find($id);
            $data->title = $request->title;
            $data->description = $request->description;
            $data->save(); */
            return redirect()->route('posts.index')->with('success','Post updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::find($id);
        $data->delete();
        return back()->with('success','Post deleted Successfully!!');
    }
}
