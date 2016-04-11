<?php

Route::group(['middleware' => 'web', 'prefix' => 'parameters', 'namespace' => 'Modules\Parameters\Http\Controllers'], function()
{
	Route::post('/', 'ParametersController@store');
	Route::get('/', 'ParametersController@index');
	Route::get('/list', 'ParametersController@listElements');	
	Route::get('/create', 'ParametersController@create');
	Route::get('/{id}', 'ParametersController@show');	
	Route::get('/{id}/edit', 'ParametersController@edit');
	Route::delete('/{id}', 'ParametersController@destroy');
	Route::put('/{id}', 'ParametersController@update');
});
