<?php

namespace App\Repositories\Interfaces;

use App\User;

interface RepRepositoryInterface{
    public function getAllRep();
    public function getRepDetails($id);
}
