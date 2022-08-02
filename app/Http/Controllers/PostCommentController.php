<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function Store(Request $request, Post $post)
    {
        $request->validate([
            'body'          => 'required'
        ]);

        $post->comment()->create([
            'body'  => $request->body,
            'user_id' => $request->user()->id
        ]);

        return back();
    }
}
