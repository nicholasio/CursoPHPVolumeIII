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

Route::get('/', function() {
    return view('welcome');
});

//Aula 5.2
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

//Aula 5.5
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'DashboardController@index');
    Route::get('/', 'DashboardController@index');

    Route::resource('users', "UsersController");

    Route::get('/users/{users}/password/', ['as' => 'users.edit_password', 'uses' => 'UsersController@edit_password']);
    Route::post('/users/{users}/password', "UsersController@password");

    Route::resource('clients', 'ClientsController');
    Route::resource('projects', 'ProjectsController');

});

