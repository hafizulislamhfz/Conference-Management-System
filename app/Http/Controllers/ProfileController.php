<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    // public function edit(Request $request)
    // {
    //     return view('profile.edit', [
    //         'user' => $request->user(),
    //     ]);
    // }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function update(ProfileUpdateRequest $request)
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    // checkuser type
    // public function checkuser(){
    //     if(Session::has('role')){
    //         $all = session()->all();
    //         $role = $all['role'];
    //         if($role == "admin"){
    //             return redirect('admin/dashboard');
    //         }elseif($role == "cadmin"){
    //             return redirect('conference-admin/pannel');
    //         }elseif($role == "reviewer"){
    //             return redirect('reviewer/pannel');
    //         }elseif($role == "author"){
    //             return redirect("author/pannel");
    //         }else{
    //             Auth::guard('web')->logout();
    //             session()->invalidate();
    //             session()->regenerateToken();
    //             return redirect('/login')->with('status','You are not allow.');
    //         }
    //     }else{
    //         Auth::guard('web')->logout();
    //         session()->invalidate();
    //         session()->regenerateToken();
    //         return redirect('/login')->with('status','You are not allow.');
    //     }

    // }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
//     public function destroy(Request $request)
//     {
//         $request->validateWithBag('userDeletion', [
//             'password' => ['required', 'current-password'],
//         ]);

//         $user = $request->user();

//         Auth::logout();

//         $user->delete();

//         $request->session()->invalidate();
//         $request->session()->regenerateToken();

//         return Redirect::to('/');
//     }
}
