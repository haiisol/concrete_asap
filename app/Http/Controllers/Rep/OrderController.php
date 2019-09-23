<?php

namespace App\Http\Controllers\Rep;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    private $order_repo;
    public function __construct(OrderRepositoryInterface $order_repo){
        $this->order_repo=$order_repo;
    }
    //
    public function getAllOrders(){
        try{
            return $this->order_repo->getAllOrders();
        }
        catch(\Exception $e){
            $this->handle_exception($e->getMessage());
        }
    }

    private function handle_exception($message){
        return response()->json(["message"=>$message],401);
    }
}
