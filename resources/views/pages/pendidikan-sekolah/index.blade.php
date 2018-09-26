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
                                    @if ($data->count()==0)
                                        <li><a href="{{ route('pendidikan-sekolah.create',array($jenjang,$kategori->id)) }}"><i class="icon-googleplus5 pull-right"></i> Tambah Data</a></li>
                                    @else
                                        <li><a href="{{ route('pendidikan-sekolah.edit',array($jenjang,$kategori->id)) }}"><i class="icon-googleplus5 pull-right"></i> Ubah Data</a></li>
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
            <div class="panel-heading">
                <h5 class="panel-title">Basic bar chart</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
    
            <div class="panel-body">
                <div class="chart-container">
                    {{-- <div class="chart has-fixed-height" id="basic_bars"></div> --}}
                    Chart Here..
                </div>
            
       
                <table class="table datatable-basic table-bordered table-striped">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center">#</th>
                            <th rowspan="2" class="text-center">Kecamatan</th>
                            @php
                                $jjg=explode('-',$jenjang)
                            @endphp
                            @foreach ($jjg as $item)    
                                <th colspan="3" class="text-center">Angka Masuk Kasar {{strtoupper($item)}}</th>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($jjg as $item)    
                                <th class="text-center">L</th>
                                <th class="text-center">P</th>
                                <th class="text-center">L+P</th>
                            @endforeach
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kecamatan as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key = $key + 1 }}</td>
                                <td>{{$item->nama_kecamatan}}</td>
                                @foreach ($jjg as $jg)
                                    <td class="text-center">
                                        @php
                                            $lk=$pr=$jlh=0;
                                            if(isset($det[$item->id][$jg]['P']))
                                            {
                                                $pr=$det[$item->id][$jg]['P'];
                                            }
                                            if(isset($det[$item->id][$jg]['L']))
                                            {
                                                $lk=$det[$item->id][$jg]['L'];
                                            }
                                        @endphp
                                        {{$lk}}
                                    </td>
                                    <td class="text-center">{{$pr}}</td>
                                    <td class="text-center">{{($pr+$lk)}}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <!-- /basic datatable -->
        </div>
    </div>
@endsection

@section('footscript')
     <script type="text/javascript" src="{{asset('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>

    <script>
    $(document).ready(function(){
        $('.datatable-basic').DataTable({
            autoWidth: false,
            iDisplayLength: -1,
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
            },
            drawCallback: function () {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
            },
            preDrawCallback: function() {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            }
        });
    });
    </script>
@endsection