<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/buku', 'BukuController@index');
Route::post('/buku', 'BukuController@store')->name('buku.store');
Route::get('/buku/delete/{id}', 'BukuController@delete')->name('buku.delete');
Route::get('/buku/edit/{id}', 'BukuController@edit')->name('buku.edit');
Route::post('/buku/update/{id}','bukuController@update')->name('buku.update');
Route::get('/buku/cari', 'BukuController@cari')->name('buku.cari');

