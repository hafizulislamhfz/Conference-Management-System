<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard(){
        return view('Admin.pages.dashboard',['title'=>'Admin|Dashboard']);
    }
    public function profile(){
        $user = Auth::user();
        return view('Admin.pages.profile');
    }

    public function password_change(Request $request){
        $user = Auth::user();
        $validator = Validator::make($request->all(),[
            'password'=>'required|min:6|max:20',
            'newpassword' => 'required|min:6|max:20',
            'renewpassword' => 'required|min:6|max:20|same:newpassword',
        ]);
        $password = $request->input('password');
        $newpassword = $request->input('newpassword');
        $renewpassword = $request->input('renewpassword');

        if(Hash::check($password,$user->password)){
            if(!$validator->passes()){
                return response()->json(['is_error'=>1, 'error'=>$validator->errors()->toArray()]);
            }else{
                if ($request->ajax()){
                    $user->update([
                        'password' => bcrypt($newpassword)
                    ]);
                    return response($user);
                }
            }
        }
        else{
            return response()->json(['pass_error'=>1, 'pass_error_text'=>"Password doesn't match."]);
        }
    }

    public function users(){
        return view('Admin.pages.users',['title'=>'Admin|Users']);
    }
}
