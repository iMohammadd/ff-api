<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('login', ['as'=> 'user.authform', 'uses' => 'UserController@index']);
Route::post('user/auth', ['as'=> 'user.auth', 'uses' => 'UserController@login']);
Route::get('user/logout', ['as'=>'user.logout', 'uses'=>'UserController@logout'])->middleware('auth');

Route::group(['middleware'=>['auth', 'web']], function(){
    Route::get('/', ['as'=>'home', 'uses'=>'FactorController@index']);
    Route::get('factor/list', ['as'=>'factor.list', 'uses'=>'FactorController@index']);
    Route::get('factor/create', ['as'=>'factor.add', 'uses'=>'FactorController@add']);
    Route::post('factor/create', ['as'=>'factor.create', 'uses'=>'FactorController@create']);
    
    Route::get('factor/{id}', ['as'=>'factor.view', 'uses'=>'FactorController@view']);
    Route::post('factor/{id}', ['as'=>'factor.status', 'uses'=>'FactorController@status']);
    
    Route::get('factor/{id}/add', ['as'=>'order.add', 'uses'=>'OrderController@add']);
    Route::post('factor/{id}/add', ['as'=>'order.create', 'uses'=>'OrderController@create']);
});