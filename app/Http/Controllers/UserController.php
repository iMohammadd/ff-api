<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Redirect;

class UserController extends Controller
{
    //

    public function index()
    {
        if(Auth::check()) {
            return Redirect::route('factor.list');
        } else {
            return view('login');
        }
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password])) {
            return Redirect::route('factor.list');
        } else {
            return Redirect::back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('user.authform');
    }

    public function edit()
    {
        return view('User.edit');
    }

    public function store(Request $request)
    {
        if(\Hash::check($request->password, Auth::user()->password)) {
            if($request->newpassword == $request->confrimpassword) {
                $request->session()->flash('flash_message', 'ع©ظ„ظ…ظ‡ ط¹ط¨ظˆط± طھط¹ظˆغŒط¶ ط´ط¯');
                $request->session()->flash('flash_message_level', 'success');
                $user = User::find(1);
                $user->password = bcrypt($request->newpassword);
                $user->save();
                return Redirect::route('user.logout');
            } else {
                $request->session()->flash('flash_message', 'ع©ظ„ظ…ظ‡ ط¹ط¨ظˆط± ط¬ط¯غŒط¯ ظˆ طھع©ط±ط§ط± ط¢ظ† ظ‡ظ…ط®ظˆط§ظ†غŒ ظ†ط¯ط§ط±ظ†ط¯');
                $request->session()->flash('flash_message_level', 'danger');
                return back();
            }
        } else {
            $request->session()->flash('flash_message', 'ع©ظ„ظ…ظ‡ ط¹ط¨ظˆط± ظپط¹ظ„غŒ طµط­غŒط­ ظ†غŒط³طھ');
            $request->session()->flash('flash_message_level', 'danger');
            return back();
        }
    }
}
