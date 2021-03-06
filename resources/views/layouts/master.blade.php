<!DOCTYPE html>
<html>
<head>

	<!-- Metadata -->
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>@yield('title')</title>

	@section('css')
	<!-- CSS Files -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="/css/animate.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/mystyle.css" rel="stylesheet">
	<link href="/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
	<link href="/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >


	<!-- Toastr style -->
	<link href="/css/plugins/toastr/toastr.min.css" rel="stylesheet">

	<!-- Gritter -->
	<link href="/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
	<link href="/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
	<script src="/js/plugins/sweetalert/sweetalert.min.js"></script>
	<script src="/js/plugins/chartJs/Chart.min.js"></script>
	<link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	<link href="/css/plugins/dataTables/datatables.min.css" rel="stylesheet">



	@show
</head>

<body class="md-skin">

	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script> -->
	<!-- <script type="text/javascript" src="/js/jquery-ui-1.10.4.min.js"></script> -->

	<link rel="stylesheet" type="text/css" href="/css/plugins/jQueryUI/jquery-ui.css" />

	<!-- Mainly scripts -->
	<script src="/js/jquery-2.1.1.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- <script src="/js/jquery-ui-1.10.4.min.js"></script> -->



	<!-- Data Tables -->
	<script src="/js/plugins/jeditable/jquery.jeditable.js"></script>
	<script src="/js/plugins/dataTables/datatables.min.js"></script>
	<!-- Peity -->
	<script src="/js/plugins/peity/jquery.peity.min.js"></script>
	<script src="/js/demo/peity-demo.js"></script>

	<!-- Custom and plugin javascript -->
	<script src="/js/inspinia.js"></script>
	<script src="/js/plugins/pace/pace.min.js"></script>

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

		<nav class="navbar-default navbar-static-side" id="nav" role="navigation">
			<div class="fixed-nav">

				<ul side-navigation="" class="nav metismenu" id="side-menu" style="display: block;">
					<li class="nav-header">

						<div class="dropdown profile-element" dropdown="">
							<img alt="image" class="img-circle" style="border-radius: 50%;"  height="60px" width="60px" src="/img/avatars/{{ Auth::user()->avatar }}">

							<a data-toggle="dropdown" class="dropdown-toggle" href="#"> <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
								{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} 
							</strong> </span> <span class="text-muted text-xs block">
							{{ Auth::user()->roles->first()->name }}

							<b class="caret"></b></span> </span> </a>
							<ul class="dropdown-menu animated fadeInRight m-t-xs">
								<li>
									<a href="/profile/my_profile"><i class="fa fa-btn fa-user"></i>&nbsp;&nbsp;Profile</a>
								</li>
								<li>
									<a href="#" data-toggle="modal" data-target="#change_pass"><i class="fa fa-btn fa-cog"></i>&nbsp;&nbsp;Change password</a>
								</li>

								<li class="divider"></li>
								<li>
									<a href="/logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a>
								</li>
							</ul>
						</div>
						<div class="logo-element">
							SAO
						</div>
					</li>

					@section('side-bar')

					<li class="{{ Request::is('home') ? 'active' : null }}">
						<a href="/home"><i class="fa fa-home"></i> <span class="nav-label ng-binding">Home</span> </a>
					</li>
					<li class="{{ Request::is('violation*' , 'report-violation') ? 'active' : 'null' }}">
						<a href="#"><i class="fa fa-list-alt"></i> <span class="nav-label ng-binding" > Students Violation Management</span><span class="fa arrow"></span></a>
							
							
						<ul class="nav nav-second-level collapse">
							
							<li ui-sref-active="active" class="{{ Request::is('report-violation') ? 'active' : 'null' }}">
								<a href="{{ url('/report-violation') }}"><i class=""></i> <span class="nav-label ng-binding">Report a violation</span> </a>
							</li>
							<li ui-sref-active="active" class="{{ Request::is('violation-statistics') ? 'active' : 'null' }}">
								<a href="/violation-statistics"><i class=""></i> <span class="nav-label ng-binding">Statistics </span> </a>
							</li>
							<li ui-sref-active="active" class="{{ Request::is('violation-reports') ? 'active' : 'null' }}">
								<a href="/violation-reports"><i class=""></i> <span class="nav-label ng-binding">Reports</span> </a>
							</li>

						</ul>
					</li>



					<li class="{{ Request::is('sanctions/*' , 'sanctions') ? 'active' : 'null' }}">
						<a href="/sanctions"><i class="fa fa-desktop"></i> <span class="nav-label ng-binding" >Sanctions</span><span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li ui-sref-active="active" class="{{ Request::is('sanctions') ? 'active' : 'null' }}">
									<a href="/sanctions"><i class=""></i> <span class="nav-label ng-binding"> Sanctions Monitoring</span> </a>
								</li>
								<li ui-sref-active="active" class="{{ Request::is('sanctions/reports') ? 'active' : 'null' }}">
									<a href="/sanctions/reports"><i class=""></i> <span class="nav-label ng-binding"> Reports</span> </a>
								</li>
							</ul>
					</li>
				<!-- 		<li>
							
							<ul class="nav nav-second-level collapse">
								<li ui-sref-active="active" >
									<a href="/sanctions"><i class=""></i> <span class="nav-label ng-binding"> Sanctions</span> </a>
								</li>
								<li ui-sref-active="active" >
									<a href="/community-service"><i class=""></i> <span class="nav-label ng-binding"> Community Service</span> </a>
								</li>
								<li ui-sref-active="active" >
									<a href="/suspensions"><i class=""></i> <span class="nav-label ng-binding"> Suspensions</span> </a>
								</li>
							</ul>
						</li> -->

						<li class="{{ Request::is('locker-*' , 'lockers') ? 'active' : 'null' }}">
							<a href="#"><i class="fa fa-lock"></i> <span class="nav-label ng-binding">Locker Management</span><span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								
								<li ui-sref-active="active" class="{{ Request::is('lockers') ? 'active' : 'null' }}">
									<a href="/lockers"> <i class=""></i> <span class="nav-label ng-binding">Locker Assignment</span> </a>
								</li>
								<li ui-sref-active="active" class="{{ Request::is('locker-statistics') ? 'active' : 'null' }}">
									<a href="/locker-statistics"> <i class=""></i> <span class="nav-label ng-binding">Statistics</span> </a>
								</li>
								<li ui-sref-active="active" class="{{ Request::is('locker-reports') ? 'active' : 'null' }}">
									<a href="/locker-reports"> <i class=""></i> <span class="nav-label ng-binding">Reports</span> </a>
								</li>

							</ul>
						</li>
						<li class="{{ Request::is('lost-and-found/*' , 'lost-and-found') ? 'active' : 'null' }}">
							<a href="#"><i class="fa fa-book"></i> <span class="nav-label ng-binding">Lost and Found</span><span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
						 		
							
							<li ui-sref-active="active" class="{{ Request::is('lost-and-found') ? 'active' : 'null' }}">
								<a href="/lost-and-found"><i class=""></i> <span class="nav-label ng-binding">Add / Claim Items</span> </a>
							</li>
							<li ui-sref-active="active" class="{{ Request::is('lost-and-found/statistics') ? 'active' : 'null' }}">
									<a href="/lost-and-found/statistics"> <i class=""></i> <span class="nav-label ng-binding">Statistics</span> </a>
							</li>
							<li ui-sref-active="active" class="{{ Request::is('lost-and-found/reports') ? 'active' : 'null' }}">
								<a href="/lost-and-found/reports"> <i class=""></i> <span class="nav-label ng-binding">Reports</span> </a>
							</li>

						</ul>
					</li>

					<li class="{{ Request::is('campus', 'reservationReports') ? 'active' : 'null' }}">
						<a href="#"><i class="fa fa-calendar"></i> <span class="nav-label ng-binding">Campus Venue Reservation Monitoring</font></span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">

							<li ui-sref-active="active" class="{{ Request::is('campus') ? 'active' : 'null' }}">
								<a href="/campus"> <i class=""></i> <span class="nav-label ng-binding">Reservation Form</span> </a>
							</li>
						</li>
 						<li ui-sref-active="active" class="{{ Request::is('reservationReports') ? 'active' : 'null' }}">
							<a href="/reservationReports"> <i class=""></i> <span class="nav-label ng-binding">Reports</span> </a>
						</li> 

					</ul>
				</li>

				<li class="{{ Request::is('addActivity' , 'activities' , 'activitiesReports') ? 'active' : 'null' }}">
					<a href="#"><i class="fa fa-list"></i> <span class="nav-label ng-binding">Monitoring of Proposal of Activities</span><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse">
						<li ui-sref-active="active" class="{{ Request::is('addActivity') ? 'active' : 'null' }}">
							<a href="/addActivity"><i class=""></i> <span class="nav-label ng-binding">Add Activity</span> </a>

						</li>
						<li ui-sref-active="active" class="{{ Request::is('activities') ? 'active' : 'null' }}">
							<a href="/activities"> <i class=""></i> <span class="nav-label ng-binding">Monitoring of Activities</span> </a>
						</li>

					</li>
					<li ui-sref-active="active" class="{{ Request::is('activitiesReports') ? 'active' : 'null' }}">
						<a href="/activitiesReports"> <i class=""></i> <span class="nav-label ng-binding">Reports</span> </a>
					</li>

				</ul>
			</li>

			<li class="{{ Request::is('OrganizationsRenewal*' , 'organizationsRenewal') ? 'active' : 'null' }}">
				<a href="#"><i class="fa fa-file"></i> <span class="nav-label ng-binding">Organizations Renewal Management</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse">


					<li ui-sref-active="active" class="{{ Request::is('OrganizationsRenewalAdd') ? 'active' : 'null' }}">
						<a href="/OrganizationsRenewalAdd"><i class=""></i> <span class="nav-label ng-binding">Add Organization</span> </a>

					</li>

					<li ui-sref-active="active" class="{{ Request::is('OrganizationsRenewalList') ? 'active' : 'null' }}">
						<a href="/OrganizationsRenewalList"><i class=""></i> <span class="nav-label ng-binding">List of Organizations</span> </a>

					</li>
					<li ui-sref-active="active" class="{{ Request::is('organizationsRenewal') ? 'active' : 'null' }}">
						<a href="/organizationsRenewal"> <i class=""></i> <span class="nav-label ng-binding"> Update Checklist Requirements</span> </a>
					</li>

				</ul>
			</li>

			<li class="{{ Request::is('text-messaging/*') ? 'active' : 'null' }}">
				<a href="#"><i class="fa fa-mobile"></i> <span class="nav-label ng-binding">Text Messaging</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse">


					<li ui-sref-active="active" class="{{ Request::is('text-messaging/compose') ? 'active' : 'null' }}">
						<a href="/text-messaging/compose"><i class=""></i> <span class="nav-label ng-binding">Compose</span> </a>

					</li>

					<!-- <li ui-sref-active="active" class="{{ Request::is('text-messaging/log') ? 'active' : 'null' }}">
						<a href="/text-messaging/log"><i class=""></i> <span class="nav-label ng-binding"></span>Message Log</a>

					</li> -->
					
				</ul>
			</li>

						
							@if ( Auth::user()->roles->first()->name == 'Admin')
							<li class="{{ Request::is('student-records' , 'violation-list' , 'activity-records') ? 'active' : 'null' }}">
								<a href="#"><i class="fa fa-exchange"></i> <span class="nav-label ng-binding">Import/Export Records</span><span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
									<li ui-sref-active="active" class="{{ Request::is('student-records') ? 'active' : 'null' }}">
										<a href="/student-records"><span class="nav-label ng-binding">Student Records</span> </a>

									</li>
									<li ui-sref-active="active" class="{{ Request::is('violation-list') ? 'active' : 'null' }}">
										<a href="/violation-list"><span class="nav-label ng-binding">Violation Records</span> </a>
									</li>

									<li ui-sref-active="active" class="{{ Request::is('activity-records') ? 'active' : 'null' }}">
										<a href="/activity-records"><span class="nav-label ng-binding">Activities</span> </a>
									</li>

								</ul>
							</li>

							
							
							

							<li class="{{ Request::is('user-management/*') ? 'active' : 'null' }}">
								<a href="#"><i class="fa fa-users"></i> <span class="nav-label ng-binding">User Management</span><span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
									<li ui-sref-active="active" class="{{ Request::is('user-management/admin') ? 'active' : 'null' }}">
										<a href="/user-management/admin"><span class="nav-label ng-binding">Create a new account</span> </a>

									</li>
									<li ui-sref-active="active" class="{{ Request::is('user-management/roles') ? 'active' : 'null' }}">
										<a href="/user-management/roles"><span class="nav-label ng-binding">User Roles</span> </a>
									</li>

								</ul>
							</li>


							<li ui-sref-active="active" class="{{ Request::is('content-management') ? 'active' : 'null' }}">
								<a href="/content-management"><i class="fa fa-edit"></i> <span class="nav-label ng-binding">Content Management</span> </a>
							</li>
							@else



							@endif


							@if ( Auth::user()->roles->first()->name == 'Admin')
							<li class="{{ Request::is('settings/*') ? 'active' : 'null' }}">
								<a href="#"><i class="fa fa-cog"></i> <span class="nav-label ng-binding">Settings</span><span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
						<!-- 	<li ui-sref-active="active">
								<a href="/violation"><i class="fa fa-plus"></i> <span class="nav-label ng-binding">Violations</span> </a>

							</li> -->
					<!-- 		<li ui-sref-active="active" >
								<a href="/courses"><i class="fa fa-plus"></i> <span class="nav-label ng-binding">Courses</span> </a>
							</li> -->

							<li ui-sref-active="active" class="{{ Request::is('settings/locker-locations') ? 'active' : 'null' }}">
								<a href="/settings/locker-locations"><i class="fa fa-plus"></i> <span class="nav-label ng-binding">Add Locker Locations</span> </a>
							</li>

							<li ui-sref-active="active" class="{{ Request::is('settings/dates/school-year') ? 'active' : 'null' }}">
								<a href="/settings/dates/school-year"><i class="fa fa-calendar"></i> <span class="nav-label ng-binding">Date Settings</span> </a>
							</li>

						</ul>
					</li>
					
					@endif



				</ul>

			</div>
			@show
		</nav>

		<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="row border-bottom">
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
						<!--
						<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-default " href="#"><i class="fa fa-bars"></i> </a>

					</div>-->

					<ul class="nav navbar-top-links navbar-left">
						<li>
						<img src="/img/lpulogo.png" height="65px" width="65px">
							<span class="m-r-sm text-muted welcome-message">Student Affairs Office Information System</span>
							
						</li>

					</ul>
					<ul class="nav navbar-top-links navbar-right">
						<li>
                    <span class="m-r-sm text-muted welcome-message"><small>{{ Carbon\Carbon::now()->format('l jS \\of F Y h:i A') }}</small></span>
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

			<div class="wrapper wrapper-content">
				@yield('content')

			</div>
			<div class="footer">
				<div class="pull-right">
					Student Affairs Office
				</div>
				<div>
					<strong>Copyright</strong> Lyceum of the Philippines University. &copy; 2016
				</div>
			</div>

		</div>

	</div>

	<!-- Modal -->
	<div id="change_pass" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Change your password</h4>
				</div>
				<div class="modal-body">

					<form id="change_password_form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label>Your Old Password</label>
							<input type="password" class="form-control"  placeholder="Old password" name="old_password" autocomplete="off" required autofocus>
						</div>

						<div class="form-group">
							<label>New Password</label>
							<input type="password" class="form-control"  placeholder="New password" name="password" autocomplete="off" required autofocus>
						</div>

						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" class="form-control"  placeholder="Re-type your password" name="password_confirmation" autocomplete="off" required autofocus>
						</div>
					</form>

					<button type="button" class="btn btn-md btn-primary pull-left" id="change_pass_btn">Save</button>

				</div>
				<div class="modal-footer">

				</div>
			</div>

		</div>
	</div>



	@yield('scripts')
	<script src="/js/app.js"></script>

	<!-- Register --> 
	<script src="/js/register.js"></script>

<script type="text/javascript" src="/js/jsapi.js"></script>
<script type="text/javascript" src="/js/uds_api_contents.js"></script>

		<!-- Flot -->
	<script src="/js/plugins/flot/jquery.flot.js"></script>
	<script src="/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
	<script src="/js/plugins/flot/jquery.flot.resize.js"></script>
	<script src="/js/plugins/flot/jquery.flot.pie.js"></script>
	<script src="/js/plugins/flot/jquery.flot.time.js"></script>
	@show

</body>
</html>