@extends('layouts.master')

@section('title')
    <title>Kependudukan - Angka Index IPG, IPM & IDG : Sistem Informasi Statistik Kabupaten Tangerang Tahun {{$tahun}}</title>
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
                            <li><a href="">Kependudukan</a></li>
                            <li class="active">{{ $kategori->judul }} Tahun {{$tahun}}</li>
                        </ul>

                        @if (Auth::check())
                            <ul class="breadcrumb-elements">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle legitRipple" data-toggle="dropdown">
                                        <i class="icon-cog5 position-left"></i>
                                        Aksi
                                        <span class="caret"></span>
                                    </a>
                                    
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        @if (count($data)==0)
                                            <li><a href="{{ route('angka-index.create', [$kategori->id,$tahun]) }}"><i class="icon-googleplus5 pull-right"></i> Tambah Data</a></li>
                                        @else
                                            <li><a href="{{ route('angka-index.edit', [$kategori->id,$tahun]) }}"><i class="icon-googleplus5 pull-right"></i> Ubah Data</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        
        <div class="panel panel-flat">
            <div class="panel-heading">
                <div class="row" style="width:30%;float:left;margin-bottom:10px;">
                    <div class="col-md-4">
                        <h5 class="panel-title" style="margin-top:5px;">Pilih Tahun</h5>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="tahun" id="tahun" data-placeholder="Tahun" placeholder="Tahun" onchange="loaddata(this.value)">
                            @for ($i = (date('Y')-5); $i <= date('Y'); $i++)
                                @if ($i==$tahun)
                                    <option value="{{$i}}" selected="selected">{{$i}}</option>
                                @else
                                    <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            <div style="padding:15px;">
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
                                <td>{{ $item->name}}</td>
                                <td class="text-right">{{isset($data[$item->id]['ipm']) ? number_format($data[$item->id]['ipm'],2,',','.') : '-'}}</td>
                                <td class="text-center">{{isset($data[$item->id]['ipg']) ? number_format($data[$item->id]['ipg'],2,',','.') : '-'}}</td>
                                <td class="text-right">{{isset($data[$item->id]['idg']) ? number_format($data[$item->id]['idg'],2,',','.') : '-'}}</td>
                                <td class="text-center">{{$tahun}}</td>
                            </tr>
                        @endforeach
                            <tr>
                                <td class="text-center">    
                                    {{ $number }}
                                </td>
                                <td>PROVINSI BANTEN</td>
                                <td class="text-right">{{isset($data[36]['ipm']) ? number_format($data[36]['ipm'],2,',','.') : '-'}}</td>
                                <td class="text-center">{{isset($data[36]['ipg']) ? number_format($data[36]['ipg'],2,',','.') : '-'}}</td>
                                <td class="text-right">{{isset($data[36]['idg']) ? number_format($data[36]['idg'],2,',','.') : '-'}}</td>
                                <td class="text-center">{{$tahun}}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic datatable -->
    </div>
@endsection

@section('footscript')
    <script>
        var APP_URL='{{url("/")}}';
		function loaddata(tahun)
        {
            location.href=APP_URL+'/kependudukan/angka-index/{{$kategori->id}}/'+tahun;
        }
    </script>
    
@endsection