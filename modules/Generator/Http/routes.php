<?php

Route::group(['middleware' => 'web', 'prefix' => 'generator', 'namespace' => 'Modules\Generator\Http\Controllers'], function()
{
	//Route::get('/', 'GeneratorController@index');

	 Route::get('/{projects}/{name}', 'TableController@index');
	 Route::get('/create/{projects}/{name}', 'TableController@create');
	 Route::post('/', 'TableController@store');

     Route::get('/fields/{idtable}/{table}/{project_name}/{project}', 'FieldController@index');
     Route::post('/fields', 'FieldController@store');



     Route::get('/createdir', 'GeneratorController@createdir');
     Route::get('/copybasemodule', 'GeneratorController@copybasemodule');
     Route::get('/createrepository', 'GeneratorController@createrepository');
     Route::get('/createprovider', 'GeneratorController@createprovider');
     


});