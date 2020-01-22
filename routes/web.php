<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {
     // Matches "/api/register
    $router->post('register', 'AuthController@register');
	$router->post('/student', 'StudentController@store');
	$router->get('/student/{id}', 'StudentController@show');
	$router->post('/student/login', 'StudentAuthController@login');
});




/*$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});*/