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
    return view('home');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole', 'as' => 'admin.'], function (){
    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function (){
        Route::get('/', ['as' => 'index', 'uses' => 'RolesController@index']);
        Route::get('create', ['as' => 'create','uses' => 'RolesController@create']);
        Route::get('edit/{id}', ['as' => 'edit','uses' => 'RolesController@edit']);
        Route::post('update/{id}', ['as' => 'update','uses' => 'RolesController@update']);
        Route::post('store', ['as' => 'store','uses' => 'RolesController@store']);
        Route::get('destroy/{id}', ['as' => 'destroy','uses' => 'RolesController@destroy']);
    });

    Route::group(['prefix' => 'clients', 'as' => 'clients.'], function (){
        Route::get('/', ['as' => 'index', 'uses' => 'ClientsController@index']);
        Route::get('create', ['as' => 'create','uses' => 'ClientsController@create']);
        Route::get('edit/{id}', ['as' => 'edit','uses' => 'ClientsController@edit']);
        Route::post('update/{id}', ['as' => 'update','uses' => 'ClientsController@update']);
        Route::post('store', ['as' => 'store','uses' => 'ClientsController@store']);
        Route::get('destroy/{id}', ['as' => 'destroy','uses' => 'ClientsController@destroy']);
    });

    Route::group(['prefix' => 'transactions', 'as' => 'transactions.'], function (){
        Route::get('/', ['as' => 'index', 'uses' => 'TransactionsController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'TransactionsController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'TransactionsController@store']);
    });


});

