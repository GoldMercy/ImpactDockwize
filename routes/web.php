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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/input', 'PagesController@input');

Route::get('/output', 'PagesController@output');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/create', 'AdminController@create');

Route::get('/admin/store', 'AdminController@store');