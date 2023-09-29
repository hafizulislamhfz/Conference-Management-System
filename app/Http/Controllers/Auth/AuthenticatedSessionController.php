<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Authh.pages.login',['title'=>'Login']);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        $email = $request->email;
        $user = User::where('email',$email)->first();
        $role = $user->role;
        Session::put("role", $role);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    // checkuser type after authenticate
    public function checkuser(){
        if(Session::has('role')){
            $all = session()->all();
            $role = $all['role'];
            if($role == "admin"){
                return redirect('admin/dashboard');
            }elseif($role == "cadmin"){
                return redirect('conference-admin/pannel');
            }elseif($role == "reviewer"){
                return redirect('reviewer/pannel');
            }elseif($role == "author"){
                return redirect("author/pannel");
            }else{
                Auth::guard('web')->logout();
                session()->invalidate();
                session()->regenerateToken();
                return redirect('/login')->with('status','You are not allow.');
            }
        }else{
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/login')->with('status','You are not allow.');
        }

    }


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->forget('role');

        return redirect('/');
    }
}
