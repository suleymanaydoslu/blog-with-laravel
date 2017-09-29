<?php
/**
 * Panel Routes
 */

use Illuminate\Support\Facades\Route;

Route::get('dashboard',['as' => 'panel.dashboard', 'uses' => 'HomeController@dashboard']);

Route::get('posts/archive',['as' => 'panel.posts.archive', 'uses' => 'PostController@archive']);
Route::get('posts/restore/{post}',['as' => 'panel.posts.restore', 'uses' => 'PostController@restore']);
Route::get('posts/remove/{post}',['as' => 'panel.posts.remove', 'uses' => 'PostController@remove']);
Route::resource('posts','PostController',['as' => 'panel']);
Route::resource('categories','CategoryController',['as' => 'panel']);
Route::resource('users','UsersController',['as' => 'panel']);


