<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Home - Dashboard</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <!-- Font Awesome-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/all.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/fontawesome.css') }}">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/icofont.css') }}">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/themify.css') }}">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/flag-icon.css') }}">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/feather-icon.css') }}">
  <!-- Plugins css start-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/chartist.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/date-picker.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/prism.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/vector-map.css') }}">
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/bootstrap.css') }}">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style.css') }}">
  <link id="color" rel="stylesheet" href="{{ asset('public/assets/css/color-1.css') }}" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/custom.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/mycss.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/responsive.css') }}">
  <style>
    .swal2-confirm{
        margin-left: 10px!important;
    }
  </style>
  </head>
<body class="antialiased">
  <div class="loader-wrapper">
    <div class="theme-loader">
      <div class="loader-p"></div>
    </div>
  </div>
  <!-- Loader ends-->
  <!-- page-wrapper Start-->
  <div class="page-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    @include('admin.parts.main-header')
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
      <!-- Page Sidebar Start-->
      @include('admin.parts.sidebar')
      <!-- Page Sidebar Ends-->
      <div class="page-body">
        @include('admin.parts.breadcrumb')
        <!-- @include('admin.parts.flash-message') -->
        @yield('content')

      </div>
      <!-- footer start-->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 footer-copyright">
              <p class="mb-0">Copyright 2021-22 &copy; Halistaw All rights reserved.</p>
            </div>
            <div class="col-md-6">
              <p class="pull-right mb-0">Giopio crafted & made with <i class="fa fa-heart font-secondary"></i></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- @show -->
  <script src="{{ asset('public/assets/js/jquery-3.5.1.min.js') }}"></script>
  <!-- feather icon js-->
  <script src="{{ asset('public/assets/js/icons/feather-icon/feather.min.js') }}"></script>
  <script src="{{ asset('public/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('public/assets/js/sidebar-menu.js') }}"></script>
  <script src="{{ asset('public/assets/js/config.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('public/assets/js/bootstrap/popper.min.js') }}"></script>
  <script src="{{ asset('public/assets/js/bootstrap/bootstrap.min.js') }}"></script>


    <script src="{{ asset('public/assets/js/chart/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/chart/chartjs/chartist.js') }}"></script>
    <script src="{{ asset('public/assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('public/assets/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('public/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('public/assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/clipboard/clipboard.min.js') }}"></script>

    <!-- Plugins JS start-->
    <script src="{{ asset('public/assets/js/counter/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('public/assets/js/counter/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('public/assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('public/assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('public/assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('public/assets/js/dashboard/dashboard_2.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('public/assets/js/script.js') }}"></script>
  @yield('script')
  <!-- login js--> 
  <!-- Plugin used-->
@if(Session::has('message'))
<script>
  'use strict';
  var notify = $.notify('<i class="fa fa-bell-o"></i><strong>{{ Session::get('status') }} </strong> {{ Session::get('message') }}', {
    type: 'theme',
    allow_dismiss: true,
    delay: 2000,
    showProgressbar: true,
    timer: 300
  });

</script>
@endif

</body>

</html>