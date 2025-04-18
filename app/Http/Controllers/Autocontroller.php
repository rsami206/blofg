<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Autocontroller extends Controller
{
  public function loginform()
  {
    return view('auth.login');
  }
  public function login(Request $request)
  {

    $user = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);
    if (Auth::attempt($user)) {
      $request->session()->regenerate();
      return redirect()->route('dashboard.index');
    }
    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
  }



  public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    
  public function signupForm()
  {
    return view("auth.signup");
  }
  public function register(Request $request)
  {

    // validate data
    $request->validate([
      'name' => ['required'],
      'email' => ['required', 'email', 'unique:users,email'],
      'password' => ['required', 'confirmed', 'min:6']
    ]);
    
    User::create([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'password' => Hash::make($request->input('password')),
    ]);
    return redirect()->route('loginform');
  }
}
