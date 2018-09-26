@extends('layouts.master')

@section('title')
    <title>Presentase Penduduk Tamat Pendidikan : Sistem Informasi Statistik Kabupaten Tangerang</title>
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
                            <li><a href="">Pendidikan Sekolah</a></li>
                            <li><a href="">Pendidikan yang Ditamatkan</a></li>
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
                <form action="{{ route('pendidikan-ditamatkan.store', array($kategori->id)) }}" method="post">
                    @csrf
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th rowspan="2" class="text-center">#</th>
                            <th rowspan="2" class="text-center">Kecamatan</th>
                            <th colspan="5" class="text-center">Pendidikan Yang Ditamatkan</th>  
                        </tr>
                        <tr>
                            @php
                                $jjg=array('bawah_sd'=>'<SD','sd'=>'SD / Sederajat','smp'=>'SMP','sma'=>'SMA','pt'=>'Perguruan Tinggi');
                            @endphp
                            @foreach ($jjg as $item)    
                                <th class="text-center" style="width:150px">{{$item}}</th>
                            @endforeach
                                
                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($kecamatan as $key => $item)
                                <tr>
                                    <td>{{ $key = $key + 1 }}</td>
                                    <td>
                                        <input type="hidden" class="form-control" name="id_kecamatan[{{$item->id}}]" value="{{ $item->id }}">
                                        <input type="text" class="form-control" readonly value="{{ $item->nama_kecamatan }}">
                                    </td>
                                    @foreach ($jjg as $idx_jg=>$jg)
                                        <td>
                                            <input type="number" max="100" min="0" class="form-control text-center" name="jumlah[{{$idx_jg}}][{{$item->id}}]">
                                        </td>
                                    @endforeach
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
    </div>
@endsection

@section('footscript')
    
@endsection