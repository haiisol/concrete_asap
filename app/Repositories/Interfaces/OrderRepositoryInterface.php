<?php
namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface{
	public function createConcrete($order_request,$user_id);
}