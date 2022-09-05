<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        'users'         => UserController::class
    ]);

    // Route::middleware('')->resources([
    //     'categories'    => CategoryController::class,
    //     'users'         => UserController::class
    // ]);

    Route::group(['middleware' => 'is_admin'], function () {
        Route::resources([
            'categories'    => CategoryController::class,
        ]);
    });

    Route::get('my-profile', [UserController::class, 'my_profile'])->name('user.profile');
});


// Customers

Route::group(['prefix'  => 'customer', 'as' => 'customer.'], function () {

    // Registration
    Route::get('register', [CustomerController::class, 'register'])->name('register');
    Route::post('register', [CustomerController::class, 'processRegistration'])->name('processRegistration');

    // Login
    Route::get('login', [CustomerController::class, 'login'])->name('login');
    Route::post('login', [CustomerController::class, 'processLogin'])->name('processLogin');

    // Logout
    Route::post('logout', [CustomerController::class, 'logout'])->name('logout');
    Route::get('logout', [CustomerController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('dashboard', [CustomerController::class, 'dashboard'])->name('dashboard')->middleware('is_customer');
});


Route::get('permission', function () {

    // Roles
    // $admin = Role::create(['name' => 'Editor']);



    // Permissions
    // $editPost   = Permission::create(['name' => 'Edit Posts']);
    // $deletePost = Permission::create(['name' => 'Delete Posts']);


    // Asssign
    // $editPost->assignRole($admin);


    // Assign Role to specific user

    $user = User::find(5);
    $user->givePermissionTo('Create Post');
    // $user->givePermissionTo('Edit Posts', 'Delete Post', 'Create Post');
    // $user->revokePermissionTo('Delete Post');
    // $user->assignRole('Editor');
});
