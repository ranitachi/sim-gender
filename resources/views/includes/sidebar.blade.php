<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="{{asset('assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Victoria Baker</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li><a href="{{route('beranda')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
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