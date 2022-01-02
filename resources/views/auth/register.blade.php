@extends('layouts.home', ['title' => " | Register", 'no_header'=>true, 'no_footer'=>true])

@section('content')
    <section class="log-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">

                    <div class="row no-gutters position-relative log_rads">
                        <div class="col-lg-6 col-md-5 bg-cover" style="background:#1f2431 url('{{asset("assets/img/log.png")}}')no-repeat;">
                            <div class="lui_9okt6">
                                <div class="_loh_revu97">
                                    <div id="reviews-login">

                                        <!-- Single Reviews -->
                                        <div class="_loh_r96">
                                            <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                                            <div class="_loh_r92">
                                                <h4>Good Services</h4>
                                            </div>
                                            <div class="_loh_r93">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div class="_loh_foot_r93">
                                                <h4>Shilpa D. Setty</h4>
                                                <span>Team Leader</span>
                                            </div>
                                        </div>

                                        <!-- Single Reviews -->
                                        <div class="_loh_r96">
                                            <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                                            <div class="_loh_r92">
                                                <h4>Good Services</h4>
                                            </div>
                                            <div class="_loh_r93">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div class="_loh_foot_r93">
                                                <h4>Adam Wilsom</h4>
                                                <span>Mak Founder</span>
                                            </div>
                                        </div>

                                        <!-- Single Reviews -->
                                        <div class="_loh_r96">
                                            <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                                            <div class="_loh_r92">
                                                <h4>Customer Support</h4>
                                            </div>
                                            <div class="_loh_r93">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div class="_loh_foot_r93">
                                                <h4>Kunal M. Wilsom</h4>
                                                <span>CEO & Founder</span>
                                            </div>
                                        </div>

                                        <!-- Single Reviews -->
                                        <div class="_loh_r96">
                                            <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                                            <div class="_loh_r92">
                                                <h4>Ultimate Services</h4>
                                            </div>
                                            <div class="_loh_r93">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div class="_loh_foot_r93">
                                                <h4>Mark Jugermark</h4>
                                                <span>MCL Founder</span>
                                            </div>
                                        </div>
                                        <!-- Single Reviews -->
                                        <div class="_loh_r96">
                                            <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                                            <div class="_loh_r92">
                                                <h4>Item Support</h4>
                                            </div>
                                            <div class="_loh_r93">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div class="_loh_foot_r93">
                                                <h4>Kirti Washinton</h4>
                                                <span>Web Designer</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-7 position-static p-4">
                            <div class="log_wraps">
                                <a href="{{route('index')}}" class="log-logo_head"><img src="{{asset('assets/img/logo.png')}}" class="img-fluid" width="80" alt="" /></a>
                                <div class="log__heads">
                                    <h4 class="mt-0 logs_title">Create An <span class="theme-cl">Account</span></h4>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input type="text" class="form-control" placeholder="Firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input type="text" class="form-control" placeholder="Lastname">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email Address*</label>
                                    <input type="text" class="form-control" placeholder="email@domain.com">
                                </div>

                                <div class="form-group">
                                    <label>Password*</label>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <a href="javascript:void(0);" class="btn btn_apply w-100">Sign Up</a>
                                </div>

                                <div class="form-group text-center mb-0 mt-3">
                                    Have You Already An Account? <a href="{{route('login')}}" class="theme-cl">LogIn</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
