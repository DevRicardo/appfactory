<?php

Route::group(['middleware' => 'web', 'prefix' => 'generator', 'namespace' => 'Modules\Generator\Http\Controllers'], function()
{
	Route::get('/', 'GeneratorController@index');
});