<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Factor;

class FactorController extends Controller
{
    //
    public function index()
    {
        $factors = Factor::all();
        return view('Factor.list', compact('factors'));
    }
}
