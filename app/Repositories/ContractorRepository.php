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
            ->select('users.id', 'users.email', 'users.status', 'users.created_at', 'user_details.first_name' , 'user_details.company')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('user_details', 'user_details.user_id', '=', 'role_user.user_id')
            ->where('role_user.role_id', 3)
            ->get();

        return $users;
    }

    public function getContractorDetails($id){
        $user_details = User_Details::where("user_id" , $id)->get();
        return $user_details;
    } 
    public function getPostedJobs($id){
        $orders = Order::where("user_id" , $id)->get();
        return $orders;
    }
}
