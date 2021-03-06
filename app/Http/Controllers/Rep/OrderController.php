<?php

namespace App\Http\Controllers\Rep;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    private $order_repo;
    private $user;

    public function __construct(OrderRepositoryInterface $order_repo){
        $this->order_repo=$order_repo;
        $this->user=auth('api')->user();
    }
    //
    public function getAllOrders(){
        try{
            return $this->order_repo->getRepAllOrders($this->user->id);
        }
        catch(\Exception $e){
            return $this->handle_exception($e->getMessage());
        }
    }

    public function getPendingOrders(){
        try{
            return $this->order_repo->getRepPendingOrders($this->user->id);
        }
        catch(\Exception $e){
            return $this->handle_exception($e->getMessage());
        }
    }

    private function handle_exception($message){
        return response()->json(["message"=>$message],401);
    }
}
