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

Route::get('/', 'UserController@index')->name('home');

Route::post('/form-1', 'UserController@form1')->name('user.form1');

Route::post('/form-2', 'UserController@form2')->name('user.form2');

// Limpiar la session
Route::get('/session', 'UserController@empty_session')->name('user.session');