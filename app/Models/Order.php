<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Order extends Model
{
    
    //
    public function concrete()
    {
        return $this->hasOne('App\Models\orderConcrete');
    }
}
