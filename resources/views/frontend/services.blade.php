
@extends('frontend.layouts.app')

@section('content')
<!--=================================
inner banner -->
<div class="header-inner bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-primary">Services</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="index.html"> Home </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Services</span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
inner banner -->

<!--=================================
Services we offer -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-title mb-3">
          <h2>Services we offer</h2>
          <span class="lead">We truly care about our users and our product. We are dedicated to providing you with the best experience possible.</span>
        </div>
        <p>Focus is having the unwavering attention to complete what you set out to do. There are a million distractions in every facet of our lives. </p>
        <div class="row">
          <div class="col-sm-12">
            <ul class="ps-3 mb-0 list-style-2" style="columns: 2;-webkit-columns: 2;-moz-columns: 2;">
              @foreach($service as $key => $services)
                <li>
                  {{ $services->name }}
                </li>
              @endforeach
              
            </ul>
          </div>
        </div>
        <div class="p-4 bg-dark mt-4">
          <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <div class="counter mb-3 mb-sm-0 justify-content-center">
                <div class="counter-content">
                  <span class="timer mb-1 text-white" data-to="1227" data-speed="10000">1227</span>
                  <label class="mb-0 text-white">Jobs Posted</label>
                </div>
              </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
              <div class="counter mb-3 mb-sm-0 justify-content-center">
                <div class="counter-content">
                  <span class="timer mb-1 text-white" data-to="123" data-speed="10000">123</span>
                  <label class="mb-0 text-white">Jobs Filled</label>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="counter mb-0 justify-content-center">
                <div class="counter-content">
                  <span class="timer mb-1 text-white" data-to="170" data-speed="10000">170</span>
                  <label class="mb-0 text-white">Companies</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mt-4 mt-lg-0">
        <img class="img-fluid w-100" src="images/about/about-03.jpg" alt="">
      </div>
    </div>
  </div>
</section>
<!--=================================
Services we offer -->

<!--=================================
Service -->
<section class="space-pb">
  <div class="container">
    <div class="row">
      @foreach($service as $key => $services)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="feature-info feature-info-border text-center">
          <div class="feature-info-content">
            <h6 class="text-black">Service Type : {{ @$services->category->mainCategory->category_name }}</h6>
            <h6 class="text-black">Service Type Category: {{ $services->category->category_name }}</h6>
            <h5 class="text-black">{{ $services->name }}</h5>
            <p class="mb-0">Focus is having the unwavering attention to complete what you set out to do. There are a million distractions in every facet of our lives.</p>
          </div>
        </div>
      </div>
      @endforeach

      


      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        <div class="feature-info feature-info-border text-center">
          <div class="feature-info-icon mb-3">
            <i class="flaticon-personal-profile"></i>
          </div>
          <div class="feature-info-content">
            <h5 class="text-black">Advertise A Job</h5>
            <p class="mb-0">Along with your plans, you should consider developing an action orientation that will keep you motivated to move forward at all times.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        <div class="feature-info feature-info-border text-center">
          <div class="feature-info-icon mb-3">
            <i class="flaticon-resume"></i>
          </div>
          <div class="feature-info-content">
            <h5 class="text-black">Recruiter Profiles</h5>
            <p class="mb-0">I coach my clients to practice the 3 D’s – Defer, Delegate or Delete. Can the particular activity be done later? Defer it! Can it be</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="feature-info feature-info-border text-center">
          <div class="feature-info-icon mb-3">
            <i class="flaticon-video-conference"></i>
          </div>
          <div class="feature-info-content">
            <h5 class="text-black">Find Your dream job</h5>
            <p class="mb-0">Telephones and e-mail, clients and managers, spouses and kids, TV, newspapers and radio – the distractions are everywhere and endless.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Service -->
{{-- 
<!--=================================
feature info section -->
<section class="feature-info-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="feature-info feature-info-02 p-4 p-lg-5 bg-primary">
          <div class="feature-info-icon mb-3 mb-sm-0 text-dark">
            <i class="flaticon-team"></i>
          </div>
          <div class="feature-info-content text-white ps-sm-4 ps-0">
            <p>Jobseeker</p>
            <h5 class="text-white">Looking For Job?</h5>
          </div>
          <a class="ms-auto align-self-center" href="#">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="feature-info feature-info-02 p-4 p-lg-5 bg-dark">
          <div class="feature-info-icon mb-3 mb-sm-0 text-primary">
            <i class="flaticon-job-3"></i>
          </div>
          <div class="feature-info-content text-white ps-sm-4 ps-0">
            <p>Recruiter</p>
            <h5 class="text-white">Are You Recruiting?</h5>
          </div>
          <a class="ms-auto align-self-center" href="#">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
feature info section --> --}}

@endsection  