<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    public function admin(){
        return view('Reviewer.pages.admin',['title'=>'Admin']);
    }
    public function profile(){
        return view('Reviewer.pages.profile',['title'=>'Profile']);
    }
}
