<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController ;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/blogs', function () {
    return view('pages.blogs');
});

Route::get('/blog-details', function () {
    return view('pages.blog-details');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/social', function () {
    return view('pages.social');
});

Route::get('/admin', function () {
    return view('pages.admin');
});

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::prefix("/admin")->group(function () {
    Route::get("/category-create", [CategoryController::class,"create"])->name("admin.category.create");
    Route::get("/category-list", [CategoryController::class,"list"])->name("admin.category.list");
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/create-category', function () {
    return view('layouts.admin.category.create');
});

