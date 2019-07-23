<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => ['cors','api'],
    'prefix' => 'auth'
], function ($router) {    
    Route::post('register', 'APILoginController@register');
    Route::post('logout', 'APILoginController@logout');    
    Route::post('me', 'APILoginController@me');
});

Route::post('/login', 'APILoginController@login');
Route::post('refresh', 'APILoginController@refresh');
