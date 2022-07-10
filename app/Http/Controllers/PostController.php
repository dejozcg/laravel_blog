<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Post;

class PostController extends Controller
{
    public function Index() 
    {
        return view('posts', [
            // 'posts' => Post::get(),
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post) 
    {
        return view('post', [
            // 'posts' => Post::findOrFail($slug)
            'posts' => $post,
            'categories' => Category::all()
            ]);
    }
}
