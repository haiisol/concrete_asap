<?php

namespace App\Repositories;

use App\User;
use App\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RepRepository implements Interfaces\RepRepositoryInterface
{
    private $user;

    public function __construct()
    {
        $this->user = auth('api')->user();
    }

    // custom get order
    public function getAllRep(){
        $users = Role::find(2)->users;
        return $users;
    }
}
