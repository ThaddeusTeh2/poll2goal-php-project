<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function loadHomePage() 
    {
        // // check if user is logged in or not
        // if ( auth()->check() ) {
        //     $name = auth()->user()->name;
        // } else {
        //     $name = 'Guest';
        // }

        // // load all the posts
        // $posts = post::latest()->get(); 
        
        // return view("home", [ 'name' => $name, 'posts' => $posts ]);
        return view("home");
    }
}