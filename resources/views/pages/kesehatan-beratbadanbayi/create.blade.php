@extends('layouts.master')

@section('title')
    <title>Kesehatan : Sistem Informasi Statistik Kabupaten Tangerang</title>
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
                                <span class="left-margin-for-header">Tahun {{ $kategori->tahun }}</span>
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
                            <li><a href="">Kesehatan</a></li>
                            <li class="active">Tambah Data</li>
                        </ul>

                        <a href="{{route('berat-badan-bayi.index',[$id_kategori,$tahun])}}" class="btn btn-xs btn-primary pull-right" style="margin-top:5px;"><i class="icon-arrow-left52"></i> Kembali</a>
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
                <form action="{{ route('berat-badan-bayi.store', array($kategori->id,$tahun)) }}" method="post">
                    @csrf
                    <div style="padding:0px;">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Karateristik</th>
                                @foreach ($jenis as $idx=>$item)
                                    <th class="text-center">{{$item}}</th>
                                @endforeach
                                <th class="text-center">Jumlah (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th colspan="{{(count($jenis) + 1)}}"><b>Jenis Kelamin</b></th>
                            </tr>
                            <tr>
                                <td class="text-right">Laki Laki</td>
                                @foreach ($jenis as $idx_jen=>$item)
                                    <td class="text-center">
                                        <input type="text" class="form-control text-center laki_laki" onkeyup="hitung('laki_laki')" name="laki_laki[{{$idx_jen}}]" value="0">    
                                    </td>
                                @endforeach
                                <td class="text-center">
                                        <input type="text" class="form-control text-center" readonly id="laki_laki" value="0">  
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">Perempuan</td>
                                @foreach ($jenis as $idx_jen=>$item)
                                    <td class="text-center">
                                        <input type="text" class="form-control text-center perempuan" onkeyup="hitung('perempuan')" name="perempuan[{{$idx_jen}}]" value="0">        
                                    </td>
                                @endforeach
                                <td class="text-center">
                                        <input type="text" class="form-control text-center" readonly id="perempuan" value="0">  
                                </td>
                            </tr>
                            <tr>
                                <th colspan="{{(count($jenis) + 1)}}"><b>Kuantal Pengeluaran</b></th>
                            </tr>
                            @for ($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td class="text-right">Kuantal {{$i}}</td>
                                    @foreach ($jenis as $idx_jen=>$item)
                                        <td class="text-center">
                                            <input type="text" class="form-control text-center kuantal_{{$i}}" onkeyup="hitung('kuantal_{{$i}}')" name="kuantal_{{$i}}[{{$idx_jen}}]" value="0">    
                                        </td>
                                    @endforeach
                                    <td class="text-center">
                                        <input type="text" class="form-control text-center" readonly id="kuantal_{{$i}}" value="0">  
                                    </td>
                                </tr>
                            @endfor
                            <tr>
                                <th colspan="{{(count($jenis) + 1)}}"><b>Pendidikan Tertinggi</b></th>
                            </tr>
                            @foreach ($krt as $idx => $val)
                                <tr>
                                    <td class="text-right">{{$val}}</td>
                                    @foreach ($jenis as $idx_jen=>$item)
                                        <td class="text-center">
                                        <input type="text" class="form-control text-center {{$idx}}" onkeyup="hitung('{{$idx}}')" name="{{$idx}}[{{$idx_jen}}]" value="0">    
                                        </td>
                                    @endforeach
                                    <td class="text-center">
                                        <input type="text" class="form-control text-center" readonly id="{{$idx}}" value="0">  
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="text-right"><b>Kabupaten Tangerang</b></td>
                                @foreach ($jenis as $idx_jen=>$item)
                                    <td class="text-center">
                                        <input type="text" class="form-control text-center kab_tangerang" onkeyup="hitung('kab_tangerang')" name="kab_tangerang[{{$idx_jen}}]" value="0">    
                                    </td>
                                @endforeach
                                <td class="text-center">
                                        <input type="text" class="form-control text-center" readonly id="kab_tangerang" value="0">  
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
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
        function hitung(cls)
        {
            var total=0;
            $('input.'+cls).each(function(){
                var n=parseFloat($(this).val().replace(',','.'));
                total+=n;
            });
            $('#'+cls).val(total.toFixed(2));
        }
    </script>
@endsection