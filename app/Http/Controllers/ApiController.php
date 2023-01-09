<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ApiController extends Controller
{
    public function searchcategories(Request $searchkey){
        $searchkey = $searchkey->searchkey;
        if($searchkey == 'all'){
            $category = Category::orderBy('category')->get();
        }else{
            $category = Category::where('category', 'like', '%'.$searchkey.'%')
                                    ->orWhere('status', 'like', '%'.$searchkey.'%')
                                    ->get();
        }
        return view('Admin.pages.category.categorylist',compact('category'));
        }
}
