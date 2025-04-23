<?php

use App\Http\Controllers\Autocontroller;
use App\Http\Controllers\Blogcontroller;
use App\Http\Controllers\dashboard\categorycontroller;
use App\Http\Controllers\dashboard\Dashboardcontroller;
use App\Http\Controllers\dashboard\postcontroller;
use Illuminate\Support\Facades\Route;
use Psy\TabCompletion\AutoCompleter;

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

Route::get('/',[Blogcontroller::class,'index'])->name('blog.index');
Route::get('/single{id}',[Blogcontroller::class,'single'])->name('single.blog');

//login
route::get("/login",[Autocontroller::class,'loginform'])->name('loginform');
route::post("/login",[Autocontroller::class,'login'])->name('login');
Route::post("/logout", [AutoController::class, 'logout'])->name('logout');
Route::get("/signup", [AutoController::class, 'signupForm'])->name("signupForm");
Route::post("/register", [AutoController::class, 'register'])->name("register");




Route::middleware(['auth'])->prefix('/dashboard')->group( function(){
   Route::get('/index', [Dashboardcontroller::class,'index'])->name('dashboard.index');
Route::get('/setting',[Dashboardcontroller::class,'setting'])->name('setting');

Route::get('/posts',[postcontroller::class,'index'])->name('post.index');
Route::get('/posts/create',[postcontroller::class,'postcreate'])->name('post.create');
Route::post('/posts/store',[postcontroller::class,'poststore'])->name('post.store');
Route::get('/posts/delete/{id}',[postcontroller::class,'postdelete'])->name('post.delete');
});

Route::middleware(['auth'])->prefix('/dashboard')->group(function(){
   Route::get('/cats', [categorycontroller::class,'index'])->name('category.index');
   Route::get('/cats/create', [categorycontroller::class,'create'])->name('cats.create');
   Route::post('/cats/store', [categorycontroller::class,'store'])->name('cats.store');
});
