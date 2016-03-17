<?php

Route::group(['middleware' => 'web', 'prefix' => 'books', 'namespace' => 'Modules\Books\Http\Controllers'], function()
{
	Route::post('/', 'BooksController@store');
	Route::get('/', 'BooksController@index');
	Route::get('/list', 'BooksController@listElements');	
	Route::get('/create', 'BooksController@create');
	Route::get('/{id}', 'BooksController@show');	
	Route::get('/{id}/edit', 'BooksController@edit');
	Route::delete('/{id}', 'BooksController@destroy');
	Route::put('/{id}', 'BooksController@update');
});
