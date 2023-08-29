<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', [
        "judul"=> "Home",
        "active"=> "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "judul"=>"About",
        "active"=>"about",
        "nama"=>"Jamesss",
        "email"=>"james@if.ac.id",
        "image" => "profil.png"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'singlePost']);

Route::get('/categories', function(){
    return view('categories', [
        'judul' => 'Categories',
        'active' => "categories",
        'categories' => Categories::all()
    ]);
});

Route::get('/author/{author:username}', function(User $author){
    return view('posts',[
        'judul'=> "Post By Author: $author->name",
        'posts'=> $author->posts->load('categories', 'author')
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', fn()=> view('dashboard.index'))->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');