<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tsinda Moffo Onesime" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>{{$title}}Smart Learning</title>

    <!-- Custom CSS -->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="{{asset('assets/css/colors.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    @yield("css")
</head>

<body class="red-skin">


<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    <div class="header header-light head-shadow">
        @include("layouts.nav", ['logged_as' => 'teacher'])
    </div>

    <!-- ============================ Dashboard: Dashboard Start ================================== -->
    <section class="gray pt-0">
        <div class="container-fluid">

            <div class="row justify-content-center">
                @if(isset($large_band)) <div class="col-lg-12 col-md-12 col-sm-12">@else <div class="col-lg-8 col-md-8 col-sm-12"> @endif
                        @yield("content")
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Dashboard: Dashboard End ================================== -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('assets/js/select2.min.js')}}"></script>--}}
<script src="{{asset('assets/js/slick.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counterup.min.js')}}"></script>
{{--<script src="{{asset('assets/js/custom.js')}}"></script>--}}
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
<script>
    let stockage = localStorage;

    $('#side-menu').metisMenu();
</script>

<script>
    let loader = '<span class="loader"><i class="spinner-grow" role="status"></i></span>';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield("js")

</body>

</html>
