@extends('layouts.master')

@section('title')
    <title>Presentase Penduduk Tamat Pendidikan : Sistem Informasi Statistik Kabupaten Tangerang</title>
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
                            <li class="active">{{ $kategori->judul }}</li>
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
                                        @if ($data->count()==0)
                                            <li><a href="{{ route('pendidikan-ditamatkan.create',array($kategori->id)) }}"><i class="icon-googleplus5 pull-right"></i> Tambah Data</a></li>
                                        @else
                                            <li><a href="{{ route('pendidikan-ditamatkan.edit',array($kategori->id)) }}"><i class="icon-googleplus5 pull-right"></i> Ubah Data</a></li>
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
               <div class="panel-body">
                <div class="chart-container">
                    <div id="container" style="width: 100%; height:1000px;">
                        <canvas id="canvas"></canvas>
                    </div>
                </div>
            </div>
            
       
                <table class="table datatable-basic table-bordered table-striped">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center">#</th>
                            <th rowspan="2" class="text-center">Kecamatan</th>
                            <th colspan="6" class="text-center">Pendidikan Yang Ditamatkan</th>
                            
                        </tr>
                        <tr>
                            @php
                                $jjg=array('bawah_sd'=>'<SD','sd'=>'SD / Sederajat','smp'=>'SMP','sma'=>'SMA','pt'=>'Perguruan Tinggi');
                            @endphp
                            @foreach ($jjg as $item)    
                                <th class="text-center" style="width:100px">{{$item}}</th>
                            @endforeach
                                <th class="text-center" style="width:100px">Jumlah</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kecamatan as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key = $key + 1 }}</td>
                                <td>{{$item->nama_kecamatan}}</td>
                                @php
                                    $jumlah=0;
                                    foreach ($jjg as $idx_jg=> $vl)    
                                    {
                                        $jlh=(isset($det[$item->id]) ? $det[$item->id][$idx_jg] : 0);
                                        echo '<td class="text-center">'.$jlh.' %</td>';    
                                        $jumlah+=$jlh;
                                    }
                                @endphp
                                
                                <td class="text-center">{{$jumlah}} %</td>
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
    <script>
		var color = Chart.helpers.color;
		var horizontalBarChartData = {
			labels: [
                @foreach($chart_kecamatan as $item)
                    '{{ $item }}',
                @endforeach
            ],
			datasets: [{
				label: 'Persentase Penduduk (%)',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
                    @foreach($chart_kecamatan as $ix=>$kec)
                        @foreach($det[$ix] as $item)
                            {{ $item }},
                        @endforeach
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