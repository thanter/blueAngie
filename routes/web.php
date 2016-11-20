<?php


Route::get('/', 'PeriodController@index')->name('home');
Route::post('add', 'PeriodController@create')->name('addPeriod');