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
        return view('posts.index', [
            // 'posts' => Post::get(),
            'posts' => Post::latest()->filter(request(['search', 'category', 'autor']))->paginate(6)->withQueryString(), // poziva scopeFilter u post modelu. kao drugi argument prosledjuje array sa search key a prvi je query po laravel defaultu
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

    public function create(Post $post) 
    {

        return view('posts.create', [
            'categories' => Category::all(),
            ]);
    }

    public function store() 
    {
        // ddd(request()->all());
        $attribudets = request()->validate([
            'title'            => 'required',
            'slug'             => ['required', Rule::unique('posts','slug')],
            'thumbnail'        => ['required', 'image'],
            'excerpt'          => 'required',
            'body'             => 'required',
            'category_id'      => ['required', Rule::exists('categories','id')],
        ]);

        $attribudets['user_id'] = auth()->user()->id;
        $attribudets['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attribudets);

        return redirect('posts/' . $attribudets['slug']);
        // return view('posts.show', [
        //     // 'posts' => Post::,
        //     ]);
    }
}
