<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{
    private $order_repo;
    public function __construct(OrderRepositoryInterface $order_repo){
        $this->order_repo=$order_repo;
        // var_dump("order repo \n \n ");
        // var_dump($this->order_repo);
        // var_dump("\n \n order repo var \n \n ");
        // var_dump($order_repo);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order.index');
    }
    public function completedJobs()
    {
        return view('admin.order.completed_jobs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order=$this->order_repo->getOrder($id);
        // echo "<pre>";
        // var_dump($order);
        // echo "</pre>";
        // die;
        return view('admin.order.show',['order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get all the orders from stroage.
     *
     * @param  Request  $request
    */
    public function getOrders(){
        return response()->json($this->order_repo->getAllOrders(),200);
    }
    public function getCompletedJobs(){
        return response()->json($this->order_repo->getCompletedJobs(),200);
    }
}
