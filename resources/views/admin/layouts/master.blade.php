<!doctype html>
<html class="no-js " lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>@yield('title') | LetRecharge</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
        <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/plugins/dropify/css/dropify.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('admin/assets/plugins/charts-c3/plugin.css') }}"/>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <link rel="stylesheet" href="{{ asset('admin/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">

        <link rel="stylesheet" href="{{ asset('admin/assets/plugins/morrisjs/morris.min.css') }}" />

        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/style.min.css') }}">
    </head>

    <body class="theme-purple">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('admin/assets/images/loader.svg') }}" width="48" height="48" alt="Aero"></div>
                <p>Please wait...</p>
            </div>
        </div>

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div> 

        <!-- Left Sidebar -->
        @include('admin.layouts.sidebar')

        @yield('content')

        <!-- Jquery Core Js --> 
        <script src="{{ asset('admin/assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
        <script src="{{ asset('admin/assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

        <script src="{{ asset('admin/assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
        <script src="{{ asset('admin/assets/bundles/sparkline.bundle.js') }}"></script> <!-- Sparkline Plugin Js -->
        <script src="{{ asset('admin/assets/bundles/c3.bundle.js') }}"></script>

        
        <script src="{{ asset('admin/assets/bundles/datatablescripts.bundle.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>

        <script src="{{ asset('admin/assets/plugins/ckeditor/ckeditor.js') }}"></script> <!-- Ckeditor --> 
        <script src="{{ asset('admin/assets/plugins/dropify/js/dropify.min.js') }}"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> <!-- Bootstrap Notify Plugin Js -->
        <script src="{{ asset('admin/assets/plugins/sweetalert/sweetalert.min.js') }}"></script> <!-- SweetAlert Plugin Js --> 

        <script src="{{ asset('admin/assets/bundles/mainscripts.bundle.js') }}"></script>
        <script src="{{ asset('admin/assets/js/pages/index.js') }}"></script>
        <script src="{{ asset('admin/assets/js/pages/forms/editors.js') }}"></script>
        <script src="{{ asset('admin/assets/js/pages/forms/dropify.js') }}"></script>
        <script src="{{ asset('admin/assets/js/pages/tables/jquery-datatable.js') }}"></script>

        <script type="text/javascript">
            @if(session('success'))
            toastr.success("{{ session('success') }}");
            @endifif(session('error'))
            toastr.error("{{ session('error') }}");
            @endif
        </script>
        @stack('js')
    </body>
</html>