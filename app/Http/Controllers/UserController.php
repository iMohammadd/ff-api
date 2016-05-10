<?php

namespace App\Http\Controllers;

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
        return Redirect::route('factor.list');
    }

    public function edit()
    {
        return view('User.edit');
    }

    public function store(Request $request)
    {
        if(\Hash::check($request->password, Auth::user()->password)) {
            if($request->newpassword == $request->confrimpassword) {
                $request->session()->flash('flash_message', 'کلمه عبور تعویض شد');
                $request->session()->flash('flash_message_level', 'success');
                return Redirect::route('factor.list');
            } else {
                $request->session()->flash('flash_message', 'کلمه عبور جدید و تکرار آن همخوانی ندارند');
                $request->session()->flash('flash_message_level', 'danger');
                return back();
            }
        } else {
            $request->session()->flash('flash_message', 'کلمه عبور فعلی صحیح نیست');
            $request->session()->flash('flash_message_level', 'danger');
            return back();
        }
    }
}
