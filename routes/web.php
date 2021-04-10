<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'api/v1', 'middleware' => 'auth'], function() use ($router) {
    // Codeset
    $router->get('/codeset/{codeset_id}', 'CodeSetController@show');
    $router->get('/codeset/{codeset_id}/codes', 'CodeSetController@showCodeSetCodes');
    $router->post('/codeset/{codeset_id}', 'CodeSetController@create');
    // Code
    $router->get('/codeset/{codeset_id}/code/{code_id}', 'CodeController@show');
    $router->post('/codeset/{codeset_id}/code/{code_id}', 'CodeController@create');
});