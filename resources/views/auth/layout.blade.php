
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="The total transformation and restoration of lives and family destinies, creating the path to honour,glory and dignity, through the teaching and preaching of God’s Word in the demonstration of the Power of the Holy Spirit">
	<meta property="og:title" content="The total transformation and restoration of lives and family destinies, creating the path to honour,glory and dignity, through the teaching and preaching of God’s Word in the demonstration of the Power of the Holy Spirit">
	<meta property="og:description" content="The total transformation and restoration of lives and family destinies, creating the path to honour,glory and dignity, through the teaching and preaching of God’s Word in the demonstration of the Power of the Holy Spirit">
	<meta property="og:image" content="social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>{{ config('app.name')}} Login</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="/admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/admin/css/style.css" rel="stylesheet">

</head>

<body class="vh-100" data-primary="color_6">
	<div class="page-wraper">

		<!-- Content -->
		<div class="browse-job login-style3">
			<!-- Coming Soon -->
			<div class="bg-img-fix overflow-hidden" style="background:#fff url(/admin/images/background/bg6.jpg); height: 100vh;">
				<div class="row gx-0">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-white ">
						<div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside">
							<div id="mCSB_1_container" class="mCSB_container">
								<div class="login-form style-2">
									<div class="card-body">
										<div class="logo-header">
											<a href="/" class="logo"><img src="/admin/images/logo/logo-full.png" alt="" class="width-230 light-logo"></a>
											<a href="/" class="logo"><img src="/admin/images/logo/logofull.png" alt="" class="width-230 dark-logo"></a>
										</div>
                                        
                                        @yield('content')
										
									</div>
										<div class="card-footer">
											<div class=" bottom-footer clearfix m-t10 m-b20 row text-center">
											<div class="col-lg-12 text-center">
												<span> © Copyright by <a href="javascript:void(0);">{{ config('app.name')}} </a> All rights reserved.
                                                </span> 
											</div>
										</div>
									</div>	
											
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- Full Blog Page Contant -->
		</div>
		<!-- Content END-->
	</div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="/admin/vendor/global/global.min.js"></script>
<script src="/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/admin/js/deznav-init.js"></script>
</body>
</html>