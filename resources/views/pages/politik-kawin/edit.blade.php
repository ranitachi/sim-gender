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
                                <span class="left-margin-for-header">{{ $kategori->judul }} Tahun {{ $tahun }}</span>    
                            </h5>
                        </div>
                    
                        <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                            <ul class="breadcrumb">
                                <li><a href="{{ route('subyek.index', $kategori->subyek->nama_subyek) }}"><<&nbsp; Kembali</a></li>                                
                            </ul>
                        </div>
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
                <form action="{{ route('politik-kawin.update', [$kategori->id, $tahun]) }}" method="post">
                    @csrf
                    @method('put')
                    Tahun: <input type="text" class="form-control" value="{{ $tahun }}" readonly>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:30px;">#</th>
                                <th>Jenis Kelamin</th>
                                <th>Belum Kawin</th>
                                <th>Kawin</th>
                                <th>Cerai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key = $key + 1 }}</td>
                                    <td>
                                        <input type="text" class="form-control" readonly name="jk[]" value="{{ $item->jenis_kelamin }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="belum_kawin[]" value="{{ $item->belum_kawin }}" required>
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="kawin[]" value="{{ $item->kawin }}" required>
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="cerai[]" value="{{ $item->cerai }}" required>
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