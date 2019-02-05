@extends('layouts.master')

@section('title')
    <title>Wilayah : Sistem Informasi Statistik Kabupaten Tangerang</title>
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
                            <li><a href="">Wilayah</a></li>
                            <li class="active">{{ $kategori->judul }}</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle legitRipple" data-toggle="dropdown">
                                    <i class="icon-cog5 position-left"></i>
                                    Aksi
                                    <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @if (count($data)==0)
                                        <li><a href="{{ route('wilayah-luas-jlh-kecamatan.create', [$kategori->id,$tahun]) }}"><i class="icon-googleplus5 pull-right"></i> Tambah Data</a></li>
                                    @else
                                        <li><a href="{{ route('wilayah-luas-jlh-kecamatan.edit', [$kategori->id,$tahun]) }}"><i class="icon-googleplus5 pull-right"></i> Ubah Data</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        
        <div class="panel panel-flat">
            <div style="padding:15px;">
                <table class="table datatable-basic table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kecamatan</th>
                            <th>Luas Wilayah (Km<sup>2</sup>)</th>
                            <th>Jumlah Desa</th>
                            <th>Jumlah Kelurahan</th>
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
                                <td>{{isset($data[$item->id]['luas_wilayah']) ? $data[$item->id]['luas_wilayah'] : '-'}}</td>
                                <td>{{isset($data[$item->id]['jumlah_desa']) ? $data[$item->id]['jumlah_desa'] : '-'}}</td>
                                <td>{{isset($data[$item->id]['jumlah_kelurahan']) ? $data[$item->id]['jumlah_kelurahan'] : '-'}}</td>
                                <td class="text-center">{{$tahun}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic datatable -->
    </div>
@endsection

@section('footscript')
    <script>
		
    </script>
    
@endsection