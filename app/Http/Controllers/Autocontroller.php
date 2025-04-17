<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Autocontroller extends Controller
{
  public function loginform(){
    return view('auth.login');
  }
  public function login(Request $request){

    $user=$request->validate([
        'email' => ['required', 'email'],
            'password' => ['required'],
    ]);
    if(auth::attempt($user)){
        
    }
  }
}
