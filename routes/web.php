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

Route::get('/home', 'DashboardController@index')->name('home');

Route::get('/input', 'PagesController@input');

Route::get('/output', 'PagesController@output');

Route::get('/questions', 'QuestionspageController@questions');

Route::get('/surveys', 'SurveyController@index');
Route::get('/surveys/create', 'SurveyController@create');
Route::get('/surveys/store', 'SurveyController@store');
Route::get('/surveys/edit/{id}', 'SurveyController@edit');
Route::get('/surveys/show/{id}', 'SurveyController@show');
Route::get('/surveys/update/{id}', 'SurveyController@update');
Route::get('/surveys/edit/destroy/{id}', 'SurveyController@destroy');

Route::get('/scaleqs/create', 'ScaleQsController@create');
Route::get('/store', 'ScaleQsController@store');
Route::get('/scaleqs/edit/{id}', 'ScaleQsController@edit');
Route::get('/scaleqs/show/{id}', 'ScaleQsController@show');
Route::get('/scaleqs/update/{id}', 'ScaleQsController@update');
Route::get('/scaleqs/add/{id}', 'ScaleQsController@add');
Route::get('/scaleqs/edit/delete/{id}', 'ScaleQsController@delete');

Route::get('/cards', 'CardsController@index');
Route::get('/cards/create', 'CardsController@create');
Route::get('/cards/store', 'CardsController@store');
Route::get('/cards/edit/{id}', 'CardsController@edit');
Route::get('/cards/show/{id}', 'CardsController@show');
Route::get('/cards/update/{id}', 'CardsController@update');
Route::get('/cards/edit/delete/{id}', 'CardsController@delete');

Route::get('/openqs/create', 'OpenQsController@create');
Route::get('/openqs/store', 'OpenQsController@store');
Route::get('/openqs/edit/{id}', 'OpenQsController@edit');
Route::get('/openqs/show/{id}', 'OpenQsController@show');
Route::get('/openqs/update/{id}', 'OpenQsController@update');
Route::get('/openqs/add/{id}', 'OpenQsController@add');
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
Route::get('/admin/windex', 'AdminController@windex');

Route::get('/searching','SearchController@index');
Route::get('/search','SearchController@search');

Route::get('/output', 'PDFGeneratorController@index');
Route::get('/output/generalpdf', 'PDFGeneratorController@generalpdf');
Route::get('/output/impulspdf', 'PDFGeneratorController@impulspdf');
Route::get('/output/housingpdf', 'PDFGeneratorController@housingpdf');
Route::get('/output/programpdf', 'PDFGeneratorController@programpdf');

Route::get('/dropdownqs/create', 'DropdownQsController@create');
Route::get('/dropdownqs/store', 'DropdownQsController@store');
Route::get('/dropdownqs/edit/{id}', 'DropdownQsController@edit');
Route::get('/dropdownqs/show/{id}', 'DropdownQsController@show');
Route::get('/dropdownqs/update/{id}', 'DropdownQsController@update');
Route::get('/dropdownqs/add/{id}', 'DropdownQsController@add');
Route::get('/dropdownqs/edit/delete/{id}', 'DropdownQsController@delete');

Route::get('/multiplechoice/create', 'MultiplechoiceController@create');
Route::get('/multiplechoice/store', 'MultiplechoiceController@store');
Route::get('/multiplechoice/edit/{id}', 'MultiplechoiceController@edit');
Route::get('/multiplechoice/show/{id}', 'MultiplechoiceController@show');
Route::get('/multiplechoice/update/{id}', 'MultiplechoiceController@update');
Route::get('/multiplechoice/add/{id}', 'MultiplechoiceController@add');
Route::get('/multiplechoice/edit/delete/{id}', 'MultiplechoiceController@delete');

Route::get('/qoptions/create', 'QOptionsController@create');
Route::get('/qoptions/store', 'QOptionsController@store');
Route::get('/qoptions/edit/{id}', 'QOptionsController@edit');
Route::get('/qoptions/show/{id}', 'QOptionsController@show');
Route::get('/qoptions/update/{id}', 'QOptionsController@update');
Route::get('/qoptions/edit/delete/{id}', 'QOptionsController@delete');

Route::get('/answer/index', 'AnswerController@index');
Route::get('/answer/select', 'AnswerController@select');
Route::get('/answer/survey{id}', 'AnswerController@survey');
Route::get('/answer/submit', 'AnswerController@submit');
Route::get('/answer/answerIndex', 'AnswerController@answerIndex');
Route::get('/answer/show/{id}', 'AnswerController@show');

