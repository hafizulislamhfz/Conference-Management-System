<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CAdminController extends Controller
{
    public function admin(){
        return view('C_Admin.pages.admin',['title'=>'Admin']);
    }
    public function profile(){
        return view('C_Admin.pages.profile',['title'=>'Profile']);
    }
}
