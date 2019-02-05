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
                            </h5>
                        <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
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
                <form action="{{ route('kependudukan-balita.store', [$kategori->id, $tahun]) }}" method="post">
                    @csrf
                    Tahun: <input type="number" class="form-control" name="tahun" required autocomplete="off">
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:30px;">#</th>
                                <th>Kecamatan</th>
                                <th>Balita Terlantar (L)</th>
                                <th>Balita Terlantar (P)</th>
                                <th>Anak Terlantar (L)</th>
                                <th>Anak Terlantar (P)</th>
                                <th>Anak Bermasalah (L)</th>
                                <th>Anak Bermasalah (P)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kecamatan as $key => $item)
                                <tr>
                                    <td>{{ $key = $key + 1 }}</td>
                                    <td>
                                        <input type="hidden" class="form-control" name="id_kecamatan[]" value="{{ $item->id }}">
                                        <input type="text" class="form-control" readonly value="{{ $item->nama_kecamatan }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="balita_l[]" value="123" required>
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="balita_p[]" value="123" required>
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="terlantar_l[]" value="123" required>
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="terlantar_p[]" value="123" required>
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="bermasalah_l[]" value="123" required>
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="bermasalah_p[]" value="123" required>
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