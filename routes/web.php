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

// Route::get('/add-slug', function(){
//     $data = App\Models\Kategori::all();

//     foreach ($data as $item) {
//         $check = App\Models\Kategori::find($item->id);
//         $check->slug = str_slug($check->judul)."-".$check->id;
//         $check->save();
//     }

//     return "DONE!";
// });

Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('beranda', 'DashboardController@index')->name('beranda');

Route::get('/home', 'HomeController@index')->name('home');

//--Subyek--
Route::get('subyek/{jenis}','SubyekController@index')->name('subyek.index');

// -------Kependudukan
Route::get('/kependudukan/kepadatan/{id_kategori}', 'KependudukanKepadatanController@index')->name('kependudukan-kepadatan.index');
Route::get('/kependudukan/kepadatan/{id_kategori}/create', 'KependudukanKepadatanController@create')->name('kependudukan-kepadatan.create');
Route::get('/kependudukan/kepadatan/{id_kategori}/edit', 'KependudukanKepadatanController@edit')->name('kependudukan-kepadatan.edit');
Route::put('/kependudukan/kepadatan/{id_kategori}/update', 'KependudukanKepadatanController@update')->name('kependudukan-kepadatan.update');
Route::post('/kependudukan/kepadatan/{id_kategori}/store', 'KependudukanKepadatanController@store')->name('kependudukan-kepadatan.store');

// -------Kependudukan Perkara Agama
Route::get('/kependudukan/perkara-pengadilan-agama/{id_kategori}/{tahun}', 'KependudukanPerkaraController@index')->name('kependudukan-perkara.index');
Route::get('/kependudukan/perkara-pengadilan-agama/{id_kategori}/{tahun}/create', 'KependudukanPerkaraController@create')->name('kependudukan-perkara.create');
Route::get('/kependudukan/perkara-pengadilan-agama/{id_kategori}/{tahun}/edit', 'KependudukanPerkaraController@edit')->name('kependudukan-perkara.edit');
Route::put('/kependudukan/perkara-pengadilan-agama/{id_kategori}/{tahun}/update', 'KependudukanPerkaraController@update')->name('kependudukan-perkara.update');
Route::post('/kependudukan/perkara-pengadilan-agama/{id_kategori}/{tahun}/store', 'KependudukanPerkaraController@store')->name('kependudukan-perkara.store');

// -------Kependudukan Cerai
Route::get('/kependudukan/jumlah-cerai/{id_kategori}/{tahun}', 'KependudukanCeraiController@index')->name('kependudukan-cerai.index');
Route::get('/kependudukan/jumlah-cerai/{id_kategori}/{tahun}/create', 'KependudukanCeraiController@create')->name('kependudukan-cerai.create');
Route::get('/kependudukan/jumlah-cerai/{id_kategori}/{tahun}/edit', 'KependudukanCeraiController@edit')->name('kependudukan-cerai.edit');
Route::put('/kependudukan/jumlah-cerai/{id_kategori}/{tahun}/update', 'KependudukanCeraiController@update')->name('kependudukan-cerai.update');
Route::post('/kependudukan/jumlah-cerai/{id_kategori}/{tahun}/store', 'KependudukanCeraiController@store')->name('kependudukan-cerai.store');

// -------Kependudukan Rumah Tangga Miskin
Route::get('/kependudukan/rumah-tangga-miskin/{id_kategori}/{tahun}', 'KependudukanMiskinController@index')->name('kependudukan-miskin.index');
Route::get('/kependudukan/rumah-tangga-miskin/{id_kategori}/{tahun}/create', 'KependudukanMiskinController@create')->name('kependudukan-miskin.create');
Route::get('/kependudukan/rumah-tangga-miskin/{id_kategori}/{tahun}/edit', 'KependudukanMiskinController@edit')->name('kependudukan-miskin.edit');
Route::put('/kependudukan/rumah-tangga-miskin/{id_kategori}/{tahun}/update', 'KependudukanMiskinController@update')->name('kependudukan-miskin.update');
Route::post('/kependudukan/rumah-tangga-miskin/{id_kategori}/{tahun}/store', 'KependudukanMiskinController@store')->name('kependudukan-miskin.store');

// -------Kependudukan Perempuan Sosial Ekonomi
Route::get('/kependudukan/perempuan-sosial-ekonomi/{id_kategori}/{tahun}', 'KependudukanPerempuanController@index')->name('kependudukan-perempuan.index');
Route::get('/kependudukan/perempuan-sosial-ekonomi/{id_kategori}/{tahun}/create', 'KependudukanPerempuanController@create')->name('kependudukan-perempuan.create');
Route::get('/kependudukan/perempuan-sosial-ekonomi/{id_kategori}/{tahun}/edit', 'KependudukanPerempuanController@edit')->name('kependudukan-perempuan.edit');
Route::put('/kependudukan/perempuan-sosial-ekonomi/{id_kategori}/{tahun}/update', 'KependudukanPerempuanController@update')->name('kependudukan-perempuan.update');
Route::post('/kependudukan/perempuan-sosial-ekonomi/{id_kategori}/{tahun}/store', 'KependudukanPerempuanController@store')->name('kependudukan-perempuan.store');

//--------Pendidikan Sekolah
Route::get('/pendidikan/sekolah/{jenjang}/{id_kategori}', 'PendidikanSekolahController@index')->name('pendidikan-sekolah.index');
Route::get('/pendidikan/sekolah/{jenjang}/{id_kategori}/create', 'PendidikanSekolahController@create')->name('pendidikan-sekolah.create');
Route::get('/pendidikan/sekolah/{jenjang}/{id_kategori}/edit', 'PendidikanSekolahController@edit')->name('pendidikan-sekolah.edit');
Route::put('/pendidikan/sekolah/{jenjang}/{id_kategori}/update', 'PendidikanSekolahController@update')->name('pendidikan-sekolah.update');
Route::post('/pendidikan/sekolah/{jenjang}/{id_kategori}/store', 'PendidikanSekolahController@store')->name('pendidikan-sekolah.store');

//--------Pendidikan Yang DItamatkan
Route::get('/pendidikan/penduduk/kecamatan/{id_kategori}','PendidikanDitamatkanController@index')->name('pendidikan-ditamatkan.index');
Route::get('/pendidikan/penduduk/kecamatan/{id_kategori}/create', 'PendidikanDitamatkanController@create')->name('pendidikan-ditamatkan.create');
Route::get('/pendidikan/penduduk/kecamatan/{id_kategori}/edit', 'PendidikanDitamatkanController@edit')->name('pendidikan-ditamatkan.edit');
Route::put('/pendidikan/penduduk/kecamatan/{id_kategori}/update', 'PendidikanDitamatkanController@update')->name('pendidikan-ditamatkan.update');
Route::post('/pendidikan/penduduk/kecamatan/{id_kategori}/store', 'PendidikanDitamatkanController@store')->name('pendidikan-ditamatkan.store');

//--------Pendidikan Rasion
Route::get('/pendidikan/rasio/{jenjang}/{id_kategori}', 'PendidikanRasioController@index')->name('pendidikan-rasio.index');
Route::get('/pendidikan/rasio/{jenjang}/{id_kategori}/create', 'PendidikanRasioController@create')->name('pendidikan-rasio.create');
Route::get('/pendidikan/rasio/{jenjang}/{id_kategori}/edit', 'PendidikanRasioController@edit')->name('pendidikan-rasio.edit');
Route::put('/pendidikan/rasio/{jenjang}/{id_kategori}/update', 'PendidikanRasioController@update')->name('pendidikan-rasio.update');
Route::post('/pendidikan/rasio/{jenjang}/{id_kategori}/store', 'PendidikanRasioController@store')->name('pendidikan-rasio.store');

//--------Kesehatan ALH
Route::get('/kesehatan/alh/{id_kategori}', 'KesehatanAlhController@index')->name('kesehatan-alh.index');
Route::get('/kesehatan/alh/{id_kategori}/create', 'KesehatanAlhController@create')->name('kesehatan-alh.create');
Route::get('/kesehatan/alh/{id_kategori}/edit', 'KesehatanAlhController@edit')->name('kesehatan-alh.edit');
Route::put('/kesehatan/alh/{id_kategori}/update', 'KesehatanAlhController@update')->name('kesehatan-alh.update');
Route::post('/kesehatan/alh/{id_kategori}/store', 'KesehatanAlhController@store')->name('kesehatan-alh.store');

//--------Kesehatan Jumlah Dokter
Route::get('/kesehatan/jumlah/doktor-spesialis/{id_kategori}', 'KesehatanJumlahDokterController@index')->name('kesehatan-jumlah-dokter.index');
Route::get('/kesehatan/jumlah/doktor-spesialis/{id_kategori}/create', 'KesehatanJumlahDokterController@create')->name('kesehatan-jumlah-dokter.create');
Route::get('/kesehatan/jumlah/doktor-spesialis/{id_kategori}/edit', 'KesehatanJumlahDokterController@edit')->name('kesehatan-jumlah-dokter.edit');
Route::put('/kesehatan/jumlah/doktor-spesialis/{id_kategori}/update', 'KesehatanJumlahDokterController@update')->name('kesehatan-jumlah-dokter.update');
Route::post('/kesehatan/jumlah/doktor-spesialis/{id_kategori}/store', 'KesehatanJumlahDokterController@store')->name('kesehatan-jumlah-dokter.store');

//--------Kesehatan Jumlah BBLR
Route::get('/kesehatan/jumlah/bblr/{id_kategori}', 'KesehatanJumlahBblrController@index')->name('kesehatan-jumlah-bblr.index');
Route::get('/kesehatan/jumlah/bblr/{id_kategori}/create', 'KesehatanJumlahBblrController@create')->name('kesehatan-jumlah-bblr.create');
Route::get('/kesehatan/jumlah/bblr/{id_kategori}/edit', 'KesehatanJumlahBblrController@edit')->name('kesehatan-jumlah-bblr.edit');
Route::put('/kesehatan/jumlah/bblr/{id_kategori}/update', 'KesehatanJumlahBblrController@update')->name('kesehatan-jumlah-bblr.update');
Route::post('/kesehatan/jumlah/bblr/{id_kategori}/store', 'KesehatanJumlahBblrController@store')->name('kesehatan-jumlah-bblr.store');

//--------Kesehatan Jumlah BBLR
Route::get('/kesehatan/disabilitas/{id_kategori}', 'KesehatanDisabilitasController@index')->name('kesehatan-disabilitas.index');
Route::get('/kesehatan/disabilitas/{id_kategori}/create', 'KesehatanDisabilitasController@create')->name('kesehatan-disabilitas.create');
Route::get('/kesehatan/disabilitas/{id_kategori}/edit', 'KesehatanDisabilitasController@edit')->name('kesehatan-disabilitas.edit');
Route::put('/kesehatan/disabilitas/{id_kategori}/update', 'KesehatanDisabilitasController@update')->name('kesehatan-disabilitas.update');
Route::post('/kesehatan/disabilitas/{id_kategori}/store', 'KesehatanDisabilitasController@store')->name('kesehatan-disabilitas.store');

// ----------Kependudukan PMKS
Route::get('/kependudukan/pmks/{id_kategori}', 'KependudukanPMKSController@index')->name('kependudukan-pmks.index');
Route::get('/kependudukan/pmks/{id_kategori}/create', 'KependudukanPMKSController@create')->name('kependudukan-pmks.create');
Route::get('/kependudukan/pmks/{id_kategori}/edit', 'KependudukanPMKSController@edit')->name('kependudukan-pmks.edit');
Route::put('/kependudukan/pmks/{id_kategori}/update', 'KependudukanPMKSController@update')->name('kependudukan-pmks.update');
Route::post('/kependudukan/pmks/{id_kategori}/store', 'KependudukanPMKSController@store')->name('kependudukan-pmks.store');
Route::get('/kependudukan/pmks/{id_kategori}', 'KependudukanPMKSController@index')->name('kependudukan-pmks.index');


//wilayah
Route::get('/wilayah/jumlah-kecamatan-luas-wilayah/{id_kategori}/{tahun?}', 'WilayahJlhKecLuasWilayahController@index')->name('wilayah-luas-jlh-kecamatan.index');
Route::get('/wilayah/jumlah-kecamatan-luas-wilayah/{id_kategori}/{tahun?}/create', 'WilayahJlhKecLuasWilayahController@create')->name('wilayah-luas-jlh-kecamatan.create');
Route::get('/wilayah/jumlah-kecamatan-luas-wilayah/{id_kategori}/{tahun?}/edit', 'WilayahJlhKecLuasWilayahController@edit')->name('wilayah-luas-jlh-kecamatan.edit');
Route::post('/wilayah/jumlah-kecamatan-luas-wilayah/{id_kategori}/{tahun?}/store', 'WilayahJlhKecLuasWilayahController@store')->name('wilayah-luas-jlh-kecamatan.store');
Route::post('/wilayah/jumlah-kecamatan-luas-wilayah/{id_kategori}/{tahun?}/update', 'WilayahJlhKecLuasWilayahController@update')->name('wilayah-luas-jlh-kecamatan.update');
