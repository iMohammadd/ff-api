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

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'admin', 'web']], function(){
    Route::get('/', ['as'=>'dashboard.index', 'uses'=>'DashboardController@index']);
    
    Route::get('/users', ['as'=>'users.list', 'uses'=>'UserController@userList']);
    Route::get('/users/create', ['as'=>'users.create', 'uses'=>'UserController@userCreate']);
    Route::post('users/create', ['as'=>'users.create.store', 'uses'=>'UserController@userStore']);
    
    Route::get('factor/list', ['as'=>'factor.list', 'uses'=>'FactorController@index']);
    Route::get('factor/{id}/create', ['as'=>'factor.add', 'uses'=>'FactorController@add']);
    Route::post('factor/{id}/create', ['as'=>'factor.create', 'uses'=>'FactorController@create']);
    
    Route::get('factor/{id}', ['as'=>'factor.view', 'uses'=>'FactorController@view']);
    Route::post('factor/{id}', ['as'=>'factor.status', 'uses'=>'FactorController@status']);
    
    Route::get('factor/{id}/add', ['as'=>'order.add', 'uses'=>'OrderController@add']);
    Route::post('factor/{id}/add', ['as'=>'order.create', 'uses'=>'OrderController@create']);

    Route::get('factor/{id}/edit', ['as'=>'factor.edit', 'uses'=>'FactorController@edit']);
    Route::post('factor/{id}/edit', ['as'=>'factor.store', 'uses'=>'FactorController@store']);
    
    Route::get('factor/{id}/delete', ['as'=>'factor.delete', 'uses'=>'FactorController@destroy']);

    Route::get('order/{id}/edit', ['as'=>'order.edit', 'uses'=>'OrderController@edit']);
    Route::post('order/{id}/edit', ['as'=>'order.store', 'uses'=>'OrderController@store']);
    
    Route::get('order/{id}/delete', 'OrderController@destroy');
    
    Route::get('users/{id}/edit', ['as'=>'users.edit', 'uses'=>'UserController@edit']);
    Route::post('users/{id}/edit', ['as'=>'users.store', 'uses'=>'UserController@store']);
});

Route::group(['middleware'=>'cors', 'prefix'=>'api/v1'], function(){
    //Route::any('factor/get', 'FactorController@get');
    Route::any('auth', 'apiController@auth');
    Route::resource('factor','apiController');
});

Route::group(['prefix'=>'pay', 'middleware'=>['web']], function() {
    Route::any('callback/{id}', ['as'=>'pay.callback', 'uses'=>'PaymentController@callback']);
    Route::get('{id}', ['as'=>'pay.index', 'uses'=>'PaymentController@index']);

});
