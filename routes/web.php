<?php

Route::get('/', function () {
    return view('welcome');
});

/** Panel Login Page */
Route::get('panel/login',[
    'as' => 'panel.login',
    'uses' => 'AuthController@loginForPanel'
]);

/** Panel Login Page - Post */
Route::post('panel/login',[
    'as' => 'panel.login.post',
    'uses' => 'AuthController@loginForPanelPost'
]);

/** Panel Logout Page */
Route::get('panel/logout',[
    'as' => 'panel.logout',
    'uses' => 'AuthController@logoutForPanel'
]);

/**
 * Including panel routes
 */
Route::group([
    'middleware' => ['auth'],
    'prefix' => '',
    'namespace' => 'Panel'
], function () {
    /**
     * Application Routes
     */
    require __DIR__ . '/panel.php';
});