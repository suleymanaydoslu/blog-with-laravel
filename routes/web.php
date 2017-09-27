<?php

Route::get('/', function () {
    return view('welcome');
});

/** Panel Login Page */
Route::get('panel/login',[
    'as' => 'panel.login',
    'uses' => 'AuthController@loginForPanel'
]);

/**
 * Including panel routes
 */
Route::group([
    'middleware' => ['panel'],
    'prefix' => '',
], function () {
    /**
     * Application Routes
     */
    require __DIR__ . '/panel.php';
});