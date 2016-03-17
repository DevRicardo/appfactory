<?php

Route::group(['middleware' => 'web', 'prefix' => '_table_', 'namespace' => 'Modules\_model_plural_\Http\Controllers'], function()
{
	Route::post('/', '_model_plural_Controller@store');
	Route::get('/', '_model_plural_Controller@index');
	Route::get('/list', '_model_plural_Controller@listElements');	
	Route::get('/create', '_model_plural_Controller@create');
	Route::get('/{id}', '_model_plural_Controller@show');	
	Route::get('/{id}/edit', '_model_plural_Controller@edit');
	Route::delete('/{id}', '_model_plural_Controller@destroy');
	Route::put('/{id}', '_model_plural_Controller@update');
});
