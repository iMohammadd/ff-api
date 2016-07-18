<?php

namespace App\Http\Controllers;

use App\Factor;
use Illuminate\Http\Request;

use App\Http\Requests;
use Gateway;

class PaymentController extends Controller
{
    public function index($id)
    {
        try {
            $factor = Factor::find($id);
            $gateway = Gateway::zarinpal();
            $gateway->setCallback(route('pay.callback', ['id'=>$id]));
            $gateway->price($factor->price*10)->ready();
            $refID = $gateway->refId();
            $transID = $gateway->transactionId();
            $factor->refId = $refID;
            $factor->save();
            return $gateway->redirect();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function callback(Request $request, $id)
    {
        try {
            $gateway = Gateway::verify();
            return $request->all();
        } catch (\Exception $e) {
            $factor = Factor::find($id);
            $factor->refId = null;
            $factor->save();
            return $e->getMessage();
        }
    }
}
