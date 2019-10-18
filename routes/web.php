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

Route::get('/questions', 'QuestionsController@index');
Route::get('/questions/create', 'QuestionsController@create');
Route::get('/questions/store', 'QuestionsController@store');
Route::get('/questions/edit/{id}', 'QuestionsController@edit');
Route::get('/questions/show/{id}', 'QuestionsController@show');
Route::get('/questions/update/{id}', 'QuestionsController@update');
Route::get('/questions/edit/delete/{id}', 'QuestionsController@delete');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/create', 'AdminController@create');
Route::get('/admin/store', 'AdminController@store');
Route::get('/admin/edit/{id}', 'AdminController@edit');
Route::get('/admin/update/{id}', 'AdminController@update');
Route::get('/admin/edit/delete/{id}', 'AdminController@delete');

