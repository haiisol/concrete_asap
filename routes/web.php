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

Route::get('/', function () {
    $user=App\User::where('id',2)->first();
 //    $roles=
	// var_dump($roles);
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/order','Admin\OrderController');

Route::get('/api/orders/getAll','Admin\OrderController@getOrders');


Route::get('/app',function(){
	return view('spa');
});


