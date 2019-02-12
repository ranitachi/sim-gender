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
                                                <li><a href="{{ route('politik-kawin.index', [$kategori->id, $item]) }}">{{ $item }}</a></li>
                                            @endforeach
                                        @else
                                            <li><a href="{{ route('politik-kawin.index', [$kategori->id, date('Y')]) }}">{{ date('Y') }}</a></li>
                                        @endif
                                    </ul>
                                </li>
                        @if (Auth::check())

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle legitRipple" data-toggle="dropdown">
                                        <i class="icon-cog5 position-left"></i>
                                        Aksi
                                        <span class="caret"></span>
                                    </a>
                                    
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ route('politik-kawin.create', [$kategori->id, $tahun]) }}">Tambah Data Baru</a></li>
                                        <li><a href="{{ route('politik-kawin.edit', [$kategori->id, $tahun]) }}">Ubah Data {{ $tahun }}</a></li>
                                    </ul>
                                </li>
                                @endif
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
                $belum_kawin = 0;
                $kawin = 0;
                $cerai = 0;
            @endphp
            @foreach ($data as $key => $item)
                @php
                    $belum_kawin += $item->belum_kawin;
                    $kawin += $item->kawin;
                    $cerai += $item->cerai;
                @endphp
            @endforeach

            <div style="margin:20px 0 0 20px;">
                <h6>Total Jumlah Belum Kawin : &nbsp;&nbsp;<strong>{{ $belum_kawin }}</strong></h6>
                <h6>Total Jumlah Kawin : &nbsp;&nbsp;<strong>{{ $kawin }}</strong></h6>
                <h6>Total Jumlah Cerai : &nbsp;&nbsp;<strong>{{ $cerai }}</strong></h6>
            </div>

            <table class="table datatable-basic">
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
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->belum_kawin }}</td>
                            <td>{{ $item->kawin }}</td>
                            <td>{{ $item->cerai }}</td>
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
				label: 'Belum Kawin',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
					@foreach($chart_belum_kawin as $item)
                        {{ $item }},
                    @endforeach
				]
			}, {
				label: 'Kawin',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					@foreach($chart_kawin as $item)
                        {{ $item }},
                    @endforeach
				]
			}, {
				label: 'Cerai',
				backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
				borderColor: window.chartColors.green,
				borderWidth: 1,
				data: [
					@foreach($chart_cerai as $item)
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