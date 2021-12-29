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
  job-list -->
  <section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <!--=================================
        left-sidebar -->
        <div class="sidebar">
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Date Posted</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#dateposted" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-chevron-down"></i> </a></div>
              <div class="collapse show" id="dateposted">
                <div class="widget-content">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dateposted1">
                    <label class="form-check-label" for="dateposted1">Last hour</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dateposted2">
                    <label class="form-check-label" for="dateposted2">Last 24 hour</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dateposted3">
                    <label class="form-check-label" for="dateposted3">Last 7 days</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dateposted4">
                    <label class="form-check-label" for="dateposted4">Last 14 days</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dateposted5">
                    <label class="form-check-label" for="dateposted5">Last 30 days</label>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="widget">
              <div class="widget-title widget-collapse">
                <h6>Specialism</h6>
                <a class="ms-auto" data-bs-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a> </div>
                <div class="collapse show" id="specialism">
                  <div class="widget-content">
                    @foreach ($services as $service)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="specialism1">
                        <label class="form-check-label" for="specialism1">{{ $service->name }}</label>
                      </div>
                    @endforeach
                 
                  </div>
                </div>
              </div>
              <hr>
              <div class="widget">
                <div class="widget-title widget-collapse">
                  <h6>Job Type</h6>
                  <a class="ms-auto" data-bs-toggle="collapse" href="#jobtype" role="button" aria-expanded="false" aria-controls="jobtype"> <i class="fas fa-chevron-down"></i> </a> </div>
                  <div class="collapse show" id="jobtype">
                    <div class="widget-content">
                      @foreach ($timelines as $timeline)
                      <div class="form-check fulltime-job">
                        <input type="checkbox" class="form-check-input" id="jobtype1">
                        <label class="form-check-label" for="jobtype1">{{ $timeline->name }}</label>
                      </div>
                      @endforeach
                    
                    </div>
                  </div>
                </div>
                
                  <hr>
                  <div class="widget">
                    <div class="widget-title widget-collapse">
                      <h6>Offered Salary</h6>
                      <a class="ms-auto" data-bs-toggle="collapse" href="#Offeredsalary" role="button" aria-expanded="false" aria-controls="Offeredsalary"> <i class="fas fa-chevron-down"></i> </a> </div>
                      <div class="collapse show" id="Offeredsalary">
                        <div class="widget-content">
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="Offeredsalary1">
                            <label class="form-check-label" for="Offeredsalary1">10k - 20k</label>
                          </div>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="Offeredsalary2">
                            <label class="form-check-label" for="Offeredsalary2">20k - 30k</label>
                          </div>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="Offeredsalary3">
                            <label class="form-check-label" for="Offeredsalary3">30k - 40k</label>
                          </div>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="Offeredsalary4">
                            <label class="form-check-label" for="Offeredsalary4">40k - 50k</label>
                          </div>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="Offeredsalary5">
                            <label class="form-check-label" for="Offeredsalary5">50k - 60k</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="widget">
                      <div class="widget-title widget-collapse">
                        <h6>Gender</h6>
                        <a class="ms-auto" data-bs-toggle="collapse" href="#gender" role="button" aria-expanded="false" aria-controls="gender"><i class="fas fa-chevron-down"></i></a> </div>
                        <div class="collapse show" id="gender">
                          <div class="widget-content">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="gender1">
                              <label class="form-check-label" for="gender1">Male</label>
                            </div>
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="gender2">
                              <label class="form-check-label" for="gender2">Female</label>
                            </div>
                          </div>
                        </div>
                      </div>
                     
                        <div class="widget">
                          <div class="widget-add"> <img class="img-fluid" src="images/add-banner.png" alt=""></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <!--=================================
                      right-sidebar -->
                      <div class="row mb-4">
                         <div class="col-md-6">
                          <div class="section-title mb-3 mb-lg-4">
                            <h6 class="mb-0">Showing <span class="text-primary">{{ $userDetail->count() }} Freelancers</span></h6>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="job-filter-tag">
                          <ul class="list-unstyled">
                            {{-- <li><a href="#">Freelance <i class="fas fa-times-circle"></i> </a></li> --}}
                            <li><a class="filter-clear" href="#">Reset Search <i class="fas fa-redo-alt"></i> </a></li>
                          </ul>
                        </div>
                        </div>
                      </div>
                      <div class="job-filter mb-4 d-sm-flex align-items-center">
                        {{-- <div class="job-alert-bt"> <a class="btn btn-md btn-dark" href="#"><i class="fa fa-envelope"></i>Get job alert </a> </div> --}}
                        <div class="job-shortby ms-sm-auto d-flex align-items-center">
                          <form class="form-inline">
                            <div class="d-sm-flex align-items-center mb-0">
                              <label class="justify-content-start me-2 mb-2 mb-sm-0">sort by :</label>
                              <div class="short-by">
                                <select class="form-control basic-select">
                                  <option>Newest</option>
                                  <option>Oldest</option>
                                </select>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="row">
                          @foreach ($userDetail as $user)
                          <div class="col-12">
                            <div class="candidate-list">
                              <div class="candidate-list-image">
                                <img class="img-fluid" src="images/avatar/08.jpg" alt="" >
                              </div>
                              <div class="candidate-list-details">
                                <div class="candidate-list-info">
                                  <div class="candidate-list-title">
                                    <h5 class="mb-0"><a href="{{ route('public_profile', $user->unni_id ) }}">{{ $user->first_name.' '.$user->last_name }}</a></h5>
                                  </div>
                                  <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                      <li><i class="fas fa-filter pe-1"></i>  
                                        @foreach ($user->skills as $service)
                                            {{ $service->service->name }},
                                        @endforeach
                                      </li>
                                      <li><i class="fas fa-map-marker-alt pe-1">
                                        {{ $user->userDetails[0]->user_address_country.', '.$user->userDetails[0]->user_address_city }}
                                      </i>
                                    </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>3M ago</span>
                              </div>
                            </div>
                          </div>
                          @endforeach
                          
                      </div>
                  
                    </div>
                  </div>
                </div>
  </section>
  <!--=================================
  job-list -->
  
  <!--=================================
  feature -->
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
  feature -->
@endsection  