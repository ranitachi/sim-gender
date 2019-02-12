<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<div class="sidebar-user-material">
						<div class="category-content">
							<div class="sidebar-user-material-content text-center">
								<a href="#" class="legitRipple"><img src="{{ asset('/') }}assets/images/logo-kabupaten-tangerang.png" style="padding-left:10px;" class="img-circle img-responsive" alt=""></a>
								<h5>Pemerintah Kabupaten Tangerang</h5>
								<span class="text-size-small">dp3a@tangerangkab.go.id</span>
							</div>
						</div>
					</div>

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								{{-- <li><a href="{{route('beranda')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li> --}}
                                <li class="navigation-header"><span>Subyek</span> <i class="icon-menu" title="Main pages"></i></li>
                                @php
                                    $subjek=\App\Models\Subyek::orderBy('nama_subyek')->get();
                                @endphp
                                @foreach ($subjek as $item)
								    <li><a href="{{url('subyek/'.str_slug($item->nama_subyek))}}"><i class="icon-circle-right2"></i> <span>{{$item->nama_subyek}}</span></a></li>
                                @endforeach
							
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>