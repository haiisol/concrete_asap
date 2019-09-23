<?php

namespace App\Http\Controllers\Contractor;

use App\Repositories\Interfaces\BidRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BidController extends Controller
{
    private $bid_repo;
    //
    public function __construct(BidRepositoryInterface $bid_repo){
        $this->bid_repo=$bid_repo;
    }


    /**
     * Store a newly created bid in storage.
     *
     */
    public function getOrderBid($order_id){

        try{
//            var_dump($this->bid_repo);
            return $this->bid_repo->getOrderBids($order_id);
        }
        catch(\Exception $e){
            return response()->json(["message"=>$e->getMessage()],401);
        }
    }
}
