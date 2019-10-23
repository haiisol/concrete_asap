<?php

namespace App\Repositories;

use App\Models\Order\Order;
use App\Models\User\User_Payment_Account;
use App\User;
use App\Models\User\User_Details;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserRepository implements Interfaces\UserRepositoryInterface{

    public function __construct(){

    }

	public function save($user_details,$photo){
		$user=new User();
		$user_detail=new User_Details();
		$user_role=null;
		if($user_details['roles']=='contractor'||$user_details['roles']=='rep'){
			$user_role = Role::where('name', '=',$user_details['roles'])->first();
		}
	    $user->email=$user_details["email"];
	    $user->password=Hash::make($user_details["password"]);
	    $user->status="verified";
	    $user->username="";
	    $user->device_id="";
	    $user->save();

        $user_detail->company=$user_details["company"];
	    $user_detail->abn=$user_details["abn"];
        $user_detail->title=$user_details["title"];
	    $user_detail->first_name=$user_details["first_name"];
	    $user_detail->last_name=$user_details["last_name"];
	    $user_detail->phone_number=$user_details["phone"];

        $user_detail->city=$user_details["city"];
        $user_detail->state=$user_details["state"];

	    if(!is_null($photo)){
            $destination_file=public_path()."/users/";
            $profilefile = date('YmdHis') . "." . $photo->guessExtension();
            $error="";
            if($error=$photo->move($destination_file,$profilefile)){
                $user_detail->profile_image=$profilefile;
            }
            else{
                var_dump($error);
            }

        }

	    $user->detail()->save($user_detail);

	    return $user->roles()->save($user_role);
	}

    public function saveDevice(string $device_id,int $user_id)
    {
        $user=User::find($user_id);
        $user->device_id=$device_id;
        return $user->save();
    }

    public function savePaymentDetail(string $payment_token,int $user_id)
    {
        $user_payment=new User_Payment_Account();
        $user_payment->payment_token=$payment_token;
        $user_payment->verified=true;
        $user_payment->user_id=$user_id;
        return $user_payment->save();
    }

    public function getOrderUser(int $order_id){
        $order=Order::find($order_id);
        $order_user=$order->user()->first();
        return $order_user;
    }

}
