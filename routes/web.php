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
    return view('landing');
})->name('landingpage');

//Route::get('/', function () {
//    return view('welcome');
//})->name('landingpage');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/expenses','PengeluaranController@index')->name('expenses')->middleware('auth');
Route::get('/fil/{n}','PengeluaranController@filter_bulan')->middleware('auth');