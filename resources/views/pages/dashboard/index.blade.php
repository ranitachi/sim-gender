@extends('layouts.master')

@section('title')
    <title>Dashboard : Sistem Informasi Manajemen Gender</title>
@endsection

@section('konten')
    <div class="row">
        <div class="col-md-12">
                <div class="content-group">
                    <div class="content">
                        <div class="page-header page-header-default" style="border: 1px solid #ddd; border-bottom: 0;">
                            <div class="page-header-content">
                                <div class="page-title">
                                    <h5>
                                        <span class="text-bold"><h1>Selamat Datang!</h1></span> 
                                        <span class="left-margin-for-header" style="font-size:14px;"><i>Sistem Informasi Gender dan Anak, Dinas Pemberdayaan Perempuan dan Perlindungan Anak Kabupaten Tangerang.</i></span>
                                    </h5>
                                <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
                            </div>
                            <div class="page-header-content" style="padding-bottom:30px;">
                                <h4><strong>Latar Belakang</strong></h4>
                                <p>
                                    Penetapan kebijakan atau proses perencanan tidak akan terwujud dengan baik tanpa didukung oleh ketersedian data dan informasi yang akurat dan lengkap.
                                </p>

                                <p>
                                    Data terpilah Gender dan Anak di Kabupaten Tangerang berfungsi untuk memotret tingkat keberhasilan pembangunan pemberdayaan perempuan, perlindungan perempuan dan anak melalui strategi Pengarusutamaan Gender (PUG) dan Pengarusutamaan Hak Anak (PUHA).
                                </p>
                                <p>
                                    Saat ini, data informasi yang ada belum berupa database yang terintergrasi, sehingga akan cukup sulit jika suatu saat akan diolah, diubah, ditambah, dihapus, atau bahkan dicari pada saat-saat tertentu.
                                </p>
                                <p>
                                    Untuk itu agar pengelolaan data bisa lebih optimal lagi, perlu didukung dengan satu aplikasi yang dapat menyimpan, menambah, mengubah, menghapus, maupun mengaksesnya yang tidak yang tidak memerlukan waktu atau tempat, tidak terkait waktu dan tempat.
                                </p>
                                <p>
                                    Menyadari pentingnya hal tersebut maka perlu adanya pengembangan Aplikasi SIGA Kabupaten/Kota untuk mendukung kabupaten/kota dalam pengelolaan data masing-masing.
                                </p>

                                <br>
                                <h4><strong>Maksud dan Tujuan</strong></h4>
                                <p>
                                    <strong>Maksud</strong> dari adanya Sistem Aplikasi SIGA ini adalah sebagai upaya untuk meningkatkan kualitas pengelolaan data di kabupaten Tangerang memalui penyediaan fasilitas pengolah data dalam bentuk aplikasi data SIGA.
                                </p>

                                <strong>Tujuan</strong>:
                                <ul>
                                    <li>
                                        Untuk menyediakan data dan informasi yang dapat diakses oleh para stakeholders untuk meningkatkan efektifitas dan efisiensi pelaksanaan program pemberdayaan perempuan dan perlindungan anak di Kabupaten Tangerang
                                    </li>
                                    <li>
                                        Meningkatkan komitmen Pemerintah Daerah Kabupaten Tangerang dalam pengunaan data gender dan anak dalam perencanaan,pemantauan, evaluasi atas kebijakan program dan kegiatan pemberdayaan daerah.
                                    </li>
                                    <li>
                                        Meningkatkan efektifitas penyelenggaraan PUG dan PUHA di daerah secara sistematis, komprehensif dan berkesinambungan serta meningkatkan ketersediaan data gender dan anak.
                                    </li>
                                </ul>

                                <br>
                                <h4><strong>Sasaran</strong></h4>
                                <p>
                                    Tersusunnya data base SIGA Kabupaten Tangerang melalui Sistem Aplikasi sehingga dapat digunakan secara maksimal oleh pihak yang berkepentingan.
                                </p>

                                <br>
                                <h4><strong>Keluaran/Output</strong></h4>
                                <ul>
                                    <li>
                                        Adanya stuktur database SIGA Kabupaten Tangerang yang dapat pula digunakan sebagai sarana pemetaan kondisi SIGA di Kabupaten Tangerang.
                                    </li>
                                    <li>
                                        Terinstalnya database dan aplikasi SIGA Kabupaten Tangerang  yang disediakan.
                                    </li>
                                    <li>
                                        Dapat diaksesnya aplikasi SIGA di  Kabupaten Tangerang.
                                    </li>
                                </ul>

                                <br>
                                <h4><strong>Manfaat</strong></h4>
                                <p>
                                    Tersusunnya basis data SIGA Kabupaten Tangerang untuk dapat digunakan secara maksimal sesuai dengan kepentingan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('footscript')
<script type="text/javascript" src="{{asset('assets/js/plugins/visualization/echarts/echarts.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/charts/echarts/columns_waterfalls.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/charts/echarts/timeline_option.js')}}"></script>
@endsection