@extends('layouts.master')

@section('title')
    <title>Form Edit Data Luas Wilayah : Sistem Informasi Statistik Kabupaten Tangerang</title>
    <script type="text/javascript" src="{{ asset('/') }}chartjs/Chart.bundle.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}chartjs/util.js"></script>
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
                                <span class="left-margin-for-header">{{ $kategori->judul }} Tahun {{$tahun}}</span>
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
                            <li><a href="{{route('sex-ratio.index',[$id_kategori,$tahun])}}">Kependudukan</a></li>
                            <li class="active">{{ $kategori->judul }} Tahun {{$tahun}}</li>
                        </ul>

                        <a href="{{route('wilayah-luas-jlh-kecamatan.index',[$id_kategori,$tahun])}}" class="btn btn-xs btn-primary pull-right" style="margin-top:5px;"><i class="icon-arrow-left52"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Formulir Edit Data<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            <div style="padding:15px;">
                <form action="{{route('sex-ratio.update',[$id_kategori,$tahun])}}" method="post">
                    @csrf
                    <table class="table datatable-basic table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kecamatan</th>
                                <th>Laki-laki</th>
                                <th>Perempuan</th>
                                <th>Jumlah</th>
                                <th>Sex Ratio</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($kecamatan as $item)
                                <tr>
                                    <td class="text-center">    {{ $number }}
                                            @php
                                                $number++;
                                            @endphp
                                    </td>
                                    <td>{{ $item->nama_kecamatan }}</td>
                                    <td class="text-center"><input type="text" class="form-control text-center" style="width:100px;" onkeyup="hitung({{$number}})" id="laki_laki_{{$number}}" name="laki_laki[{{$item->id}}]" value="{{isset($data[$item->id]['laki_laki']) ? $data[$item->id]['laki_laki'] : 0}}"></td>
                                    <td class="text-center"><input type="text" class="form-control text-center" style="width:100px;" onkeyup="hitung({{$number}})" id="perempuan_{{$number}}" name="perempuan[{{$item->id}}]" value="{{isset($data[$item->id]['perempuan']) ? $data[$item->id]['perempuan'] : 0}}"></td>
                                    <td class="text-center"><input type="text" class="form-control text-center" style="width:100px;" readonly id="jlh_{{$number}}" name="jumlah[{{$item->id}}]" value="{{isset($data[$item->id]['jumlah']) ? $data[$item->id]['jumlah'] : 0}}"></td>
                                    <td class="text-center"><input type="text" class="form-control text-center" style="width:100px;" name="sex_ratio[{{$item->id}}]" value="{{isset($data[$item->id]['sex_ratio']) ? $data[$item->id]['sex_ratio'] : 0}}"></td>
                                    <td class="text-center">{{$tahun}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary legitRipple">Simpan Data <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /basic datatable -->
    </div>
@endsection

@section('footscript')
    <script>
		function hitung(num)
        {
            var laki_laki=$('#laki_laki_'+num).val();
            var perempuan=$('#perempuan_'+num).val();
            var jlh=parseInt(laki_laki) + parseInt(perempuan);
            $('#jlh_'+num).val(jlh);
        }
    </script>
    
@endsection