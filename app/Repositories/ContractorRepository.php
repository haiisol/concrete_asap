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

        $users = DB::table('users')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('user_details', 'user_details.user_id', '=', 'role_user.user_id')
            ->get();

        return $users;
    }
    public function getOrderDetails($id){
        $orders = User::find($id)->orders;
        return $orders;
    }
}
