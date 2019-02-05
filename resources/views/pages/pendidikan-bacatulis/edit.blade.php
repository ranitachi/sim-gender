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
                            <li class="active">Edit Data</li>
                        </ul>

                        <a href="{{route('baca-tulis.index',[$id_kategori,$tahun])}}" class="btn btn-xs btn-primary pull-right" style="margin-top:5px;"><i class="icon-arrow-left52"></i> Kembali</a>
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
                <form action="{{ route('baca-tulis.update', array($kategori->id,$tahun)) }}" method="post">
                    @csrf
                    <div style="padding:0px;">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                @foreach ($jenis as $item)
                                    <th class="text-center">{{$item}}</th>
                                @endforeach
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
                                        <input type="text" class="form-control text-center" name="laki_laki[{{$idx_jen}}]" value="{{isset($data[$idx_jen]['laki_laki']) ? number_format($data[$idx_jen]['laki_laki'],2,',','.') : 0}}">    
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="text-right">Perempuan</td>
                                @foreach ($jenis as $idx_jen=>$item)
                                    <td class="text-center">
                                        <input type="text" class="form-control text-center" name="perempuan[{{$idx_jen}}]" value="{{isset($data[$idx_jen]['perempuan']) ? number_format($data[$idx_jen]['perempuan'],2,',','.') : 0}}">        
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th colspan="{{(count($jenis) + 1)}}"><b>Kuantal Pengeluaran</b></th>
                            </tr>
                            @for ($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td class="text-right">Kuantal {{$i}}</td>
                                    @foreach ($jenis as $idx_jen=>$item)
                                        <td class="text-center">
                                            <input type="text" class="form-control text-center" name="kuantal_{{$i}}[{{$idx_jen}}]" value="{{isset($data[$idx_jen][('kuantal_'.$i)]) ? number_format($data[$idx_jen][('kuantal_'.$i)],2,',','.') : 0}}">    
                                        </td>
                                    @endforeach
                                </tr>
                            @endfor
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