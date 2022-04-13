@extends('frontend.layouts.app')

@section('content')

<!--=================================
inner banner -->
<div class="header-inner bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-primary">Terms and conditions</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>Terms and conditions</span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
inner banner -->

<!--=================================
Terms and conditions -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h2>Terms and conditions</h2>
        </div>
        <h6 class="text-primary">1. Description of Service</h6>
        <p class="mb-20">Making a decision to do something – this is the first step. We all know that nothing moves until someone makes a decision. The first action is always in making the decision to proceed.</p>
        <h6 class="text-primary mt-4">2. Your Registration Obligations</h6>
        <p class="mb-20">Focus is having the unwavering attention to complete what you set out to do. There are a million distractions in every facet of our lives. Telephones and e-mail, clients and managers, spouses and kids, TV, newspapers and radio – the distractions are everywhere and endless. Everyone wants a piece of us and the result can be totally overwhelming.</p>
        <h6 class="text-primary mt-4">3. User Account, Password, and Security</h6>
        <p class="mb-20">So, how can we stay on course with all the distractions in our lives? Willpower is a good start, but it’s very difficult to stay on track simply through willpower.</p>
        <h6 class="text-primary mt-4">4. User Conduct</h6>
        <p class="mb-20">We also know those epic stories, those modern-day legends surrounding the early failures of such supremely successful folks as Michael Jordan and Bill Gates. We can look a bit further back in time to Albert Einstein or even further back to Abraham Lincoln. What made each of these people so successful? Motivation.</p>
        <ul class="ps-3 mb-20 list-style-2">
          <li>If success is a process with a number of defined steps,</li>
          <li>Commit your decision to paper, just to bring it into focus.</li>
          <li>Without clarity, you send a very garbled message out to the Universe.</li>
          <li>You will run aground and become hopelessly stuck in the mud</li>
          <li>Simply by asking ourselves lots of questions</li>
        </ul>
        <h6 class="text-primary mt-4">5. International Use</h6>
        <p class="mb-4 mb-md-5">We also know those epic stories, those modern-day legends surrounding the early failures of such supremely successful folks as Michael Jordan and Bill Gates. We can look a bit further back in time to Albert Einstein or even further back to Abraham Lincoln. What made each of these people so successful? Motivation.</p>
        {{-- <a class="btn btn-primary" href="#"><span>Accept</span></a>
        <a class="btn btn-dark" href="#"><span>Close</span></a> --}}
      </div>
    </div>
  </div>
</section>
<!--=================================
Terms and conditions -->

<!--=================================
feature -->
{{-- <section class="feature-info-section">
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
</section> --}}
<!--=================================
feature -->
@endsection  