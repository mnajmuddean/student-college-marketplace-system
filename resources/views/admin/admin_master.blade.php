<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UiTM Jasin Student College Marketplace System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <!-- Favicons -->
  <link href="{{ asset('/logo/ujscms-logo.png')}}" rel="icon">  
  <link href="{{ asset('/backend/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> 

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/backend/vendor/bootstrap/css/bootstrap.min.css ')}}" rel="stylesheet"> 
  <link href="{{ asset('/backend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet"> 
  <link href="{{ asset('/backend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">  
  <link href="{{ asset('/backend/vendor/quill/quill.snow.css')}}" rel="stylesheet"> 
  <link href="{{ asset('/backend/vendor/quill/quill.bubble.css')}}" rel="stylesheet"> 
  <link href="{{ asset('/backend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">  
  <link href="{{ asset('/backend/vendor/simple-datatables/style.css')}}" rel="stylesheet">  
  


  <!-- Template Main CSS File -->
  <link href="{{  asset('/backend/css/style.css')}}" rel="stylesheet"> 

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.body.header')
<!-- End Header -->

  <!-- ======= Sidebar ======= -->

  @include('admin.body.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    @yield('admin')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.body.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
 
  <script src="{{ asset('/backend/vendor/apexcharts/apexcharts.min.js') }}"></script> 
  <script src="{{ asset('/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/backend/vendor/chart.js/chart.min.js') }}"></script> 
  <script src="{{ asset('/backend/vendor/echarts/echarts.min.js') }}"></script> 
  <script src="{{ asset('/backend/vendor/quill/quill.min.js') }}"></script> 
  <script src="{{ asset('/backend/vendor/simple-datatables/simple-datatables.js') }}"></script> 
  <script src="{{ asset('/backend/vendor/tinymce/tinymce.min.js') }}"></script> 
  <script src="{{ asset('/backend/vendor/php-email-form/validate.js') }}"></script> 

  <!-- Template Main JS File -->
  <script src="{{ asset('/backend/js/main.js')}}"></script> 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    @if(Session::has('message'))
    var type = "{{  Session::get('alert-type','info') }}"
    switch(type){
        case 'info' :
        toastr.info(" {{  Session::get('message') }}");
        break;

        case 'success' : 
        toastr.success(" {{  Session::get('message') }}");
        break;

        case 'warning' :
        toastr.warning(" {{  Session::get('message') }}");
        break;

        case 'error' :
        toastr.error(" {{  Session::get('message') }}");
        break;
    }
    @endif
</script>

</body>

</html>