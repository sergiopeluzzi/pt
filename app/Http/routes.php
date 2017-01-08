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

Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole:5', 'as' => 'admin.'], function (){
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

Route::group(['prefix' => 'client', 'middleware' => 'auth.checkrole:2', 'as' => 'client.'], function () {
    Route::group(['prefix' => 'readqr', 'as' => 'readqr.'], function (){
        Route::get('create', ['as' => 'create', 'uses' => 'ReadQRController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ReadQRController@store']);
    });

    Route::group(['prefix' => 'myqr', 'as' => 'myqr.'], function (){
        Route::get('create', ['as' => 'create', 'uses' => 'MyQRController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'MyQRController@store']);
    });

    Route::group(['prefix' => 'direct', 'as' => 'direct.'], function (){
        Route::get('create', ['as' => 'create', 'uses' => 'DirectController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'DirectController@store']);
    });

    Route::group(['prefix' => 'mytransactions', 'as' => 'mytransactions.'], function (){
        Route::get('/', ['as' => 'index', 'uses' => 'MyTransactionsController@index']);
    });
});

Route::group(['middleware' => 'cors'], function (){
    Route::post('oauth2/token', function() {
        return Response::json(Authorizer::issueAccessToken());
    });

    Route::group(['prefix' => 'api', 'middleware' => 'oauth', 'as' => 'api.'], function () {
        Route::group(['prefix' => 'public', 'middleware' => 'oauth.checkrole:1', 'as' => 'public.'], function () {
            Route::resource('mytransactions', 'Api\MyTransactionsController', ['except' => ['create', 'edit', 'destroy']]);
            Route::resource('myqr', 'Api\MyQRController', ['except' => ['create', 'edit', 'destroy']]);
            Route::resource('readqr', 'Api\ReadQRController', ['except' => ['create', 'edit', 'destroy']]);
            Route::resource('direct', 'Api\DirectController', ['except' => ['create', 'edit', 'destroy']]);
        });
    });
});

