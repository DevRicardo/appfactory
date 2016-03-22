<?php

Route::group(['middleware' => 'web', 'prefix' => 'offices', 'namespace' => 'Modules\Offices\Http\Controllers'], function()
{
	Route::post('/', 'OfficesController@store');
	Route::get('/', 'OfficesController@index');
	Route::get('/list', 'OfficesController@listElements');	
	Route::get('/create', 'OfficesController@create');
	Route::get('/{id}', 'OfficesController@show');	
	Route::get('/{id}/edit', 'OfficesController@edit');
	Route::delete('/{id}', 'OfficesController@destroy');
	Route::put('/{id}', 'OfficesController@update');
});
