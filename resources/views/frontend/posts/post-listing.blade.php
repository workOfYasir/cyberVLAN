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
          {{-- <div class="widget">
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
            </div> --}}
            <hr>
            <div class="widget">
              <div class="widget-title widget-collapse">
                <h6>Specialism</h6>
                <a class="ms-auto" data-bs-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a> </div>
                <div class="collapse show" id="specialism">
                  <div class="widget-content">
                    @foreach ($services as $service)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="speciallism" id="specialism1" value="{{$service->id  }}">
                        <label class="form-check-label" for="specialism1">{{ $service->name }}</label>
                      </div>
                    @endforeach
                 
                  </div>
                </div>
              </div>
              <hr>
              {{-- <div class="widget">
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
                
                  <hr> --}}
                  <div class="widget">
                    <div class="widget-title widget-collapse">
                      <h6>Offered Salary</h6>
                      <a class="ms-auto" data-bs-toggle="collapse" href="#Offeredsalary" role="button" aria-expanded="false" aria-controls="Offeredsalary"> <i class="fas fa-chevron-down"></i> </a> </div>
                      <div class="collapse show" id="Offeredsalary">
                        <div class="widget-content">
                          <div class="form-check">
                            <input type="radio" value="10000,20000" name="salery" class="form-check-input salery" id="Offeredsalary1">
                            <label class="form-check-label" for="Offeredsalary1">10k - 20k</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" value="20000,30000" name="salery" class="form-check-input salery" id="Offeredsalary2">
                            <label class="form-check-label" for="Offeredsalary2">20k - 30k</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" value="30000,40000" name="salery" class="form-check-input salery" id="Offeredsalary3">
                            <label class="form-check-label" for="Offeredsalary3">30k - 40k</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" value="40000,50000" name="salery" class="form-check-input salery" id="Offeredsalary4">
                            <label class="form-check-label" for="Offeredsalary4">40k - 50k</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" value="50000,60000" name="salery" class="form-check-input salery" value="{{ 50 }}" id="Offeredsalary5">
                            <label class="form-check-label" for="Offeredsalary5">50k - 60k</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    {{-- <div class="widget">
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
                      </div> --}}
                     
                        <div class="widget">
                          <div class="widget-add"> <img class="img-fluid" src="images/add-banner.png" alt=""></div>
                        </div>
                      </div>
                    </div>

                    @livewire('job-search')

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
            <a class="ms-auto align-self-center" href="#">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
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
            <a class="ms-auto align-self-center" href="#">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
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
            <a class="ms-auto align-self-center" href="#">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
          </div>
        </div>
        @endrole
      </div>
    </div>
  
  </section>
  <!--=================================
  feature -->   
@endsection  
