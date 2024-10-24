<?php

namespace App\Http\Controllers;

use App\Mail\BlogPost;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('users')->cursorPaginate(8);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post'=>$post]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:5'],
            'body' => ['required', 'min:5'],
        ]);

        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => request('title'),
            'body' => request('body'),
        ]);
        Mail::to('moazsham9@gmail.com')->queue(new BlogPost($post));
        return redirect('/posts');
    }
    public function edit(Post $post)
    {
        // Gate::authorize('edit-post', $post);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => ['required', 'min:5'],
            'body' => ['required', 'min:5'],
        ]);

        $post->update([
            'title' => request('title'),
            'body' => request('body'),
        ]);
        return redirect('/posts/'.$post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }

}
/*
1-Inline Autherization:
    if(Auth::guest);
    if($post->users->is(Auth::user()));
2-Gates:
    Gate::define('edit-post', function(User $user, Post $post)
    {return $post->users->is(Auth::user());})
    Gate::authorize('edit-post', $post);
    if(Gate::allows('edit-post', $post)){}
    if(Gate::denies('edit-post', $post)){}
3- Gates in AppProviderService.
4- can:
    deterimine if the entity has the given abilities.
5-Middleware Authorization:
6-Policies.
*/
