<?php

namespace App\Repositories\Interfaces;

interface BidRepositoryInterface{
    public function save($price,$order_id,$user_id,$transaction);
    public function getUserBids($user_id);

}
