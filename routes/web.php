<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Notifications\AppNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

Auth::routes();

//redirect index to login
Route::get('/',function(){
	return redirect('login');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/test',function(\App\Repositories\UserRepository $user_repo){
    $order_user=$user_repo->getOrderUser(126);
    $notification = [
        "msg" => "You have received new bid.",
        "route"=>"ViewBids",
        "btn"=>["id"=>"VIEW_BIDS","text"=>"View Bid"],
        "params"=>array(
            "order_id"=>126
        )
    ];
    Notification::send($order_user, new AppNotification($notification));
//    var_dump(phpinfo());
//   return view("test");
});


Route::post("upload_file",function(Request $request){
    $photo=$request->file("photo");
    $fileExtension=$photo->getClientOriginalName();
    $file_name=pathinfo($fileExtension,PATHINFO_FILENAME);
    $extension=$photo->getClientOriginalExtension();
    $file_name=$file_name."_".uniqid().".".$extension;
    Storage::disk('ftp')->put($file_name,fopen($photo,'r+'));

});

//protect route
Route::group([
    'middleware' => ['auth','checkRole'],
], function ($router) {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/order','Admin\OrderController');
	Route::get('/api/orders/getAll','Admin\OrderController@getOrders');



    // contractor
    Route::get('/api/contractor/getAllContractor','Contractor\ContractorController@getAllContractor');
    Route::get('/api/contractor/getContractorDetails/{id}','Contractor\ContractorController@getContractorDetails');
    Route::get('/api/contractor/getPostedJobs/{id}','Contractor\ContractorController@getPostedJobs');
    Route::get('/contractor','Contractor\ContractorController@index');
    Route::get('/contractor/{id}','Contractor\ContractorController@details');

    // rep
    Route::get('/api/rep/getAllRep','Rep\RepController@getAllRep');
    Route::get('/api/rep/getRepDetails/{id}','Rep\RepController@getRepDetails');
    Route::get('/api/rep/getRepBids/{id}','Rep\RepController@getRepBids');
    Route::get('/rep','Rep\RepController@index'); 
    Route::get('/rep/{id}','Rep\RepController@details');
});

