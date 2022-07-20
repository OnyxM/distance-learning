<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="author" content="Onyx Moffo"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="Distance Learning App">
    <link rel="icon" type="image/png" href="{{asset('assets/img/logo.ico')}}">

    <title>{{$title}}Smart Learning</title>

    <!-- Custom CSS -->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="{{asset('assets/css/colors.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')


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
    @if(!isset($no_header))
        <div class="header header-light">
            @include("layouts.nav", ['logged_as' => "teacher"])
        </div>
    @endif
<!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    @yield("content")

<!-- ============================== Start Newsletter ================================== -->
    @if(!isset($no_footer))
{{--        <section class="bg-cover newsletter inverse-theme"--}}
{{--                 style="background:url('{{asset("assets/img/banner-2.jpg")}}');" data-overlay="9">--}}
{{--            <div class="container">--}}
{{--                <div class="row justify-content-center">--}}
{{--                    <div class="col-lg-7 col-md-8 col-sm-12">--}}
{{--                        <div class="text-center">--}}
{{--                            <h2>Join Thousand of Happy Students!</h2>--}}
{{--                            <p>Subscribe our newsletter & get latest news and updation!</p>--}}
{{--                            <form class="sup-form">--}}
{{--                                <input type="email" class="form-control sigmup-me" placeholder="Your Email Address"--}}
{{--                                       required="required">--}}
{{--                                <input type="submit" class="btn btn-theme" value="Get Started">--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- ================================= End Newsletter =============================== -->

        <!-- ============================ Footer Start ================================== -->
        <footer class="light-footer bg-dark-blue">
            <div>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <img src="{{asset('assets/img/dl237-light.png')}}" class="img-footer" alt=""/>
                                <div class="footer-add">
                                    <p>Universié de Yaoundé I</p>
                                    <p>BP 812 Yaounde - Cameroon</p>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title text-white">Navigations</h4>
                                <ul class="footer-menu">
                                    <li><a href="javascript:void(0);">About Us</a></li>
                                    <li><a href="javascript:void(0);">FAQs Page</a></li>
                                    <li><a href="javascript:void(0);">Checkout</a></li>
                                    <li><a href="javascript:void(0);">Contact</a></li>
                                    <li><a href="javascript:void(0);">Blog</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title text-white">New Categories</h4>
                                <ul class="footer-menu">
                                    <li><a href="#">Designing</a></li>
                                    <li><a href="#">Nusiness</a></li>
                                    <li><a href="#">Software</a></li>
                                    <li><a href="#">WordPress</a></li>
                                    <li><a href="#">PHP</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title text-white">Help & Support</h4>
                                <ul class="footer-menu">
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="#">Live Chat</a></li>
                                    <li><a href="#">Mail Us</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Faqs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endif
    <!-- ============================ Footer End ================================== -->

    <!-- Log In Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="registermodal">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">Log In</h4>
                    <div class="login-form">
                        <form>

                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="*******">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                            </div>

                        </form>
                    </div>

                    <div class="social-login mb-3">
                        <ul>
                            <li>
                                <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                                <label for="reg" class="checkbox-custom-label">Save Password</label>
                            </li>
                            <li class="right"><a href="#" class="theme-cl">Forget Password?</a></li>
                        </ul>
                    </div>

                    <div class="modal-divider"><span>Or login via</span></div>
                    <div class="social-login ntr mb-3">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                        </ul>
                    </div>

                    <div class="text-center">
                        <p class="mt-2">Haven't Any Account? <a href="register.html" class="link">Click here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Sign Up Modal -->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="sign-up">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">Sign Up</h4>
                    <div class="login-form">
                        <form>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="*******">
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">Sign Up</button>
                            </div>

                        </form>
                    </div>

                    <div class="modal-divider"><span>Or Signup via</span></div>
                    <div class="social-login ntr mb-3">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                        </ul>
                    </div>

                    <div class="text-center">
                        <p class="mt-3"><i class="ti-user mr-1"></i>Already Have An Account? <a href="#" class="link">Go For LogIn</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All JS -->
<!-- ============================================================== -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/slick.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counterup.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script>
    let loader = '<span class="loader"><i class="spinner-grow" role="status"></i></span>';

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
</script>
@yield("js")
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

</body>
</html>
