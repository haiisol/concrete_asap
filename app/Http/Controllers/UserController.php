<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $user_repo;
    private $user;
    //
    public function __construct(UserRepository $user_repo)
    {
        $this->user_repo=$user_repo;
        $this->user=auth('api')->user();
    }

    public function saveDeviceId(Request $request){
        $device_validation=Validator::make($request->all(),[
            "device_id"=>"required"
        ]);

        if($device_validation->fails()){
            return response()->json(['message' => $device_validation->getMessageBag()], 401);
        }

        if($this->user_repo->saveDevice($request["device_id"],$this->user->id)){
            return response()->json(['message' => "Successfully updated device id"], 200);
        }
    }

    public function removeDeviceId(){
        if($this->user_repo->removeDevice($this->user->id)){
            return response()->json(['message'=>"Successfully removed"],200);
        }
    }
}
