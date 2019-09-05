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
    return view('index');
});


$router->get('/articles', 'ArticleController@index');
$router->get('/articles/{id}', 'ArticleController@show');
//$router->get('/articles/create', 'ArticleController@create');
$router->post('/articles', 'ArticleController@store');
//$router->get('/articles/{id}/edit', 'ArticleController@edit');
$router->put('/articles/{id}', 'ArticleController@update');
$router->delete('/articles/{id}', 'ArticleController@softDelete');

$router->get('/authors', 'AuthorController@index');
$router->get('/authors/{id}', 'AuthorController@show');
//$router->get('/authors/create', 'AuthorController@create');
$router->post('/authors', 'AuthorController@store');
//$router->get('/authors/{id}/edit', 'AuthorController@edit');
$router->put('/authors/{id}', 'AuthorController@update');
$router->delete('/authors/{id}', 'AuthorController@softDelete');


$router->post('/auth/login', 'AuthController@postLogin');

$router->group(['middleware' => 'auth:api'], function($router)
{
    $router->get('/test', function() {
        return response()->json([
            'message' => 'Hello Lumen!!',
        ]);
    });
});
