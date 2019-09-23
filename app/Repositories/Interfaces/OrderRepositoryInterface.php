<?php
namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface{
	public function createConcrete($order_request,$user_id);
    public function getUserConcreteOrder($user_id);
    public function getOrder($order_id);
}