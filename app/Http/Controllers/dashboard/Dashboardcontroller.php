<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    public function index(){
        return view('Dashboard.index');
       }
       public function setting(){
        return view('Dashboard.setting');
       }
      
}
