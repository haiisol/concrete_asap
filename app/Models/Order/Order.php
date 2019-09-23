<?php

namespace App\Models\Order;

use App\Models\Bids\Bids;
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

    public function bids(){
        return $this->hasMany(Bids::class);
    }
}
