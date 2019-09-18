<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Models\Order\orderConcrete;

class Order extends Model
{
    
    //
    public function orderConcrete()
    {
        return $this->hasOne(orderConcrete::class,"order_id","id");
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
