<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree\ClientToken;
use Illuminate\Support\Facades\Validator;
use Stripe\Charge;

class PaymentController extends Controller
{
    //
    public function getPaymentToken(){
        return response()->json(['payment_token' => ClientToken::generate()]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function payBidAmount(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'token' => 'required',
            ]);

            if($validator->fails()){
                $errors = $validator->errors();
                return response()->json(['message'=>$errors],401);
            }

            $charge = Charge::create(['amount' => 1500, 'currency' => 'aud', 'source' => $request["token"]]);
            return response()->json(['payment_token' => $charge],200);
        }
        catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],401);
        }
    }
}
