<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Factor;
use Illuminate\Support\Facades\Redirect;

class FactorController extends Controller
{
    //
    public function index()
    {
        $factors = Factor::paginate(10);
        return view('Factor.list', compact('factors'));
    }

    public function add()
    {
        return view('Factor.create');
    }

    public function create(Request $request)
    {
        Factor::create($request->all());
        return Redirect::route('factor.list');
    }
}
