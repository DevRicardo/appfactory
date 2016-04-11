<?php

Route::group(['middleware' => 'web', 'prefix' => 'autentication', 'namespace' => 'Modules\Autentication\Http\Controllers'], function()
{
    // Authentication Routes...
        Route::get('login', 'AutenticationController@showLoginForm')->middleware(['notguest']);
        Route::post('login', 'AutenticationController@login');
        Route::get('logout', 'AutenticationController@logout');

        // Registration Routes...
        Route::get('register', 'AutenticationController@showRegistrationForm');
        Route::post('register', 'AutenticationController@register');

        // Password Reset Routes...
        Route::get('password/reset/{token?}', 'PasswordController@showResetForm');
        Route::post('password/email', 'PasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'PasswordController@reset');	  
});