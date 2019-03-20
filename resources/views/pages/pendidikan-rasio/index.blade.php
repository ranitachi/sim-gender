@extends('layouts.master')

@section('title')
    <title>Presentase Rasio : Sistem Informasi Statistik Kabupaten Tangerang</title>
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
                            <li><a href="">Presentase Rasio</a></li>
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
                                            <li><a href="{{ route('pendidikan-rasio.create',array($jenjang,$kategori->id)) }}"><i class="icon-googleplus5 pull-right"></i> Tambah Data</a></li>
                                        @else
                                            <li><a href="{{ route('pendidikan-rasio.edit',array($jenjang,$kategori->id)) }}"><i class="icon-googleplus5 pull-right"></i> Ubah Data</a></li>
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
                    <div class="chart-container">
                            <div id="container" style="width: 100%; height:1000px;float:left">
                                <canvas id="canvas"></canvas>
                            </div>
                        
                    </div>
                </div>
            
       
                <table class="table datatable-basic table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Kecamatan</th>
                            <th class="text-center">Jumlah Siswa</th>
                            <th class="text-center">Jumlah Sekolah</th>
                            <th class="text-center">Rasio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kecamatan as $key => $item)
                            @php
                                $jlh_sis=$jlh_sekl=0;
                                $rasio=0;
                                if(isset($det[$item->id]['jumlah_siswa']))
                                {
                                    $jlh_sis=$det[$item->id]['jumlah_siswa'];
                                }
                                if(isset($det[$item->id]['jumlah_sekolah']))
                                {
                                    $jlh_sekl=$det[$item->id]['jumlah_sekolah'];
                                }
                                $rasio=$jlh_sis/ ($jlh_sekl==0 ? 1 : $jlh_sekl) ;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $key = $key + 1 }}</td>
                                <td>{{$item->nama_kecamatan}}</td>    
                                <td class="text-center">{{number_format($jlh_sis,0,',','.')}}</td>
                                <td class="text-center">{{number_format($jlh_sekl,0,',','.')}}</td>
                                <td class="text-center">{{number_format($rasio,2,',','.')}}</td>
                                
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
				label: 'Rasio Murid dan Guru Jenjang {{strtoupper($jenjang)}}',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
                    @foreach($chart_kecamatan as $ix=>$kec)
                        
                            {{ $det[$ix]['rasio'] }},
                        
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