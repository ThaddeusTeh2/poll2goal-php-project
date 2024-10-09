<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

// Gate is to control who can access what
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->latest()->get();

        return view("/users", [ "users" => $users ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view("users", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // load the user by id
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'role' => 'required'
        ]);

        // pass in validated data to update the user
        $user->update($validatedData);
        return redirect("users");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // load the post by id
        $user = User::findOrFail($id);

        // make sure only admin can delete user
        Gate::authorize('delete',$user);

        // delete post
        $user->delete();

        return redirect("users");
    }
}