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
                            <form action="{{route('register')}}" method="POST" class="log_wraps">
                                @csrf
                                <a href="{{route('index')}}" class="log-logo_head"><img src="{{asset('assets/img/logo.png')}}" class="img-fluid" width="80" alt="" /></a>
                                <div class="log__heads">
                                    <h4 class="mt-0 logs_title">Create An <span class="theme-cl">Account</span></h4>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Firstname <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="Firstname" name="firstname" value="{{ old('firstname') }}" required>
                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Lastname <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Lastname" name="lastname" value="{{ old('lastname') }}" required>
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@domain.com" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Password Confirmation <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirmation" name="password_confirmation" required>
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Date of birth <span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control @error('date_naissance') is-invalid @enderror" placeholder="Date of birth" name="date_naissance" value="{{ old('date_naissance') }}" required>
                                    @error('date_naissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Place of birth <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" placeholder="Place of birth" name="lieu_naissance" value="{{ old('lieu_naissance') }}" required>
                                    @error('lieu_naissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn_apply w-100 btn-danger" value="Sign Up">
                                </div>

                                <div class="form-group text-center mb-0 mt-3">
                                    Have You Already An Account? <a href="{{route('login')}}" class="theme-cl">LogIn</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
