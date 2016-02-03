<?php

Route::group(['middleware' => 'web', 'prefix' => 'projects', 'namespace' => 'Modules\Projects\Http\Controllers'], function()
{
	Route::post('/', 'ProjectsController@store');
	Route::get('/', 'ProjectsController@index');	
	Route::get('/create', 'ProjectsController@create');
	Route::get('/{id}', 'ProjectsController@show');	
	Route::get('/{id}/edit', 'ProjectsController@edit');
	Route::delete('/{id}', 'ProjectsController@destroy');
	Route::put('/{id}', 'ProjectsController@update');
});