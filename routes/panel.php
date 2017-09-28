<?php
/**
 * Panel Routes
 */

use Illuminate\Support\Facades\Route;

Route::get('dashboard',['as' => 'panel.dashboard', 'uses' => 'HomeController@dashboard']);

Route::resource('posts','PostController',['as' => 'panel']);
Route::resource('categories','CategoryController',['as' => 'panel']);
Route::resource('users','UsersController',['as' => 'panel']);
