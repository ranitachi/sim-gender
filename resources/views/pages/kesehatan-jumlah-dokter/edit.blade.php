@extends('layouts.master')

@section('title')
    <title>Jumlah Dokter Spesialis, Umum dan Gigi : Sistem Informasi Statistik Kabupaten Tangerang</title>
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
                          <li><a href="">Jumlah Dokter</a></li>
                            <li class="active">Ubah Data</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Formulir Ubah Data<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{ route('kesehatan-jumlah-dokter.update', array($kategori->id)) }}" method="post">
                    @csrf
                    @method('put')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Unit Kerja</th>
                                <th class="text-center">Dokter Spesialis</th>
                                <th class="text-center">Dokter Umum</th>
                                <th class="text-center">Dokter Gigi</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach ($unit_kerja as $key => $item)
                            @php
                                $sp=$um=$gi=rand(10,100);
                                
                                $idx=str_slug($item);
                                if(isset($det[$idx]['dokter_spesialis']))
                                {
                                    $sp=$det[$idx]['dokter_spesialis'];
                                }
                                if(isset($det[$idx]['dokter_umum']))
                                {
                                    $um=$det[$idx]['dokter_umum'];
                                }
                                if(isset($det[$idx]['dokter_gigi']))
                                {
                                    $gi=$det[$idx]['dokter_gigi'];
                                }
                            @endphp
                                <tr>
                                    <td>{{ $key = $key + 1 }}</td>
                                    <td>
                                        <input type="hidden" class="form-control" name="unit_kerja[{{str_slug($item)}}]" value="{{ ($item) }}">
                                        <input type="text" class="form-control" readonly value="{{ $item }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control text-center" name="dokter_spesialis[{{str_slug($item)}}]" value="{{$sp}}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control text-center" name="dokter_umum[{{str_slug($item)}}]" value="{{$um}}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control text-center" name="dokter_gigi[{{str_slug($item)}}]" value="{{$gi}}">
                                    </td>
                                    
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