<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/top', 'HomeController@top')->name('top');

Route::get('/{code}', 'URLController@show');

Route::get('/redirectTo/{id}', 'URLController@redirectTo')->name('redirectTo');