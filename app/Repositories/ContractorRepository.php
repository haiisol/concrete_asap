<?php

namespace App\Repositories;

use App\User;
use App\Model\Order\Order;
use App\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContractorRepository implements Interfaces\ContractorRepositoryInterface
{
    private $user;

    public function __construct()
    {
        $this->user = auth('api')->user();
    }

    // custom get order
    public function getAllContractor(){
        $users = Role::find(3)->users;
        return $users;
    }
    public function getOrderDetails($id){
        $orders = Order::where("user_id" , $id);
        return $orders;
    }
}
