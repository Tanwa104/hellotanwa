<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>welcome to GruhSeva</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('adminno/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminno/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('adminno/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminno/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('adminno/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('adminno/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('adminno/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('adminno/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @include('admin.layout_dash.header_add')
    @yield('comp')
    @include('admin.layout_dash.footer_add')
    
  <!-- Vendor JS Files -->
  <script src="{{asset('adminno/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('adminno/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('adminno/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('adminno/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('adminno/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('adminno/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('adminno/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('adminno/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>