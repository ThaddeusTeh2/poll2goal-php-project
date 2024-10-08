<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class ManageController extends Controller
{
    public function loadManagePage() 
    {
        // check if user is logged in or not
        if ( auth()->check() ) {
            $name = auth()->user()->name;
        } else {
            $name = 'Guest';
        }

        // load all the posts
        $posts = post::latest()->get(); 

        // load all the users
        // $users = user::latest()->get(); 
        
        return view("ctrl", [ 'name' => $name, 'posts' => $posts ]);
        // return view("ctrl");
    }
}
