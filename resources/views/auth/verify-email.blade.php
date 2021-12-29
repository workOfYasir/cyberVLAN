@extends('frontend.layouts.unapproved')

@section('content')
<!--================================= inner banner -->
<div class="header-inner bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-primary">Verify Email</h2>
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                    <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Verify Email </span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--================================= inner banner -->

<!--================================= Verify Email -->
<section class="space-ptb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="section-title-02">
                    <h2>{{ __('Verify Email') }}</h2>
                </div>
                <p> {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
                @if (session('status') === 'verification-link-sent')
                <p>
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </p>
                @endif
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-3 mb-3 mb-lg-0">{{ __('Resend Verification Email') }}</button>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-3 mb-3 mb-lg-0">{{ __('Log out') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================================= Verify Email -->
@endsection