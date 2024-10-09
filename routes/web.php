<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;



// home 
Route::get('/', [ HomeController::class, 'loadHomePage' ]);

// login 
Route::get("/login", [
    LoginController::class,
    'loadLoginPage'
]);

// login logic
Route::post("/login", [
    LoginController::class,
    'doLogin'
]);

// sign up page
Route::get("/signup", [
    SignUpController::class,
    'loadSignUpPage'
]);
// Sign up logic
Route::post("/signup", [
    SignUpController::class,
    'doSignUp'
]);

// logout
Route::get("/logout", [
    LogoutController::class,
    'logout'
]);

// manage posts page
Route::get("/ctrl", [
    PostController::class,
    "index"
]);

// manage users page
Route::get("/users", [
    UserController::class,
    'index'
]);


//poll routes
Route::resource("posts", PostController::class);

//user routes
Route::resource("users", UserController::class);
