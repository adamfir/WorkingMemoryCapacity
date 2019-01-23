<?php

use Illuminate\Support\Facades\Auth;

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
    if(!Auth::user()){
        return redirect('/login');
    }
    if (Auth::user()->role == 1){
        return redirect('/admin');
    }
    else if (Auth::user()->role >= 2){
        return redirect('/tester');
    }
});

Route::prefix('tester')->name('tester.')->group(function(){
    Route::get('/', 'TestController@index')->name('home');
    Route::get('emotional-questionnaire', 'EmotionalQuestionController@index')->name('emotional-quest');
    Route::post('emotional-questionnaire', 'EmotionalQuestionController@submit')->name('emotional-quest-answer');
    Route::get('/focus/{task}/{seri}/{iterasi}/{focusKe}', 'TestController@focus')->name('focus');
    Route::get('/blank/{task}/{seri}/{iterasi}', 'BlankController@blank')->name('blank');
    Route::get('/blank1/{task}/{seri}/{iterasi}/{array0}/{array1}/{array2}/{array3}', 'BlankController@blank1')->name('blank1');
    Route::prefix('reading-span-task')->name('reading-span-')->group(function(){
        Route::get('learn/{seri}/{iterasi}', 'ReadingSpanController@learn')->name('learn');
        Route::get('judge/{taskId}', 'ReadingSpanController@judge')->name('judge');
        Route::get('judge-answer/{taskId}/{ans}', 'ReadingSpanController@judgeAns')->name('judgeAns');
        Route::get('recall/{taskId}', 'ReadingSpanController@recall')->name('recall');
        Route::post('recall-answer/{taskId}', 'ReadingSpanController@recallAns')->name('recallAns');
    });
    // old
    // Route::get('emotional-questionnaire', 'EmotionalQuestionController@index')->name('emotional-quest');
    Route::get('choose-task', 'ChoosePracticeController@index')->name('choose-task');
    // Route::prefix('reading-span-task')->name('reading-span-')->group(function(){
    //     Route::get('sentence', 'ReadingSpanController@sentence')->name('sentence');
    // });
    Route::get('/emotional-picture', 'EmotionPictureController@index')->name('emotional-picture');
    Route::prefix('ArraySpanTask')->name('ArraySpanTask-')->group(function(){
        Route::get('Read/{seri}/{iterasi}', 'ArraySpanTaskController@index')->name('Read');
        Route::get('Test/{task}/{seri}/{iterasi}/{array0}/{array1}/{array2}/{array3}', 'ArraySpanTaskController@test')->name('Test');
        Route::get('Soal/{task}/{seri}/{iterasi}/{array0}/{array1}/{array2}/{array3}', 'ArraySpanTaskController@soal')->name('Soal');
        Route::get('Pertanyaan/{task}/{seri}/{iterasi}/{array0}/{array1}/{array2}/{array3}/{posisiRandom}', 'ArraySpanTaskController@pertanyaan')->name('Pertanyaan');
        Route::post('/ArrayPost', 'ArraySpanTaskController@submit')->name('ArrayPost');
    });
    
});
Auth::routes();

Route::get('/home', function () {
    if (Auth::user()->role == 1){
        return redirect('/admin');
    }
    else{
        return redirect('/tester');
    }
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

Route::get('/vue', function(){
    return view('pages/test/home');
});