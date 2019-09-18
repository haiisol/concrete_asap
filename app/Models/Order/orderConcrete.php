<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class orderConcrete extends Model
{
    //

    public function order(){
    	return $this->belongsTo('App\Models\Order','id','order_id');
    }
}
