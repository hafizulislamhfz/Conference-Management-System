<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
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
