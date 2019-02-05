@extends('layouts.master')

@section('title')
    <title>Pendidikan Sekolah : Sistem Informasi Statistik Kabupaten Tangerang</title>
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
                                <span class="left-margin-for-header">{{ $kategori->judul }} Tahun {{ $tahun }}</span>
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
                            <li><a href="">Pendidikan Sekolah</a></li>
                            <li class="active">Edit Data</li>
                        </ul>

                        <a href="{{route('jumlah-murid.index',[$id_kategori,$tahun])}}" class="btn btn-xs btn-primary pull-right" style="margin-top:5px;"><i class="icon-arrow-left52"></i> Kembali</a>
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
            <div class="panel-body">
                <form action="{{route('jumlah-murid.update',[$id_kategori,$tahun])}}" method="post">
                    @csrf
                    <div style="padding:0px;">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center">#</th>
                                <th rowspan="2" class="text-center">Kecamatan</th>
                                
                                @foreach ($jenjang as $item)    
                                    <th colspan="2" class="text-center">{{$item}}</th>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($jenjang as $item)    
                                    <th class="text-center">L</th>
                                    <th class="text-center">P</th>
                                @endforeach
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kecamatan as $key => $item)
                                <tr>
                                    <td class="text-center">{{ $key = $key + 1 }}</td>
                                    <td>{{$item->nama_kecamatan}}</td>
                                    @foreach ($jenjang as $idxjg=> $jg)
                                        @php
                                            if(isset($data[$item->id][$idxjg]['jumlah_laki']))
                                                $jlh_lk=$data[$item->id][$idxjg]['jumlah_laki'];
                                            else
                                                $jlh_lk=0;
                                            
                                            if(isset($data[$item->id][$idxjg]['jumlah_perempuan']))
                                                $jlh_pr=$data[$item->id][$idxjg]['jumlah_perempuan'];
                                            else
                                                $jlh_pr=0;
                                        @endphp
                                        <td class="text-center"><input type="text" class="form-control text-right" value="{{$jlh_lk}}" name="jumlah_laki[{{$item->id}}][{{$idxjg}}]"></td>
                                        <td class="text-center"><input type="text" class="form-control text-right" value="{{$jlh_pr}}" name="jumlah_perempuan[{{$item->id}}][{{$idxjg}}]"></td>
                                    @endforeach
                                </tr>
                            @endforeach
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
    
@endsection