<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Post;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    // Index, Show, Create, Store, Edit, Update, Destroy  - ovih 6 je model za REST

    public function Index() 
    {
        // dd($_SERVER['SSL_CLIENT_S_DN']);
        // dd($_SERVER['SSL_CLIENT_S_DN_CN']);
        // $headers = collect(request()->header())->transform(function ($item) {
            echo '<pre>';
           print_r($_SERVER);
            echo '</pre>';
        // });
        // dd(request()->all());
        // return view('posts.index', [
        //     // 'posts' => Post::get(),
        //     'posts' => Post::latest()->filter(request(['search', 'category', 'autor']))->paginate(6)->withQueryString(), // poziva scopeFilter u post modelu. kao drugi argument prosledjuje array sa search key a prvi je query po laravel defaultu
        //     // 'categories' => Category::all()
        // ]);
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
