<?php

use App\Http\Controllers\Autocontroller;
use App\Http\Controllers\Blogcontroller;
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
Route::get('/single',[Blogcontroller::class,'single'])->name('single.blog');

//login
route::get("/login",[Autocontroller::class,'loginform'])->name('loginform');
route::post("/login",[Autocontroller::class,'login'])->name('login');