<?php

namespace App\Models\User;

use App\User;
use Illuminate\Database\Eloquent\Model;

class User_Payment_Account extends Model
{
    //
    public function user(){
        $this->belongsTo(User::class);
    }

}
