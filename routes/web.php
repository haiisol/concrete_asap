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

Auth::routes();

//redirect index to login
Route::get('/',function(){
	return redirect('login');
});

//protect route
Route::group([
    'middleware' => ['auth','checkRole'],
], function ($router) {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/order','Admin\OrderController');
	Route::get('/api/orders/getAll','Admin\OrderController@getOrders');
});





// Route::get('/app',function(){
// 	return view('spa');
// });


