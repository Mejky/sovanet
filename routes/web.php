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

$router->group(['prefix' => 'api'], function($router)
{
    //Author

    $router->post('create-author','AuthorController@createAuthor');

    $router->put('update-author','AuthorController@updateAuthor');

    $router->delete('delete-author/{id}','AuthorController@deleteAuthor');

    $router->get('author','AuthorController@index');

    $router->get('author/{id}','AuthorController@showAuthor');

    //Book

    $router->post('create-book','BookController@createBook');

    $router->put('update-book/','BookController@updateBook');

    $router->delete('delete-book/{id}','BookController@deleteBook');

    $router->get('books','BookController@index');

    $router->get('book/{id}','BookController@showBook');
});
