<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
// Gate is to control who can access what
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * (view) Display a listing of the posts by the current user
     */
    public function index()
    {
        // load the posts
        // ->latest() is to order the posts by descending order
        $posts = auth()->user()->posts()->latest()->get();
        return view("posts.index", [ "posts" => $posts ]);
        // compact('posts')
    }

    /**
     * (view) Show the form for creating a new post.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * (action) Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required'
        ]);

        // create post with the current logged in user (user_id) built-in
        $post = auth()->user()->posts()->create( $validatedData );

        return redirect("/posts");
    }

    /**
     * (view) Display the specified post.
     */
    public function show(string $id)
    {
        // load the post by id
        $post = Post::findOrFail($id);
        return view("posts.show", [ 'post' => $post ]);
    }

    /**
     * (view) Show the form for editing the specified post.
     */
    public function edit(string $id)
    {   
        // load the post by id
        $post = Post::findOrFail($id);
        return view("posts.edit", compact('post'));
        // compact('post') is equal to [ 'post' => $post ]
    }

    /**
     * (action) Update the specified post in storage.
     */
    public function update(Request $request, string $id)
    {
        // load the post by id
        $post = Post::findOrFail($id);

        // make sure only the post owner can update their own post
        Gate::authorize('update',$post);

        $validatedData = $request->validate([
            'content' => 'required'
        ]);

        // pass in validated data to update the post
        $post->update($validatedData);

        return redirect("/posts");
    }

    /**
     * (action) Remove the specified post from storage.
     */
    public function destroy(string $id)
    {
        // load the post by id
        $post = Post::findOrFail($id);

        // delete post
        $post->delete();

        return redirect("/posts");
    }
}