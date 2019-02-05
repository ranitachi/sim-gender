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
Route::get('/kependudukan/dependency-ratio/{id_kategori}/{tahun?}', 'KependudukanKepadatanController@index')->name('kependudukan-kepadatan.index');
Route::get('/kependudukan/dependency-ratio/{id_kategori}/{tahun?}/create', 'KependudukanKepadatanController@create')->name('kependudukan-kepadatan.create');
Route::get('/kependudukan/dependency-ratio/{id_kategori}/{tahun?}/edit', 'KependudukanKepadatanController@edit')->name('kependudukan-kepadatan.edit');
Route::put('/kependudukan/dependency-ratio/{id_kategori}/{tahun?}/update', 'KependudukanKepadatanController@update')->name('kependudukan-kepadatan.update');
Route::post('/kependudukan/dependency-ratio/{id_kategori}/{tahun?}/store', 'KependudukanKepadatanController@store')->name('kependudukan-kepadatan.store');

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

// -------Kependudukan Lansia
Route::get('/kependudukan/lansia-terlantar/{id_kategori}/{tahun}', 'KependudukanLansiaController@index')->name('kependudukan-lansia.index');
Route::get('/kependudukan/lansia-terlantar/{id_kategori}/{tahun}/create', 'KependudukanLansiaController@create')->name('kependudukan-lansia.create');
Route::get('/kependudukan/lansia-terlantar/{id_kategori}/{tahun}/edit', 'KependudukanLansiaController@edit')->name('kependudukan-lansia.edit');
Route::put('/kependudukan/lansia-terlantar/{id_kategori}/{tahun}/update', 'KependudukanLansiaController@update')->name('kependudukan-lansia.update');
Route::post('/kependudukan/lansia-terlantar/{id_kategori}/{tahun}/store', 'KependudukanLansiaController@store')->name('kependudukan-lansia.store');

// -------Kependudukan Tuna Susila
Route::get('/kependudukan/tuna-susila/{id_kategori}/{tahun}', 'KependudukanSusilaController@index')->name('kependudukan-susila.index');
Route::get('/kependudukan/tuna-susila/{id_kategori}/{tahun}/create', 'KependudukanSusilaController@create')->name('kependudukan-susila.create');
Route::get('/kependudukan/tuna-susila/{id_kategori}/{tahun}/edit', 'KependudukanSusilaController@edit')->name('kependudukan-susila.edit');
Route::put('/kependudukan/tuna-susila/{id_kategori}/{tahun}/update', 'KependudukanSusilaController@update')->name('kependudukan-susila.update');
Route::post('/kependudukan/tuna-susila/{id_kategori}/{tahun}/store', 'KependudukanSusilaController@store')->name('kependudukan-susila.store');

// -------Kependudukan Balita Terlantar
Route::get('/kependudukan/balita-terlantar/{id_kategori}/{tahun}', 'KependudukanBalitaController@index')->name('kependudukan-balita.index');
Route::get('/kependudukan/balita-terlantar/{id_kategori}/{tahun}/create', 'KependudukanBalitaController@create')->name('kependudukan-balita.create');
Route::get('/kependudukan/balita-terlantar/{id_kategori}/{tahun}/edit', 'KependudukanBalitaController@edit')->name('kependudukan-balita.edit');
Route::put('/kependudukan/balita-terlantar/{id_kategori}/{tahun}/update', 'KependudukanBalitaController@update')->name('kependudukan-balita.update');
Route::post('/kependudukan/balita-terlantar/{id_kategori}/{tahun}/store', 'KependudukanBalitaController@store')->name('kependudukan-balita.store');

// -------Politik dan Keamanan Korban Kekerasan Umur
Route::get('/politik-dan-keamanan/korban-kekerasan-umur/{id_kategori}/{tahun}', 'PolitikUmurController@index')->name('politik-umur.index');
Route::get('/politik-dan-keamanan/korban-kekerasan-umur/{id_kategori}/{tahun}/create', 'PolitikUmurController@create')->name('politik-umur.create');
Route::get('/politik-dan-keamanan/korban-kekerasan-umur/{id_kategori}/{tahun}/edit', 'PolitikUmurController@edit')->name('politik-umur.edit');
Route::put('/politik-dan-keamanan/korban-kekerasan-umur/{id_kategori}/{tahun}/update', 'PolitikUmurController@update')->name('politik-umur.update');
Route::post('/politik-dan-keamanan/korban-kekerasan-umur/{id_kategori}/{tahun}/store', 'PolitikUmurController@store')->name('politik-umur.store');

// -------Politik dan Keamanan Korban Kekerasan Umur
Route::get('/politik-dan-keamanan/korban-kekerasan-tempat-kejadian/{id_kategori}/{tahun}', 'PolitikKejadianController@index')->name('politik-kejadian.index');
Route::get('/politik-dan-keamanan/korban-kekerasan-tempat-kejadian/{id_kategori}/{tahun}/create', 'PolitikKejadianController@create')->name('politik-kejadian.create');
Route::get('/politik-dan-keamanan/korban-kekerasan-tempat-kejadian/{id_kategori}/{tahun}/edit', 'PolitikKejadianController@edit')->name('politik-kejadian.edit');
Route::put('/politik-dan-keamanan/korban-kekerasan-tempat-kejadian/{id_kategori}/{tahun}/update', 'PolitikKejadianController@update')->name('politik-kejadian.update');
Route::post('/politik-dan-keamanan/korban-kekerasan-tempat-kejadian/{id_kategori}/{tahun}/store', 'PolitikKejadianController@store')->name('politik-kejadian.store');

// -------Politik dan Keamanan Korban Kekerasan Umur
Route::get('/politik-dan-keamanan/korban-kekerasan-tingkat-pendidikan/{id_kategori}/{tahun}', 'PolitikTingkatController@index')->name('politik-tingkat.index');
Route::get('/politik-dan-keamanan/korban-kekerasan-tingkat-pendidikan/{id_kategori}/{tahun}/create', 'PolitikTingkatController@create')->name('politik-tingkat.create');
Route::get('/politik-dan-keamanan/korban-kekerasan-tingkat-pendidikan/{id_kategori}/{tahun}/edit', 'PolitikTingkatController@edit')->name('politik-tingkat.edit');
Route::put('/politik-dan-keamanan/korban-kekerasan-tingkat-pendidikan/{id_kategori}/{tahun}/update', 'PolitikTingkatController@update')->name('politik-tingkat.update');
Route::post('/politik-dan-keamanan/korban-kekerasan-tingkat-pendidikan/{id_kategori}/{tahun}/store', 'PolitikTingkatController@store')->name('politik-tingkat.store');

// -------Politik dan Keamanan Korban Kekerasan Umur
Route::get('/politik-dan-keamanan/korban-kekerasan-status-bekerja/{id_kategori}/{tahun}', 'PolitikStatusController@index')->name('politik-status.index');
Route::get('/politik-dan-keamanan/korban-kekerasan-status-bekerja/{id_kategori}/{tahun}/create', 'PolitikStatusController@create')->name('politik-status.create');
Route::get('/politik-dan-keamanan/korban-kekerasan-status-bekerja/{id_kategori}/{tahun}/edit', 'PolitikStatusController@edit')->name('politik-status.edit');
Route::put('/politik-dan-keamanan/korban-kekerasan-status-bekerja/{id_kategori}/{tahun}/update', 'PolitikStatusController@update')->name('politik-status.update');
Route::post('/politik-dan-keamanan/korban-kekerasan-status-bekerja/{id_kategori}/{tahun}/store', 'PolitikStatusController@store')->name('politik-status.store');








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

//--------Pendidikan Rasio
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


//Kependudukan jumlah kecamatan
Route::get('/kependudukan/jumlah-kecamatan/{id_kategori}/{tahun?}', 'WilayahJlhKecLuasWilayahController@index')->name('wilayah-luas-jlh-kecamatan.index');
Route::get('/kependudukan/jumlah-kecamatan/{id_kategori}/{tahun?}/create', 'WilayahJlhKecLuasWilayahController@create')->name('wilayah-luas-jlh-kecamatan.create');
Route::get('/kependudukan/jumlah-kecamatan/{id_kategori}/{tahun?}/edit', 'WilayahJlhKecLuasWilayahController@edit')->name('wilayah-luas-jlh-kecamatan.edit');
Route::post('/kependudukan/jumlah-kecamatan/{id_kategori}/{tahun?}/store', 'WilayahJlhKecLuasWilayahController@store')->name('wilayah-luas-jlh-kecamatan.store');
Route::post('/kependudukan/jumlah-kecamatan/{id_kategori}/{tahun?}/update', 'WilayahJlhKecLuasWilayahController@update')->name('wilayah-luas-jlh-kecamatan.update');

//Kependudukan Sex Ratio
Route::get('/kependudukan/sex-ratio/{id_kategori}/{tahun?}', 'SexRatioController@index')->name('sex-ratio.index');
Route::get('/kependudukan/sex-ratio/{id_kategori}/{tahun?}/create', 'SexRatioController@create')->name('sex-ratio.create');
Route::get('/kependudukan/sex-ratio/{id_kategori}/{tahun?}/edit', 'SexRatioController@edit')->name('sex-ratio.edit');
Route::post('/kependudukan/sex-ratio/{id_kategori}/{tahun?}/store', 'SexRatioController@store')->name('sex-ratio.store');
Route::post('/kependudukan/sex-ratio/{id_kategori}/{tahun?}/update', 'SexRatioController@update')->name('sex-ratio.update');

//Kependudukan Kelompok Umur
Route::get('/kependudukan/kelompok-umur/{id_kategori}/{tahun?}', 'KependudukanKelompokUmurController@index')->name('kelompok-umur.index');
Route::get('/kependudukan/kelompok-umur/{id_kategori}/{tahun?}/create', 'KependudukanKelompokUmurController@create')->name('kelompok-umur.create');
Route::get('/kependudukan/kelompok-umur/{id_kategori}/{tahun?}/edit', 'KependudukanKelompokUmurController@edit')->name('kelompok-umur.edit');
Route::post('/kependudukan/kelompok-umur/{id_kategori}/{tahun?}/store', 'KependudukanKelompokUmurController@store')->name('kelompok-umur.store');
Route::post('/kependudukan/kelompok-umur/{id_kategori}/{tahun?}/update', 'KependudukanKelompokUmurController@update')->name('kelompok-umur.update');

//Kependudukan Status Perkawinan
Route::get('/kependudukan/status-perkawinan/{id_kategori}/{tahun?}', 'KependudukanStatusPerkawinanController@index')->name('status-perkawinan.index');
Route::get('/kependudukan/status-perkawinan/{id_kategori}/{tahun?}/create', 'KependudukanStatusPerkawinanController@create')->name('status-perkawinan.create');
Route::get('/kependudukan/status-perkawinan/{id_kategori}/{tahun?}/edit', 'KependudukanStatusPerkawinanController@edit')->name('status-perkawinan.edit');
Route::post('/kependudukan/status-perkawinan/{id_kategori}/{tahun?}/store', 'KependudukanStatusPerkawinanController@store')->name('status-perkawinan.store');
Route::post('/kependudukan/status-perkawinan/{id_kategori}/{tahun?}/update', 'KependudukanStatusPerkawinanController@update')->name('status-perkawinan.update');

//Kependudukan Angka Index
Route::get('/kependudukan/angka-index/{id_kategori}/{tahun?}', 'KependudukanAngkaIndexController@index')->name('angka-index.index');
Route::get('/kependudukan/angka-index/{id_kategori}/{tahun?}/create', 'KependudukanAngkaIndexController@create')->name('angka-index.create');
Route::get('/kependudukan/angka-index/{id_kategori}/{tahun?}/edit', 'KependudukanAngkaIndexController@edit')->name('angka-index.edit');
Route::post('/kependudukan/angka-index/{id_kategori}/{tahun?}/store', 'KependudukanAngkaIndexController@store')->name('angka-index.store');
Route::post('/kependudukan/angka-index/{id_kategori}/{tahun?}/update', 'KependudukanAngkaIndexController@update')->name('angka-index.update');
