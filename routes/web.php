<?php

use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionControler;
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

// Route::get('/', function () {
//     /*
//         * Ovim mozemo da ulogujemo querije na bazi
//         * Umjesto ovoga koristim ekstenziju laravel clockwork
//     */
//     // \Illuminate\Support\Facades\DB::listen(function ($query){
//     //     logger($query->sql, $query->bindings);
//     // });

//     return view('posts', [
//         'posts' => Post::get(),
//         'categories' => Category::all()
//     ]);
// })->name('home');
Route::get('/', [PostController::class, 'index'])->name('home');

// Route::get('posts/{post:slug}', function ($post) {
//     return view('post', [
//         'posts' => Post::findorFail($post)
//     ]);
// });

Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->post,
//         // 'curentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');

// Route::get('autor/{user:username}', function (User $user) {
//     return view('posts', [
//         'posts' => $user->post,
//         'categories' => Category::all()
//     ]);
// });

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionControler::class, 'destroy'])->middleware('auth');
Route::get('login', [SessionControler::class, 'create'])->middleware('guest');
Route::post('login', [SessionControler::class, 'store'])->middleware('guest');
Route::post('post/{post:slug}/comment', [PostCommentController::class, 'store'])->middleware('auth');

Route::get('admin/post/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/post', [PostController::class, 'store'])->middleware('admin');
