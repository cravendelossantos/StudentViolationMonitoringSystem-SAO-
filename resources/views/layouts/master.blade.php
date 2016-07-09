<!DOCTYPE html>
<html>
	<head>

		<!-- Metadata -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>@yield('title')</title>

		@section('css')
		<!-- CSS Files -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="/css/animate.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">

		<!-- Toastr style -->
		<link href="/css/plugins/toastr/toastr.min.css" rel="stylesheet">

		<!-- Gritter -->
		<link href="/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="/css/plugins/iCheck/custom.css" rel="stylesheet">
		<link href="/css/animate.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">
		<link href="/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
		<script src="/js/plugins/sweetalert/sweetalert.min.js"></script>
		<script src="/js/plugins/chartJs/Chart.min.js"></script>
		<link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
		<link href="/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

		@show
	</head>

	<body class="md-skin">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
		<script type="text/javascript" src="/js/jquery-ui-1.10.4.min.js"></script>

		<link rel="stylesheet" type="text/css" href="/css/plugins/jQueryUI/jquery-ui.css" />

		<!-- Mainly scripts -->
		<script src="/js/jquery-2.1.1.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
		<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="/js/jquery-ui-1.10.4.min.js"></script>

		<!-- Flot -->
		<script src="/js/plugins/flot/jquery.flot.js"></script>
		<script src="/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
		<script src="/js/plugins/flot/jquery.flot.spline.js"></script>
		<script src="/js/plugins/flot/jquery.flot.resize.js"></script>
		<script src="/js/plugins/flot/jquery.flot.pie.js"></script>

		<!-- Data Tables -->
		<script src="/js/plugins/jeditable/jquery.jeditable.js"></script>
		<script src="/js/plugins/dataTables/datatables.min.js"></script>
		<!-- Peity -->
		<script src="/js/plugins/peity/jquery.peity.min.js"></script>
		<script src="/js/demo/peity-demo.js"></script>

		<!-- jQuery UI -->
		<script src="/js/plugins/jquery-ui/jquery-ui.min.js"></script>

		<!-- GITTER -->
		<script src="/js/plugins/gritter/jquery.gritter.min.js"></script>

		<!-- Sparkline -->
		<script src="/js/plugins/sparkline/jquery.sparkline.min.js"></script>

		<!-- Sparkline demo data  -->
		<script src="/js/demo/sparkline-demo.js"></script>

		<!-- ChartJS-->
		<script src="/js/plugins/chartJs/Chart.min.js"></script>

		<!-- Toastr -->
		<script src="/js/plugins/toastr/toastr.min.js"></script>

		<!-- Custom and plugin javascript -->
		<script src="/js/inspinia.js"></script>
		<script src="/js/plugins/pace/pace.min.js"></script>
		<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

		<!-- Chosen -->
		<script src="/js/plugins/chosen/chosen.jquery.js"></script>

		<!-- JSKnob -->
		<script src="/js/plugins/jsKnob/jquery.knob.js"></script>

		<!-- Input Mask-->
		<script src="/js/plugins/jasny/jasny-bootstrap.min.js"></script>

		<!-- Data picker -->
		<script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>

		<!-- NouSlider -->
		<script src="/js/plugins/nouslider/jquery.nouislider.min.js"></script>

		<!-- Switchery -->
		<script src="/js/plugins/switchery/switchery.js"></script>

		<!-- IonRangeSlider -->
		<script src="/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

		<!-- iCheck -->
		<script src="/js/plugins/iCheck/icheck.min.js"></script>

		<!-- MENU -->
		<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>

		<!-- Color picker -->
		<script src="/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

		<!-- Clock picker -->
		<script src="/js/plugins/clockpicker/clockpicker.js"></script>

		<!-- Image cropper -->
		<script src="/js/plugins/cropper/cropper.min.js"></script>

		<!-- Date range use moment.js same as full calendar plugin -->
		<script src="/js/plugins/fullcalendar/moment.min.js"></script>

		<!-- Date range picker -->
		<script src="/js/plugins/daterangepicker/daterangepicker.js"></script>

		<!-- Select2 -->
		<script src="/js/plugins/select2/select2.full.min.js"></script>

		<!-- TouchSpin -->
		<script src="/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

		<!-- Sweet Alert -->
		<script src="/js/plugins/sweetalert/sweetalert.min.js"></script>
		<script src="/js/plugins/chartJs/Chart.min.js"></script>

		<div id="wrapper">

			<nav class="navbar-default navbar-static-side" role="navigation">
				<div class="fixed-nav">

					<ul side-navigation="" class="nav metismenu" id="side-menu" style="display: block;">
						@section('sidebar')
						<li class="nav-header">

							<div class="dropdown profile-element" dropdown="">
								<img alt="image" class="img-circle"  height="50px" width="50px" src="/img/aboutlpu.jpg">

								<a data-toggle="dropdown" class="dropdown-toggle" href="#"> <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{{ Auth::guard('admin')->user()->first_name }}} {{{ Auth::guard('admin')->user()->last_name }}} </strong> </span> <span class="text-muted text-xs block"> Admin <b class="caret"></b></span> </span> </a>
								<ul class="dropdown-menu animated fadeInRight m-t-xs">
									<li>
										<a ui-sref="profile">Profile</a>
									</li>
									<li>
										<a ui-sref="contacts">Contacts</a>
									</li>
									<li>
										<a ui-sref="inbox">Mailbox</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="/logout">Logout</a>
									</li>
								</ul>
							</div>
							<div class="logo-element">
								SAO
							</div>
						</li>

						@section('menu')
						<li>
							<a href="/index"><i class="fa fa-th-large"></i> <span class="nav-label ng-binding">Dashboard</span> </a>

						</li>

						<li ui-sref-active="active">
							<a href="/ReportViolation"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Reports</span> </a>
						</li>

						<li>
							<a href=""><i class="fa fa-sitemap"></i> <span class="nav-label ng-binding">Menu levels</span><span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="">Third Level <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level collapse">
										<li>
											<a href="">Third Level Item</a>
										</li>
										<li>
											<a href="">Third Level Item</a>
										</li>
										<li>
											<a href="">Third Level Item</a>
										</li>

									</ul>
								</li>
								<li>
									<a href="">Second Level Item</a>
								</li>
								<li>
									<a href="">Second Level Item</a>
								</li>
								<li>
									<a href="">Second Level Item</a>
								</li>
							</ul>
						</li>
						@show
					</ul>

				</div>

			</nav>

			<div id="page-wrapper" class="gray-bg dashbard-1">
				<div class="row border-bottom">
					<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
						<div class="navbar-header">
							<a class="navbar-minimalize minimalize-styl-2 btn btn-default " href="#"><i class="fa fa-bars"></i> </a>

						</div>
						<ul class="nav navbar-top-links navbar-right">
							<li>
								<span class="m-r-sm text-muted welcome-message">Student's Violations Monitoring System</span>
							</li>

							<li>
								<a href="/logout"> <i class="fa fa-sign-out"></i> Log out </a>
							</li>

						</ul>

					</nav>
				</div>

				<div class="row  border-bottom white-bg dashboard-header">
					@yield('header-page')
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="wrapper wrapper-content">
							@yield('content')

						</div>
						<div class="footer fixed">
							<div class="pull-right">
								Student Affairs Office
							</div>
							<div>
								<strong>Copyright</strong> Lyceum of the Philippines University. &copy; 2016
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

		@yield('scripts')
		<script src="/js/sysJs.js"></script>
		@show

	</body>
</html>