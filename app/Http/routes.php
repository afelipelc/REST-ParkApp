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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::post('user/login', 'UserController@login');

Route::get('cars/search/{q}', 'CarsController@search');
Route::resource("cars", "CarsController");

Route::get('rates/search/{name}', 'RatesController@search');
Route::resource("rates", "RatesController");

Route::get('entries/check/{placa}', 'EntriesController@check');
Route::post('entries/report', 'EntriesController@reporte');
Route::resource("entries", "EntriesController");

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
