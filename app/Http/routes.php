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

Route::get('/', function () {
    return view('login');
});

Route::get('user/auth', ['as'=> 'user.authform', 'uses' => 'UserController@index']);
Route::post('user/auth', ['as'=> 'user.auth', 'uses' => 'UserController@login']);
Route::get('user/logout', 'UserController@logout');

Route::group(['middleware'=>'auth'], function(){
    Route::get('factor/list', ['as'=>'factor.list', 'uses'=>'FactorController@index']);
});