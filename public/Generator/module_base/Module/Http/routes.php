<?php

Route::group(['middleware' => 'web', 'prefix' => '$_table_$', 'namespace' => 'Modules\$_model_plural_$\Http\Controllers'], function()
{
	Route::post('/', '$_model_plural_$Controller@store');
	Route::get('/', '$_model_plural_$Controller@index');
	Route::get('/list', '$_model_plural_$Controller@listElements');	
	Route::get('/create', '$_model_plural_$Controller@create');
	Route::get('/{id}', '$_model_plural_$Controller@show');	
	Route::get('/{id}/edit', '$_model_plural_$Controller@edit');
	Route::delete('/{id}', '$_model_plural_$Controller@destroy');
	Route::put('/{id}', '$_model_plural_$Controller@update');
});