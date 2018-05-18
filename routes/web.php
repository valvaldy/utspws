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

 $router->get('/todo', 'todoController@index');
 $router->get('/todo/{idkat}', 'todoController@show');
 $router->post('/todo', 'todoController@store');
 $router->put('/todo/{idkat}', 'todoController@update');
 $router->delete('/todo/{idkat}', 'todoController@destroy');
 
 $router->get('/book','todoController@buku');
 $router->get('/book/{id}','todoController@showbuku');
 $router->post('/book','todoController@storebuku');
 $router->put('/book/{idkat}', 'todoController@updatebuku');
 $router->delete('/book/{idkat}', 'todoController@destroybuku');

