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


Route::resource('questions', 'QuestionsController');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/create', 'AdminController@create');

Route::get('/admin/store', 'AdminController@store');

Route::get('/admin/edit/{id}', 'AdminController@edit');

Route::get('/admin/update/{id}', 'AdminController@update');

Route::get('/admin/edit/delete/{id}', 'AdminController@delete');
Route::get('/admin/edit/deleteall/{id}', 'AdminController@deleteAll');

Route::get('/admin/edit/archive/{id}', 'AdminController@archive');

Route::get('/searching','SearchController@index');
Route::get('/search','SearchController@search');

