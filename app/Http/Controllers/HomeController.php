<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Session;

class HomeController extends Controller
{
    public function all(){
        $category = Category::where('status',1)->orderBy('category')->get();
        return view('all',['title'=>'All Conferences'],compact('category'));
    }
}
