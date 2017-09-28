<?php
/**
 * Panel Routes
 */

use Illuminate\Support\Facades\Route;

Route::get('dashboard',['as' => 'panel.dashboard', 'uses' => 'HomeController@dashboard']);

Route::resource('posts','PostController',['as' => 'panel']);
Route::resource('category','CategoryController',['as' => 'panel']);