<?php
/**
 * Panel Routes
 */

use Illuminate\Support\Facades\Route;

Route::get('dashboard',['as' => 'panel.dashboard', 'uses' => 'HomeController@dashboard']);
Route::get('profile',['as' => 'panel.profile', 'uses' => 'HomeController@profile']);
Route::post('profile',['as' => 'panel.profile.update', 'uses' => 'HomeController@profileUpdate']);

Route::get('posts/archive',['as' => 'panel.posts.archive', 'uses' => 'PostController@archive']);
Route::get('posts/restore/{post}',['as' => 'panel.posts.restore', 'uses' => 'PostController@restore']);
Route::get('posts/remove/{post}',['as' => 'panel.posts.remove', 'uses' => 'PostController@remove']);
Route::resource('posts','PostController',['as' => 'panel']);

Route::resource('categories','CategoryController',['as' => 'panel']);

Route::get('users/archive',['as' => 'panel.users.archive', 'uses' => 'UsersController@archive']);
Route::get('users/restore/{post}',['as' => 'panel.users.restore', 'uses' => 'UsersController@restore']);
Route::get('users/remove/{post}',['as' => 'panel.users.remove', 'uses' => 'UsersController@remove']);
Route::resource('users','UsersController',['as' => 'panel']);

Route::get('comments',['as' => 'panel.comments.index', 'uses' => 'CommentsController@index']);
Route::get('comments/{comment}',['as' => 'panel.comments.show', 'uses' => 'CommentsController@show']);
Route::get('comments/delete/{comment}',['as' => 'panel.comments.delete', 'uses' => 'CommentsController@delete']);
Route::get('comments/active/{comment}',['as' => 'panel.comments.active', 'uses' => 'CommentsController@active']);
Route::get('comments/passive/{comment}',['as' => 'panel.comments.passive', 'uses' => 'CommentsController@passive']);
