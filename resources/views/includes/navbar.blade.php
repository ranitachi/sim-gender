<div class="navbar navbar-default navbar-fixed-top header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{route('beranda')}}">
				<span style="color:#fff;">
					<i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp;
					SIGA KAB TANGERANG
				</span>	
			</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<p class="navbar-text">Sistem Informasi Gender dan Anak Kabupaten Tangerang</p>

			@if (Auth::check())
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown dropdown-user">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{asset('assets/images/placeholder.jpg')}}" alt="">
							<span>Administrator</span>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="#"><i class="icon-users"></i> Ganti Profile</a></li>
							<li><a href="#"><i class="icon-key"></i> Ganti Password</a></li>
							<li>
								<a  href="{{ route('logout') }}"
									onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
									<i class="icon-switch2"></i> Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>
						</ul>
					</li>
				</ul>
			@endif
		</div>
	</div>