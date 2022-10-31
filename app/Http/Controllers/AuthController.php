<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AuthController extends Controller
{
    public function all(){
        $category = Category::all();
        return view('all',['title'=>'All Conferences'],compact('category'));
    }

    public function login(){
        return view('Auth.pages.login',['title'=>'Login']);
    }


    public function register(){
        $category = Category::all();
        return view('Auth.pages.register',['title'=>'Register'],compact('category'));
    }
}
