@extends('frontend.layouts.unapproved')

@section('content')
<!--================================= Inner banner -->
<div class="header-inner bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-primary">Login Verification</h2>
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="#"> Home </a></li>
                    <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Login Verification </span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--================================= Inner banner -->

<!--================================= 2fa -->
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="login-register">
                    <div class="section-title">
                        <h4 class="text-center">Enter OTP to Continue</h4>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="candidate" role="tabpanel">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems.<br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @elseif(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            @endif
                            <form class="mt-4" method="POST" novalidate="novalidate" action="{{ route('2fa') }}">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                            <input id="2fa" type="text" class="form-control" name="2fa" placeholder="Enter the code you received here." required autofocus>
                                            @if ($errors->has('2fa'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('2fa') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary d-grid">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================= 2fa -->
@endsection