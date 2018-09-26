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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('beranda', 'DashboardController@index')->name('beranda');

Route::get('/home', 'HomeController@index')->name('home');

//--Subyek--
Route::get('subyek/{jenis}','SubyekController@index')->name('subyek.index');