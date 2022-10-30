<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function all(){
        return view('all',['title'=>'All Conferences']);
    }

    public function login(){
        return view('Auth.pages.login',['title'=>'Login']);
    }


    public function register(){
        return view('Auth.pages.register',['title'=>'Register']);
    }
}
