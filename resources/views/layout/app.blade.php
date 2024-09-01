<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>{{ $title }}</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
		<link rel="icon" href="/assets/img/icon.ico" type="image/x-icon"/>
		
		<!-- Fonts and icons -->
		<script src="/assets/js/plugin/webfont/webfont.min.js"></script>
		<script>
			WebFont.load({
				google: {"families":["Open+Sans:300,400,600,700"]},
				custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../../assets/css/fonts.css']},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!-- CSS Files -->
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/css/azzara.min.css">
		 <!-- Date picker -->
		<link href="/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
		<!-- CSS Just for demo purpose, don't include it in your project -->
		<link rel="stylesheet" href="/assets/css/demo.css">
		<link href="/assets/plugins/bootstrap-datepicker/custom.css" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper">
			<!--
					Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
			-->
			<div class="main-header" data-background-color="light-blue">
				<!-- Logo Header -->
				<div class="logo-header">
					
					<a href="/index.html" class="logo">
						<font color="white" alt="navbar brand" class="navbar-brand">
							LAUNDRY
						</font>
					</a>
					<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="fa fa-bars"></i>
						</span>
					</button>
					<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
					<div class="navbar-minimize">
						<button class="btn btn-minimize btn-rounded">
							<i class="fa fa-bars"></i>
						</button>
					</div>
				</div>
				<!-- End Logo Header -->

				<!-- Navbar Header -->
				<nav class="navbar navbar-header navbar-expand-lg">
				</nav>
				<!-- End Navbar -->
			</div>
			<!-- Sidebar -->
			<div class="sidebar">
				
				<div class="sidebar-wrapper scrollbar-inner">
					<div class="sidebar-content">
						<div class="user">
							<div class="avatar-sm float-left mr-2">
								<img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info">
								<a href="/profile" aria-expanded="true">
									<span>
									@if(Auth::user())
										{{ ucwords(Auth::user()->name) }}
									@endif
										<span class="user-level">
											@if(Auth::user())
												{{ ucwords(Auth::user()->role) }} 
											@endif
										</span>
									</span>
								</a>
								<div class="clearfix"></div>
							</div>
						</div>
						<ul class="nav">
							<li class="nav-item">
								<a href="/home">
									<i class="fas fa-home"></i>
									<p>Dashboard</p>
								</a>
							</li>
							<li class="nav-item">
								<a data-toggle="collapse" href="#master">
									<i class="fas fa-layer-group"></i>
									<p>Master</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="master">
									<ul class="nav nav-collapse">
										@if (Auth::user()->role == 'owner')
										<li>
											<a href="/user">
												<span class="sub-item">User</span>
											</a>
										</li>
										<li>
											<a href="/uom">
												<span class="sub-item">UoM</span>
											</a>
										</li>
										<li>
											<a href="/progress">
												<span class="sub-item">Progress</span>
											</a>
										</li>
										<li>
											<a href="/service">
												<span class="sub-item">Service</span>
											</a>
										</li>
										@endif
										@if (Auth::user()->role == 'owner' || Auth::user()->role == 'employee')
										<li>
											<a href="/customer">
												<span class="sub-item">Customer</span>
											</a>
										</li>
										@endif
									</ul>
								</div>
							</li>
							<li class="nav-item">
								<a data-toggle="collapse" href="#transaction">
									<i class="fas fa-table"></i>
									<p>Transaction</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="transaction">
									<ul class="nav nav-collapse">
										@if (Auth::user()->role == 'owner' || Auth::user()->role == 'employee')
										<li>
											<a href="/invoice">
												<span class="sub-item">Invoice</span>
											</a>
										</li>
										<li>
											<a href="/payment">
												<span class="sub-item">Payment</span>
											</a>
										</li>
										<li>
											<a href="/customer-progress">
												<span class="sub-item">Customer Progress</span>
											</a>
										</li>
										@endif
									</ul>
								</div>
							</li>
							@if (Auth::user()->role == 'owner')
							<li class="nav-item">
								<a data-toggle="collapse" href="#report">
									<i class="fas fa-file"></i>
									<p>Report</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="report">
									<ul class="nav nav-collapse">
										<li>
											<a href="/payment-report">
												<span class="sub-item">Payment</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							@endif
							<li class="nav-item">
								<a href="/logout">
									<i class="fas fa-sign-out-alt"></i>
									<p>Logout</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			@yield('content')
		</div>
		<!--   Core JS Files   -->
		<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
		<script src="/assets/js/core/popper.min.js"></script>
		<script src="/assets/js/core/bootstrap.min.js"></script>
		<!-- jQuery UI -->
		<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
		<!-- Bootstrap Toggle -->
		<script src="/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
		<!-- jQuery Scrollbar -->
		<script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
		<!-- Datatables -->
		<script src="/assets/js/plugin/datatables/datatables.min.js"></script>
		<!-- Azzara JS -->
		<script src="/assets/js/ready.min.js"></script>
		<!-- Azzara DEMO methods, don't include it in your project! -->
		<script src="/assets/js/setting-demo.js"></script>
		<!-- Sweet Alert -->
		<script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
		<!-- Datepicker -->
		<script src="/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script >
			$(document).ready(function() {
				$('#add-row').DataTable({
					order:[]
				});
			});
			
		</script>

		@if (session('success'))
			<script>
				var SweetAlert2Demo = function(){
					var initDemos   = function(){
						swal({
							title   : "Good Job!",
							text    : "{{ session('success') }}",
							icon    : "success",
							buttons : {
								confirm: {
									text        : "OK",
									value       : true,
									visible     : true,
									className   : "btn btn-success",
									closeModal  : true
								}
							}
						})
					};

					return{
						init : function(){
							initDemos();
						}
					};

				}();

				jQuery(document).ready( function(){
					SweetAlert2Demo.init();
				});

			</script>
		@endif

		@if (session('error'))
			<script>
				var SweetAlert2Demo = function(){
					var initDemos   = function(){
						swal({
							title   : "Sorry!",
							text    : "{{ session('error') }}",
							icon    : "error",
							buttons : {
								confirm: {
									text        : "OK",
									value       : true,
									visible     : true,
									className   : "btn btn-danger",
									closeModal  : true
								}
							}
						})
					};

					return{
						init : function(){
							initDemos();
						}
					};

				}();

				jQuery(document).ready( function(){
					SweetAlert2Demo.init();
				});

			</script>
		@endif

		@stack('home_script')
		@stack('invoice_script')
		@stack('payment_script')
		@stack('report_script')
		@stack('customer_progress_script')
	</body>
</html>