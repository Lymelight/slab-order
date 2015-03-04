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

Route::get('/test', 'WelcomeController@test');

Route::get('/business/dashboard', 'DashboardController@index');


Route::resource('/business/locations', 'LocationController');
Route::resource('/business/customizationgroups', 'CustomizationGroupController');
Route::resource('/business/customizations', 'CustomizationController');
Route::resource('/business/products', 'ProductController');
Route::resource('/business/menus', 'MenuController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
