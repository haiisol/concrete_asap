<?php
namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface{
	public function createConcrete($order_request,$user_id);
    public function getUserConcreteOrder($user_id);
    public function getOrder($order_id);
    public function getAllOrders($user_id);
    public function getRepAllOrders($user_id);
    public function getRepOrders($user_id);
    public function getRepAcceptedOrders($user_id);
}
