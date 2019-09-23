<?php

namespace App\Http\Controllers\Rep;

use App\Repositories\Interfaces\BidRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BidController extends Controller
{
    private $bid_repo;
    private $user;
    //
    public function __construct(BidRepositoryInterface $bid_repo){
        $this->bid_repo=$bid_repo;
        $this->user=auth('api')->user();
    }

    /**
     * Store a newly created bid in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveBid(Request $request){
        $validator = Validator::make($request->all(), [
            'price' => 'required',
            'order_id'=>'required'
        ]);

        if(!$validator->fails()){
            try{
                if( $this->bid_repo->save($request["price"],$request["order_id"],$this->user->id)){
                    return response()->json(array("message"=>"Successfully Bid"),200);
                }
            }
            catch(\Exception $e){
                return response()->json(["message"=>$e->getMessage()],401);
            }
        }
        else{
            return response()->json($validator->errors(),401);
        }

    }

    public function getUserBid(){
        try{
            return $this->bid_repo->getUserBids($this->user->id);
        }
        catch(\Exception $e){
            return response()->json(["message"=>$e->getMessage()],401);
        }
    }
}
