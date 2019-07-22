<?php

namespace App\Repositories;

use App\User;

class UserRepository implements Interfaces\UserRepositoryInterface{

	public function save($user_details){
		$user=new User();
	    // $user->email=$->input("email");
	    // $user->password=$request->input("password");
	    // $user->status="verified";	    
	}

}