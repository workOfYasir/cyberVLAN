@extends('frontend.layouts.unapproved')

@section('content')
<!--================================= inner banner -->
<div class="header-inner bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-primary">Approval Pending</h2>
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="#"> Home </a></li>
                    <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Approval Pending </span></li>
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
                    <h2>Approval Pending</h2>
                </div>
                <p> Your Account is Varified. Please wait for admin to approve it.</p>
            </div>
        </div>
    </div>
</section>
<!--================================= Verify Email -->
@endsection