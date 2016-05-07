<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    public function edit($id) {
        $factor = Factor::find($id);
        return view('Factor.edit', compact('factor'));
    }

    public function store($id, Request $request)
    {
        $factor = Factor::find($id);
        $factor->num = $request->num;
        $factor->customer = $request->customer;
        $factor->price = $request->price;
        $factor->status = $request->status;
        $factor->save();
        return Redirect::route('factor.view', ['id'=>$request->id]);
    }

    public function create(Request $request)
    {
        Factor::create($request->all());
        return Redirect::route('factor.list');
    }

    public function get(Request $request)
    {
        try {
            $res = Factor::with('order')->where('num', '=', $request->num)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 404);
        }

        return $res;
        //return $request->num;
    }
}
