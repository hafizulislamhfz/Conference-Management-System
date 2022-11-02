<!DOCTYPE html>
<html lang="en">
<head>
  @include('Admin.includes.head')
</head>
<body>
  @include('Admin.includes.navbar')
  @include('Admin.includes.slidebar')
 
  @yield("admin")

  @yield("profile")

  @yield("users")



  



  <!-- Vendor JS Files -->
  <script src="{{ asset('Admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('Admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('Admin/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('Admin/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('Admin/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('Admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('Admin/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('Admin/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('Admin/js/main.js') }}"></script>

</body>
</html>
