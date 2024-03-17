<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/routing', function() {
    return view('routing');
    });

Route::get('/basic_routing', function() {
return 'Hello World';
});

// clonning route
Route::get('/clonning', function() {
    return view('clonning');
});

// view route
Route::view('/view_route', 'view_route');
Route::view('/view_route', 'view_route', ['name' => 'Arya Yudha Pratama']);

// controller route
Route::get('/controller_route', [RouteController::class, 'index']);

// redirect route
Route::redirect('/', '/routing');

// parameter route (require)
Route::get('/user/{id}', function($id) {
    return "User Id: ".$id;
});
Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
    return "Post Id: ".$postId.", Comment Id: ".$commentId;
});

// parameter route (optional)
Route::get('username/{name?}', function($name = null) {
    return 'Username: '.$name;
});

// Route With Regular Expression Constraints
Route::get('/title/{title}', function($title) {
    return "Title: ".$title;
})->where('title', '[A-Za-z\-]+');

// Named route
Route::get('/profile/{profileId}', [RouteController::class, 'profile'])->name('profileRouteName');

// Priority route
Route::get('/route_priority/{rpId}', function($rpId) {
    return "This is Route One";
});
Route::get('/route_priority/user', function() {
    return "This is Route 1";
});
Route::get('/route_priority/user', function() {
    return "This is Route 2";
});

// Fallback route
Route::fallback(function() {
    return 'This is Fallback Route';
});

// Group route
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', function() {
        return "This is admin dashboard";
    })->name('dashboard');
    Route::get('/users', function() {
        return "This is user data on admin page";
    })->name('users');
    Route::get('/items', function() {
        return "This is item data on admin page";
    })->name('items');
});
