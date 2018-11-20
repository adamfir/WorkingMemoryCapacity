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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/import_user', 'ImportUserController@import')->name('import_user');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::prefix('input')->name('input.')->group(function () {
        Route::get('user', 'InputDataController@UserPage')->name('user');
        Route::get('kuesioner', 'InputDataController@KuesionerPage')->name('kuesioner');
        Route::get('kata', 'InputDataController@SerialKataPage')->name('kata');
        Route::get('kalimat', 'InputDataController@SerialKalimatPage')->name('kalimat');
        Route::get('gambar', 'InputDataController@InputGambarPage')->name('gambar');
    });
});