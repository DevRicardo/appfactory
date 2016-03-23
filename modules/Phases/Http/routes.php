<?php

Route::group(['middleware' => 'web', 'prefix' => 'phases', 'namespace' => 'Modules\Phases\Http\Controllers'], function()
{
	Route::post('/', 'PhasesController@store');
	Route::get('/', 'PhasesController@index');
	Route::get('/list', 'PhasesController@listElements');	
	Route::get('/create', 'PhasesController@create');
	Route::get('/{id}', 'PhasesController@show');	
	Route::get('/{id}/edit', 'PhasesController@edit');
	Route::delete('/{id}', 'PhasesController@destroy');
	Route::put('/{id}', 'PhasesController@update');
});
