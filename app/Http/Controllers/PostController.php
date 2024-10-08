<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Vote;


// Gate is to control who can access what
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * (view) Display a listing of the posts by the current user
     */
    public function index()
    {
        //if the current user is a normal user
        if (auth()->user()->role === "user"){
        // load the posts
        // ->latest() is to order the posts by descending order
        $posts = auth()->user()->posts()->latest()->get();
        return view("ctrl", [ "posts" => $posts ]);
        // compact('posts')
        }

        //if the user has a higher role
        else {
            $posts = Post::latest()->get();
            return view("ctrl", [ "posts" => $posts ]);
        }
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
        return redirect("ctrl");
    }

    /**
     * (view) Display the specified post.
     */
    public function show(string $id)
    {
        // load the post by id
        $post = Post::findOrFail($id);
        //load the comments belonging to the post
        $comments = Comment::where('post_id', $id)->get();
        $votesNo = Vote::where('post_id', $id)->where('vote', 0)->count();
        $votesYes = Vote::where('post_id', $id)->where('vote', 1)->count();

        return view("posts.show", [ 'post' => $post, 'comments' => $comments, 'votesNo' => $votesNo, 'votesYes' => $votesYes ]);
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

        return redirect("ctrl");
    }

    /**
     * (action) Remove the specified post from storage.
     */
    public function destroy(string $id)
    {
        // load the post by id
        $post = Post::findOrFail($id);

        // make sure only the post owner, mods and admins can delete post
        Gate::authorize('delete',$post);

        // delete post
        $post->delete();

        return redirect("ctrl");
    }

    
}