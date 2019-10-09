<?php

namespace App\Http\Controllers\Contractor;

use App\Repositories\Interfaces\BidRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BidController extends Controller
{
    private $bid_repo;
    private $user;
    public function __construct(BidRepositoryInterface $bid_repo){
        $this->bid_repo=$bid_repo;
        $this->user=auth('api')->user();
    }

    /**
     * Store a newly created bid in storage.
     * @param $order_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrderBid($order_id){
       try{
            return response()->json($this->bid_repo->getOrderBids($order_id,$this->user->id),200);
        }
        catch(\Exception $e){
            return $this->handleError($e);
        }
    }

    /**
     * @param Request $request
     */
    public function acceptOrderBid(Request $request){
//        try{
//
//        }
//        catch(\Exception $e){
//            return $this->handleError($e);
//        }
    }

    public function handleError(\Exception $e){
        return response()->json(["message"=>$e->getMessage()],401);
    }
}
