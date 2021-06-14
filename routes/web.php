<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('posts', PostController::class);

Route::get('/ourpage', function(){
    return view('task.ourpage');
});

Route::get('/',[TaskController::class,'index']);
Route::get('/create',[TaskController::class,'create'])->name('createtask');
Route::post('/addtask',[TaskController::class,'store'])->name('addtask');
Route::get('/edit/{id}',[TaskController::class,'edit'])->name('edittask');
Route::put('/update/{id}',[TaskController::class,'update'])->name('update');
Route::get('/editalltask',[TaskController::class,'editall'])->name('editalltask');
Route::get('/del/{id}',[TaskController::class,'destroy'])->name('deltask');

Route::get('/completedtask',[TaskController::class,'completed'])->name('completed');
Route::get('/inprogresstask',[TaskController::class,'inprogress'])->name('inprogress');

Route::get('/total',[TaskController::class,'calculate'])->name('total');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/adduser', [UserController::class, 'store']);
Route::get('/show', [UserController::class, 'show']);


Route::get('/addblog', [BlogController::class, 'addblog']);
Route::get('/addcomment/{id}', [BlogController::class, 'addcomment']);
