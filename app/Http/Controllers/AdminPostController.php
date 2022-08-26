<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\MockObject\Rule\MethodName;

class AdminPostController extends Controller
{
    public function index() {
        return view('admin.posts/index', [
            // 'posts' => Post::findOrFail($slug)
            'posts' => Post::paginate(50)
            ]);
    }

    public function create(Post $post) 
    {

        return view('admin.posts.create', [
            'categories' => Category::all(),
            ]);
    }

    public function store() 
    {
        // ddd(request()->all());
        
        $attribudets = $this->validetPost();
        $attribudets['user_id'] = auth()->user()->id;
        $attribudets['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attribudets);

        return redirect('posts/' . $attribudets['slug']);
        // return view('posts.show', [
        //     // 'posts' => Post::,
        //     ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post'  => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Post $post) 
    {
        // ddd(request()->all());
        $attribudets = $this->validetPost($post);

        if(isset($attribudets['thumbnail'])){
            $attribudets['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attribudets);

        return back()->with('success', 'Post updae Success!');
        // return view('posts.show', [
        //     // 'posts' => Post::,
        //     ]);
    }
    
    public function destroy(Post $post) 
    {

        $post->delete();

        return back()->with('success', 'Post Successfuly deleted!');
    }

    protected function validetPost(?Post $post = null): array 
    {
        $post ??= new Post();
        return request()->validate([
            'title'            => 'required',
            'slug'             => ['required', Rule::unique('posts','slug')->ignore($post->id)],
            'thumbnail'        => $post->exists() ? ['image'] : ['required', 'image'],
            'excerpt'          => 'required',
            'body'             => 'required',
            'category_id'      => ['required', Rule::exists('categories','id')],
        ]);
    }
}
