<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Blogcontroller extends Controller
{
    public function index(){
        return view('blog.index');
    }
    public function single(){
        return view('blog.single');
    }
        
}
