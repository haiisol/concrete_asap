<?php

namespace App\Repositories;

use App\User;
use App\Models\User\User_Details;
use App\Models\Order\Order;
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
        // $users = Role::find(3)->users;
        $users = Role::find(3)->users;
        $users_with_info = $users->join('user_details' , 'user_details.user_id' , '=' , 'users.id' );

        return $users_with_info;
    }
    public function getOrderDetails($id){
        $orders = User::find($id)->orders;
        return $orders;
    }
}
