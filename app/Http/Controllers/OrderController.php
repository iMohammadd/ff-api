<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Factor;
use App\Order;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    //

    public function add($id)
    {
        $factor = Factor::find($id);
        return view('Order.add', compact('factor'));
    }

    public function create($id, Request $request)
    {
        $factor = Factor::find($id);
        $factor->order()->create($request->all());
        return Redirect::route('factor.view', ['id'=>$id]);
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('Order.edit', compact('order'));
    }

    public function store(Request $request, $id)
    {
        $order = Order::find($id);
        $order->title = $request->title;
        $order->save();

        return Redirect::route('factor.view', ['id'=>$order->factor_id]);
    }
}
