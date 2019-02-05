@extends('layouts.master')

@section('title')
    <title>Form Edit Data Angka Index IPM, IPG & IDG : Sistem Informasi Statistik Kabupaten Tangerang</title>
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
                            <li><a href="{{route('angka-index.index',[$id_kategori,$tahun])}}">Kependudukan</a></li>
                            <li class="active">{{ $kategori->judul }} Tahun {{$tahun}}</li>
                        </ul>

                        <a href="{{route('angka-index.index',[$id_kategori,$tahun])}}" class="btn btn-xs btn-primary pull-right" style="margin-top:5px;"><i class="icon-arrow-left52"></i> Kembali</a>
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
                <form action="{{route('angka-index.update',[$id_kategori,$tahun])}}" method="post">
                    @csrf
                    <table class="table datatable-basic table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kabupaten/Kota/Provinsi</th>
                                <th class="text-center">IPM</th>
                                <th class="text-center">IPG</th>
                                <th class="text-center">IDG</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($kota as $item)
                                <tr>
                                    <td class="text-center">    
                                        {{ $number }}
                                            @php
                                                $number++;
                                            @endphp
                                    </td>
                                    <td class="text-left">{{ $item->name }}</td>
                                    <td class="text-center"><input type="text" class="form-control text-center" style="width:100px;"   name="ipg[{{$item->id}}]" value="{{isset($data[$item->id]['ipg']) ? $data[$item->id]['ipg'] :0}}"></td>
                                    <td class="text-center"><input type="text" class="form-control text-center" style="width:100px;"   name="ipm[{{$item->id}}]" value="{{isset($data[$item->id]['ipm']) ? $data[$item->id]['ipm'] :0}}"></td>
                                    <td class="text-center"><input type="text" class="form-control text-center" style="width:100px;"   name="idg[{{$item->id}}]" value="{{isset($data[$item->id]['idg']) ? $data[$item->id]['idg'] :0}}"></td>
                                    <td class="text-center">{{$tahun}}</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td class="text-center">    
                                        {{ $number }}
                                    </td>
                                    <td>PROVINSI BANTEN</td>
                                    <td class="text-center"><input type="text" class="form-control text-center" style="width:100px;"   name="ipg[36]" value="{{isset($data[36]['ipg']) ? $data[$item->id]['ipg'] :0}}"></td>
                                    <td class="text-center"><input type="text" class="form-control text-center" style="width:100px;"   name="ipm[36]" value="{{isset($data[36]['ipm']) ? $data[$item->id]['ipm'] :0}}"></td>
                                    <td class="text-center"><input type="text" class="form-control text-center" style="width:100px;"   name="idg[36]" value="{{isset($data[36]['idg']) ? $data[$item->id]['idg'] :0}}"></td>                                    
                                    <td class="text-center">{{$tahun}}</td>
                                </tr>
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
            var laki_laki=parseFloat($('#laki_laki_'+num).val());
            var perempuan=parseFloat($('#perempuan_'+num).val());
            var jlh=(laki_laki) + (perempuan);
            var persen_lk=0;
            var persen_pr=0;

            persen_lk = (laki_laki * 100 ) / jlh;
            persen_pr = (perempuan * 100 ) / jlh;

            $('#persen_laki_laki_'+num).val(persen_lk.toFixed(2));
            $('#persen_perempuan_'+num).val(persen_pr.toFixed(2));
        }
    </script>
    
@endsection