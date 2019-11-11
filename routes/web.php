<?php

Auth::routes(['register' => false]);
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/home', 'HomeController@home')->name('home.home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('/patients', 'PatientController@index')->name('patients.index');
Route::get('/patients/{id}', 'PatientController@show')->name('patients.show');
Route::get('/patients/create', 'PatientController@create')->name('patients.create');
Route::post('/patients', 'PatientController@store')->name('patients.store');
Route::put('/patients/{id}', 'PatientController@update')->name('patients.update');

Route::get('/appointments', 'AppointmentController@index')->name('appointments.index');