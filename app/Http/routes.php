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


Route::get('/test', function () {

    $repository = app()->make('PopTroco\Repositories\RoleRepository');

    return $repository->all();

});

Route::get('admin/roles', ['as' => 'admin.roles.index', 'uses' => 'RolesController@index']);
Route::get('admin/roles/create', ['as' => 'admin.roles.create','uses' => 'RolesController@create']);
Route::post('admin/roles/store', ['as' => 'admin.roles.store','uses' => 'RolesController@store']);
Route::get('admin/roles/edit/{id}', ['as' => 'admin.roles.edit','uses' => 'RolesController@edit']);
Route::post('admin/roles/update/{id}', ['as' => 'admin.roles.update','uses' => 'RolesController@update']);
