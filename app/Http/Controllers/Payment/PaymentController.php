<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree\ClientToken;

class PaymentController extends Controller
{
    //
    public function getPaymentToken(){
        return response()->json(['payment_token' => ClientToken::generate()]);
    }
}
