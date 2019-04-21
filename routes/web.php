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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/enkripsi', 'DikiController@enkripsi');
//encrypsi
Route::get('/data/', 'DikiController@data');
Route::get('/data/{data_rahasia}', 'DikiController@data_proses');
//hashing
Route::get('/hash', 'DikiController@hash');

//uload file
Route::get('/upload', 'UploadController@upload');
Route::post('/upload/proses', 'UploadController@proses_upload');
//uload file ke db
Route::get('/upload2', 'UploadsbController@upload2');
//hapus gambar beserta gambarnya
Route::get('/upload/hapus/{id}', 'UploadsbController@hapus');
Route::post('/upload2/proses', 'UploadsbController@proses_upload');