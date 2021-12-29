@extends('frontend.layouts.app')

@section('content')
<!--================================= inner banner -->
<div class="header-inner bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-primary">Register</h2>
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                    <li class="breadcrumb-item active">
                        <i class="fas fa-chevron-right"></i> <span> Register </span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--================================= inner banner -->

<!--================================= Register -->
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="login-register">
                    <div class="section-title">
                        <h4 class="text-center">Create Your Account</h4>
                    </div>
                    <div class="tab-content">
                        <form class="mt-4" novalidate="novalidate" method="POST" action="{{ route('registerAuth') }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input class="form-control @error('first_name') is-invalid @enderror" type="text" placeholder="" name="first_name" autocomplete="off" />
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input class="form-control  @error('last_name') is-invalid @enderror" type="text" placeholder="" name="last_name" autocomplete="off" />
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Email Address *</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="" name="email" autocomplete="off" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Password *</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" autocomplete="off" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="password2">Confirm Password *</label>
                                    <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation" autocomplete="off" />
                                </div>
                                <div class="mb-3 col-md-6 select-border">
                                    <label class="form-label" for="sector">Freelancer </label>
                                    <input class="form-check-input" type="radio" name="role" value="1" checked />
                                </div>
                                <div class="mb-3 col-md-6 select-border">
                                    <label class="form-label" for="sector">Job Poster </label>
                                    <input class="form-check-input" type="radio" name="role" value="2" />
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="external_reference" name="external_reference" />
                                        <label class="form-check-label" for="Remember-02">
                                            Do you have any External Reference ?
                                        </label>
                                    </div>
                                </div>
                                <div class="row" id="reference-details" style="display:none;">
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Reference Name *</label>
                                        <input class="form-control" type="text" placeholder="External Reference Name" id="external_name" name="external_name" autocomplete="off" />
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Reference Email *</label>
                                        <input class="form-control" type="email" placeholder="External Reference Email" id="external_email" name="external_email" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Remember-02" />
                                        <label class="form-check-label" for="Remember-02">
                                            you accept our Terms and Conditions and Privacy Policy
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    @if($uuid != null || !empty($uuid) || $uuid != '')
                                    <input type="hidden" value={{$uuid}} name="referral_user" id="referral_user" />
                                    @else
                                    <input type="hidden" name="referral_user" id="referral_user" />
                                    @endif
                                    <button type="submit" class="btn btn-primary d-block">Sign up</button>
                                </div>
                                @if (Route::has('login'))
                                <div class="col-md-6 text-md-end mt-2 text-center">
                                    <p>Already registered? <a href="{{ route('login') }}"> Sign in here</a></p>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="mt-4">
                        <fieldset>
                            <legend class="px-2">Login or Sign up with</legend>
                            <div class="social-login">
                                <ul class="list-unstyled d-flex mb-0">
                                    <li class="google text-center">
                                        <a href="#"> <i class="fab fa-google me-4"></i>Login with Google</a>
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
<!--================================= Register -->
@endsection