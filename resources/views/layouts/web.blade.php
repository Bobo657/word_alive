
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="As a Church centered on Jesus and his gospel, our utmost priority is to ensure that all individuals are treated with dignity and respect. We firmly believe in upholding the values of fairness and honor, valuing each person for who they are." />
<meta name="keywords" content="As a Church centered on Jesus and his gospel, our utmost priority is to ensure that all individuals are treated with dignity and respect. We firmly believe in upholding the values of fairness and honor, valuing each person for who they are." />
<meta name="author" content="Cobbo" />

<!-- Page Title -->
<title>{{ config('app.name')}} | @yield('title')</title>

<!-- Favicon and Touch Icons -->
<link href="/images/favicon.png" rel="shortcut icon" type="image/png">
<link href="/images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="/css/animate.css" rel="stylesheet" type="text/css">
<link href="/css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="/css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="/css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="/css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="/css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="/css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="/js/jquery-2.2.4.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="/js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('styles')
</head>
<body class="">
<div id="wrapper" class="clearfix">
  
  <!-- Header -->
  <header id="header" class="header">
    <div class="header-top bg-theme-color-2 sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-10 pt-10 pb-10">
            <div class="widget no-border m-0">
              <ul class="list-inline">
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="text-white" href="#">{{ config('app.phone')}}</a> </li>
              
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#">{{ config('app.email')}}</a> </li>
              </ul>
            </div>
          </div>
        
          <div class="col-md-2 pb-10">
            <div class="widget no-border m-0">
              <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                <li class="mt-sm-10 mb-sm-10">
                  <!-- Modal: Appointment Starts -->
                  <a class="btn btn-default btn-flat btn-xs bg-light p-5 font-11 pl-10 pr-10" href="{{ route('donate') }}">Donate Now</a>
                </li>
                <li class="mt-sm-10 mb-sm-10">
                  <a class="btn btn-default btn-flat btn-xs bg-light p-5 font-11 pl-10 pr-10" href="{{ route('member.register') }}">Join Us</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
          <nav id="menuzord-right" class="menuzord default">
            <a class="menuzord-brand pull-left flip" href="/">
              <img src="images/logo-wide.png" alt="">
            </a>
            <ul class="menuzord-menu">
              <li class="active"><a href="/">Home</a></li>
              <li><a href="/about_us">About Us</a></li>
              <li><a href="/ministries">Ministries</a></li>
              <li><a href="/our_pastors">Our Pastors</a></li>
              <li><a href="/events">Events</a></li>
              @auth('partner')
                <li><a href="{{ route('partner.dashboard') }}">Partner Dashboard</a></li>
              @else
              <li><a href="#home">Partners<span class="indicator"></span></a>
                <ul class="dropdown">
                  <li><a href="{{ route('partner.join') }}">Become a Partner</a></li>
                  <li><a href="{{ route('partner.login') }}">Partner Login</a></li>
                </ul>
              </li>
              @endauth
              <li><a href="/contact_us">Contact Us</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    @yield('content')
  </div>
  <!-- end main-content -->

  <!-- Footer -->
  <footer id="footer" class="footer bg-black-222" data-bg-img="images/footer-bg.png">
    <div class="container pt-70 pb-40">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <img src="/images/logo-wide-white.png" width="60%">
          <p class="mt-20 mb-20" style="color: white;">
          As a Church centered on Jesus and his gospel, our utmost priority is to ensure that all individuals are treated with dignity and respect. We firmly believe in upholding the values of fairness and honor, valuing each person for who they are.</p>
          <ul class="styled-icons icon-dark icon-circled icon-sm mb-40">
            <li><a href="{{ config('app.facebook') }}"><i class="fa fa-facebook"></i></a> </li>
            <li><a href="{{ config('app.twitter') }}"><i class="fa fa-twitter"></i></a> </li>
            <li><a href="{{ config('app.youtube') }}"><i class="fa fa-youtube"></i></a> </li>
          </ul>
    </div>
    </div>
    </div>
    <div class="footer-bottom bg-black-333">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6 text-white" style="color: white;">
            <p class="font-11 m-0">Copyright &copy;{{ date('Y')}} {{ config('app.name')}}. All Rights Reserved</p>
          </div>
          <div class="col-md-6 text-right text-white">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5 font-12" >
                <li>
                  <a href="{{ route('terms_conditions') }}" style="color: white;">Terms and Conditions</a>
                </li>
                <li>|</li>
                <li>
                  <a href="{{ route('privacy_policy') }}" style="color: white;">Privacy Policy</a>
                </li>
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="/js/custom.js"></script>
</body>
</html>