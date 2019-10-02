<?php

namespace App\Repositories;

use App\Model\Bids\Bid_Transactions;
use App\Models\Bids\Bids;
use App\Models\Order\Order;
use Illuminate\Support\Facades\Hash;
// use Hashids\Hashids;

class BidRepository implements Interfaces\BidRepositoryInterface{

    private $bids;

    public function __construct(Bids $bids){
        $this->bids=$bids;
    }

    public function save($price,$order_id,$user_id){
        $price=(float)$price;
        $order=Order::find(1)->first();
        $bid=new Bids();
        $bid->rep_price=$price;
        $bid->payment_type="none";
        $bid->confirmed=0;
        $bid->price=$price+($price*10/100);
        $bid->order_id=$order_id;
        $bid->user_id=$user_id;
        $bid->status="Pending";
        $bid_transaction=new Bid_Transactions();
        $bid->save();
        $bid_transaction->bid_id=$bid->id;
        $bid_transaction->transaction_id=
        $bid_transaction->invoice_url="";
        $bid_transaction->approved=true;
        return $bid_transaction->save();
    }

    public function getUserBids($user_id,$paginate=5){
        return Bids::with("order")->get();
    }

}
