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
                            <li class="active">Edit Data</li>
                        </ul>

                        <a href="{{route('kematian-bayi.index',[$id_kategori,$tahun])}}" class="btn btn-xs btn-primary pull-right" style="margin-top:5px;"><i class="icon-arrow-left52"></i> Kembali</a>
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
                <form action="{{ route('kematian-bayi.update', array($kategori->id,$tahun)) }}" method="post">
                    @csrf
                    <div style="padding:0px;">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Penyebab Kematian Ibu</th>
                                {{-- <th class="text-center">Jumlah</th> --}}
                                <th class="text-center">Persentase (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                                $x=0;
                            @endphp
                            @foreach ($jenis as $key=>$item)
                            
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td class="text-left">{{$item}}</td>
                                {{-- <td class="text-right"> 
                                    <input type="text" class="form-control text-center jumlah" onkeyup="hitung()" id="jumlah_{{$x}}" name="jumlah[{{$key}}]" value="{{isset($data[$key]['jumlah']) ? number_format($data[$key]['jumlah'],0,',','.') : 0}}">    
                                </td> --}}
                                <td class="text-center"> 
                                    <input type="text" class="form-control text-center persen"  id="persentase_{{$x}}" name="persentase[{{$key}}]" value="{{isset($data[$key]['persentase']) ? number_format($data[$key]['persentase'],2,',','.') : 0}}">    
                                </td>
                            </tr>
                            @php
                                $x++;
                            @endphp
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
    <script>
        function hitung()
        {
            var total=0;
            $('input.jumlah').each(function(i){
                var n=parseFloat($(this).val());
                total+=n;
            });

            $('input.persen').each(function(i){
                var n=parseFloat($(this).val());
                var j=parseFloat($('#jumlah_'+i).val());
                var persen = (j * 100) / total;
                $('#persentase_'+i).val(persen.toFixed(2));
            });
        }
    </script>
@endsection