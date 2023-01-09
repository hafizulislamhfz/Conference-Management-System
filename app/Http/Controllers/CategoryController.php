<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;
use Validator;

class CategoryController extends Controller
{
    public function categories(Request $request){
        if ($request->ajax()) {
            $data = Category::all();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('status', function($row){
                    if($row->status == 1){
                        $status = '<span class="badge badge-info">Active</span>';
                    }else{
                        $status = '<span class="badge badge-danger">Inactive</span>';
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $btn = '<a class="edit" data-id="'.$row->id.'" data-category="'.$row->category.'" data-status="'.$row->status.'"><i class="bi-pencil-fill mr-3 ml-1 text-primary " role="button" style="font-size:16px;" title="EDIT"></i></a>';
                    $btn .= '<a class="delete" data-id="'.$row->id.'" data-category="'.$row->category.'" data-status="'.$row->status.'"><i class="bi-trash-fill mr-3 ml-1 text-danger " role="button" style="font-size:16px;" title="DELETE"></i></a>';
                    return $btn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('Admin.pages.category.categories',['title'=>'Categories']);
    }

    public function category_store(Request $request){
        $validator = Validator::make($request->all(),[
            'category'=>'required|unique:categories|max:55|regex:/^[a-zA-Z]+$/u',
            'status'=>'required|in:0,1',
        ]);

        if(!$validator->passes()){
            return response()->json(['is_error'=>1, 'error'=>$validator->errors()->toArray()]);
        }else{
            if ($request->ajax()){
                // Create New category
                $category = new Category;
                $category->category = $request->input('category');
                $category->status = $request->status;
                // Save category
                $category->save();

                return response($category);
            }
        }
    }

    public function category_update(Request $request){
        $category = Category::find($request->categoryid);
        $validator = Validator::make($request->all(),[
            'category'=>'required|max:55|regex:/^[a-zA-Z]+$/u|unique:categories,category,'.$request->categoryid.'',
            'status'=>'required|in:0,1'
        ]);
        if(!$validator->passes()){
            return response()->json(['is_error'=>1, 'error'=>$validator->errors()->toArray()]);
        }else{
            if ($request->ajax()){
                $category->category = $request->input('category');
                $category->status = $request->status;
                // update category
                $category->update();

                return response($category);
            }
        }


    }

    public function category_delete(Request $request){
        if ($request->ajax()){
            Category::destroy($request->id);
        }
    }
}
