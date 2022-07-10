@extends('layouts.home', ['title' => "Sign In - ", 'no_header'=>true, 'no_footer'=>true])

@section('content')
    <section class="log-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-md-11">

                    <div class="row no-gutters position-relative log_rads justify-content-center">
{{--                        @include("auth.partial_auth_view")--}}

                        <div class="col-lg-8 col-md-7 position-static p-4">
                            <form action="{{route('login')}}" method="POST" class="log_wraps">
                                @csrf
                                <a href="{{route('index')}}" class="log-logo_head"><img src="{{asset('assets/img/logo.png')}}" class="img-fluid" width="80" alt="" /></a>
                                <div class="log__heads">
                                    <h4 class="mt-0 logs_title">Sign <span class="theme-cl">In</span></h4>
                                </div>

                                <div class="form-group">
                                    <label>Emain Address*</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="email@domain.com" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Password*<a href="{{route('password.request')}}" class="elio_right">Forget Password?</a></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           placeholder="Password" name="password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn_apply w-100 btn-danger" value="Sign In">
                                </div>

                                <div class="form-group text-center mb-0 mt-3">
                                    You Have't Any Account? <a href="{{route('register')}}" class="theme-cl">SignUp</a>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
