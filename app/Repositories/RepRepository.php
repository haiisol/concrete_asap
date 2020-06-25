<?php

namespace App\Repositories;

use App\User;
use App\Role;
use App\Models\User\User_Details;
use App\Models\Bids\Bids;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RepRepository implements Interfaces\RepRepositoryInterface
{
    private $user;

    public function __construct()
    {
        $this->user = auth('api')->user();
    }

    // custom get order
    public function getAllRep(){
        // $users = Role::find(2)->users;
        $users = DB::table('users')
            ->select('users.id', 'users.email', 'users.status', 'users.created_at', 'user_details.first_name')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('user_details', 'user_details.user_id', '=', 'role_user.user_id')
            ->where('role_user.role_id', 2)
            ->orderByDesc('users.id')
            ->get();
        return $users;
    }
    public function getRepDetails($id){
        $user_details = User_Details::where("user_id" , $id)->get();
        return $user_details;
    }
    public function getRepBids($id){
        $bids = Bids::where("user_id" , $id)->orderByDesc('id')->get();
        return $bids;
    }
}
