<?php

Route::group(['middleware' => 'web', 'prefix' => 'userscontrol', 'namespace' => 'Modules\UsersControl\Http\Controllers'], function()
{
	Route::get('/', 'UsersControlController@index');
});