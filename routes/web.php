<?php

Auth::routes(['register' => false]);
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/home', 'HomeController@home')->name('home.home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
