<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function author(){
        return view('Author.pages.admin',['title'=>'Author']);
    }
    public function profile(){
        return view('Author.pages.profile',['title'=>'Profile']);
    }
}
