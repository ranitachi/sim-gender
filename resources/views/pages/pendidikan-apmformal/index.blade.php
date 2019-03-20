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
            if(jenjang=='tk')
            {
                // alert(jenjang)
                var dtL=[
                        @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['tk']['L']) ? $det[$ix]['tk']['L'] : 0}},
                        @endforeach
                    ];
                var dtP=[
                        @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['tk']['P']) ? $det[$ix]['tk']['P'] : 0}},
                        @endforeach
                    ];
            }
            if(jenjang=='ra')
            {
                var dtL=[
                    @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['ra']['L']) ? $det[$ix]['ra']['L'] : 0}},
                        @endforeach
                    ];
                var dtP=[
                    @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['ra']['P']) ? $det[$ix]['ra']['P'] : 0}},
                        @endforeach
                    ];
            }
            if(jenjang=='sd')
            {
                var dtL=[
                        @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['sd']['L']) ? $det[$ix]['sd']['L'] : 0}},
                        @endforeach
                    ];
                var dtP=[
                        @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['sd']['P']) ? $det[$ix]['sd']['P'] : 0}},
                        @endforeach
                    ];
            }
            if(jenjang=='mi')
            {
                var dtL=[
                    @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['mi']['L']) ? $det[$ix]['mi']['L'] : 0}},
                        @endforeach
                    ];
                var dtP=[
                    @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['mi']['P']) ? $det[$ix]['mi']['P'] : 0}},
                        @endforeach
                    ];
            }
            if(jenjang=='smp')
            {
                var dtL=[
                        @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['smp']['L']) ? $det[$ix]['smp']['L'] : 0}},
                        @endforeach
                    ];
                var dtP=[
                        @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['smp']['P']) ? $det[$ix]['smp']['P'] : 0}},
                        @endforeach
                    ];
            }
            if(jenjang=='mts')
            {
                var dtL=[
                    @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['mts']['L']) ? $det[$ix]['mts']['L'] : 0}},
                        @endforeach
                    ];
                var dtP=[
                    @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['mts']['P']) ? $det[$ix]['mts']['P'] : 0}},
                        @endforeach
                    ];
            }
            if(jenjang=='sma')
            {
                var dtL=[
                        @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['sma']['L']) ? $det[$ix]['sma']['L'] : 0}},
                        @endforeach
                    ];
                var dtP=[
                        @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['sma']['P']) ? $det[$ix]['sma']['P'] : 0}},
                        @endforeach
                    ];
            }
            if(jenjang=='smk')
            {
                var dtL=[
                    @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['smk']['L']) ? $det[$ix]['smk']['L'] : 0}},
                        @endforeach
                    ];
                var dtP=[
                    @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['smk']['P']) ? $det[$ix]['smk']['P'] : 0}},
                        @endforeach
                    ];
            }
            if(jenjang=='ma')
            {
                var dtL=[
                    @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['ma']['L']) ? $det[$ix]['ma']['L'] : 0}},
                        @endforeach
                    ];
                var dtP=[
                    @foreach($chart_kecamatan as $ix=>$kec)
                            {{ isset($det[$ix]['ma']['P']) ? $det[$ix]['ma']['P'] : 0}},
                        @endforeach
                    ];
            }

            var color = Chart.helpers.color;
            var horizontalBarChartData = {
                labels: [
                    @foreach($chart_kecamatan as $item)
                        '{{ $item }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Laki - Laki (L)',
                    backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.red,
                    borderWidth: 1,
                    data: dtL
                },
                {
                    label: 'Perempuan (P)',
                    backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.blue,
                    borderWidth: 1,
                    data: dtP
                }]

            };

                ctx = document.getElementById(selector).getContext('2d');
                window.myHorizontalBar = new Chart(ctx, {
                    type: 'horizontalBar',
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
                            text: 'Angka Masuk Kasar '+jenjang.toUpperCase()
                        },
                        maintainAspectRatio: false,
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
                            <li><a href="{{url('subyek/pendidikan')}}">Pendidikan Sekolah</a></li>
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
                                            <li><a href="{{ route('apm-formal.create',array($kategori->id,$tahun)) }}"><i class="icon-googleplus5 pull-right"></i> Tambah Data</a></li>
                                        @else
                                            <li><a href="{{ route('apm-formal.edit',array($kategori->id,$tahun)) }}"><i class="icon-googleplus5 pull-right"></i> Ubah Data</a></li>
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
    
            
            @php
                // $jjg=explode('-',$jenjang);
                // $lebar=99/count($jjg);
            @endphp
            
               {{-- <div class="panel-body">
                    <div class="chart-container">
                        <div class="text-center"><h5>Grafik {{ $kategori->judul }}</h5></div>
                        @foreach ($jjg as $idx=>$item)    
                            <div id="container" style="width: {{$lebar}}%; height:1000px;float:left">
                                <canvas id="canvas_{{$idx+1}}"></canvas>
                            </div>
                        @endforeach
                        <script>
                            var jjd="{{count($jjg)}}";
                            var i;
                            for(i=0;i<jjd;i++)
                            {
                                if(i==0)
                                    var jen='{{isset($jjg[0]) ? $jjg[0] : ""}}';
                                else if(i==1)
                                    var jen='{{isset($jjg[1]) ? $jjg[1] : ""}}';
                                else if(i==2)
                                    var jen='{{isset($jjg[2]) ? $jjg[2] : ""}}';

                                // grafik('canvas_'+(i+1) , jen);
                            }
                            // grafik('canvas_1' , 'tk');
                            // grafik('canvas_2' , 'ra');
                        </script>
                    </div>
                </div> --}}
                @php
                    $jlh_lk=$jlh_pr=$jlh_rasio=array();
                    $nomor=1;
                @endphp
                <div style="padding:15px;">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Karateristik</th>
                                @foreach ($jenjang as $idx=>$item)
                                    <th class="text-center">{{$item}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th colspan="{{(count($jenjang) + 1)}}"><b>Jenis Kelamin</b></th>
                            </tr>
                            <tr>
                                <td class="text-left">Laki Laki</td>
                                @foreach ($jenjang as $idx_jen=>$item)
                                    <td class="text-center">{{isset($data[$idx_jen]['laki_laki']) ? number_format($data[$idx_jen]['laki_laki'],2,',','.') : 0}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="text-left">Perempuan</td>
                                @foreach ($jenjang as $idx_jen=>$item)
                                    <td class="text-center">{{isset($data[$idx_jen]['perempuan']) ? number_format($data[$idx_jen]['perempuan'],2,',','.') : 0}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th colspan="{{(count($jenjang) + 1)}}"><b>Kuantal Pengeluaran</b></th>
                            </tr>
                            @for ($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td class="text-left">Kuantal {{$i}}</td>
                                    @foreach ($jenjang as $idx_jen=>$item)
                                        <td class="text-center">{{isset($data[$idx_jen][('kuantal_'.$i)]) ? number_format($data[$idx_jen][('kuantal_'.$i)],2,',','.'): 0}}</td>
                                    @endforeach
                                </tr>
                            @endfor
                           
                            <tr>
                                <td class="text-right"><b>Kabupaten Tangerang</b></td>
                                @foreach ($jenjang as $idx_jen=>$item)
                                    <td class="text-center">{{isset($data[$idx_jen]['kab_tangerang']) ? number_format($data[$idx_jen]['kab_tangerang'],2,',','.') : 0}}</td>
                                @endforeach
                            </tr>
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
            location.href='{{url("/pendidikan/apm-formal/".$id_kategori)}}/'+tahun;
        }
	</script>
@endsection