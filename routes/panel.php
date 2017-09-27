<?php
/**
 * Panel Routes
 */

Route::get('panel/dashboard',['as' => 'panel.dashboard', 'uses' => 'HomeController@dashboard']);