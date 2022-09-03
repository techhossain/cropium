<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/home-2', function () {
    return view('pages.home-2');
});

Route::get("/about", function () {
    return view("pages.about");
});

Route::get("/service", function () {
    return view("pages.service");
});

Route::get("/service/{id}", function () {
    return view("pages.service-details");
});

Route::get("/portfolio", function () {
    return view("pages.portfolio");
});

Route::get("/portfolio/{id}", function () {
    return view("pages.portfolio-details");
});

Route::get("/contact", function () {
    return view("pages.contact");
});

Route::get("/404", function () {
    return view("404");
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get("/blog", [BlogsController::class, 'index'])->name('blog');

Route::get("/blog/{blog:slug}/", [BlogsController::class, 'show'])->name('single-post');

Route::get("/category/{category:slug}/", [BlogsController::class, 'getPostByCategory'])->name('category-post');

Route::get("/user/{user:username}/", [BlogsController::class, 'getPostByUser'])->name('user-post');

// Registration

Route::get('register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'processRegistration'])->name('processRegistration');

// Login
Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'processLogin'])->name('processLogin');

// Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');





// Dashboard
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // Route::resource('posts', PostController::class);
    // Route::resource('categories', CategoryController::class);

    Route::resources([
        'posts'         => PostController::class,
        'categories'    => CategoryController::class,
        'users'         => UserController::class
    ]);

    Route::get('my-profile', [UserController::class, 'my_profile'])->name('user.profile');
});
