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

    public function view($id)
    {
        $factor = Factor::find($id);
        return view('Factor.view', compact('factor'));
    }

    public function status($id, Request $request)
    {
        $factor = Factor::find($id);
        $factor->status = $request->status;
        $factor->save();
        return Redirect::back();
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
