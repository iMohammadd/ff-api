<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\userStoreRequest;
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

    public function userList()
    {
        $users = User::paginate(15);
        return view('User.list', compact('users'));
    }

    public function userCreate()
    {
        return view('User.create');
    }

    public function userStore(userStoreRequest $request)
    {
        $request->merge(['is_admin'=>0]);
        User::create($request->all());
        return Redirect::route('users.list');
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password])) {
            return Redirect::route('dashboard.index');
        } else {
            return Redirect::back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('user.authform');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('User.edit', compact('user'));
    }

    public function store(Request $request, $id)
    {
        if ($request->newpassword != '' && $request->newpassword == $request->confrimpassword) {
            $user = User::find($id);
            $user->name = $request->name;
            $user->password = bcrypt($request->newpassword);
            $user->save();
            if ($user->isAdmin()) {
                return Redirect::route('user.logout');
            }
            return Redirect::route('users.list');
        } elseif ($request->newpassword == '' && $request->confrimpassword == '') {
            $user = User::find($id);
            $user->name = $request->name;
            $user->save();
            return Redirect::route('users.list');
        } else {
            return back();
        }
    }
}
