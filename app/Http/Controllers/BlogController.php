<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class BlogController extends Controller
{
    public function addblog()
    {
        $blog = new Blog;
        $blog->title = 'This is fifth blog title';
        $blog->body = 'This is fifth blog body';
        $blog->save();
        return 'First blog added successfully';
    }

    public function addcomment($id)
    {
        $blog = Blog::find($id);
        $co = new Comment;
        $co->comments = 'This is first comment';
        $blog->comments()->save($co);
        return 'First comment added successfully';
    }
}
