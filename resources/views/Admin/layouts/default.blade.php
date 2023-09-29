<!DOCTYPE html>
<html lang="en">
<head>
    @include('Admin.includes.head')
</head>
<body>
    {{-- <div id="spinner"></div> --}}
    @include('Admin.includes.navbar')
    @include('Admin.includes.slidebar')

    @yield('dashboard')

    @yield("conference")

    @yield("profile")

    @yield("users")

    @yield("categories")


    @include('Admin.includes.footer')

    {{-- back to top button --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    {{-- <script>
        window.addEventListener('load', function() {
            document.getElementById('spinner').style.display = 'none';
        });
    </script> --}}
    {{-- All script file --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('errorjs')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js" defer></script>
    @stack('js')
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
