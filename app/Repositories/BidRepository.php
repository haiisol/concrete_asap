<?php

namespace App\Repositories;

use App\Models\Bids\Bids;
use App\Models\Order\Order;
use Illuminate\Support\Facades\Hash;
// use Hashids\Hashids;

class BidRepository implements Interfaces\BidRepositoryInterface{

    private $bids;
    private $order;

    public function __construct(Bids $bids,Order $order){
        $this->bids=$bids;
        $this->order=$order;
    }

    public function save($price,$order_id,$user_id){
        $price=(float)$price;
        $order=Order::findOrFail($order_id);
        $bid=new Bids();
        $bid->rep_price=$price;
        $bid->payment_type="none";
        $bid->confirmed=0;
        $bid->price=$price+($price*10/100);
        $bid->order_id=$order_id;
        $bid->user_id=$user_id;
        $bid->status="Pending";
        return $bid->save();
    }

    public function getUserBids($user_id,$paginate=5){
        return Bids::with("order")->get();
    }

}