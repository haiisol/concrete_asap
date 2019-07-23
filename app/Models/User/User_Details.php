<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use App\User;

class User_Details extends Model{
	
	public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    
}