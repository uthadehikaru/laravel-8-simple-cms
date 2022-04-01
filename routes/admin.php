<?php

Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@getIndex']);
Route::resource('article', 'ArticleController');
Route::resource('category', 'CategoryController');
Route::resource('page', 'PageController');
Route::resource('user', 'UserController');
Route::post('/upload', ['as' => 'upload', 'uses' => 'DashboardController@upload']);
Route::get('/config/web', ['as' => 'config.web', 'uses' => 'ConfigController@web']);
Route::post('/config/web', ['as' => 'config.web', 'uses' => 'ConfigController@webUpdate']);
Route::resource('config', 'ConfigController');
