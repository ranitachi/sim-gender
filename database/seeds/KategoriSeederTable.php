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

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partispasi Sekolah Menurut Jenis Kelamin dan Jenjang Pendidikan Taman Kanak-Kanak dan Raudatul Athfal Di Kab Tangerang";
        $kat->url_route = "/pendidikan/sekolah-tk-ra"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partispasi Sekolah Menurut Jenis Kelamin dan Jenjang Pendidikan Sekolah Dasar dan Madrasah Ibtidaiyah Di Kab Tangerang";
        $kat->url_route = "/pendidikan/sekolah-sd-mi"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partispasi Sekolah Menurut Jenis Kelamin dan Jenjang Pendidikan SMP dan MTs Di Kab Tangerang";
        $kat->url_route = "/pendidikan/sekolah-smp-mts"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partispasi Sekolah Menurut Jenis Kelamin dan Jenjang Pendidikan SMA, SMK dan Madrasah Aliyah (MA) Di Kab Tangerang";
        $kat->url_route = "/pendidikan/sekolah-sma-smk-ma"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Persentase Penduduk Usia 10 Tahun ke Atas Menurut Kecamatan dan Pendidikan yang Ditamatkan di Kabupaten Tangerang";
        $kat->url_route = "/pendidikan/penduduk-kecamatan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Jumlah Sekolah, Murid, Guru, dan Rasio Murid-Guru Sekolah Dasar (SD) dan Madrasah Ibtidaiyah (MI) Menurut Kecamatan di Kab Tangerang";
        $kat->url_route = "/pendidikan/rasio-sd-mi"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Rasio Siswa Sekolah Menengah Pertama (SMP) dan Madrasah Tsanawiyah (MTs) Menurut Kecamatan di Kab Tangerang";
        $kat->url_route = "/pendidikan/rasio-smp-mts"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Rasio Siswa Sekolah Menengah Atas (SMA) dan Madrasah Aliyah (MA) Menurut Kecamatan di Kab Tangerang";
        $kat->url_route = "/pendidikan/rasio-sma-ma"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Jumlah Sekolah, Murid, Guru, dan Rasio Murid-Guru Sekolah Menengah Kejuruan (SMK) Menurut Kecamatan di Kab Tangerang";
        $kat->url_route = "/pendidikan/rasio-smk"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Jumlah Murid Menurut Jenjang Pendidikan";
        $kat->url_route = "/pendidikan/murid-jenjang-pendidikan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Rasio Murid/Guru Menurut Jenjang Pendidikan Tahun";
        $kat->url_route = "/pendidikan/rasio-jenjang-pendidikan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Putus Sekolah (APtS) Menurut Jenjang Pendidikan Tahun";
        $kat->url_route = "/pendidikan/apts"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Parsitipasi Sekolah Menurut Jenjang Pendidikan";
        $kat->url_route = "/pendidikan/partisipasi-jenjang-pendidikan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Persentase Penduduk 15 Tahun ke Atas menurut Karakteristik dan Kemampuan Membaca dan Menulis";
        $kat->url_route = "/pendidikan/15-batulis"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Persentase Penduduk  Berumur 7-24 Tahun menurut Karakteristik dan Status Pendidikan";
        $kat->url_route = "/pendidikan/7-24-status-pendidikan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partisipasi Sekolah (APS) Formal Penduduk Berumur 5-18 Tahun menurut Karakteristik dan Kelompok Umur";
        $kat->url_route = "/pendidikan/aps-5-18-formal"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partisipasi Sekolah (APS) Formal dan Non Formal Penduduk Berumur 5-18 Tahun menurut Karakteristik dan Kelompok Umur";
        $kat->url_route = "/pendidikan/aps-5-18-formal-non-formal"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partisipasi Murni (APM) Formal Penduduk menurut Karakteristik dan Jenjang Pendidikan";
        $kat->url_route = "/pendidikan/apm-formal"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 4;
        $kat->judul = "Angka Partisipasi Murni (APM) Formal dan Nonformal Penduduk menurut Katrakteristik dan Jenjang Pendidikan";
        $kat->url_route = "/pendidikan/apm-formal-non-formal"; 
        $kat->save();

        // End of Seeder Pendidikan

        // Start Seeder Kesehatan

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Persentase Perempuan Pernah Kawin Berumur 15-49 Tahun Yang Melahirkan Anak Lahir Hidup (ALH) Menurut Kecamatan dan Penolong Proses Kelahiran di Kab Tangerang";
        $kat->url_route = "/kesehatan/alh"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Jumlah Dokter Spesialis, Dokter Umum, dan Dokter Gigi Menurut Sarana Pelayanan Kesehatan di Kabupaten Tangerang";
        $kat->url_route = "/kesehatan/jumlah-doktor-spesialis"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR), BBLR Dirujuk, dan Bergizi Buruk Menurut Kecamatan di Kab Tangerang";
        $kat->url_route = "/kesehatan/jumlah-bblr"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Data Penyandang Disabilitas di Kabupaten Tangerang";
        $kat->url_route = "/kesehatan/disabilitas"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Angka Kesakitan dan Rata-rata Lama Sakit (Hari)";
        $kat->url_route = "/kesehatan/sakit-rata-rata"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Persentase Penduduk Umur 0-59 Bulan (Balita) yang Mempunyai Kartu Imunisasi dan Mendapat Imunisasi Lengkap menurut Karakteristik";
        $kat->url_route = "/kesehatan/balita-kartu-imunisasi"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Presentase Penduduk Umur 0-23 Bulan yang pernah diberi ASI dan Rata-rata Lama pemberian ASI Menurut Karateristik";
        $kat->url_route = "/kesehatan/balita-asi-rata-rata"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Penyebab Kematian Ibu";
        $kat->url_route = "/kesehatan/kematian-ibu"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Penyebab Kematian Bayi";
        $kat->url_route = "/kesehatan/kematian-bayi"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Trend Penemuan Kasus HIV-AIDS";
        $kat->url_route = "/kesehatan/hiv-aids"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Persentase Perempuan Berumur 15-49 Tahun yang Pernah Melahirkan menurut Karakteristik dan Tempat Melahirkan";
        $kat->url_route = "/kesehatan/tempat-melahirkan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Persentase Perempuan Berumur 15-49 Tahun yang Pernah Melahirkan menurut Karakteristik dan Penolong Persalinan";
        $kat->url_route = "/kesehatan/penolong-persalinan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Persentase Perempuan Berumur 15-49 Tahun yang Pernah Melahirkan Dua Tahun Terakhir menurut Karakteristik dan Berat Badan Bayi yang Dilahirkan Terakhir";
        $kat->url_route = "/kesehatan/berat-badan-bayi"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Persentase Perempuan Berumur 15-49 Tahun yang Pernah Kawin menurut Karakteristik dan Status Penggunaan Alat/Cara KB";
        $kat->url_route = "/kesehatan/kb"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Persentase Perempuan Berumur 15-49 Tahun yang Pernah Kawin dan Sedang Menggunakan Alat/Cara KB menurut Karakteristik dan Jenis Alat/Cara KB";
        $kat->url_route = "/kesehatan/jenis-alat-kb"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Cakupan Imunisasi Rutin pada Bayi";
        $kat->url_route = "/kesehatan/imunisasi-rutin"; 
        $kat->save();
        
        $kat = new Kategori;
        $kat->id_subyek = 3;
        $kat->judul = "Cakupan Imunisasi Rutin pada Ibu hamil dan wanita usia subur";
        $kat->url_route = "/kesehatan/imunisasi-rutin-ibu-hamil"; 
        $kat->save();

        // End of Seeder Kesehatan

        // Start Seeder Kependudukan

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Distribusi dan Kepadatan Penduduk Menurut Kecamatan di Kab Tangerang";
        $kat->url_route = "/kependudukan/kepadatan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Penyandang Masalah Kesejahteraan Sosial (PMKS) Menurut Jenis dan Kecamatan di Kab Tangerang";
        $kat->url_route = "/kependudukan/pmks"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Potensi dan Sumber Kesejahteraan Sosial Menurut Kecamatan di Kab Tangerang";
        $kat->url_route = "/kependudukan/potensi-sosial"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Kecamatan, Luas Wilayah, Desa dan Kelurahan di Kab Tangerang";
        $kat->url_route = "/kependudukan/jumlah-kecamatan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Penduduk Kabupaten Tangerang Menurut Kecamatan dan Sex Ratio";
        $kat->url_route = "/kependudukan/sex-ratio"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Penduduk Berdasarkan Kelompok Umur";
        $kat->url_route = "/kependudukan/kelompok-umur"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Tabel Kepadatan Penduduk Berdasarkan Dependency Ratio";
        $kat->url_route = "/kependudukan/dependency-ratio"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Penduduk Menurut Status Perkawinan Kab Tangerang";
        $kat->url_route = "/kependudukan/status-perkawinan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Angka Indeks IPM, IPG dan IDG menurut Kabupaten/Kota di Provinsi Banten";
        $kat->url_route = "/kependudukan/angka-index"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Perkara di pengadilan Agama Menurut Kecamatan";
        $kat->url_route = "/kependudukan/perkara-pengadilan-agama"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Faktor Penyebab Perceraian";
        $kat->url_route = "/kependudukan/penyebab-perceraian"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Cerai dan Pengesahan Nikah Menurut Kecamatan";
        $kat->url_route = "/kependudukan/jumlah-cerai"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Kepemilikan Akte Berdasarkan Jenisnya di Kabupaten Tangerang";
        $kat->url_route = "/kependudukan/kepemilikan-akte"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Rumah Tangga Miskin di Kabupaten Tangerang";
        $kat->url_route = "/kependudukan/rumah-tangga-miskin"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Perempuan Rawan Sosial Ekonomi dan Keluarga Bermasalah Sosial Psikologis di Kabupaten Tangerang";
        $kat->url_route = "/kependudukan/perempuan-sosial-ekonomi"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Lansia Terlantar dan Penyandang Cacat di Kabupaten Tangerang";
        $kat->url_route = "/kependudukan/lansia-terlantar"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Tuna Susila dan Korban Penyalahgunaan Napza Di Kabupaten Tangerang";
        $kat->url_route = "/kependudukan/tuna-susila"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Gelandangan, Pengemis dan Eks Napi di Kabupaten Tangerang";
        $kat->url_route = "/kependudukan/jumlah-gelandangan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Jumlah Balita Terlantar Sosial Ekonomi, Anak Terlantar dan Anak Bermasalah Dengan Hukum";
        $kat->url_route = "/kependudukan/balita-terlantar"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Persentase Rumah Tangga menurut Karakteristik dan Status Kepemilikan Bangunan Tempat Tinggal yang Ditempati";
        $kat->url_route = "/kependudukan/status-kepemilikan-bangunan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Persentase Rumah Tangga menurut Karakteristik dan Status Kepemilikan Bangunan Tempat Tinggal yang Ditempati";
        $kat->url_route = "/kependudukan/status-kepemilikan-ditempati"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Persentase Rumah Tangga menurut Karakteristik dan Jenis Bukti Kepemilikan Tanah Bangunan Tempat Tinggal Milik Sendiri";
        $kat->url_route = "/kependudukan/status-kepemilikan-milik-sendiri"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Persentase Rumah Tangga menurut Karakteristik dan Sumber Air Utama yang Digunakan Rumah Tangga untuk Minum";
        $kat->url_route = "/kependudukan/sumber-air-minum"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Persentase Rumah Tangga menurut Karakteristik dan Sumber Air Utama yang Digunakan Rumah Tangga untuk Memasak/Mandi/Cuci/dll";
        $kat->url_route = "/kependudukan/sumber-air-mandi"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Tabel Indikator-Indikator Strategis Kabupaten Tangerang";
        $kat->url_route = "/kependudukan/indikator-strategis"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 5;
        $kat->judul = "Sampling Error Persentase Penduduk yang Memiliki Akta Kelahiran menurut Kelompok Umur";
        $kat->url_route = "/kependudukan/akta-kelompok-umur"; 
        $kat->save();

        // End of Seeder Kependudukan

        // Start Seeder Ketenagakerjaan

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Indikator Ketenagakerjaan di Kabupaten Tangerang";
        $kat->url_route = "/ketenagakerjaan/indikator"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Jumlah Penduduk Berumur 15 Tahun Keatas Menurut Kecamatan dan Jenis Kegiatan Selama Seminggu yang Lalu di Kabupaten Tangerang";
        $kat->url_route = "/ketenagakerjaan/kecamatan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Jumlah Penduduk Berumur 15 Tahun Ke Atas Menurut Pendidikan Tertinggi yang Ditamatkan dan Jenis Kegiatan Selama Seminggu yang Lalu di Kab Tangerang";
        $kat->url_route = "/ketenagakerjaan/pendidikan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Jumlah Penduduk Berumur 15 Tahun Ke Atas yang Bekerja Selama Seminggu yang Lalu Menurut Status Pekerjaan Utama dan Jenis Kelamin di Kab Tangerang";
        $kat->url_route = "/ketenagakerjaan/status-pekerjaan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Jumlah Penduduk Berumur 15 Tahun Ke Atas yang Bekerja Selama Seminggu yang Lalu Menurut Lapangan Pekerjaan Utama dan Jenis Kelamin di Kab Tangerang";
        $kat->url_route = "/ketenagakerjaan/lapangan-pekerjaan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Tingkat Pengangguran Terbuka (TPT) menurut Kecamatan di Kab Tangerang";
        $kat->url_route = "/ketenagakerjaan/tpt"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 2;
        $kat->judul = "Jumlah Pencari Kerja Terdaftar Menurut Tingkat Pendidikan Tertinggi yang Ditamatkan dan Jenis Kelamin di Kab Tangerang";
        $kat->url_route = "/ketenagakerjaan/pencari-kerja/pendidikan-tertinggi"; 
        $kat->save();

        // End of Seeder Ketenagakerjaan

        // Start Politik dan Keamanan

        $kat = new Kategori;
        $kat->id_subyek = 1;
        $kat->judul = "Banyaknya Tindak Kejahatan Yang Terjadi Menurut Jenis Kejahatan di Kab Tangerang";
        $kat->url_route = "/politik-dan-keamanan/tindak-kejahatan"; 
        $kat->save();

        $kat = new Kategori;
        $kat->id_subyek = 1;
        $kat->judul = "Jumlah Tahanan di Lembaga Pemasyarakatan (LP) Anak Tanggerang Menurut Jenis Kejahatan di Kab Tangerang (jiwa)";
        $kat->url_route = "/politik-dan-keamanan/lp"; 
        $kat->save();

        // End of Politik dan Keamanan
    }
}
