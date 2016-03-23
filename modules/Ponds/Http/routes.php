<?php

Route::group(['middleware' => 'web', 'prefix' => 'ponds', 'namespace' => 'Modules\Ponds\Http\Controllers'], function()
{
	Route::post('/', 'PondsController@store');
	Route::get('/', 'PondsController@index');
	Route::get('/list', 'PondsController@listElements');	
	Route::get('/create', 'PondsController@create');
	Route::get('/{id}', 'PondsController@show');	
	Route::get('/{id}/edit', 'PondsController@edit');
	Route::delete('/{id}', 'PondsController@destroy');
	Route::put('/{id}', 'PondsController@update');
});
