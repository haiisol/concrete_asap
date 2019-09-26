<?php

namespace App\Http\Controllers\Payment;

use App\Repositories\BidRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree\ClientToken;
use Illuminate\Support\Facades\Validator;
use Stripe\Charge;

class PaymentController extends Controller
{
    private $bid_repo;
    private $user;
    public function __construct(BidRepository $bid_repo){
        $this->bid_repo=$bid_repo;
        $this->user=auth('api')->user();
    }

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
                'price'=>'required',
                'order_id'=>'required'
            ]);

            if($validator->fails()){
                $errors = $validator->errors();
                return response()->json(['message'=>$errors],401);
            }

            $charge = Charge::create(['amount' => 1500, 'currency' => 'aud', 'source' => $request["token"]["tokenId"]]);
            if($charge){
                if($this->bid_repo->save($request["price"],$request["order_id"],$this->user->id)){
                    return response()->json(['message'=>"Bid Successfully","payment_complete"=>true,"payment_info"=>$charge],200);
                }
            }
        }
        catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],401);
        }
    }
}
