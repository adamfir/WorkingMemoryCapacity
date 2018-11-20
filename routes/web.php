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
    return view('home');
});


Route::get('/EmotionalQuestion', 'EmotionalQuestionController@index')->name('EmotionalQuestion');
Route::get('/ChoosePractice', 'ChoosePracticeController@index')->name('ChoosePractice');
Route::get('/ReadingSpanWord', 'ReadingSpanController@word')->name('ReadingSpanWord');
Route::get('/ReadingSpanSentence', 'ReadingSpanController@sentence')->name('ReadingSpanSentence');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/import_user', 'ImportUserController@import')->name('import_user');
