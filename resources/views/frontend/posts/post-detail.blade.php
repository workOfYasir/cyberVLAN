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
        <div class="col-lg-8">
          <div class="row">
            <div class="col-md-12">
              <div class="job-list border">
                <div class=" job-list-logo">
                  <img class="img-fluid" src="{{asset('images/profiles/'.$postDetail[0]->user->userDetails[0]->user_profile)}}" alt="">
                </div>
              
                <div class="job-list-details">
                  <div class="job-list-info">
                    <div class="job-list-title">
                        <h5 class="mb-2">{{ $postDetail[0]->job_title }}</h5>
                        <span class="mb-0">Via: {{ $postDetail[0]->user->first_name.' '.$postDetail[0]->user->last_name }}</span>
                    </div>
                    <div class="job-list-option">
                      <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt pe-1"></i>  {{ $postDetail[0]->user->userDetails[0]->user_address_country.', '. $postDetail[0]->user->userDetails[0]->user_address_city }}</li>
                        <li><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="ps-2">{{ $postDetail[0]->user->userDetails[0]->user_phone }}</span></li>
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
                      @if($postDetail[0]->budget_status==1)
                        (Fixed)
                      @else
                        (Negotiable)
                      @endif
                    </label>
                    <span class="mb-0 fw-bold d-block text-dark">{{ $postDetail[0]->job_budget }}</span>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="d-flex">
                  <i class="font-xll text-primary align-self-center flaticon-time"></i>
                  <div class="feature-info-content ps-3">
                    <label class="mb-1">Timeline</label>
                    <span class="mb-0 fw-bold d-block text-dark">{{ $postDetail[0]->postDetail[0]->jobTimeline->name }}</span>
                  </div>
                </div>
              </div>
           
            </div>
          </div>
          <div class="my-4 my-lg-5">
            <h5 class="mb-3 mb-md-4">Job Description</h5>
            <p>
                {{ $postDetail[0]->job_description }}
            </p>
          </div>
          <hr>
          <div class="my-4 my-lg-5">
            <h5 class="mb-3 mb-md-4">Required Knowledge, Skills, and Abilities</h5>
            <ul class="list-unstyled list-style">
                @foreach ($postDetail[0]->postDetail as $skills )
                <li><i class="far fa-check-circle font-md text-primary me-2"></i>
                {{ $skills->service->name }}
                </li> 
                @endforeach
            </ul>
            {{ $postDetail[0]->job_requirment }}
          </div>
          <hr>
          @role('freelancer')
            <div class="my-4 my-lg-5">
                <div class="login-register">
                    <div class="section-title">
                        <h4 class="text-center">Send Proposal</h4>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="candidate" role="tabpanel">
                          <form class="mt-4" id="job_proposal" method="POST" novalidate="novalidate" action="{{ route('post.propsal') }}">            
                                @csrf
                                <input type="hidden" name="job-poster" value="{{ $postDetail[0]->user->unni_id }}" >
                                <input type="hidden" name="job-post" value="{{ $postDetail[0]->id }}">
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label class="form-label" for="job-proposal">Job Proposal</label>
                                        <textarea class="form-control" type="text" name="job-proposal" cols="10" rows="20" autocomplete="off" ></textarea>
                                    </div>
                    
                                    <div class="mb-3 col-12">
                                        <label class="form-label" for="job-budget">Job Budget</label>
                                        <input class="form-control" type="text" name="job-budget" autocomplete="off" />
                                    </div>
                                    
                                </div>
                                <div class="row">
                                  <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" ><i class="far fa-paper-plane"></i>Apply for job</button>
                                  </div>
                                </div>
                           
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
          @endrole
        </div>
        <!--================================= Signin -->
  
        <!--=================================
        sidebar -->
        
        <div class="col-lg-4">
          <div class="sidebar mb-0">
           
            <div class="widget">
              <div class="widget-title">
                <h5>Similar Jobs</h5>
              </div>
              <div class="similar-jobs-item widget-box">
                <div class="job-list">
                  <div class="job-list-logo">
                    <img class="img-fluid" src="images/svg/17.svg" alt="">
                  </div>
                  <div class="job-list-details">
                    <div class="job-list-info">
                      <div class="job-list-title">
                        <h6><a href="#">Designer Required</a></h6>
                      </div>
                      <div class="job-list-option">
                        <ul class="list-unstyled">
                          <li>
                            <span>via</span>
                            <a href="employer-detail.html">Trout Design Ltd</a>
                          </li>
                          <li><a class="freelance" href="#"><i class="fas fa-suitcase pe-1"></i>Freelance</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>               
                <div class="job-list">
                  <div class="job-list-logo">
                    <img class="img-fluid" src="images/svg/18.svg" alt="">
                  </div>
                  <div class="job-list-details">
                    <div class="job-list-info">
                      <div class="job-list-title">
                        <h6><a href="#">Post Room Operative</a></h6>
                      </div>
                      <div class="job-list-option">
                        <ul class="list-unstyled">
                          <li>
                            <span>via</span>
                            <a href="employer-detail.html">LawnHopper</a>
                          </li>
                          <li><a class="part-time" href="#"><i class="fas fa-suitcase pe-1"></i>Part-Time</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="job-list">
                  <div class="job-list-logo">
                    <img class="img-fluid" src="images/svg/19.svg" alt="">
                  </div>
                  <div class="job-list-details">
                    <div class="job-list-info">
                      <div class="job-list-title">
                        <h6><a href="#">Stockroom Assistant</a></h6>
                      </div>
                      <div class="job-list-option">
                        <ul class="list-unstyled">
                          <li>
                            <span>via</span>
                            <a href="employer-detail.html">Rippin LLC</a>
                          </li>
                          <li><a class="temporary" href="#"><i class="fas fa-suitcase pe-1"></i>Temporary</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="job-list">
                  <div class="job-list-logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 726 726"><path fill="#4D4D4D" d="M332.45 400.625l22.501-81.37c.683-2.276 2.039-3.187 4.321-3.187h18.179c2.505 0 3.644.911 4.328 3.187l23.184 81.827 20.223-66.375h-10.908c-2.277 0-3.415-1.128-3.415-3.405v-11.83c0-2.494 1.138-3.405 3.415-3.405h29.084c3.871 0 5.464 2.959 4.553 6.137l-31.37 103.187c-.674 2.277-2.039 3.188-4.315 3.188h-20.453c-2.275 0-3.642-.911-4.325-3.405l-21.591-80.242-22.5 80.459c-.684 2.277-2.05 3.188-4.316 3.188h-20.461c-2.272 0-3.638-.911-4.316-3.188l-24.778-90.684h-11.814c-2.277 0-3.415-1.128-3.415-3.405v-11.83c0-2.494 1.138-3.405 3.415-3.405h29.772c2.271 0 3.638.911 4.326 3.405l20.676 81.153z"/><path fill="#24BAC9" d="M477.723 542.344c-28.339-15.399-46.472-42.319-51.937-71.734-36.432 21.135-82.665 23.536-122.342 1.946-29.927-16.218-67.384-5.133-83.644 24.798-16.26 29.922-5.169 67.356 24.757 83.648 91.365 49.616 200.396 35.634 276.19-26.724-14.976-.891-29.734-4.74-43.024-11.934z"/><path fill="#F03955" d="M554.54 205.553c-.89 14.78-4.927 29.342-12.213 42.735-14.903 27.499-41.036 46.314-71.745 51.945 21.185 36.43 23.575 82.673 2.018 122.313-16.26 29.921-5.165 67.396 24.747 83.678 29.933 16.239 67.398 5.143 83.649-24.777 49.597-91.254 35.665-200.092-26.456-275.894z"/><path fill="#59B89C" d="M183.66 477.732c14.965-27.51 41.058-46.295 71.761-51.967-21.161-36.421-23.567-82.622-2.013-122.345 16.239-29.911 5.169-67.356-24.758-83.595-29.942-16.28-67.383-5.185-83.643 24.736-49.618 91.254-35.655 200.175 26.517 275.957.879-14.584 4.75-29.186 12.136-42.786z"/><path fill="#F09502" d="M481.447 145.018C390.079 95.36 281.052 109.384 205.26 171.72c14.96.9 29.755 4.751 43.024 11.954 28.333 15.4 46.477 42.269 51.957 71.744 36.437-21.195 82.665-23.557 122.316-2.007 29.933 16.249 67.39 5.174 83.649-24.757 16.26-29.963 5.195-67.376-24.759-83.636z"/></svg>
                  </div>
                  <div class="job-list-details mb-0">
                    <div class="job-list-info">
                      <div class="job-list-title">
                        <h6><a href="#">Research Administrator</a></h6>
                      </div>
                      <div class="job-list-option">
                        <ul class="list-unstyled">
                          <li>
                            <span>via</span>
                            <a href="employer-detail.html">Trophy and Sons</a>
                          </li>
                          <li><a class="full-time" href="#"><i class="fas fa-suitcase pe-1"></i>Full time</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="job-list">
                    <div class="job-list-logo">
                      <img class="img-fluid" src="images/svg/17.svg" alt="">
                    </div>
                    <div class="job-list-details">
                      <div class="job-list-info">
                        <div class="job-list-title">
                          <h6><a href="#">Designer Required</a></h6>
                        </div>
                        <div class="job-list-option">
                          <ul class="list-unstyled">
                            <li>
                              <span>via</span>
                              <a href="employer-detail.html">Trout Design Ltd</a>
                            </li>
                            <li><a class="freelance" href="#"><i class="fas fa-suitcase pe-1"></i>Freelance</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="job-list">
                    <div class="job-list-logo">
                      <img class="img-fluid" src="images/svg/18.svg" alt="">
                    </div>
                    <div class="job-list-details">
                      <div class="job-list-info">
                        <div class="job-list-title">
                          <h6><a href="#">Post Room Operative</a></h6>
                        </div>
                        <div class="job-list-option">
                          <ul class="list-unstyled">
                            <li>
                              <span>via</span>
                              <a href="employer-detail.html">LawnHopper</a>
                            </li>
                            <li><a class="part-time" href="#"><i class="fas fa-suitcase pe-1"></i>Part-Time</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div> 
          </div>
        </div>
   
        <!--=================================
        sidebar -->
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