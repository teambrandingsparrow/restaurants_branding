
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>ERP</title>
	<meta name="description" content="Grandin is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Grandin Admin, Grandinadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Data table CSS -->
	<link href="./vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Toast CSS -->
	<link href="./vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="./dist/css/style.css" rel="stylesheet" type="text/css">
	@yield('css')
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-5-active pimary-color-pink">
		<!-- Top Menu Items -->
        @include('layouts.header')
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
        @include('layouts.nav')
		<!-- /Left Sidebar Menu -->
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				<!-- Row -->
                @yield('content')
				<!-- /Row -->
				
			</div>
			
			<!-- Footer -->
			@include('layouts.footer')
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="./vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
	<!-- Data table JavaScript -->
	<script src="./vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="./dist/js/jquery.slimscroll.js"></script>
	
	<!-- simpleWeather JavaScript -->
	<script src="./vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="./vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
	<script src="./dist/js/simpleweather-data.js"></script>
	
	<!-- EChartJS JavaScript -->
	<script src="./vendors/bower_components/echarts/dist/echarts-en.min.js"></script>
	<script src="./vendors/echarts-liquidfill.min.js"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="./vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="./vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="./dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="./vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="./vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Toast JavaScript -->
	<script src="./vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	
	<!-- Piety JavaScript -->
	<script src="./vendors/bower_components/peity/jquery.peity.min.js"></script>
	<script src="./dist/js/peity-data.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="./vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="./dist/js/init.js"></script>
	<script src="./dist/js/dashboard6-data.js"></script>


	 
	  <script src="./dist/js/dataTables-data.js"></script>
	  @yield('script')
	 
</body>

</html>
