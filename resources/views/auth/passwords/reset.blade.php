@extends('layouts.home', ['title' => " | Reset Password Request", 'no_header'=>true, 'no_footer'=>true])

@section('content')
    <section class="log-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-md-11">
                    <div class="row no-gutters position-relative log_rads">
                        @include("auth.partial_auth_view")

                        <div class="col-lg-6 col-md-7 position-static p-4">
                            <form action="{{ route('password.update') }}" method="POST" class="log_wraps">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <a href="{{route('index')}}" class="log-logo_head"><img src="{{asset('assets/img/logo.png')}}" class="img-fluid" width="80" alt="" /></a>
                                <div class="log__heads">
                                    <h4 class="mt-0 logs_title">Password <span class="theme-cl">Reset</span></h4>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn_apply w-100 btn-danger" value="Reset Password">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
