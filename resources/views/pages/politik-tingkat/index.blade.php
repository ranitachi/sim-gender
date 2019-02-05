@extends('layouts.master')

@section('title')
    <title>Kependudukan : Sistem Informasi Statistik Kabupaten Tangerang</title>
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
                                <span class="left-margin-for-header">{{ $kategori->judul }} Tahun {{ $tahun }}</span>
                            </h5>
                        <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
                    </div>
                    
                    <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                        <ul class="breadcrumb">
                            <li><a href="{{ route('subyek.index', $kategori->subyek->nama_subyek) }}"><<&nbsp; Kembali</a></li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle legitRipple" data-toggle="dropdown">
                                    <i class="icon-calendar position-left"></i>
                                    Tahun {{ $tahun }}
                                    <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @if ($tahun_tersedia->count()!=0)
                                        @foreach ($tahun_tersedia as $item)
                                            <li><a href="{{ route('politik-tingkat.index', [$kategori->id, $item]) }}">{{ $item }}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="{{ route('politik-tingkat.index', [$kategori->id, date('Y')]) }}">{{ date('Y') }}</a></li>
                                    @endif
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle legitRipple" data-toggle="dropdown">
                                    <i class="icon-cog5 position-left"></i>
                                    Aksi
                                    <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{ route('politik-tingkat.create', [$kategori->id, $tahun]) }}">Tambah Data Baru</a></li>
                                    <li><a href="{{ route('politik-tingkat.edit', [$kategori->id, $tahun]) }}">Ubah Data {{ $tahun }}</a></li>
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
                    <div id="container" style="width: 100%; height:300px;">
                        <canvas id="canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-flat">
            @php
                $ts = 0;
                $sd = 0;
                $sltp = 0;
                $slta = 0;
                $pt = 0;
            @endphp
            @foreach ($data as $key => $item)
                @php
                    $ts += $item->ts;
                    $sd += $item->sd;
                    $sltp += $item->sltp;
                    $slta += $item->slta;
                    $pt += $item->pt;
                @endphp
            @endforeach

            <div style="margin:20px 0 0 20px;">
                <h6>Total Jumlah Tidak Sekolah : &nbsp;&nbsp;<strong>{{ $ts }}</strong></h6>
                <h6>Total Jumlah SD : &nbsp;&nbsp;<strong>{{ $sd }}</strong></h6>
                <h6>Total Jumlah SLTP : &nbsp;&nbsp;<strong>{{ $sltp }}</strong></h6>
                <h6>Total Jumlah SLTA : &nbsp;&nbsp;<strong>{{ $slta }}</strong></h6>
                <h6>Total Jumlah PT : &nbsp;&nbsp;<strong>{{ $pt }}</strong></h6>
            </div>

            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th style="width:30px;">#</th>
                        <th>Jenis Kelamin</th>
                        <th>Tidak Sekolah</th>
                        <th>SD</th>
                        <th>SLTP</th>
                        <th>SLTA</th>
                        <th>PT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key = $key + 1 }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->ts }}</td>
                            <td>{{ $item->sd }}</td>
                            <td>{{ $item->sltp }}</td>
                            <td>{{ $item->slta }}</td>
                            <td>{{ $item->pt }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->
    </div>
@endsection

@section('footscript')
    <script>
        $('.datatable-basic').DataTable({
            autoWidth: false,
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
    </script>

    <script>
		var color = Chart.helpers.color;
		var horizontalBarChartData = {
			labels: [
                @foreach($chart_jk as $item)
                    '{{ $item }}',
                @endforeach
            ],
			datasets: [{
				label: 'Tidak Sekolah',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
					@foreach($chart_ts as $item)
                        {{ $item }},
                    @endforeach
				]
			}, {
				label: 'SD',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					@foreach($chart_sd as $item)
                        {{ $item }},
                    @endforeach
				]
			}, {
				label: 'SLTP',
				backgroundColor: color(window.chartColors.grnee).alpha(0.5).rgbString(),
				borderColor: window.chartColors.green,
				borderWidth: 1,
				data: [
					@foreach($chart_sltp as $item)
                        {{ $item }},
                    @endforeach
				]
			}, {
				label: 'SLTA',
				backgroundColor: color(window.chartColors.yellow).alpha(0.5).rgbString(),
				borderColor: window.chartColors.yellow,
				borderWidth: 1,
				data: [
					@foreach($chart_slta as $item)
                        {{ $item }},
                    @endforeach
				]
			}, {
				label: 'PT',
				backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
				borderColor: window.chartColors.orange,
				borderWidth: 1,
				data: [
					@foreach($chart_pt as $item)
                        {{ $item }},
                    @endforeach
				]
			}]
		};

		window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
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
						text: 'Grafik {{ $kategori->judul }}'
                    },
                    maintainAspectRatio: false,
				}
			});

		};
	</script>
@endsection