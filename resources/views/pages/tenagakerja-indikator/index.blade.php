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
                            <li><a href="">Kependudukan</a></li>
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
                                        <li><a href="{{ route('tenagakerja-indikator.create', $kategori->id) }}"><i class="icon-googleplus5 pull-right"></i> Tambah Data</a></li>
                                    @else
                                        <li><a href="{{ route('tenagakerja-indikator.edit', $kategori->id) }}"><i class="icon-googleplus5 pull-right"></i> Ubah Data</a></li>
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
                <div class="col-md-6">
                    <div class="chart-container">
                        <div id="container" style="width: 100%;">
                            <canvas id="canvas1"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="chart-container">
                        <div id="container" style="width: 100%;">
                            <canvas id="canvas2"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top:30px;">
                    <div class="chart-container">
                        <div id="container" style="width: 100%;">
                            <canvas id="canvas3"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top:30px;">
                    <div class="chart-container">
                        <div id="container" style="width: 100%;">
                            <canvas id="canvas4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-flat">
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Karakteristik</th>
                        <th>Laki-Laki</th>
                        <th>Perempuan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                        $skip = ['Bekerja', 'Pengangguran', 'Sekolah dan Mengurus RT', 'Lainnya'];
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                @if (!in_array($item->karakteristik, $skip))
                                    {{ $number }}
                                    @php
                                        $number++;
                                    @endphp
                                @endif
                            </td>
                            <td>{{ $item->karakteristik }}</td>
                            <td>{{ $item->laki_laki }}</td>
                            <td>{{ $item->perempuan }}</td>
                            <td>{{ $item->jumlah }}</td>
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
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config1 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						@foreach($chart_puk as $item)
                            {{ $item }},
                        @endforeach
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Laki-Laki',
					'Perempuan',
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Penduduk Usia Kerja'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

		var config2 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						@foreach($chart_tpak as $item)
                            {{ $item }},
                        @endforeach
					],
					backgroundColor: [
						window.chartColors.yellow,
						window.chartColors.green,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Laki-Laki',
					'Perempuan',
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Tingkat Partisipasi Angkatan Kerja (%)'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

        var config3 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						@foreach($chart_tkk as $item)
                            {{ $item }},
                        @endforeach
					],
					backgroundColor: [
						window.chartColors.purple,
						window.chartColors.orange,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Laki-Laki',
					'Perempuan',
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Tingkat Kesempatan Kerja (%)'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

        var config4 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						@foreach($chart_tpt as $item)
                            {{ $item }},
                        @endforeach
					],
					backgroundColor: [
						window.chartColors.blue,
						window.chartColors.orange,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Laki-Laki',
					'Perempuan',
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Tingkat Pengangguran Terbuka (%)'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

		window.onload = function() {
			var ctx1 = document.getElementById('canvas1').getContext('2d');
			window.myDoughnut = new Chart(ctx1, config1);

			var ctx2 = document.getElementById('canvas2').getContext('2d');
			window.myDoughnut = new Chart(ctx2, config2);

			var ctx3 = document.getElementById('canvas3').getContext('2d');
			window.myDoughnut = new Chart(ctx3, config3);

			var ctx4 = document.getElementById('canvas4').getContext('2d');
			window.myDoughnut = new Chart(ctx4, config4);
		};
    </script>
    
@endsection