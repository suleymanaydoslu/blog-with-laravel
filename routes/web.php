<?php

/** Homepage */
Route::get('/',[
    'as' => 'home',
    'uses' => 'Web\\HomeController@home'
]);

/** All Posts Page */
Route::get('/all-posts',[
    'as' => 'allPosts',
    'uses' => 'Web\\PostsController@allPosts'
]);

/** Post Read Page */
Route::get('/post/{id}',[
    'as' => 'readPost',
    'uses' => 'Web\\PostsController@readPost'
]);

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
    'prefix' => 'panel',
    'namespace' => 'Panel'
], function () {
    /**
     * Application Routes
     */
    require __DIR__ . '/panel.php';
});
