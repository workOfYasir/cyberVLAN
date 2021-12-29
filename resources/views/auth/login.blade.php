@extends('frontend.layouts.app')

@section('content')
<!--================================= inner banner -->
<div class="header-inner bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-primary">Login</h2>
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                    <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Login </span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--================================= inner banner -->

<!--================================= Signin -->
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="login-register">
                    <div class="section-title">
                        <h4 class="text-center">Login to Your Account</h4>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="candidate" role="tabpanel">
                            <form class="mt-4" method="POST" novalidate="novalidate" action="{{ route('loginAuth') }}">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label class="form-label" for="Email2">Email Address *</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" autocomplete="off" />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="approve" value="1">
                                    <div class="mb-3 col-12">
                                        <label class="form-label" for="password2">Password *</label>
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-12">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary d-grid">Sign In</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mt-3 mt-md-0 forgot-pass">
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            @endif
                                            @if (Route::has('register'))
                                            <p class="mt-1">Don't have account? <a href="{{ route('register') }}">Sign Up here</a></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-4">
                        <fieldset>
                            <legend class="px-2">Login or Sign up with</legend>
                            <div class="social-login">
                                <ul class="list-unstyled d-flex mb-0">
                                    <li class="google text-center">
                                        <a href="{{route('google.login')}}"> <i class="fab fa-google me-4"></i>Login with Google</a>
                                    </li>
                                    <li class="linkedin text-center">
                                        <a href="#"> <i class="fab fa-linkedin-in me-4"></i>Login with Linkedin</a>
                                    </li>
                                </ul>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================= Signin -->
@endsection