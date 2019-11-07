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

use App\Http\Controllers\CardsController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/input', 'PagesController@input');

Route::get('/output', 'PagesController@output');

Route::get('/surveys', 'SurveyController@index');
Route::get('/surveys/create', 'SurveyController@create');
Route::get('/surveys/store', 'SurveyController@store');
Route::get('/surveys/edit/{id}', 'SurveyController@edit');
Route::get('/surveys/show/{id}', 'SurveyController@show');
Route::get('/surveys/update/{id}', 'SurveyController@update');
Route::get('/surveys/edit/delete/{id}', 'SurveyController@delete');

Route::get('/scaleqs', 'ScaleQsController@index');
Route::get('/scaleqs/create', 'ScaleQsController@create');
Route::get('/store', 'ScaleQsController@store');
Route::get('/scaleqs/edit/{id}', 'ScaleQsController@edit');
Route::get('/scaleqs/show/{id}', 'ScaleQsController@show');
Route::get('/scaleqs/update/{id}', 'ScaleQsController@update');
Route::get('/scaleqs/edit/delete/{id}', 'ScaleQsController@delete');

Route::get('/cards', 'CardsController@index');
Route::get('/cards/create', 'CardsController@create');
Route::get('/cards/store', 'CardsController@store');
Route::get('/cards/edit/{id}', 'CardsController@edit');
Route::get('/cards/show/{id}', 'CardsController@show');
Route::get('/cards/update/{id}', 'CardsController@update');
Route::get('/cards/edit/delete/{id}', 'CardsController@delete');

Route::get('/openqs', 'OpenQsController@index');
Route::get('/openqs/create', 'OpenQsController@create');
Route::get('/openqs/store', 'OpenQsController@store');
Route::get('/openqs/edit/{id}', 'OpenQsController@edit');
Route::get('/openqs/show/{id}', 'OpenQsController@show');
Route::get('/openqs/update/{id}', 'OpenQsController@update');
Route::get('/openqs/edit/delete/{id}', 'OpenQsController@delete');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/create', 'AdminController@create');
Route::get('/admin/store', 'AdminController@store');
Route::get('/admin/edit/{id}', 'AdminController@edit');
Route::get('/admin/update/{id}', 'AdminController@update');
Route::get('/admin/edit/delete/{id}', 'AdminController@delete');
Route::get('/admin/edit/deleteall/{id}', 'AdminController@deleteAll');
Route::get('/admin/find', 'AdminController@find');

Route::get('/admin/edit/archive/{id}', 'AdminController@archive');

Route::get('/searching','SearchController@index');
Route::get('/search','SearchController@search');

Route::get('/downloadPDF/{id}','QuestionsController@downloadPDF');

Route::get('/pdf', function(){
    //return view('pdf');
    $pdf = PDF::loadView('pdf');
    return $pdf->download('test.pdf');
});

