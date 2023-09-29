<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Session;
//////////////////////////////////////////////
class AuthController extends Controller
{
    public function login(){
        return view('Auth.pages.login',['title'=>'Login']);
    }

    public function store_login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email','=',$email)
            ->where('password','=',$password)
            ->first();

        if($user){
            if($user->status == 0){
                return redirect()->back()->with('info', 'You permission was denied');
            }
            else{
                Session::put('username', $user->name);
                $request->session()->put('userrole', $user->role);
                if($user->role == 'admin'){
                    return redirect('admin/pannel');
                }
                elseif($user->role == 'cadmin'){
                    return redirect('conference-admin/pannel');
                }
                elseif($user->role == 'author'){
                    return redirect('author/pannel');
                }
                elseif($user->role == 'reviewer'){
                    return redirect('reviewer/pannel');
                }
            }
        }
        else{
            return redirect()->back()->with('info', 'Email or password is wrong.Try again.');
        }
    }


    public function register(){
        $category = Category::where('status',1)->orderBy('category')->get();
        return view('Auth.pages.register',['title'=>'Register'],compact('category'));
    }
}
