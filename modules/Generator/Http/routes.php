<?php

Route::group(['middleware' => 'web', 'prefix' => 'generator', 'namespace' => 'Modules\Generator\Http\Controllers'], function()
{
	//Route::get('/', 'GeneratorController@index');

	 Route::get('/{projects}/{name}', 'TableController@index');
	 Route::get('/create/{projects}/{name}', 'TableController@create');
	 Route::post('/', 'TableController@store');

     Route::get('/fields/{table}/{project_name}/{project}', 'FieldController@index');
     Route::post('/fields', 'FieldController@store');


});