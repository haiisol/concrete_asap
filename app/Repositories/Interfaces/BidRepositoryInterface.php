<?php

namespace App\Repositories\Interfaces;

interface BidRepositoryInterface{
    public function save($price,int $order_id,int $user_id,$transaction);
    public function getUserBids(int $user_id);
    public function acceptBid(int $order_id,int $bid_id);
    public function getOrderBids(int $order_id);
}
