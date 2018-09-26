<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	@include('includes.script')
	
	@yield('title')
</head>

<body class="navbar-top">

	<!-- Main navbar -->
	@include('includes.navbar')
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			@include('includes.sidebar')
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				{{-- <div class="content"> --}}

					
					<!-- Dashboard content -->
					@yield('konten')
					<!-- /dashboard content -->


					<!-- Footer -->
					@include('includes.footer')
					<!-- /footer -->

				{{-- </div> --}}
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
@include('includes.modal')
@yield('footscript')