<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="www.frebsite.nl" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>LearnUp - Online Course & Education HTML Template</title>

    <!-- Custom CSS -->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="{{asset('assets/css/colors.css')}}" rel="stylesheet">

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
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->


    <!-- ============================ Dashboard: Dashboard Start ================================== -->
    <section class="gray pt-0">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-3 col-md-3 p-0">
                    <div class="dashboard-navbar">

                        <div class="d-user-avater">
                            <img src="{{auth()->user()->photo}}" class="img-fluid avater" alt="">
                            <h4>{{ucwords(auth()->user()->name)}}</h4>
                            <span>Canada USA</span>
                        </div>

                        <div class="d-navigation">
                            <ul id="side-menu">
                                <li class="active"><a href="{{route('teacher.index')}}"><i class="ti-user"></i>Dashboard</a></li>
{{--                                <li><a href="javascript:void(0);"><i class="ti-heart"></i>My Profile</a></li>--}}
                                <li><a href="{{route('course.add')}}"><i class="ti-plus"></i>Add Course</a></li>
                                <li><a href="{{route('course.index')}}"><i class="ti-plus"></i>My Courses</a></li>
{{--                                <li><a href="{{route('course.add')}}"><i class="ti-plus"></i>Add Course</a></li>--}}
{{--                                <li><a href="saved-courses.html"><i class="ti-heart"></i>Saved Courses</a></li>--}}
{{--                                <li class="dropdown">--}}
{{--                                    <a href="all-courses.html"><i class="ti-layers"></i>All Courses<span class="ti-angle-left"></span></a>--}}
{{--                                    <ul class="nav nav-second-level">--}}
{{--                                        <li><a href="all-courses.html">All</a></li>--}}
{{--                                        <li><a href="javascript:void(0);">Published</a></li>--}}
{{--                                        <li><a href="javascript:void(0);">Pending</a></li>--}}
{{--                                        <li><a href="javascript:void(0);">Expired</a></li>--}}
{{--                                        <li><a href="javascript:void(0);">In Draft</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a href="settings.html"><i class="ti-settings"></i>Settings</a></li>--}}
{{--                                <li><a href="reviews.html"><i class="ti-comment-alt"></i>Reviews</a></li>--}}

                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-power-off"></i>Log Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-12">
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
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
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
@yield("js")

</body>

</html>
