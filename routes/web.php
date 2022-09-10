<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
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

// Route::get("/contact", function () {
//     return view("pages.contact");
// });

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
        'users'         => UserController::class,
        'categories'    => CategoryController::class,
    ]);

    // Route::middleware('')->resources([
    //     'categories'    => CategoryController::class,
    //     'users'         => UserController::class
    // ]);

    // Route::group(['middleware' => 'is_admin'], function () {
    //     Route::resources([
    //         'categories'    => CategoryController::class,
    //     ]);
    // });

    Route::get('my-profile', [UserController::class, 'my_profile'])->name('user.profile');
    Route::put('user/profile-update/{id}', [UserController::class, 'profile_update'])->name('user.profile.update');
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
    $admin = Role::create(['name' => 'administrator']);
    $editor = Role::create(['name' => 'editor ']);
    $author = Role::create(['name' => 'author']);
    $subscriber = Role::create(['name' => 'subscriber']);

    // Permissions
    $posts          = Permission::create(['name' => 'posts.*']);
    $users          = Permission::create(['name' => 'usere.*']);
    $categories     = Permission::create(['name' => 'categories.*']);


    // Assign permission to role
    // admin
    $admin->givePermissionTo('posts.*');
    $admin->givePermissionTo('usere.*');
    $admin->givePermissionTo('categories.*');

    // Editor
    $editor->givePermissionTo('posts.*');
    $editor->givePermissionTo('categories.*');

    // Author
    $author->givePermissionTo('posts.*');




    // $role = Role::findById(3);
    // $role->givePermissionTo(Permission::all());

    // $role = Role::findById(2);
    // $role->givePermissionTo('posts.*');
    // $role->givePermissionTo('categories.*');


    // $admin = Role::findById(1);
    // $user = User::find(1);
    // $user->assignRole($admin);

    // dd(Permission::all());
});


// Email Sending

Route::get('payment', [PaymentController::class, 'index']);
Route::post('payment', [PaymentController::class, 'send_payment'])->name('payment.send');


// contact page mail & notification

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'contact'])->name('contact');


// Show All notification for a specific uses
Route::get('users/notifications', [NotificationController::class, 'index'])->name('notification')->middleware('auth');
