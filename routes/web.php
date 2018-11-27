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

Route::prefix('tester')->name('tester.')->group(function(){
    Route::get('emotional-questionnaire', 'EmotionalQuestionController@index')->name('emotional-quest');
    Route::get('choose-task', 'ChoosePracticeController@index')->name('choose-task');
    Route::prefix('reading-span-task')->name('reading-span-')->group(function(){
        Route::get('word', 'ReadingSpanController@word')->name('word');
        Route::get('sentence', 'ReadingSpanController@sentence')->name('sentence');
    });
    Route::get('/emotional-picture', 'EmotionPictureController@index')->name('emotional-picture');
    Route::get('/focus', 'FocusController@index')->name('focus');
});
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