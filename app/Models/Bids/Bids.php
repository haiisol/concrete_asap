<?php

namespace App\Models\Bids;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Order\Order;

class Bids extends Model
{
    //
    public function order(){
        return $this->belongsTo('App\Models\Order\Order');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
