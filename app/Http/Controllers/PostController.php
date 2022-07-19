<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Post;

class PostController extends Controller
{
    public function Index() 
    {
        return view('posts.index', [
            // 'posts' => Post::get(),
            'posts' => Post::latest()->filter(request(['search', 'category', 'autor']))->get(), // poziva scopeFilter u post modelu. kao drugi argument prosledjuje array sa search key a prvi je query po laravel defaultu
            // 'categories' => Category::all()
        ]);
    }

    public function show(Post $post) 
    {
        return view('posts.show', [
            // 'posts' => Post::findOrFail($slug)
            'posts' => $post,
            // 'categories' => Category::all()
            ]);
    }
}
