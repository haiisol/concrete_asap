<?php

namespace App\Repositories;

use App\Models\Order\Order;
use App\Models\Order\orderConcrete;
use Illuminate\Support\Facades\Hash;

class OrderRepository implements Interfaces\OrderRepositoryInterface{

	public function createConcrete($order_request,$user_id){
		$order=new Order();		
        $order->user_id=$user_id;
        $order->order_type="concrete";
        $order->status="Pending";
        $order->touch();
        $order->save();
        // var_dump();
        // die;
        $order_concrete=new orderConcrete();
        $order_concrete->suburb=$order_request["suburb"];
        $order_concrete->mpa=$order_request["mpa"];
        $order_concrete->agg=$order_request["agg"];
        $order_concrete->slump=$order_request["slump"];
        $order_concrete->acc=$order_request["acc"];
        $order_concrete->placement_type=$order_request["placement_type"];
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

        return $order->concrete()->save($order_concrete);
	}

	public function getUserConcreteOrder($user_id){
		$order=Order::with(['orderConcrete'])->get();
		// var_dump($order);
		return $order;
	}
}