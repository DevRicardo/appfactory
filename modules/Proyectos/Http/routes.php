<?php

Route::group(['middleware' => 'web', 'prefix' => 'proyectos', 'namespace' => 'Modules\Proyectos\Http\Controllers'], function()
{
	Route::get('/', 'ProyectosController@index');
});