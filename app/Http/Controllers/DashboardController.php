<?php

namespace App\Http\Controllers;

use App\Factor;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->take(5)->get();
        $factors = Factor::orderBy('created_at', 'DESC')->take(5)->get();
        return view('Dashboard.index', compact(['users', 'factors']));
    }
}
