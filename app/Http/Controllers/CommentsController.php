<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Auth;

class CommentsController extends Controller
{
    public function index(Post $post)
    {
        $comments = Comment::where('post_id', $post->id)->latest()->get();
        return response()->json($comments);

    }   
    
    public function store(Post $post, Request $request)//, Post $post)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->body = $request->body;
        $comment->user_username = Auth::user()->username;
        $comment->save();

        return response()->json(['comment' => $comment]);
    }
}
