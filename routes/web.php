<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    /*
        * Ovim mozemo da ulogujemo querije na bazi
        * Umjesto ovoga koristim ekstenziju laravel clockwork
    */
    // \Illuminate\Support\Facades\DB::listen(function ($query){
    //     logger($query->sql, $query->bindings);
    // });

    return view('posts', [
        'posts' => Post::get()
    ]);
});

// Route::get('posts/{post:slug}', function ($post) {
//     return view('post', [
//         'posts' => Post::findorFail($post)
//     ]);
// });

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        // 'posts' => Post::findOrFail($slug)
        'posts' => $post
        ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->post
    ]);
});

Route::get('autor/{user:username}', function (User $user) {
    return view('posts', [
        'posts' => $user->post
    ]);
});