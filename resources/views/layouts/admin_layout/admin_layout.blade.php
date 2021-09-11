<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('contents/admin/assets/images/favicon.png')}}">
    <title>@yield('title', 'Admin Panel')</title>
    @stack('css')
    <link href="{{asset('contents/admin/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('contents/admin/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('contents/admin/dist/css/custom.css')}}" rel="stylesheet">
    <script src="{{asset('contents/admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('contents/admin/assets/libs/toastr/build/toastr.min.js')}}"></script>
</head>

<body>
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
    @if(Session::has('success'))
    <script>
        $.toast({
            heading: 'Success',
            text: '{{session("success")}}',
            position: 'top-right',
            loaderBg:'#ff5050',
            bgColor: '#2cd07e',
            icon: 'success',
            hideAfter: 3000, 
            stack: 6
        });
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        $.toast({
            heading: 'Error',
            text: '{{session("error")}}',
            position: 'top-right',
            loaderBg:'#ff5050',
            bgColor: '#2cd07e',
            icon: 'error',
            hideAfter: 3000, 
            stack: 6
        });
    </script>
    @endif
<!-- Main wrapper - style you can find in pages.scss -->

<div id="main-wrapper">

    <!-- Topbar header - style you can find in pages.scss -->

    <header class="topbar">
        @include('layouts.admin_layout.admin_header')
    </header>

    <!-- End Topbar header -->


    <!-- Left Sidebar - style you can find in sidebar.scss  -->

   @include('layouts.admin_layout.admin_sidebar')

    <!-- End Left Sidebar - style you can find in sidebar.scss  -->


    <!-- Page wrapper  -->

    <div class="page-wrapper">

        <!-- Container fluid  -->

        @yield('content')

        <!-- End Container fluid  -->


        <!-- footer -->

        @include('layouts.admin_layout.admin_footer')

        <!-- End footer -->

    </div>

    <!-- End Page wrapper  -->

</div>

<!-- End Wrapper -->


<!-- customizer Panel -->


<!-- All Jquery -->

<script src="{{asset('contents/admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('contents/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('contents/admin/dist/js/app.min.js')}}"></script>
<script src="{{asset('contents/admin/dist/js/app.init.minimal.js')}}"></script>
<script src="{{asset('contents/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('contents/admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>
<script src="{{asset('contents/admin/dist/js/waves.js')}}"></script>
<script src="{{asset('contents/admin/dist/js/sidebarmenu.js')}}"></script>
@stack('js')
<script src="{{asset('contents/admin/dist/js/custom.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>
