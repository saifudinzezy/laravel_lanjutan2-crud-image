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