<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;



class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fetch all the comments
        $comments = DB::table('comments')->latest()->get();
        // $comments = Comment::latest()->get();
        
        return view("posts.show", [ "comments" => $comments ]);

    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     return view("posts.show");
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required'
        ]);

        // create comment with the current logged in user (user_id) built-in
        $post = auth()->user()->comments()->create( $validatedData );

        // return redirect("posts.show");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
