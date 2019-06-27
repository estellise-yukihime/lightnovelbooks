<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Listen  authors url
Route::get('authors', 'AuthorController@index');

Route::get('author/{id}', 'AuthorController@show');

Route::post('author', 'AuthorController@store');

Route::put('author/{id}', 'AuthorController@update');

Route::delete('author/{id}', 'AuthorController@destroy');


# Books

Route::get('books', 'BooksController@index');
