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
    return redirect('/admin');
});


Route::get('/EmotionalQuestion', 'EmotionalQuestionController@index')->name('EmotionalQuestion');
Route::get('/ChoosePractice', 'ChoosePracticeController@index')->name('ChoosePractice');
Route::get('/ReadingSpanWord', 'ReadingSpanController@word')->name('ReadingSpanWord');
Route::get('/ReadingSpanSentence', 'ReadingSpanController@sentence')->name('ReadingSpanSentence');
Route::get('/EmotionPicture', 'EmotionPictureController@index')->name('EmotionPicture');

Auth::routes();

Route::get('/home', function () {
    return redirect('/admin');
})->name('home');

Route::prefix('import')->name('import.')->group(function() {
    Route::post('user', 'ImportDataController@userImport')->name('user');
    Route::post('emotional', 'ImportDataController@EmotionalQuestionImport')->name('emotional');
    Route::post('word', 'ImportDataController@WordImport')->name('word');
    Route::post('sentence', 'ImportDataController@SentenceImport')->name('sentence');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::prefix('input')->name('input.')->group(function () {
        Route::get('user', 'InputPageController@UserPage')->name('user');
        Route::get('kuesioner', 'InputPageController@KuesionerPage')->name('kuesioner');
        Route::get('kata', 'InputPageController@SerialKataPage')->name('kata');
        Route::get('kalimat', 'InputPageController@SerialKalimatPage')->name('kalimat');
        Route::get('gambar', 'InputPageController@InputGambarPage')->name('gambar');
    });
});