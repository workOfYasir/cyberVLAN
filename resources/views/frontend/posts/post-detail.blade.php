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
            <h5 class="mb-3 mb-md-4">Timespan</h5>
            <div class="col-12 d-flex">
              <div class="col-6"><strong>Hours</strong>
                <ul class="list-unstyled list-style">
                  <li>Maximum Hours: {{ $postDetail[0]->hour_max }}</li>
                  <li>Minimum Hours: {{ $postDetail[0]->hour_min }}</li>
                </ul></div>
              <div class="col-6"> <strong>Days</strong>
                <ul class="list-unstyled list-style">
                  <li>Maximum Days:  {{ $postDetail[0]->day_max }}</li>
                  <li>Minimum Days:  {{ $postDetail[0]->day_min }}</li>
                </ul></div>
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
                                   Add More Milestones: <i class="fa fa-plus add" ></i> <input type="hidden" name="deliverable" id="deliverable" value="1">
                                    <br><div>milestone 1: <input type="text" name="title[]" class="form-control"> &nbsp;  Days 1:  <input type="text" name="days[]" class="form-control"></div>
                                    <div class="mb-3 col-12 appending_div">
                                      
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
                @foreach ($postDetailList as $list)
                <div class="job-list">
                  <div class="job-list-logo">
                    <img class="img-fluid" src="{{asset('images/profiles/'.$list->user->userDetails[0]->user_profile)}}" alt="">
                  </div>
                  <div class="job-list-details">
                    <div class="job-list-info">
                      <div class="job-list-title">
      
                        <h5 class="mb-0"><a href="{{ route('post.detail',$list->id) }}">{{ $list->job_title  }}</a></h5>
                      </div>
                      <div class="job-list-option">
                        <ul class="list-unstyled">
                          <li> <span>via</span> <a href="{{ route('public_profile', $list->user->unni_id ) }}">{{ $list->user->first_name.' '.$list->user->last_name }}</a> </li>
                          <li><i class="fas fa-map-marker-alt pe-1"></i>{{ $list->user->userDetails[0]->user_address_country.', '.$list->user->userDetails[0]->user_address_city }}</li>
                          <li><i class="fas fa-filter pe-1"></i>
                            @foreach ($list->postDetail as $detail)
                                {{ $detail->service->name }},
                            @endforeach
                          </li>
                          <li><a class="freelance" href="#"><i class="fas fa-suitcase pe-1"></i>{{ $list->postDetail[0]->jobTimeline->name }}</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>     
                @endforeach
                        
              
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
  @push('frontscripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
  //   $('#addStar').change('.star', function(e) {     
  //     $(this).submit();
  //     e.preventDefault();
  // });
  $("#comment").click(function () { 
    $(this).submit();
    e.preventDefault();
  })
 

    $(document).ready(function() {
        var i = 2;
        $('.add').on('click', function() {
          // $("#deliverable").val(1)
            var field = '<br><div>milestone '+i+': <input type="text" name="title[]" class="form-control"> &nbsp;  Days '+i+':  <input type="text" name="days[]" class="form-control"></div>';
            $('.appending_div').append(field);
            i = i+1;
        })
    })
</script>
  @endpush