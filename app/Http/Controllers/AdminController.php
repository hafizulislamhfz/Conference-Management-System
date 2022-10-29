<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('Admin.pages.admin',['title'=>'Admin']);
    }
    public function profile(){
        return view('Admin.pages.profile',['title'=>'Profile']);
    }
}
