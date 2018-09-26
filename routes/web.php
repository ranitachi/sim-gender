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

Route::get('/add-slug', function(){
    $data = App\Models\Kategori::all();

    foreach ($data as $item) {
        $check = App\Models\Kategori::find($item->id);
        $check->slug = str_slug($check->judul);
        $check->save();
    }

    return "DONE!";
});

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('beranda', 'DashboardController@index')->name('beranda');

Route::get('/home', 'HomeController@index')->name('home');

//--Subyek--
Route::get('subyek/{jenis}','SubyekController@index')->name('subyek.index');

Route::get('/kependudukan/kepadatan/{id_kategori}', 'KependudukanKepadatanController@index')->name('kependudukan-kepadatan.index');
Route::get('/kependudukan/kepadatan/{id_kategori}/create', 'KependudukanKepadatanController@create')->name('kependudukan-kepadatan.create');
Route::get('/kependudukan/kepadatan/{id_kategori}/edit', 'KependudukanKepadatanController@edit')->name('kependudukan-kepadatan.edit');
Route::put('/kependudukan/kepadatan/{id_kategori}/update', 'KependudukanKepadatanController@update')->name('kependudukan-kepadatan.update');
Route::post('/kependudukan/kepadatan/{id_kategori}/store', 'KependudukanKepadatanController@store')->name('kependudukan-kepadatan.store');

Route::get('/kependudukan/pmks/{id_kategori}', 'KependudukanPMKSController@index')->name('kependudukan-pmks.index');
Route::get('/kependudukan/pmks/{id_kategori}/create', 'KependudukanPMKSController@create')->name('kependudukan-pmks.create');
Route::get('/kependudukan/pmks/{id_kategori}/edit', 'KependudukanPMKSController@edit')->name('kependudukan-pmks.edit');
Route::put('/kependudukan/pmks/{id_kategori}/update', 'KependudukanPMKSController@update')->name('kependudukan-pmks.update');
Route::post('/kependudukan/pmks/{id_kategori}/store', 'KependudukanPMKSController@store')->name('kependudukan-pmks.store');
Route::get('/kependudukan/pmks/{id_kategori}', 'KependudukanPMKSController@index')->name('kependudukan-pmks.index');

Route::get('/ketenagakerjaan/indikator/{id_kategori}', 'TenagaKerjaIndikatorController@index')->name('tenagakerja-indikator.index');
Route::get('/ketenagakerjaan/indikator/{id_kategori}/create', 'TenagaKerjaIndikatorController@create')->name('tenagakerja-indikator.create');
Route::get('/ketenagakerjaan/indikator/{id_kategori}/edit', 'TenagaKerjaIndikatorController@edit')->name('tenagakerja-indikator.edit');
Route::put('/ketenagakerjaan/indikator/{id_kategori}/update', 'TenagaKerjaIndikatorController@update')->name('tenagakerja-indikator.update');
Route::post('/ketenagakerjaan/indikator/{id_kategori}/store', 'TenagaKerjaIndikatorController@store')->name('tenagakerja-indikator.store');