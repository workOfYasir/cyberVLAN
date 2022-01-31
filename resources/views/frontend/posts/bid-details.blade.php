@extends('frontend.layouts.app')

@section('content')
<!--=================================
banner -->
<section class="header-inner header-inner-big bg-holder text-white" style="background-image: url({{ asset('images/bg/banner-01.jpg') }});">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="job-search-field">
            <div class="job-search-item">
              <form class="form row">
                <div class="col-lg-5">
                  <div class="form-group left-icon mb-3">
                    <input type="text" class="form-control" name="job_title" placeholder="What?">
                  <i class="fas fa-search"></i> </div>
                </div>
                <div class="col-lg-5">
                  <div class="form-group left-icon mb-3">
                    <input type="text" class="form-control" name="job_title" placeholder="Where?">
                  <i class="fas fa-search"></i> </div>
                </div>
                <div class="col-lg-2 col-sm-12">
                  <div class="form-group form-action">
                    <button type="submit" class="btn btn-primary mt-0"><i class="fas fa-search-location"></i> Find Job</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  banner -->
  
  <!--=================================
  job list -->

  <section class="space-ptb">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12">
              <div class="job-list border">
                <div class=" job-list-logo">
                  <img class="img-fluid" src="{{asset('images/profiles/'.$bidDetail->post->user->userDetails[0]->user_profile)}}" alt="">
                </div>
              
                <div class="job-list-details">
                  <div class="job-list-info">
                    <div class="job-list-title">
                        <h5 class="mb-2">{{ $bidDetail->post->job_title }}</h5>
                        <span class="mb-0">Via: {{ $bidDetail->post->user->first_name.' '.$bidDetail->post->user->last_name }}</span>
                    </div>
                    <div class="job-list-option">
                      <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt pe-1"></i>  {{ $bidDetail->post->user->userDetails[0]->user_address_country.', '. $bidDetail->post->user->userDetails[0]->user_address_city }}</li>
                        <li><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="ps-2">{{ $bidDetail->post->user->userDetails[0]->user_phone }}</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="job-list-favourite-time">
                  <a  class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                  <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>2W ago</span>
                </div>
              </div>
            </div>
          </div>
          <div class="border p-4 mt-4 mt-lg-5">
            <div class="row">
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="d-flex">
                  <i class="font-xll text-primary align-self-center flaticon-debit-card"></i>
                  <div class="feature-info-content ps-3">
                    <label class="mb-1">Offered Budget
                      <br>
                      @if($bidDetail->post->budget_status==1)
                        (Fixed)
                      @else
                        (Negotiable)
                      @endif
                    </label>
                    <span class="mb-0 fw-bold d-block text-dark">{{ $bidDetail->post->job_budget }}</span>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="d-flex">
                  <i class="font-xll text-primary align-self-center flaticon-time"></i>
                  <div class="feature-info-content ps-3">
                    <label class="mb-1">Timeline</label>
                    <span class="mb-0 fw-bold d-block text-dark"> 
                        @foreach ($bidDetail->post->postDetail as $timeline)
                            {{ $timeline->jobTimeline->name.', ' }}
                        @endforeach</span>
                  </div>
                </div>
              </div>
           
            </div>
          </div>
          <div class="my-4 my-lg-5">
            <h5 class="mb-3 mb-md-4">Job Description</h5>
            <p>
                {{ $bidDetail->post->job_description }}
            </p>
          </div>
          <hr>
          <div class="my-4 my-lg-5">
            <h5 class="mb-3 mb-md-4">Required Knowledge, Skills, and Abilities</h5>
            <ul class="list-unstyled list-style">
                @foreach ($bidDetail->post->postDetail as $skills )
                <li><i class="far fa-check-circle font-md text-primary me-2"></i>
                {{ $skills->service->name }}
                </li> 
                @endforeach
            </ul>
            {{ $bidDetail->post->job_requirment }}
          </div>
          <hr>
          @role('freelancer')
            <div class="my-4 my-lg-5">
                <div class="login-register">
                    <div class="section-title">
                        <h4 class="text-center">Bid Detail</h4>
                    </div>
                    <div class="job-list border">
                        <div class=" job-list-logo">
                          <img class="img-fluid" src="{{asset('images/profiles/'.$bidDetail->user->userDetails[0]->user_profile)}}" alt="">
                        </div>
                      
                        <div class="job-list-details">
                          <div class="job-list-info">
                            <div class="job-list-title">
                                <h5 class="mb-0"> {{ $bidDetail->user->first_name.' '.$bidDetail->user->last_name }}</h5>
                            </div>
                            <div class="job-list-option">
                              <ul class="list-unstyled">
                                <li><i class="fas fa-map-marker-alt pe-1"></i>  {{ $bidDetail->user->userDetails[0]->user_address_country.', '. $bidDetail->user->userDetails[0]->user_address_city }}</li>
                                <li><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="ps-2">{{ $bidDetail->user->userDetails[0]->user_phone }}</span></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="job-list-favourite-time">
                          <a  class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                          <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>2W ago</span>
                        </div>
                      </div>
                    <div class="job-list border d-block p-4 mt-4 mt-lg-5">
                        <div class="job-list-details">
                            <div class="job-list-info">
                            <div class="job-list-title">
                                <h4>Proposal</h4>
                                {{ $bidDetail->job_proposal }}
                            </div>
                            </div>
                        </div>
                    <hr/>
                        <div class="job-list-details mt-4">
                            <div class="job-list-info">
                            <div class="job-list-title">
                                <h5>Employee Budget: <small class="text-muted">{{ $bidDetail->job_budget }}K</small></h5>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          @endrole
        </div>
        <!--================================= Signin -->

   
      
  
      </div>
    </div>
  </section>
  <!--=================================
  job list -->
  
  <!--=================================
  feature -->
  <section class="feature-info-section">
    <div class="container">
      <div class="row">
        @role('freelancer')
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="feature-info feature-info-02 p-4 p-lg-5 bg-primary">
            <div class="feature-info-icon mb-3 mb-sm-0 text-dark">
              <i class="flaticon-team"></i>
            </div>
            <div class="feature-info-content text-white ps-sm-4 ps-0">
              <p>Jobseeker</p>
              <h5 class="text-white">Looking For Job?</h5>
            </div>
            <a class="ms-auto align-self-center" href="{{ route('post.list') }}">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
          </div>
        </div>
        @endrole
        @role('client')
        <div class="col-lg-6">
          <div class="feature-info feature-info-02 p-4 p-lg-5 bg-dark">
            <div class="feature-info-icon mb-3 mb-sm-0 text-primary">
              <i class="flaticon-job-3"></i>
            </div>
            <div class="feature-info-content text-white ps-sm-4 ps-0">
              <p>Recruiter</p>
              <h5 class="text-white">Are You Recruiting?</h5>
            </div>
            <a class="ms-auto align-self-center" href="{{ route('post.create') }}">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
          </div>
        </div>
        @endrole
        @role('superAdmin')
        <div class="col-lg-6">
          <div class="feature-info feature-info-02 p-4 p-lg-5 bg-dark">
            <div class="feature-info-icon mb-3 mb-sm-0 text-primary">
              <i class="flaticon-job-3"></i>
            </div>
            <div class="feature-info-content text-white ps-sm-4 ps-0">
              <p>Recruiter</p>
              <h5 class="text-white">Are You Recruiting?</h5>
            </div>
            <a class="ms-auto align-self-center" href="{{ route('post.create') }}">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
          </div>
        </div>
        @endrole
      </div>
    </div>
  </section>
  <!--=================================
  feature -->
  @endsection