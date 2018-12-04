<?php

$router->group(['prefix' => 'api/v1'], function($router) {

	$router->post('login', 'UsersController@login');
	$router->post('logout', 'UsersController@logout');
	
	//$router->group(['middleware' => 'auth'], function($router) {
		$router->group(['prefix' => 'company'], function($router) {
			$router->post('/', 'CompanyController@create');
			$router->get('all', 'CompanyController@all');
			$router->get('{id}', 'CompanyController@get');
			$router->put('{id}', 'CompanyController@update');
			$router->delete('{id}', 'CompanyController@delete');
		});
	//});
});
