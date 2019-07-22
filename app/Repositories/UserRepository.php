<?php

namespace App\Repositories;

use App\User;

class UserRepository implements Interfaces\UserRepositoryInterface{

	public function save($user){
		$user=new User();
	    $user->email=$request->input("email");
	    $user->password=$request->input("password");
	    $user->status="verified";	    
	}
}