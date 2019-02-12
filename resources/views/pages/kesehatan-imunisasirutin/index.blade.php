@extends('layouts.master')

@section('title')
    <title>Pendidikan Sekolah : Sistem Informasi Statistik Kabupaten Tangerang</title>
    <script type="text/javascript" src="{{ asset('/') }}chartjs/Chart.bundle.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}chartjs/util.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('/') }}js/datalabel.js"></script> --}}
    <style>
        .left-margin-for-header {
            margin-left: 27px;
        }
    </style>
@endsection

@section('konten')
<script>
        var ctx='';
        function grafik(selector,jenjang)
        {
            var color = Chart.helpers.color;
            var horizontalBarChartData = {
                    labels: <?php echo json_encode($jenis2);?>,
                    datasets: <?php echo json_encode($chart);?>,
                };

                ctx = document.getElementById(selector).getContext('2d');
                window.myHorizontalBar = new Chart(ctx, {
                    type: 'bar',
                    data: horizontalBarChartData,
                    options: {
                        elements: {
                            rectangle: {
                                borderWidth: 2,
                            }
                        },
                        responsive: true,
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Persentase Cakupan (%)'
                        },
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });    
        }
</script>
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
                            <li><a href="">Kesehatan</a></li>
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
                                            <li><a href="{{ route('imunisasi-rutin.create',array($kategori->id,$tahun)) }}"><i class="icon-googleplus5 pull-right"></i> Tambah Data</a></li>
                                        @else
                                            <li><a href="{{ route('imunisasi-rutin.edit',array($kategori->id,$tahun)) }}"><i class="icon-googleplus5 pull-right"></i> Ubah Data</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        @endif
                        <div class="row pull-right" style="width:30%;float:right;margin-top:2px;">
                            
                            <div class="col-md-4 pull-right">
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
                            <div class="col-md-3 pull-right">
                                <h5 class="panel-title" style="margin-top:5px;">Tahun</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Grafik</h5>
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
                        <div class="text-center"><h5>Grafik {{ $kategori->judul }} Tahun {{$tahun}}</h5></div>
                            <div id="container" style="width:100%; height:400px;float:left">
                                <canvas id="canvas_1"></canvas>
                            </div>
                        <script>
                            grafik('canvas_1' , 'tk');
                        </script>
                    </div>
                </div> 
                @php
                    $jlh_lk=$jlh_pr=$jlh_rasio=array();
                    $nomor=1;
                    
                @endphp
                <div style="padding:15px;">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2">#</th>
                                <th class="text-center" rowspan="2">Jenis Imunisasi</th>
                                <th class="text-center" colspan="5">Cakupan (%)</th>
                                {{-- <th class="text-center">Persentase (%)</th> --}}
                            </tr>
                            <tr>
                                @for ($i = (date('Y')-4); $i <= date('Y'); $i++)
                                    <th class="text-center">{{$i}}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($jenis as $key=>$item)
                            
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td class="text-left">{{$item}}</td>
                                @for ($i = (date('Y')-4); $i <= date('Y'); $i++)
                                    <td class="text-right">{{isset($data[$item][$i]['jumlah']) ? number_format($data[$item][$i]['jumlah'],0,',','.') : 0}}</td>
                                @endfor
                                {{-- <td class="text-center">{{isset($data[$key]['persentase']) ? number_format($data[$key]['persentase'],2,',','.') : 0}}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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

    function loaddata(tahun)
        {
            location.href='{{url("/kesehatan/imunisasi-rutin/".$id_kategori)}}/'+tahun;
        }
	</script>
@endsection