<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Conference;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;

class ConferenceController extends Controller
{
    public function conferences(Request $request){
        if ($request->ajax()) {
            $data = Conference::all();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('status', function($row){
                    if($row->status == 1){
                        $status = '<span class="badge badge-info">Published</span>';
                    }else{
                        $status = '<span class="badge badge-danger">Unpublish</span>';
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $btn = '<a class="show" id="show" data-id="'.Crypt::encrypt($row->id).'"
                            data-name="'.$row->name.'"
                            data-category="'.$row->category.'"
                            data-description="'.$row->description.'"
                            data-location="'.$row->location.'"
                            data-start_date="'.$row->start_date.'"
                            data-end_date="'.$row->end_date.'"
                            data-sub_date="'.$row->submission_date.'"
                            data-created="'.$row->created_at.'"
                            data-updated="'.$row->updated_at.'"
                            data-url="'.$row->url.'"
                            data-status="'.$row->status.'">
                            <i class="bi bi-eye-fill mr-3 ml-1 text-info" role="button" style="font-size:16px;" title="DETAILS"></i></a>';
                    $btn .= '<a class="edit" data-id="'.Crypt::encrypt($row->id).'"
                            data-name="'.$row->name.'"
                            data-category="'.$row->category.'"
                            data-description="'.$row->description.'"
                            data-location="'.$row->location.'"
                            data-url="'.$row->url.'"
                            data-start_date="'.$row->start_date.'"
                            data-end_date="'.$row->end_date.'"
                            data-sub_date="'.$row->submission_date.'"
                            data-status="'.$row->status.'">
                            <i class="bi-pencil-fill mr-3 ml-1 text-primary " role="button" style="font-size:16px;" title="EDIT"></i></a>';
                    $btn .= '<a class="delete" data-id="'.Crypt::encrypt($row->id).'" data-name="'.$row->name.'"><i class="bi-trash-fill mr-3 ml-1 text-danger " role="button" style="font-size:16px;" title="DELETE"></i></a>';
                    return $btn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        $category = Category::where('status',1)->orderBy('category')->get();
        return view('Admin.pages.conference.conference',compact('category'));
    }

    public function conference_store(Request $request){
        $validator = Validator::make($request->all(),[
            'category' => [
                'required',
                Rule::exists('categories', 'category')->where(function ($query) {
                    $query->where('status', 1);
                }),
            ],
            'name'=>'required|unique:conferences|max:100|regex:/^[a-zA-Z0-9\s\p{P}\p{S}]+$/u',
            'description' => 'required|regex:/^[a-zA-Z0-9\s\p{P}\p{S}]+$/u',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'sub_date' => 'required|date|before:start_date',
            'location' => 'required|regex:/^[a-zA-Z\'":,.\s-]+$/',
        ]);

        if(!$validator->passes()){
            return response()->json(['is_error'=>1, 'error'=>$validator->errors()->toArray()]);
        }else{
            if ($request->ajax()){
                // Create New conference
                $conference = new Conference;
                $conference->name = $request->input('name');
                $conference->category = $request->input('category');
                $conference->description = $request->input('description');
                $conference->start_date = $request->input('start_date');
                $conference->end_date = $request->input('end_date');
                $conference->submission_date = $request->input('sub_date');
                $conference->location = $request->input('location');
                // Save conference
                $conference->save();

                return response($conference);
            }
        }
    }

    public function conference_update(Request $request){
        $id = Crypt::decrypt($request->conferenceid);
        $conference = Conference::find($id);
        $validator = Validator::make($request->all(),[
            'category' => [
                'required',
                Rule::exists('categories', 'category')->where(function ($query) {
                    $query->where('status', 1);
                }),
            ],
            'name'=>'required|max:100|regex:/^[a-zA-Z0-9\s\p{P}\p{S}]+$/u|unique:conferences,name,'.$id.'',
            'description' => 'required|regex:/^[a-zA-Z0-9\s\p{P}\p{S}]+$/u',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'sub_date' => 'required|date|before:start_date',
            'location' => 'required|regex:/^[a-zA-Z\'":,.\s-]+$/',
        ]);

        if(!$validator->passes()){
            return response()->json(['is_error'=>1, 'error'=>$validator->errors()->toArray()]);
        }else{
            if ($request->ajax()){
                $conference->name = $request->input('name');
                $conference->category = $request->input('category');
                $conference->description = $request->input('description');
                $conference->start_date = $request->input('start_date');
                $conference->end_date = $request->input('end_date');
                $conference->submission_date = $request->input('sub_date');
                $conference->url = $request->input('url');
                $conference->location = $request->input('location');
                $conference->status = $request->status;
                // update conference
                $conference->update();

                return response($conference);
            }
        }
    }


    public function conference_delete(Request $request){
        if ($request->ajax()){
            $id = Crypt::decrypt($request->id);
            Conference::destroy($id);
        }
    }
}

