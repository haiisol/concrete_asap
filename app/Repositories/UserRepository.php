<?php

namespace App\Repositories;

use App\User;
use App\Models\User\User_Details;
use Illuminate\Support\Facades\Hash;

class UserRepository implements Interfaces\UserRepositoryInterface{

	public function save($user_details){
		// $user=new User();
		$user_detail=new User_Details();

	    // $user->email=$user_details->email;
	    // $user->password=Hash::make($user_details->password);
	    // $user->status="verified";	
	    // $user->save();

	    $user_detail->abn=$user_details->abn;
	    $user_detail->company=$user_details->company;
	    $user_detail->first_name=$user_details->first_name;
	    $user_details->last_name=$user_details->last_name;
	    $user_details->phone_number=$user_details->phone_number;
	    $user_details->state=$user_details->state;
	    $user_details->city=$user_details->city;

	    // return $user->detail()->save($user_detail);
	}

}