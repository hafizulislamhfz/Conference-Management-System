<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function conferences(){
        $category = Category::where('status',1)->orderBy('category')->get();
        return view('Admin.pages.conference',['title'=>'Admin'],compact('category'));
    }
    public function profile(){
        return view('Admin.pages.profile',['title'=>'Profile']);
    }

    public function users(){
        return view('Admin.pages.users',['title'=>'Admin Users']);
    }
}
