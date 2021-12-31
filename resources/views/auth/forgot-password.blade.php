@extends('frontend.layouts.unapproved')

@section('content')
<div class="col-12 col-sm-6 offset-sm-3" >
    <!--begin::Forgot Password Form-->
    <form method="POST" action="{{ route('password.email') }}" class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
    @csrf

        <!--begin::Heading-->
        <div class="text-center mb-10 pt-5">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Forgot Password ?') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-light fs-4">
                {{ __('Enter your email to reset your password.') }}
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group-->
        <div class="fv-row mb-10 p-5">
            <label class="form-label fw-bolder text-dark fs-6">{{ __('Email') }}</label>
            <input class="form-control form-control-solid" type="email" name="email" autocomplete="off" value="{{ old('email') }}" required autofocus/>
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0 pt-5">
            <button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                Submit
            </button>

            <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">{{ __('Cancel') }}</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Forgot Password Form-->
</div>
@endsection