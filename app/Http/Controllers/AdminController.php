<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function admin(){
        $category = Category::all();
        return view('Admin.pages.admin',['title'=>'Admin'],compact('category'));
    }
    public function profile(){
        return view('Admin.pages.profile',['title'=>'Profile']);
    }

    public function users(){
        return view('Admin.pages.users',['title'=>'Admin Users']);
    }
}
