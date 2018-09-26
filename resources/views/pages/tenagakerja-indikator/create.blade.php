@extends('layouts.master')

@section('title')
    <title>Kependudukan : Sistem Informasi Statistik Kabupaten Tangerang</title>
    <script type="text/javascript" src="{{ asset('/') }}assets/js/pages/datatables_basic.js"></script>
    <style>
        .left-margin-for-header {
            margin-left: 27px;
        }
    </style>
@endsection

@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="content-group">
                <div class="page-header page-header-default" style="border: 1px solid #ddd; border-bottom: 0;">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h5>
                                <i class="icon-arrow-left52 position-left"></i>
                                <span class="text-semibold">Subyek: {{ $kategori->subyek->nama_subyek }}</span><br> 
                                <span class="left-margin-for-header">{{ $kategori->judul }}</span>
                                <small class="display-block" style="margin-left:27px;">
                                    Sumber Data: &nbsp;{{ !is_null($kategori->sumber_data) ? $kategori->sumber_data : 'Informasi Tidak Tersedia' }}
                                </small>
                            </h5>
                        <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>

                        <div class="heading-elements">
                            <button class="btn bg-teal-400 btn-icon btn-sm heading-btn legitRipple"><i class="icon-gear"></i></button>
                        </div>
                    </div>
                    
                    <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                        <ul class="breadcrumb">
                            <li><a href=""><i class="icon-home2 position-left"></i> Dashboard</a></li>
                            <li><a href="">Kependudukan</a></li>
                            <li><a href="">{{ $kategori->judul }}</a></li>
                            <li class="active">Tambah Data</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Formulir Tambah Data<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{ route('tenagakerja-indikator.store', $kategori->id) }}" method="post">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Karakteristik</th>
                                <th>Laki-Laki</th>
                                <th>Perempuan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><input type="text" class="form-control" name="karakteristik[]" value="Penduduk Usia Kerja" readonly></td>
                                <td><input type="text" class="form-control puk_lk" name="laki_laki[]" value="0"></td>
                                <td><input type="text" class="form-control puk_pr" name="perempuan[]" value="0"></td>
                                <td><input type="text" class="form-control puk_jml" name="jumlah[]" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><input type="text" class="form-control" name="karakteristik[]" value="Angkatan Kerja" readonly></td>
                                <td><input type="text" class="form-control angkatankerja_lk" name="laki_laki[]" value="0" readonly></td>
                                <td><input type="text" class="form-control angkatankerja_pr" name="perempuan[]" value="0" readonly></td>
                                <td><input type="text" class="form-control angkatankerja_jml" name="jumlah[]" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="text" class="form-control" name="karakteristik[]" value="Bekerja" readonly></td>
                                <td><input type="text" class="form-control bekerja_lk" name="laki_laki[]" value="0"></td>
                                <td><input type="text" class="form-control bekerja_pr" name="perempuan[]" value="0"></td>
                                <td><input type="text" class="form-control bekerja_jml" name="jumlah[]" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="text" class="form-control" name="karakteristik[]" value="Pengangguran" readonly></td>
                                <td><input type="text" class="form-control pengangguran_lk" name="laki_laki[]" value="0"></td>
                                <td><input type="text" class="form-control pengangguran_pr" name="perempuan[]" value="0"></td>
                                <td><input type="text" class="form-control pengangguran_jml" name="jumlah[]" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><input type="text" class="form-control" name="karakteristik[]" value="Bukan Angkatan Kerja" readonly></td>
                                <td><input type="text" class="form-control bak_lk" name="laki_laki[]" value="0" readonly></td>
                                <td><input type="text" class="form-control bak_pr" name="perempuan[]" value="0" readonly></td>
                                <td><input type="text" class="form-control bak_jml" name="jumlah[]" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="text" class="form-control" name="karakteristik[]" value="Sekolah dan Mengurus RT" readonly></td>
                                <td><input type="text" class="form-control sekolah_lk" name="laki_laki[]" value="0"></td>
                                <td><input type="text" class="form-control sekolah_pr" name="perempuan[]" value="0"></td>
                                <td><input type="text" class="form-control sekolah_jml" name="jumlah[]" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="text" class="form-control" name="karakteristik[]" value="Lainnya" readonly></td>
                                <td><input type="text" class="form-control lainnya_lk" name="laki_laki[]" value="0"></td>
                                <td><input type="text" class="form-control lainnya_pr" name="perempuan[]" value="0"></td>
                                <td><input type="text" class="form-control lainnya_jml" name="jumlah[]" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><input type="text" class="form-control" name="karakteristik[]" value="Tingkat Partisipasi Angkatan Kerja (%)" readonly></td>
                                <td><input type="text" class="form-control tpak_lk" name="laki_laki[]" value="0"></td>
                                <td><input type="text" class="form-control tpak_pr" name="perempuan[]" value="0"></td>
                                <td><input type="text" class="form-control tpak_jml" name="jumlah[]" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><input type="text" class="form-control" name="karakteristik[]" value="Tingkat Kesempatan Kerja (%)" readonly></td>
                                <td><input type="text" class="form-control tkk_lk" name="laki_laki[]" value="0"></td>
                                <td><input type="text" class="form-control tkk_pr" name="perempuan[]" value="0"></td>
                                <td><input type="text" class="form-control tkk_jml" name="jumlah[]" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><input type="text" class="form-control" name="karakteristik[]" value="Tingkat Pengangguran Terbuka (%)" readonly></td>
                                <td><input type="text" class="form-control tpt_lk" name="laki_laki[]" value="0"></td>
                                <td><input type="text" class="form-control tpt_pr" name="perempuan[]" value="0"></td>
                                <td><input type="text" class="form-control tpt_jml" name="jumlah[]" value="0" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary legitRipple">Simpan Data <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footscript')
    <script>
        $('.bekerja_lk').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.pengangguran_lk').val())
            
            var total = a + b;
            $('.angkatankerja_lk').val(total)
            
            var c = parseInt($('.bekerja_pr').val())
            var jumlah = a + c
            $('.bekerja_jml').val(jumlah)

            var d = parseInt($('.angkatankerja_lk').val())
            var e = parseInt($('.angkatankerja_pr').val())
            var f = d + e
            $('.angkatankerja_jml').val(f)
        })

        $('.pengangguran_lk').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.bekerja_lk').val())
            var total = a + b;
            $('.angkatankerja_lk').val(total)
            
            var c = parseInt($('.pengangguran_pr').val())
            var jumlah = a + c
            $('.pengangguran_jml').val(jumlah)

            var d = parseInt($('.angkatankerja_lk').val())
            var e = parseInt($('.angkatankerja_pr').val())
            var f = d + e
            $('.angkatankerja_jml').val(f)
        })

        $('.bekerja_pr').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.pengangguran_pr').val())
            var total = a + b;
            $('.angkatankerja_pr').val(total)

            var c = parseInt($('.bekerja_lk').val())
            var jumlah = a + c
            $('.bekerja_jml').val(jumlah)

            var d = parseInt($('.angkatankerja_lk').val())
            var e = parseInt($('.angkatankerja_pr').val())
            var f = d + e
            $('.angkatankerja_jml').val(f)
        })

        $('.pengangguran_pr').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.bekerja_pr').val())
            var total = a + b;
            $('.angkatankerja_pr').val(total)

            var c = parseInt($('.pengangguran_lk').val())
            var jumlah = a + c
            $('.pengangguran_jml').val(jumlah)

            var d = parseInt($('.angkatankerja_lk').val())
            var e = parseInt($('.angkatankerja_pr').val())
            var f = d + e
            $('.angkatankerja_jml').val(f)
        })

        //

        $('.sekolah_lk').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.lainnya_lk').val())
            
            var total = a + b;
            $('.bak_lk').val(total)
            
            var c = parseInt($('.sekolah_pr').val())
            var jumlah = a + c
            $('.sekolah_jml').val(jumlah)

            var d = parseInt($('.bak_lk').val())
            var e = parseInt($('.bak_pr').val())
            var f = d + e
            $('.bak_jml').val(f)
        })

        $('.lainnya_lk').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.sekolah_lk').val())
            var total = a + b;
            $('.bak_lk').val(total)
            
            var c = parseInt($('.lainnya_pr').val())
            var jumlah = a + c
            $('.lainnya_jml').val(jumlah)

            var d = parseInt($('.bak_lk').val())
            var e = parseInt($('.bak_pr').val())
            var f = d + e
            $('.bak_jml').val(f)
        })

        $('.sekolah_pr').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.lainnya_pr').val())
            
            var total = a + b;
            $('.bak_pr').val(total)
            
            var c = parseInt($('.sekolah_lk').val())
            var jumlah = a + c
            $('.sekolah_jml').val(jumlah)

            var d = parseInt($('.bak_lk').val())
            var e = parseInt($('.bak_pr').val())
            var f = d + e
            $('.bak_jml').val(f)
        })

        $('.lainnya_pr').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.sekolah_pr').val())
            var total = a + b;
            $('.bak_pr').val(total)
            
            var c = parseInt($('.lainnya_lk').val())
            var jumlah = a + c
            $('.lainnya_jml').val(jumlah)

            var d = parseInt($('.bak_lk').val())
            var e = parseInt($('.bak_pr').val())
            var f = d + e
            $('.bak_jml').val(f)
        })

        //

        $('.puk_lk').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.puk_pr').val())
            var total = a + b;
            $('.puk_jml').val(total)
        })

        $('.puk_pr').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.puk_lk').val())
            var total = a + b;
            $('.puk_jml').val(total)
        })

        $('.tpak_lk').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.tpak_pr').val())
            var total = a + b;
            $('.tpak_jml').val(total)
        })

        $('.tpak_pr').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.tpak_lk').val())
            var total = a + b;
            $('.tpak_jml').val(total)
        })

        $('.tkk_lk').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.tkk_pr').val())
            var total = a + b;
            $('.tkk_jml').val(total)
        })

        $('.tkk_pr').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.tkk_lk').val())
            var total = a + b;
            $('.tkk_jml').val(total)
        })

        $('.tpt_lk').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.tpt_pr').val())
            var total = a + b;
            $('.tpt_jml').val(total)
        })

        $('.tpt_pr').keyup(function(){
            var a = parseInt($(this).val())
            var b = parseInt($('.tpt_lk').val())
            var total = a + b;
            $('.tpt_jml').val(total)
        })

    </script>
@endsection