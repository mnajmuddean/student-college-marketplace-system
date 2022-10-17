<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - UiTM Jasin Student College Marketplace System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../logo/ujscms-logo.png" rel="icon">
  <link href="../backend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../backend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../backend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../backend/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../backend/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../backend/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../backend/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../backend/css/style.css" rel="stylesheet">

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
  <script src="../backend/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../backend/vendor/chart.js/chart.min.js"></script>
  <script src="../backend/vendor/echarts/echarts.min.js"></script>
  <script src="../backend/vendor/quill/quill.min.js"></script>
  <script src="../backend/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../backend/vendor/tinymce/tinymce.min.js"></script>
  <script src="../backend/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../backend/js/main.js"></script>

</body>

</html>