@extends('layouts.master')

@section('title')
    <title>Dashboard : Sistem Informasi Manajemen Gender</title>
@endsection

@section('konten')
    {{-- <div class="row">
        <div class="col-lg-3">

            <!-- Members online -->
            <div class="panel bg-teal-400">
                <div class="panel-body">
                    <div class="heading-elements">
                        <span class="heading-text badge bg-teal-800">+53,6%</span>
                    </div>

                    <h3 class="no-margin">3,450</h3>
                    Members online
                    <div class="text-muted text-size-small">489 avg</div>
                </div>

                <div class="container-fluid">
                    <div id="members-online"><svg width="199.328125" height="50"><g width="199.328125"><rect class="d3-random-bars" width="5.74196244855967" x="2.460841049382716" height="47.5" y="2.5" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="10.663644547325102" height="27.500000000000004" y="22.499999999999996" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="18.86644804526749" height="42.5" y="7.5" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="27.069251543209877" height="40" y="10" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="35.272055041152264" height="30" y="20" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="43.47485853909465" height="37.5" y="12.5" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="51.67766203703704" height="40" y="10" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="59.88046553497943" height="37.5" y="12.5" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="68.08326903292182" height="32.5" y="17.5" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="76.2860725308642" height="42.5" y="7.5" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="84.48887602880659" height="45" y="5" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="92.69167952674898" height="50" y="0" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="100.89448302469137" height="37.5" y="12.5" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="109.09728652263375" height="27.500000000000004" y="22.499999999999996" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="117.30009002057615" height="40" y="10" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="125.50289351851853" height="30" y="20" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="133.7056970164609" height="42.5" y="7.5" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="141.9085005144033" height="30" y="20" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="150.11130401234567" height="37.5" y="12.5" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="158.31410751028807" height="27.500000000000004" y="22.499999999999996" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="166.51691100823044" height="30" y="20" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="174.71971450617283" height="42.5" y="7.5" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="182.92251800411523" height="40" y="10" style="fill: rgba(255, 255, 255, 0.5);"></rect><rect class="d3-random-bars" width="5.74196244855967" x="191.1253215020576" height="35" y="15" style="fill: rgba(255, 255, 255, 0.5);"></rect></g></svg></div>
                </div>
            </div>
            <!-- /members online -->

        </div>

        <div class="col-lg-3">

            <!-- Current server load -->
            <div class="panel bg-pink-400">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                                    <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                                    <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                                    <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <h3 class="no-margin">49.4%</h3>
                    Current server load
                    <div class="text-muted text-size-small">34.6% avg</div>
                </div>

                <div id="server-load"><svg width="219.328125" height="50"><g transform="translate(0,0)" width="219.328125"><defs><clipPath id="load-clip-server-load"><rect class="load-clip" width="219.328125" height="50"></rect></clipPath></defs><g clip-path="url(#load-clip-server-load)"><path d="M-8.435697115384615,12.999999999999998L-7.029747596153846,14.999999999999996C-5.623798076923077,16.999999999999996,-2.8118990384615383,20.999999999999996,0,21.44444444444444C2.8118990384615383,21.888888888888886,5.623798076923077,18.77777777777778,8.435697115384615,19.22222222222222C11.247596153846153,19.666666666666664,14.059495192307692,23.666666666666664,16.87139423076923,23.888888888888886C19.683293269230766,24.111111111111107,22.495192307692307,20.555555555555554,25.307091346153843,21.888888888888886C28.118990384615383,23.22222222222222,30.93088942307692,29.444444444444443,33.74278846153846,31.666666666666664C36.5546875,33.888888888888886,39.36658653846154,32.11111111111111,42.17848557692308,26.777777777777775C44.99038461538461,21.444444444444443,47.80228365384615,12.555555555555552,50.61418269230769,11.444444444444441C53.426081730769226,10.33333333333333,56.23798076923076,17,59.0498798076923,16.333333333333336C61.86177884615384,15.666666666666668,64.67367788461539,7.666666666666668,67.48557692307692,4.555555555555556C70.29747596153845,1.444444444444445,73.109375,3.2222222222222223,75.92127403846153,7.444444444444444C78.73317307692307,11.666666666666664,81.54507211538461,18.333333333333332,84.35697115384616,23.888888888888886C87.1688701923077,29.444444444444443,89.98076923076923,33.888888888888886,92.79266826923077,35.888888888888886C95.6045673076923,37.888888888888886,98.41646634615384,37.44444444444444,101.22836538461539,35.888888888888886C104.04026442307692,34.33333333333333,106.85216346153845,31.666666666666664,109.6640625,26.11111111111111C112.47596153846153,20.555555555555554,115.28786057692307,12.111111111111107,118.0997596153846,13.444444444444441C120.91165865384613,14.777777777777773,123.72355769230768,25.888888888888886,126.53545673076921,28.333333333333332C129.34735576923077,30.777777777777775,132.1592548076923,24.555555555555557,134.97115384615384,19.22222222222222C137.78305288461536,13.88888888888889,140.5949519230769,9.444444444444445,143.40685096153845,9.222222222222221C146.21874999999997,9,149.03064903846152,12.999999999999998,151.84254807692307,15.222222222222221C154.65444711538458,17.444444444444443,157.46634615384613,17.88888888888889,160.27824519230768,21.22222222222222C163.09014423076923,24.555555555555557,165.90204326923077,30.777777777777775,168.71394230769232,30.11111111111111C171.52584134615387,29.444444444444443,174.3377403846154,21.888888888888886,177.14963942307693,19.22222222222222C179.96153846153845,16.555555555555554,182.7734375,18.77777777777778,185.58533653846155,22.333333333333332C188.3972355769231,25.888888888888886,191.2091346153846,30.777777777777775,194.02103365384616,27.444444444444443C196.83293269230768,24.111111111111107,199.64483173076923,12.555555555555552,202.45673076923077,10.33333333333333C205.2686298076923,8.111111111111107,208.0805288461538,15.22222222222222,210.89242788461536,16.555555555555554C213.7043269230769,17.888888888888886,216.51622596153845,13.444444444444443,219.328125,13.444444444444443C222.14002403846155,13.444444444444443,224.9519230769231,17.888888888888886,227.76382211538464,19.888888888888886C230.57572115384616,21.888888888888886,233.38762019230768,21.444444444444443,234.79356971153845,21.22222222222222L236.19951923076923,21L236.19951923076923,50L234.79356971153845,49.999999999999986C233.38762019230768,49.99999999999999,230.57572115384616,49.99999999999999,227.76382211538464,49.999999999999986C224.9519230769231,49.99999999999999,222.14002403846155,49.99999999999999,219.328125,49.999999999999986C216.51622596153845,49.99999999999999,213.7043269230769,49.99999999999999,210.89242788461536,49.999999999999986C208.0805288461538,49.99999999999999,205.2686298076923,49.99999999999999,202.45673076923077,49.999999999999986C199.64483173076923,49.99999999999999,196.83293269230768,49.99999999999999,194.02103365384616,49.999999999999986C191.2091346153846,49.99999999999999,188.3972355769231,49.99999999999999,185.58533653846155,49.999999999999986C182.7734375,49.99999999999999,179.96153846153845,49.99999999999999,177.14963942307693,49.999999999999986C174.3377403846154,49.99999999999999,171.52584134615387,49.99999999999999,168.71394230769232,49.999999999999986C165.90204326923077,49.99999999999999,163.09014423076923,49.99999999999999,160.27824519230768,49.999999999999986C157.46634615384613,49.99999999999999,154.65444711538458,49.99999999999999,151.84254807692307,49.999999999999986C149.03064903846152,49.99999999999999,146.21874999999997,49.99999999999999,143.40685096153845,49.999999999999986C140.5949519230769,49.99999999999999,137.78305288461536,49.99999999999999,134.97115384615384,49.999999999999986C132.1592548076923,49.99999999999999,129.34735576923077,49.99999999999999,126.53545673076923,49.999999999999986C123.72355769230768,49.99999999999999,120.91165865384613,49.99999999999999,118.0997596153846,49.999999999999986C115.28786057692307,49.99999999999999,112.47596153846153,49.99999999999999,109.6640625,49.999999999999986C106.85216346153845,49.99999999999999,104.04026442307692,49.99999999999999,101.22836538461539,49.999999999999986C98.41646634615384,49.99999999999999,95.6045673076923,49.99999999999999,92.79266826923077,49.999999999999986C89.98076923076923,49.99999999999999,87.1688701923077,49.99999999999999,84.35697115384616,49.999999999999986C81.54507211538461,49.99999999999999,78.73317307692307,49.99999999999999,75.92127403846155,49.999999999999986C73.109375,49.99999999999999,70.29747596153845,49.99999999999999,67.48557692307692,49.999999999999986C64.67367788461539,49.99999999999999,61.86177884615384,49.99999999999999,59.0498798076923,49.999999999999986C56.23798076923076,49.99999999999999,53.426081730769226,49.99999999999999,50.614182692307686,49.999999999999986C47.80228365384615,49.99999999999999,44.99038461538461,49.99999999999999,42.17848557692308,49.999999999999986C39.36658653846154,49.99999999999999,36.5546875,49.99999999999999,33.74278846153846,49.999999999999986C30.93088942307692,49.99999999999999,28.118990384615383,49.99999999999999,25.307091346153847,49.999999999999986C22.495192307692307,49.99999999999999,19.683293269230766,49.99999999999999,16.87139423076923,49.999999999999986C14.059495192307692,49.99999999999999,11.247596153846153,49.99999999999999,8.435697115384615,49.999999999999986C5.623798076923077,49.99999999999999,2.8118990384615383,49.99999999999999,0,49.999999999999986C-2.8118990384615383,49.99999999999999,-5.623798076923077,49.99999999999999,-7.029747596153846,49.999999999999986L-8.435697115384615,50Z" class="d3-area" style="fill: rgba(255, 255, 255, 0.5); opacity: 1;" transform="translate(-1.7208823013305663,0)"></path></g></g></svg></div>
            </div>
            <!-- /current server load -->

        </div>

        <div class="col-lg-3">

            <!-- Today's revenue -->
            <div class="panel bg-blue-400">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="reload"></a></li>
                        </ul>
                                                </div>

                    <h3 class="no-margin">$18,390</h3>
                    Today's revenue
                    <div class="text-muted text-size-small">$37,578 avg</div>
                </div>

                <div id="today-revenue"><svg width="219.328125" height="50"><g transform="translate(0,0)" width="219.328125"><defs><clipPath id="clip-line-small"><rect class="clip" width="219.328125" height="50"></rect></clipPath></defs><path d="M20,8.46153846153846L49.88802083333333,25.76923076923077L79.77604166666666,5L109.6640625,15.384615384615383L139.55208333333331,5L169.44010416666669,36.15384615384615L199.328125,8.46153846153846" clip-path="url(#clip-line-small)" class="d3-line d3-line-medium" style="stroke: rgb(255, 255, 255);"></path><g><line class="d3-line-guides" x1="20" y1="50" x2="20" y2="8.46153846153846" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="49.88802083333333" y1="50" x2="49.88802083333333" y2="25.76923076923077" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="79.77604166666666" y1="50" x2="79.77604166666666" y2="5" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="109.6640625" y1="50" x2="109.6640625" y2="15.384615384615383" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="139.55208333333331" y1="50" x2="139.55208333333331" y2="5" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="169.44010416666669" y1="50" x2="169.44010416666669" y2="36.15384615384615" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="199.328125" y1="50" x2="199.328125" y2="8.46153846153846" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line></g><g><circle class="d3-line-circle d3-line-circle-medium" cx="20" cy="8.46153846153846" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="49.88802083333333" cy="25.76923076923077" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="79.77604166666666" cy="5" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="109.6640625" cy="15.384615384615383" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="139.55208333333331" cy="5" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="169.44010416666669" cy="36.15384615384615" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="199.328125" cy="8.46153846153846" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle></g></g></svg></div>
            </div>
            <!-- /today's revenue -->

        </div>
        <div class="col-lg-3">

            <!-- Today's revenue -->
            <div class="panel bg-brown-400">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="reload"></a></li>
                        </ul>
                                                </div>

                    <h3 class="no-margin">$18,390</h3>
                    Today's revenue
                    <div class="text-muted text-size-small">$37,578 avg</div>
                </div>

                <div id="today-revenue"><svg width="219.328125" height="50"><g transform="translate(0,0)" width="219.328125"><defs><clipPath id="clip-line-small"><rect class="clip" width="219.328125" height="50"></rect></clipPath></defs><path d="M20,8.46153846153846L49.88802083333333,25.76923076923077L79.77604166666666,5L109.6640625,15.384615384615383L139.55208333333331,5L169.44010416666669,36.15384615384615L199.328125,8.46153846153846" clip-path="url(#clip-line-small)" class="d3-line d3-line-medium" style="stroke: rgb(255, 255, 255);"></path><g><line class="d3-line-guides" x1="20" y1="50" x2="20" y2="8.46153846153846" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="49.88802083333333" y1="50" x2="49.88802083333333" y2="25.76923076923077" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="79.77604166666666" y1="50" x2="79.77604166666666" y2="5" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="109.6640625" y1="50" x2="109.6640625" y2="15.384615384615383" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="139.55208333333331" y1="50" x2="139.55208333333331" y2="5" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="169.44010416666669" y1="50" x2="169.44010416666669" y2="36.15384615384615" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line><line class="d3-line-guides" x1="199.328125" y1="50" x2="199.328125" y2="8.46153846153846" style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line></g><g><circle class="d3-line-circle d3-line-circle-medium" cx="20" cy="8.46153846153846" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="49.88802083333333" cy="25.76923076923077" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="79.77604166666666" cy="5" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="109.6640625" cy="15.384615384615383" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="139.55208333333331" cy="5" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="169.44010416666669" cy="36.15384615384615" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle><circle class="d3-line-circle d3-line-circle-medium" cx="199.328125" cy="8.46153846153846" r="3" style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle></g></g></svg></div>
            </div>
            <!-- /today's revenue -->

        </div>
    </div>
    <div class="row">
		<div class="col-lg-12">
			<!-- Marketing campaigns -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title">Grafik Pemetaan</h6>
					<div class="heading-elements">
						<span class="label bg-success heading-text">
                            <i class="icon-graph"></i>
                        </span>
						
	            	</div>
                </div>
                <div class="panel-body">
					<div class="chart-container">
						<div class="chart has-fixed-height" id="basic_columns"></div>
					</div>
				</div>			
            </div>
        </div>
    </div> --}}
@endsection

@section('footscript')
<script type="text/javascript" src="{{asset('assets/js/plugins/visualization/echarts/echarts.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/charts/echarts/columns_waterfalls.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/charts/echarts/timeline_option.js')}}"></script>
@endsection