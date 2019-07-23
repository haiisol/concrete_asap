<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use App\User;

class User_Details extends Model{

	protected $table = 'user_details';
	
	public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    
}