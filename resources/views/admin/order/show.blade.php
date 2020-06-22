@extends('layouts.app')

@section('content')
	<div class="row">		
		<div class="card card-circle-chart w-100" data-background-color="white">
			<div class="card-header text-center">
				<h5 class="card-title">View Order</h5>
				<p class="description">Order No {{$order->id}}</p>
			</div>
			<div class="card-content">
				<div class="order-details px-4">
					<p>Suburb:<span>{{$order->orderConcrete->suburb}}</span></p>
					<p>Order Type:<span>{!!$order->order_type!!}</span></p>
					<p>Post Code:<span>{{$order->post_code}}</span></p>
					<p>State:<span>{{$order->state}}</span></p>
					<p>Address:<span>{{$order->address}}</span></p>
					<h5>Concrete Details:</h5>
					<hr/>
					<p>Type:<span>{{$order->orderConcrete->type}}</span></p>
					<p>Placement Type:<span>{{$order->orderConcrete->placement_type}}</span></p>
					<p>MPA:<span>{{$order->orderConcrete->mpa}}</span></p>
					<p>AGG:<span>{{$order->orderConcrete->agg}}</span></p>
					<p>Slump:<span>{{$order->orderConcrete->slump}}</span></p>
					<p>ACC:<span>{{$order->orderConcrete->acc}}</span></p>
					<p>Quantity:<span>{{$order->orderConcrete->quantity}}</span></p>
					<br>

					<h6>Delivery: </h6>
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<p>Delivery Date 1:<span>{{$order->orderConcrete->delivery_date}}</span></p>
								<p>Time preference 1:<span>{{$order->orderConcrete->time_preference1}}</span></p>
							</div>
							<div class="col-md-4">
								<p>Delivery Date 2:<span>{{$order->orderConcrete->delivery_date1}}</span></p>
								<p>Time Preference 2:<span>{{$order->orderConcrete->time_preference2}}</span></p>
							</div>
							<div class="col-md-4">
								<p>Delivery Date 3:<span>{{$order->orderConcrete->delivery_date2}}</span></p>
								<p>Time Preference 3:<span>{{$order->orderConcrete->time_preference3}}</span></p>
							</div>
						</div>
					</div>
					<br>
					<p>Time Deliveries:<span>{{$order->orderConcrete->time_deliveries}}</span></p>
					<p>Urgency:<span>{{$order->orderConcrete->urgency}}</span></p>
					<p>Message Required:<span>{{$order->orderConcrete->message_required == "1" ? "Yes" : "No" }}</span></p>
					<p>Preference:<span>{{$order->orderConcrete->preference}}</span></p>
					<p>Colours:<span>{{$order->orderConcrete->colours}}</span></p>
					<p>Delivery Instructions:<span>{{$order->orderConcrete->delivery_instructions}}</span></p>
					<p>Special Instructions:<span>{{$order->orderConcrete->special_instructions}}</span></p>
				</div>				
			</div>
		</div>
	</div>
@endsection