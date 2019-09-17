<?php

namespace App\Http\Controllers\Concrete;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\orderConcrete;

use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $order=Order::
        
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
        $validator = Validator::make($request->all(), [
            'suburb' => 'required|max:255',
            'mpa' => 'required',
            'agg' => 'required',
            'slump' => 'required',            
            "acc" => 'required', 
            "placement_type" => 'required',  
            "quantity" => 'required',    
            "time_preference1" => 'required',        
            "time_preference2" => 'required',        
            "time_preference3" => 'required',       
            "time_deliveries" => 'required', 
            "urgency" => 'required', 
            "message_required" => 'required',    
            "preference" => 'required',  
            "colours" => 'required', 
            "delivery_instructions" => 'required',   
            "special_instructions" => 'required',    
            "order_id" => 'required',    
            "created_at" => 'required', 
            "updated_at" => 'required'
        ]);

        if(!$validator->fails()){
            $order=new Order();
            $order->touch();
            $order=$order->save();

            $order_concrete=new orderConcrete();
            $order_concrete->suburb=$request->suburb;
            $order_concrete->mpa=$request->mpa;
            $order_concrete->agg=$request->agg;
            $order_concrete->slump=$request->slump;
            $order_concrete->acc=$request->acc;
            $order_concrete->placement_type=$request->placement_type;
            $order_concrete->quantity=$request->quantity;
            $order_concrete->time_preference1=$request->time_preference1;
            $order_concrete->time_preference2=$request->time_preference2;
            $order_concrete->time_preference3=$request->time_preference3;
            $order_concrete->time_deliveries=$request->time_deliveries;
            $order_concrete->urgency=$request->urgency;
            $order_concrete->message_required=$request->message_required;
            $order_concrete->preference=$request->preference;
            $order_concrete->colours=$request->colours;
            $order_concrete->delivery_instructions=$request->delivery_instructions;
            $order_concrete->special_instructions=$request->special_instructions;
            $order_concrete->touch();

            $order->concrete()->save($order_concrete);    
        }
        else{
            return response()->json($validator->errors(),401);
        }
        
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
}
