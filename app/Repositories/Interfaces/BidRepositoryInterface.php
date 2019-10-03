<?php

namespace App\Repositories\Interfaces;

interface BidRepositoryInterface{
    public function save($price,$order_id,$user_id);
    public function getUserBids($user_id);
    public function saveTransaction(int $bid_id,string $transaction_id,string $invoice_url,boolean $approved);

}
