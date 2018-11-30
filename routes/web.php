<?php

/*
|--------------------------------------------------------------------------
| routerlication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an routerlication.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */
$router->group(['prefix' => 'api/v1'], function($router) {

	$router->post('login', 'UsersController@login');
	
	$router->group(['prefix' => 'company', 'middleware' => 'auth'], function($router) {
		$router->post('/', 'CompanyController@create');
		$router->get('all', 'CompanyController@all');
		$router->get('{id}', 'CompanyController@get');
		$router->put('{id}', 'CompanyController@update');
		$router->delete('{id}', 'CompanyController@delete');
	});
});
