<?php

namespace App\Repositories;

use App\Models\Bids\Bids;
use App\Models\Order\Order;
use App\Models\Order\orderConcrete;
use Illuminate\Support\Facades\Hash;
// use Hashids\Hashids;

class OrderRepository implements Interfaces\OrderRepositoryInterface{

	public function createConcrete($order_request,$user_id){
		$order=new Order();
		//generate order id
        $order->order_hash_id=uniqid(rand (),true);
        $order->user_id=$user_id;
        $order->order_type="concrete";
        $order->status="Pending";
        $order->touch();
        $order->save();
        // var_dump();
        // die;
        $order_concrete=new orderConcrete();
        $order_concrete->suburb=$order_request["suburb"];
        $order_concrete->type=$order_request["type"];
        $order_concrete->mpa=$order_request["mpa"];
        $order_concrete->agg=$order_request["agg"];
        $order_concrete->slump=$order_request["slump"];
        $order_concrete->acc=$order_request["acc"];
        $order_concrete->placement_type=$order_request["placement_type"];
        $order_concrete->delivery_date=$order_request["delivery_date"];
        $order_concrete->quantity=$order_request["quantity"];
        $order_concrete->time_preference1=$order_request["time_preference1"];
        $order_concrete->time_preference2=isset($order_request["time_preference2"])?$order_request["time_preference2"]:"";
        $order_concrete->time_preference3=isset($order_request["time_preference3"])?$order_request["time_preference3"]:"";
        $order_concrete->time_deliveries=$order_request["time_deliveries"];
        $order_concrete->urgency=$order_request["urgency"];
        $order_concrete->message_required=$order_request["message_required"];
        $order_concrete->preference=$order_request["preference"];
        $order_concrete->colours=$order_request["colours"];
        $order_concrete->delivery_instructions=isset($order_request["delivery_instructions"])?$order_request["delivery_instructions"]:"";
        $order_concrete->special_instructions=isset($order_request["special_instructions"])?$order_request["special_instructions"]:"";
        $order_concrete->order_id=$order->id;
        $order_concrete->touch();

        return $order->orderConcrete()->save($order_concrete);
	}

	public function getUserConcreteOrder($user_id){
        $order=Order::with(["orderConcrete","bids"])->where("user_id",$user_id)->get();
        // var_dump($order);
        return $order;
	}

    public function getAllOrders($user_id){
	    try{
            $orders=Order::with(["orderConcrete","bids"])->leftJoin('bids','bids.order_id','=','orders.id')
            ->where("bids.user_id","!=",$user_id)->where("status","!=","trash")->get();
            var_dump($orders);
	    }
        catch(\Exception $e){

        }

        return $orders;
    }

    public function getRepAllOrders($user_id){
        $orders=Order::with(["orderConcrete"])->whereNotIn("id",Bids::where("user_id","=",$user_id)->get(['order_id'])->toArray())->get();
        var_dump(Bids::where("user_id","!=",$user_id)->get(['order_id'])->toArray());
        return $orders;
    }

    public function getOrder($id){
        $order=Order::with(["orderConcrete"])->where("id",$id)->first();
        return $order;
    }

    public function getRepOrders($user_id)
    {
        $orders=Order::with(["orderConcrete"])->whereIn("id",function($query) use($user_id){
            $query->select("order_id")->from("bids")->where("user_id","=",$user_id);
        })->get();

        return $orders;
        // TODO: Implement getRepOrders() method.
    }

    public function getRepAcceptedOrders($user_id)
    {
        // TODO: Implement getRepAcceptedOrders() method.
    }
}
