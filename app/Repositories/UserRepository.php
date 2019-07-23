<?php

namespace App\Repositories;

use App\User;
use App\Models\User\User_Details;
use Illuminate\Support\Facades\Hash;

class UserRepository implements Interfaces\UserRepositoryInterface{

	public function save($user_details){
		$user=new User();
		$user_detail=new User_Details();

	    $user->email=$user_details["email"];
	    $user->password=Hash::make($user_details["password"]);
	    $user->status="verified";	
	    $user->username="";
	    $user->device_id="";
	    $user->save();

	    $user_detail->abn=$user_details["abn"];
	    $user_detail->company=$user_details["company"];
	    $user_detail->first_name=$user_details["first_name"];
	    $user_detail->last_name=$user_details["last_name"];
	    $user_detail->phone_number=$user_details["phone_number"];
	    // var_dump($user)
	    $user_detail->state=$user_details["state"];
	    $user_detail->city=$user_details["city"];
		// return $user_details["email"];
	    return $user->detail()->save($user_detail);
	}

}