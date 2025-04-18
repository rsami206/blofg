<?php

use App\Http\Controllers\Autocontroller;
use App\Http\Controllers\Blogcontroller;
use App\Http\Controllers\Dashboardcontroller;
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
Route::post("/logout", [AutoController::class, 'logout'])->name('logout');
Route::get("/signup", [AutoController::class, 'signupForm'])->name("signupForm");
Route::post("/register", [AutoController::class, 'register'])->name("register");




Route::middleware(['auth'])->prefix('/dashboard')->group( function(){
    Route::get('/', [Dashboardcontroller::class, 'index'])->name('dashboard.index');

})
