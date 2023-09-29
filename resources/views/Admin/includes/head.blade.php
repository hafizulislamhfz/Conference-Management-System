    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="prefetch" href="{{ asset('Admin/css/Loader.svg') }}" priority="high">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Favicons -->
    <link href="{{ asset('Admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('Admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('Admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('Admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/simple-datatables/style.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('Admin/css/style.css') }}" rel="stylesheet">

