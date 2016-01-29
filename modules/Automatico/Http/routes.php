<?php

Route::group(['middleware' => 'web', 'prefix' => 'automatico', 'namespace' => 'Modules\Automatico\Http\Controllers'], function()
{
	Route::get('/', 'AutomaticoController@index');
});