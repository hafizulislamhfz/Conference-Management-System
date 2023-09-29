<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Session;

class HomeController extends Controller
{
    public function home(){
        $category = Category::where('status',1)->orderBy('category')->get();
        return view('home',compact('category'));
    }

    public function session(){
        // $request->session()->invalidate();
        $all = session()->all();
        return dd($all);
    }
}
