@extends('layouts.master')

@section('title')
    <title>Dashboard : Sistem Informasi Manajemen Gender</title>
@endsection

@section('konten')

            <div class="content">

    <div class="row">
        <div class="col-lg-6">

            <!-- Members online -->
            <div class="panel">
                <div class="panel-body"  style="height:100px !important;">
                    <div class="row">
                        <div class="col-sm-6 text-left">    
                            <h3 class="no-margin pull-right;text-right" style="font-size:50px;">{{$data->count()}}</h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            <span class="heading-text badge bg-teal-800">Jumlah Kategori Informasi</span>
                            
                            <h6>Subyek : {{$sbj->nama_subyek}}</h6>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /members online -->

        </div>

        <div class="col-lg-6">

            <div class="panel">
                <div class="panel-body"  style="height:100px !important;">
                    <div class="row">
                        <div class="col-sm-6 text-left">    
                            <h3 class="no-margin pull-right;text-right" style="font-size:50px;">{{max($tahun)}}</h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            {{-- <span class="heading-text badge bg-teal-800">Terakhir Kali Di Update</span> --}}
                            
                            <i class="fa fa-clock-o" style="font-size:30px;"></i> 
                            <h6>Terakhir Kali Di Update</h6>      
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

       
</div>
            <!-- Marketing campaigns -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Data Kategori Informasi</h6>
                        <div class="heading-elements">
                            <span class="label bg-success heading-text">
                                <i class="icon-graph"></i>
                            </span>
                            
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered datatable-basic">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $no=> $item)                                
                                    <tr>
                                        <td class="text-center">{{++$no}}</td>
                                        <td><a href="{{ url($item->url_route, $item->id) }}/{{ date('Y') }}">{{ $item->judul }}</a></td>
                                    </tr>   
                                @endforeach
                                </tbody>
                        </table>
                    </div>			
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
    // alert($('.datatable-basic').text());
});
</script>
@endsection