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
            return Redirect::back()->withErrors();
        }
    }

    public function logout()
    {
        return Auth::logout();
    }
}
