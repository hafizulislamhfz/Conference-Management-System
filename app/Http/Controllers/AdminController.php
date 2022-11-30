<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function admin(){
        $category = Category::where('status',1)->orderBy('category')->get();
        return view('Admin.pages.admin',['title'=>'Admin'],compact('category'));
    }
    public function profile(){
        return view('Admin.pages.profile',['title'=>'Profile']);
    }

    public function users(){
        return view('Admin.pages.users',['title'=>'Admin Users']);
    }

    public function categories(){
        $category = Category::orderBy('category')->get();
        return view('Admin.pages.categories',['title'=>'Categories'],compact('category'));
    }

    public function category_store(Request $req){
        $category = New Category;
        $category->category = $req->name;
        $status = $req->status;
        if($status == 1){
            $category->status = 1;
        }else{
            $category->status = 0;
        }
        $category->save();
        return redirect('categories');
    }

    public function category_update(Request $req){
        $category = Category::find($req->id);
        $category->category = $req->name;
        $status = $req->status;
        if($status == 1){
            $category->status = 1;
        }else{
            $category->status = 0;
        }
        $category->save();
        return redirect('categories');
    }

    public function category_delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('categories');
    }
}
