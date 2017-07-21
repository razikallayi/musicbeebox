<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <meta name="theme-color" content="#462e61">
    <link rel="icon" sizes="192x192" href="{{url('assets/admin/favicon.png')}}">


    @section('styles')


    <link rel="manifest" href="{{url('assets/admin/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url('assets/admin/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{url('assets/admin/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url('assets/admin/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Preloader Css -->
    <link href="{{url('assets/admin/plugins/material-design-preloader/md-preloader.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url('assets/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{url('assets/admin/css/project-style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url('assets/admin/css/themes/theme-ccl.css')}}" rel="stylesheet" />
    @show
</head>

<body class="theme-ccl">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="md-preloader pl-size-md">
                <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
                </svg>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    @include('admin.layout.partials.searchbar')
    @include('admin.layout.partials.topnav')
    <section>
        @include('admin.layout.partials.leftsidebar')
        {{-- @include('admin.layout.partials.rightsidebar') --}}
        
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>@yield('title')</h2>
            </div>
            @yield('content')
        </div>
    </section>

    @section('scripts')

    <!-- Jquery Core Js -->
    <script src="{{url('assets/admin/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{url('assets/admin/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{url('assets/admin/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{url('assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{url('assets/admin/plugins/node-waves/waves.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{url('assets/admin/js/admin.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{url('assets/admin/js/demo.js')}}"></script>
    <!-- jquery validation plugin -->

    <script src="{{url('assets/admin/plugins/jquery-validation/jquery.validate.js')}}"></script>

    <script src="{{url('assets/admin/js/pages/forms/form-validation.js')}}"></script>
    

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{url('assets/admin/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{url('assets/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{url('assets/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('assets/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{url('assets/admin/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{url('assets/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{url('assets/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{url('assets/admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{url('assets/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    
    <script src="{{url('assets/admin/js/pages/tables/jquery-datatable.js')}}"></script>
    

    @show
</body>

</html>