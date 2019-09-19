<?php

namespace App\Http\Controllers\Concrete;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\orderConcrete;

use App\Repositories\Interfaces\OrderRepositoryInterface;
// use App\Repositories\OrderRepository;

use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{   
    private $orderRep;

    public function __construct(OrderRepositoryInterface $orderRep){
        $this->orderRep=$orderRep;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth('api')->user();  
        return response()->json($this->orderRep->getUserConcreteOrder($user->id),200);
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
            // "time_preference2" => 'required',        
            // "time_preference3" => 'required',       
            "time_deliveries" => 'required', 
            "urgency" => 'required', 
            "message_required" => 'required',    
            "preference" => 'required',  
            "colours" => 'required', 
            // "delivery_instructions" => 'required',   
            // "special_instructions" => 'required',    
            // "order_id" => 'required',    
            // "created_at" => 'required', 
            // "updated_at" => 'required'
        ]);

        if(!$validator->fails()){
            $user=auth('api')->user();            
            if($this->orderRep->createConcrete($request->all(),$user->id)){
                return response()->json(array("message"=>"Successfully Inserted"),200);
            }
              
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

    public function search(){

    }
}
