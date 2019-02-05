<?php

use Illuminate\Database\Seeder;

use App\Models\Kategori;

class KategoriSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Start Seeder Pendidikan
        Kategori::query()->truncate();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partispasi Sekolah Menurut Jenis Kelamin dan Jenjang Pendidikan Taman Kanak-Kanak dan Raudatul Athfal Di Kab Tangerang Tahun 2015-2016"; 
        $kat->tahun = "2015 - 2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/pendidikan/sekolah/tk-ra"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partispasi Sekolah Menurut Jenis Kelamin dan Jenjang Pendidikan Sekolah Dasar dan Madrasah Ibtidaiyah Di Kab Tangerang Tahun 2015-2016";
        $kat->tahun = "2015 - 2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/pendidikan/sekolah/sd-mi"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partispasi Sekolah Menurut Jenis Kelamin dan Jenjang Pendidikan SMP dan MTs Di Kab Tangerang Tahun 2015-2016";
        $kat->tahun = "2015 - 2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/pendidikan/sekolah/smp-mts"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partispasi Sekolah Menurut Jenis Kelamin dan Jenjang Pendidikan SMA, SMK dan Madrasah Aliyah (MA) Di Kab Tangerang Tahun 2015-2016";
        $kat->tahun = "2015 - 2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/pendidikan/sekolah/sma-smk-ma"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Persentase Penduduk Usia 10 Tahun ke Atas Menurut Kecamatan dan Pendidikan yang Ditamatkan di Kabupaten Tangerang Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/pendidikan/penduduk/kecamatan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Jumlah Sekolah, Murid, Guru, dan Rasio Murid-Guru Sekolah Dasar (SD) dan Madrasah Ibtidaiyah (MI) Menurut Kecamatan di Kab Tangerang Tahun 2017";
        $kat->tahun = "2017";
        $kat->sumber_data = null; 
        $kat->url_route = "/pendidikan/rasio/sd-mi"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Rasio Siswa Sekolah Menengah Pertama (SMP) dan Madrasah Tsanawiyah (MTs) Menurut Kecamatan di Kab Tangerang Tahun 2017";
        $kat->tahun = "2017";
        $kat->sumber_data = null; 
        $kat->url_route = "/pendidikan/rasio/smp-mts"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Rasio Siswa Sekolah Menengah Atas (SMA) dan Madrasah Aliyah (MA) Menurut Kecamatan di Kab Tangerang Tahun 2017";
        $kat->tahun = "2017";
        $kat->sumber_data = null; 
        $kat->url_route = "/pendidikan/rasio/sma-ma"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Jumlah Sekolah, Murid, Guru, dan Rasio Murid-Guru Sekolah Menengah Kejuruan (SMK) Menurut Kecamatan di Kab Tangerang Tahun 2017";
        $kat->tahun = "2017";
        $kat->sumber_data = null; 
        $kat->url_route = "/pendidikan/rasio/smk"; 
        $kat->save();

        // End of Seeder Pendidikan

        // Start Seeder Kesehatan

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Persentase Perempuan Pernah Kawin Berumur 15-49 Tahun Yang Melahirkan Anak Lahir Hidup (ALH) Menurut Kecamatan dan Penolong Proses Kelahiran di Kab Tangerang Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/kesehatan/alh"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Jumlah Dokter Spesialis, Dokter Umum, dan Dokter Gigi Menurut Sarana Pelayanan Kesehatan di Kabupaten Tangerang, Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/kesehatan/jumlah/doktor-spesialis"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR), BBLR Dirujuk, dan Bergizi Buruk Menurut Kecamatan di Kab Tangerang Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/kesehatan/jumlah/bblr"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Data Penyandang Disabilitas di Kabupaten Tangerang Tahun 2018";
        $kat->tahun = "2018";
        $kat->sumber_data = null; 
        $kat->url_route = "/kesehatan/disabilitas"; 
        $kat->save();

        // End of Seeder Kesehatan

        // Start Seeder Kependudukan

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Distribusi dan Kepadatan Penduduk Menurut Kecamatan di Kab Tangerang Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/kependudukan/kepadatan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Penyandang Masalah Kesejahteraan Sosial (PMKS) Menurut Jenis dan Kecamatan di Kab Tangerang Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/kependudukan/pmks"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Potensi dan Sumber Kesejahteraan Sosial Menurut Kecamatan di Kab Tangerang Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/kependudukan/potensi/sosial"; 
        $kat->save();

        // End of Seeder Kependudukan

        // Start Seeder Ketenagakerjaan

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Indikator Ketenagakerjaan di Kabupaten Tangerang Tahun 2017";
        $kat->tahun = "2017";
        $kat->sumber_data = null; 
        $kat->url_route = "/ketenagakerjaan/indikator"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Jumlah Penduduk Berumur 15 Tahun Keatas Menurut Kecamatan dan Jenis Kegiatan Selama Seminggu yang Lalu di Kabupaten Tangerang Tahun 2015";
        $kat->tahun = "2015";
        $kat->sumber_data = null; 
        $kat->url_route = "/ketenagakerjaan/kecamatan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Jumlah Penduduk Berumur 15 Tahun Ke Atas Menurut Pendidikan Tertinggi yang Ditamatkan dan Jenis Kegiatan Selama Seminggu yang Lalu di Kab Tangerang, 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/ketenagakerjaan/pendidikan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Jumlah Penduduk Berumur 15 Tahun Ke Atas yang Bekerja Selama Seminggu yang Lalu Menurut Status Pekerjaan Utama dan Jenis Kelamin di Kab Tangerang Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/ketenagakerjaan/status-pekerjaan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Jumlah Penduduk Berumur 15 Tahun Ke Atas yang Bekerja Selama Seminggu yang Lalu Menurut Lapangan Pekerjaan Utama dan Jenis Kelamin di Kab Tangerang Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/ketenagakerjaan/lapangan-pekerjaan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Tingkat Pengangguran Terbuka (TPT) menurut Kecamatan di Kab Tangerang Tahun 2015";
        $kat->tahun = "2015";
        $kat->sumber_data = null; 
        $kat->url_route = "/ketenagakerjaan/tpt"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Jumlah Pencari Kerja Terdaftar Menurut Tingkat Pendidikan Tertinggi yang Ditamatkan dan Jenis Kelamin di Kab Tangerang Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/ketenagakerjaan/pencari-kerja/pendidikan-tertinggi"; 
        $kat->save();

        // End of Seeder Ketenagakerjaan

        // Start Politik dan Keamanan

        $kat = new Kategori;
        $kat->id_subyek = 1;
        $kat->judul = "Banyaknya Tindak Kejahatan Yang Terjadi Menurut Jenis Kejahatan di Kab Tangerang Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/politik-dan-keamanan/tindak-kejahatan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 1;
        $kat->judul = "Jumlah Tahanan di Lembaga Pemasyarakatan (LP) Anak Tanggerang Menurut Jenis Kejahatan di Kab Tangerang (jiwa) Tahun 2016";
        $kat->tahun = "2016";
        $kat->sumber_data = null; 
        $kat->url_route = "/politik-dan-keamanan/lp"; 
        $kat->save();

        // End of Politik dan Keamanan

        // Start Wilayah

        $kat = new Kategori;
        $kat->id_subyek = 6;
        $kat->judul = "Jumlah Kecamatan, Luas Wilayah, Desa dan Kelurahan Tahun 2017";
        $kat->tahun = "2017";
        $kat->sumber_data = null; 
        $kat->url_route = "/wilayah/jumlah-kecamatan-luas-wilayah"; 
        $kat->save();

        // End of Wilayah
    }
}
