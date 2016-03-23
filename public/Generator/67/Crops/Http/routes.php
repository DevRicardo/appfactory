<?php

Route::group(['middleware' => 'web', 'prefix' => 'crops', 'namespace' => 'Modules\Crops\Http\Controllers'], function()
{
	Route::post('/', 'CropsController@store');
	Route::get('/', 'CropsController@index');
	Route::get('/list', 'CropsController@listElements');	
	Route::get('/create', 'CropsController@create');
	Route::get('/{id}', 'CropsController@show');	
	Route::get('/{id}/edit', 'CropsController@edit');
	Route::delete('/{id}', 'CropsController@destroy');
	Route::put('/{id}', 'CropsController@update');
});
