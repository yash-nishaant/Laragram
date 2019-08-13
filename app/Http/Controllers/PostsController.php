<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Like;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function delete($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        $post->delete();
        return redirect('/profile/' . auth()->user()->id);
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);
        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200, 1200);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        return redirect('/profile/' . auth()->user()->id);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();        

        $post->caption = $request->input('caption');
        if (request('image')){
            $imagePath = request('image')->store('uploads','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200, 1200); 
            $image->save();
            $post->image = $imagePath;         
        }

        $post->save();

        return redirect('/p/' . $id);
    }

    public function show(Post $post, Comment $comment)
    {
        $comments = $post->comments()->get();
        return view('posts.show', compact('post', 'comments'));
    }

    public function getLike($post_id)
    {
        $post = Post::find($post_id);
        
        if (!$post){
            return redirect()->back();
        }

        if (Auth::user()->hasLiked($post)){
            return $post->likes()->where('user_id', Auth::user()->id)->delete();
        }

        $like = $post->likes()->create();
        Auth::user()->likes()->save($like);

        return redirect()->back();
    }
}