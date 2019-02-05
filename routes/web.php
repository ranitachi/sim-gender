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

// -------Kependudukan Balita Terlantar
Route::get('/kependudukan/penyebab-perceraian/{id_kategori}/{tahun}', 'KependudukanPerceraianController@index')->name('kependudukan-perceraian.index');
Route::get('/kependudukan/penyebab-perceraian/{id_kategori}/{tahun}/create', 'KependudukanPerceraianController@create')->name('kependudukan-perceraian.create');
Route::get('/kependudukan/penyebab-perceraian/{id_kategori}/{tahun}/edit', 'KependudukanPerceraianController@edit')->name('kependudukan-perceraian.edit');
Route::put('/kependudukan/penyebab-perceraian/{id_kategori}/{tahun}/update', 'KependudukanPerceraianController@update')->name('kependudukan-perceraian.update');
Route::post('/kependudukan/penyebab-perceraian/{id_kategori}/{tahun}/store', 'KependudukanPerceraianController@store')->name('kependudukan-perceraian.store');

// -------Kependudukan Balita Terlantar
Route::get('/kependudukan/kepemilikan-akte/{id_kategori}/{tahun}', 'KependudukanAkteController@index')->name('kependudukan-akte.index');
Route::get('/kependudukan/kepemilikan-akte/{id_kategori}/{tahun}/create', 'KependudukanAkteController@create')->name('kependudukan-akte.create');
Route::get('/kependudukan/kepemilikan-akte/{id_kategori}/{tahun}/edit', 'KependudukanAkteController@edit')->name('kependudukan-akte.edit');
Route::put('/kependudukan/kepemilikan-akte/{id_kategori}/{tahun}/update', 'KependudukanAkteController@update')->name('kependudukan-akte.update');
Route::post('/kependudukan/kepemilikan-akte/{id_kategori}/{tahun}/store', 'KependudukanAkteController@store')->name('kependudukan-akte.store');

// -------Kependudukan Balita Terlantar
Route::get('/kependudukan/status-kepemilikan-bangunan/{id_kategori}/{tahun}', 'KependudukanDitempatiController@index')->name('kependudukan-ditempati.index');
Route::get('/kependudukan/status-kepemilikan-bangunan/{id_kategori}/{tahun}/create', 'KependudukanDitempatiController@create')->name('kependudukan-ditempati.create');
Route::get('/kependudukan/status-kepemilikan-bangunan/{id_kategori}/{tahun}/edit', 'KependudukanDitempatiController@edit')->name('kependudukan-ditempati.edit');
Route::put('/kependudukan/status-kepemilikan-bangunan/{id_kategori}/{tahun}/update', 'KependudukanDitempatiController@update')->name('kependudukan-ditempati.update');
Route::post('/kependudukan/status-kepemilikan-bangunan/{id_kategori}/{tahun}/store', 'KependudukanDitempatiController@store')->name('kependudukan-ditempati.store');

// -------Kependudukan Balita Terlantar
Route::get('/kependudukan/status-kepemilikan-milik-sendiri/{id_kategori}/{tahun}', 'KependudukanMilikSendiriController@index')->name('kependudukan-milik-sendiri.index');
Route::get('/kependudukan/status-kepemilikan-milik-sendiri/{id_kategori}/{tahun}/create', 'KependudukanMilikSendiriController@create')->name('kependudukan-milik-sendiri.create');
Route::get('/kependudukan/status-kepemilikan-milik-sendiri/{id_kategori}/{tahun}/edit', 'KependudukanMilikSendiriController@edit')->name('kependudukan-milik-sendiri.edit');
Route::put('/kependudukan/status-kepemilikan-milik-sendiri/{id_kategori}/{tahun}/update', 'KependudukanMilikSendiriController@update')->name('kependudukan-milik-sendiri.update');
Route::post('/kependudukan/status-kepemilikan-milik-sendiri/{id_kategori}/{tahun}/store', 'KependudukanMilikSendiriController@store')->name('kependudukan-milik-sendiri.store');

// -------Kependudukan Balita Terlantar
Route::get('/kependudukan/sumber-air-minum/{id_kategori}/{tahun}', 'KependudukanAirMinumController@index')->name('kependudukan-air-minum.index');
Route::get('/kependudukan/sumber-air-minum/{id_kategori}/{tahun}/create', 'KependudukanAirMinumController@create')->name('kependudukan-air-minum.create');
Route::get('/kependudukan/sumber-air-minum/{id_kategori}/{tahun}/edit', 'KependudukanAirMinumController@edit')->name('kependudukan-air-minum.edit');
Route::put('/kependudukan/sumber-air-minum/{id_kategori}/{tahun}/update', 'KependudukanAirMinumController@update')->name('kependudukan-air-minum.update');
Route::post('/kependudukan/sumber-air-minum/{id_kategori}/{tahun}/store', 'KependudukanAirMinumController@store')->name('kependudukan-air-minum.store');

// -------Kependudukan Balita Terlantar
Route::get('/kependudukan/sumber-air-mandi/{id_kategori}/{tahun}', 'KependudukanAirMandiController@index')->name('kependudukan-air-mandi.index');
Route::get('/kependudukan/sumber-air-mandi/{id_kategori}/{tahun}/create', 'KependudukanAirMandiController@create')->name('kependudukan-air-mandi.create');
Route::get('/kependudukan/sumber-air-mandi/{id_kategori}/{tahun}/edit', 'KependudukanAirMandiController@edit')->name('kependudukan-air-mandi.edit');
Route::put('/kependudukan/sumber-air-mandi/{id_kategori}/{tahun}/update', 'KependudukanAirMandiController@update')->name('kependudukan-air-mandi.update');
Route::post('/kependudukan/sumber-air-mandi/{id_kategori}/{tahun}/store', 'KependudukanAirMandiController@store')->name('kependudukan-air-mandi.store');

// -------Kependudukan Balita Terlantar
Route::get('/kependudukan/akta-kelompok-umur/{id_kategori}/{tahun}', 'KependudukanSamplingController@index')->name('kependudukan-sampling.index');
Route::get('/kependudukan/akta-kelompok-umur/{id_kategori}/{tahun}/create', 'KependudukanSamplingController@create')->name('kependudukan-sampling.create');
Route::get('/kependudukan/akta-kelompok-umur/{id_kategori}/{tahun}/edit', 'KependudukanSamplingController@edit')->name('kependudukan-sampling.edit');
Route::put('/kependudukan/akta-kelompok-umur/{id_kategori}/{tahun}/update', 'KependudukanSamplingController@update')->name('kependudukan-sampling.update');
Route::post('/kependudukan/akta-kelompok-umur/{id_kategori}/{tahun}/store', 'KependudukanSamplingController@store')->name('kependudukan-sampling.store');

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

// -------Politik dan Keamanan Korban Kekerasan Umur
Route::get('/politik-dan-keamanan/korban-kekerasan-status-perkawinan/{id_kategori}/{tahun}', 'PolitikKawinController@index')->name('politik-kawin.index');
Route::get('/politik-dan-keamanan/korban-kekerasan-status-perkawinan/{id_kategori}/{tahun}/create', 'PolitikKawinController@create')->name('politik-kawin.create');
Route::get('/politik-dan-keamanan/korban-kekerasan-status-perkawinan/{id_kategori}/{tahun}/edit', 'PolitikKawinController@edit')->name('politik-kawin.edit');
Route::put('/politik-dan-keamanan/korban-kekerasan-status-perkawinan/{id_kategori}/{tahun}/update', 'PolitikKawinController@update')->name('politik-kawin.update');
Route::post('/politik-dan-keamanan/korban-kekerasan-status-perkawinan/{id_kategori}/{tahun}/store', 'PolitikKawinController@store')->name('politik-kawin.store');

// -------Politik dan Keamanan Korban Kekerasan Umur
Route::get('/politik-dan-keamanan/korban-kekerasan-hubungan-korban/{id_kategori}/{tahun}', 'PolitikKorbanController@index')->name('politik-korban.index');
Route::get('/politik-dan-keamanan/korban-kekerasan-hubungan-korban/{id_kategori}/{tahun}/create', 'PolitikKorbanController@create')->name('politik-korban.create');
Route::get('/politik-dan-keamanan/korban-kekerasan-hubungan-korban/{id_kategori}/{tahun}/edit', 'PolitikKorbanController@edit')->name('politik-korban.edit');
Route::put('/politik-dan-keamanan/korban-kekerasan-hubungan-korban/{id_kategori}/{tahun}/update', 'PolitikKorbanController@update')->name('politik-korban.update');
Route::post('/politik-dan-keamanan/korban-kekerasan-hubungan-korban/{id_kategori}/{tahun}/store', 'PolitikKorbanController@store')->name('politik-korban.store');

// -------Politik dan Keamanan Korban Kekerasan Umur
Route::get('/politik-dan-keamanan/korban-kekerasan-pelayanan/{id_kategori}/{tahun}', 'PolitikPelayananController@index')->name('politik-pelayanan.index');
Route::get('/politik-dan-keamanan/korban-kekerasan-pelayanan/{id_kategori}/{tahun}/create', 'PolitikPelayananController@create')->name('politik-pelayanan.create');
Route::get('/politik-dan-keamanan/korban-kekerasan-pelayanan/{id_kategori}/{tahun}/edit', 'PolitikPelayananController@edit')->name('politik-pelayanan.edit');
Route::put('/politik-dan-keamanan/korban-kekerasan-pelayanan/{id_kategori}/{tahun}/update', 'PolitikPelayananController@update')->name('politik-pelayanan.update');
Route::post('/politik-dan-keamanan/korban-kekerasan-pelayanan/{id_kategori}/{tahun}/store', 'PolitikPelayananController@store')->name('politik-pelayanan.store');

// -------Politik dan Keamanan Korban Kekerasan Umur
Route::get('/politik-dan-keamanan/anggota-dprd/{id_kategori}/{tahun}', 'PolitikFraksiController@index')->name('politik-fraksi.index');
Route::get('/politik-dan-keamanan/anggota-dprd/{id_kategori}/{tahun}/create', 'PolitikFraksiController@create')->name('politik-fraksi.create');
Route::get('/politik-dan-keamanan/anggota-dprd/{id_kategori}/{tahun}/edit', 'PolitikFraksiController@edit')->name('politik-fraksi.edit');
Route::put('/politik-dan-keamanan/anggota-dprd/{id_kategori}/{tahun}/update', 'PolitikFraksiController@update')->name('politik-fraksi.update');
Route::post('/politik-dan-keamanan/anggota-dprd/{id_kategori}/{tahun}/store', 'PolitikFraksiController@store')->name('politik-fraksi.store');

// -------Politik dan Keamanan Korban Kekerasan Umur
Route::get('/politik-dan-keamanan/anggota-dewan/{id_kategori}/{tahun}', 'PolitikDewanController@index')->name('politik-dewan.index');
Route::get('/politik-dan-keamanan/anggota-dewan/{id_kategori}/{tahun}/create', 'PolitikDewanController@create')->name('politik-dewan.create');
Route::get('/politik-dan-keamanan/anggota-dewan/{id_kategori}/{tahun}/edit', 'PolitikDewanController@edit')->name('politik-dewan.edit');
Route::put('/politik-dan-keamanan/anggota-dewan/{id_kategori}/{tahun}/update', 'PolitikDewanController@update')->name('politik-dewan.update');
Route::post('/politik-dan-keamanan/anggota-dewan/{id_kategori}/{tahun}/store', 'PolitikDewanController@store')->name('politik-dewan.store');

// -------Politik dan Keamanan Korban Kekerasan Umur
Route::get('/politik-dan-keamanan/pendidikan-anggota-dprd/{id_kategori}/{tahun}', 'PolitikPendidikanController@index')->name('politik-pendidikan.index');
Route::get('/politik-dan-keamanan/pendidikan-anggota-dprd/{id_kategori}/{tahun}/create', 'PolitikPendidikanController@create')->name('politik-pendidikan.create');
Route::get('/politik-dan-keamanan/pendidikan-anggota-dprd/{id_kategori}/{tahun}/edit', 'PolitikPendidikanController@edit')->name('politik-pendidikan.edit');
Route::put('/politik-dan-keamanan/pendidikan-anggota-dprd/{id_kategori}/{tahun}/update', 'PolitikPendidikanController@update')->name('politik-pendidikan.update');
Route::post('/politik-dan-keamanan/pendidikan-anggota-dprd/{id_kategori}/{tahun}/store', 'PolitikPendidikanController@store')->name('politik-pendidikan.store');








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

//--------Pendidikan Rasio Murid Guru
Route::get('/pendidikan/rasio-jenjang-pendidikan/{id_kategori}/{tahun?}', 'PendidikanRasioMuridGuruController@index')->name('rasio-murid-guru.index');
Route::get('/pendidikan/rasio-jenjang-pendidikan/{id_kategori}/{tahun?}/create', 'PendidikanRasioMuridGuruController@create')->name('rasio-murid-guru.create');
Route::get('/pendidikan/rasio-jenjang-pendidikan/{id_kategori}/{tahun?}/edit', 'PendidikanRasioMuridGuruController@edit')->name('rasio-murid-guru.edit');
Route::post('/pendidikan/rasio-jenjang-pendidikan/{id_kategori}/{tahun?}/update', 'PendidikanRasioMuridGuruController@update')->name('rasio-murid-guru.update');
Route::post('/pendidikan/rasio-jenjang-pendidikan/{id_kategori}/{tahun?}/store', 'PendidikanRasioMuridGuruController@store')->name('rasio-murid-guru.store');

//--------Pendidikan APTS
Route::get('/pendidikan/apts/{id_kategori}/{tahun?}', 'PendidikanAngkaPutusSekolahController@index')->name('apts.index');
Route::get('/pendidikan/apts/{id_kategori}/{tahun?}/create', 'PendidikanAngkaPutusSekolahController@create')->name('apts.create');
Route::get('/pendidikan/apts/{id_kategori}/{tahun?}/edit', 'PendidikanAngkaPutusSekolahController@edit')->name('apts.edit');
Route::post('/pendidikan/apts/{id_kategori}/{tahun?}/update', 'PendidikanAngkaPutusSekolahController@update')->name('apts.update');
Route::post('/pendidikan/apts/{id_kategori}/{tahun?}/store', 'PendidikanAngkaPutusSekolahController@store')->name('apts.store');

//--------Pendidikan partisipasi
Route::get('/pendidikan/partisipasi-jenjang-pendidikan/{id_kategori}/{tahun?}', 'PendidikanAngkaPartisipasiSekolahController@index')->name('partisipasi.index');
Route::get('/pendidikan/partisipasi-jenjang-pendidikan/{id_kategori}/{tahun?}/create', 'PendidikanAngkaPartisipasiSekolahController@create')->name('partisipasi.create');
Route::get('/pendidikan/partisipasi-jenjang-pendidikan/{id_kategori}/{tahun?}/edit', 'PendidikanAngkaPartisipasiSekolahController@edit')->name('partisipasi.edit');
Route::post('/pendidikan/partisipasi-jenjang-pendidikan/{id_kategori}/{tahun?}/update', 'PendidikanAngkaPartisipasiSekolahController@update')->name('partisipasi.update');
Route::post('/pendidikan/partisipasi-jenjang-pendidikan/{id_kategori}/{tahun?}/store', 'PendidikanAngkaPartisipasiSekolahController@store')->name('partisipasi.store');

//--------Pendidikan Baca TUlis 15 tahun
Route::get('/pendidikan/15-batulis/{id_kategori}/{tahun?}', 'PendidikanBacaTulisController@index')->name('baca-tulis.index');
Route::get('/pendidikan/15-batulis/{id_kategori}/{tahun?}/create', 'PendidikanBacaTulisController@create')->name('baca-tulis.create');
Route::get('/pendidikan/15-batulis/{id_kategori}/{tahun?}/edit', 'PendidikanBacaTulisController@edit')->name('baca-tulis.edit');
Route::post('/pendidikan/15-batulis/{id_kategori}/{tahun?}/update', 'PendidikanBacaTulisController@update')->name('baca-tulis.update');
Route::post('/pendidikan/15-batulis/{id_kategori}/{tahun?}/store', 'PendidikanBacaTulisController@store')->name('baca-tulis.store');

//--------Pendidikan Status Pendidikan 7-24 tahun
Route::get('/pendidikan/7-24-status-pendidikan/{id_kategori}/{tahun?}', 'PendidikanStatusPendidikanController@index')->name('status-pendidikan.index');
Route::get('/pendidikan/7-24-status-pendidikan/{id_kategori}/{tahun?}/create', 'PendidikanStatusPendidikanController@create')->name('status-pendidikan.create');
Route::get('/pendidikan/7-24-status-pendidikan/{id_kategori}/{tahun?}/edit', 'PendidikanStatusPendidikanController@edit')->name('status-pendidikan.edit');
Route::post('/pendidikan/7-24-status-pendidikan/{id_kategori}/{tahun?}/update', 'PendidikanStatusPendidikanController@update')->name('status-pendidikan.update');
Route::post('/pendidikan/7-24-status-pendidikan/{id_kategori}/{tahun?}/store', 'PendidikanStatusPendidikanController@store')->name('status-pendidikan.store');

//--------Pendidikan APS Formal 5-18 tahun
Route::get('/pendidikan/aps-5-18-formal/{id_kategori}/{tahun?}', 'PendidikanApsFormalController@index')->name('aps-formal.index');
Route::get('/pendidikan/aps-5-18-formal/{id_kategori}/{tahun?}/create', 'PendidikanApsFormalController@create')->name('aps-formal.create');
Route::get('/pendidikan/aps-5-18-formal/{id_kategori}/{tahun?}/edit', 'PendidikanApsFormalController@edit')->name('aps-formal.edit');
Route::post('/pendidikan/aps-5-18-formal/{id_kategori}/{tahun?}/update', 'PendidikanApsFormalController@update')->name('aps-formal.update');
Route::post('/pendidikan/aps-5-18-formal/{id_kategori}/{tahun?}/store', 'PendidikanApsFormalController@store')->name('aps-formal.store');

//--------Pendidikan APS Formal NonFormal 5-18 tahun
Route::get('/pendidikan/aps-5-18-formal-non-formal/{id_kategori}/{tahun?}', 'PendidikanApsNonFormalController@index')->name('aps-formalnon.index');
Route::get('/pendidikan/aps-5-18-formal-non-formal/{id_kategori}/{tahun?}/create', 'PendidikanApsNonFormalController@create')->name('aps-formalnon.create');
Route::get('/pendidikan/aps-5-18-formal-non-formal/{id_kategori}/{tahun?}/edit', 'PendidikanApsNonFormalController@edit')->name('aps-formalnon.edit');
Route::post('/pendidikan/aps-5-18-formal-non-formal/{id_kategori}/{tahun?}/update', 'PendidikanApsNonFormalController@update')->name('aps-formalnon.update');
Route::post('/pendidikan/aps-5-18-formal-non-formal/{id_kategori}/{tahun?}/store', 'PendidikanApsNonFormalController@store')->name('aps-formalnon.store');

//--------Pendidikan Jumlah Murid
Route::get('/pendidikan/murid-jenjang-pendidikan/{id_kategori}/{tahun?}', 'PendidikanJumlahMuridController@index')->name('jumlah-murid.index');
Route::get('/pendidikan/murid-jenjang-pendidikan/{id_kategori}/{tahun?}/create', 'PendidikanJumlahMuridController@create')->name('jumlah-murid.create');
Route::get('/pendidikan/murid-jenjang-pendidikan/{id_kategori}/{tahun?}/edit', 'PendidikanJumlahMuridController@edit')->name('jumlah-murid.edit');
Route::post('/pendidikan/murid-jenjang-pendidikan/{id_kategori}/{tahun?}/update', 'PendidikanJumlahMuridController@update')->name('jumlah-murid.update');
Route::post('/pendidikan/murid-jenjang-pendidikan/{id_kategori}/{tahun?}/store', 'PendidikanJumlahMuridController@store')->name('jumlah-murid.store');


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
