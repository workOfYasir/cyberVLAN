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
                    <div class="job-list border d-block p-4 mt-4 mt-lg-5">
                      <div class="job-list-details">
                        <div class="job-list-info">
                        <div class="job-list-title">
                            <h4>Milestones</h4>
                          
                        </div>
                        </div>
                    </div>

                    @if(@$postDeliverable!=null)
                      @if(count($postDeliverable)>=1)
                      <form action="{{ route('milestoneComment') }}" class="form-horizontal poststars" method="post">
                      @csrf
                      <input type="hidden" name="job_candidate" value="{{ $bidDetail->user->id }}">
                      <input type="hidden" name="job_poster" value="{{ $bidDetail->post->user->id }}">
                      
                      
                        @foreach($postDeliverable as $key => $deliverable)
                        {{ $key+1 }}
                        <div class="job-list-details mt-4">
                         
                          <div class="job-list-info">
                            <input type="hidden" name="proposal_id" value="{{ $deliverable->proposal_id }}">
                          <div class="job-list-title">
                              <h5>Project Milestone  <small class="text-muted">{{ $deliverable->deliverable_title }}</small></h5>
                              <h5>Project Duration <small class="text-muted">{{ $deliverable->deliverable_duration }}</small></h5>
                            @if($deliverable->deliverable_description==null)
                              <input type="hidden" value="{{ $deliverable->id }}" name="deliverable_id[]" />
                              <input type="text" class="form-control" placeholder="Comment" name="milestone_comment[]"/>
                            @else
                            <br />
                              @role('freelancer')
                              <input type="hidden" value="{{ $deliverable->id }}" name="deliverable_id[]" />
                              <input type="text" class="form-control"  placeholder="Milestone Title" name="milestone[]"/>
                              <input type="text" class="form-control"  placeholder="Milestone Duration" name="duration[]"/>
                              @endrole
                              <br />
                              <input type="hidden" disabled class="form-control" placeholder="Comment" name="milestone_comment"/>
                              <h5>
                                @role('freelancer')
                                Comments From Job Poster 
                                @endrole
                                <small class="text-muted">{{ $deliverable->deliverable_description }}</small></h5>
                            @endif
                          </div>
                          </div>
                      </div>
                      <hr />
                        @endforeach
                        @role('superAdmin')
                        <input type="submit" value="send for review">
                        @endrole
                        @role('client')
                        <input type="submit" value="send for review">
                        @endrole
                        @role('freelancer')
                        <input type="submit" value="change milestone">
                        @endrole
                        
                      </form>
                      @endif
                    @endif
                </div>
              </div>
            </div>
            <div class="my-4 my-lg-5">
          @if(@$review!=null)
            
          
              @if(count($review)>=1)
              @if(!$rating)
              <h6>Reviews</h6>
  
              <div class="d-flex flex-row">
                  <div class="stars"> 
                      <div id="rateYo" data-rateyo-rating="{{ $bidDetail->user->averageRating}}"> </div>
                      <form class="form-horizontal poststars" action="{{route('productStar', $bidDetail->user->id)}}" id="addStar" method="POST">
                          {{ csrf_field() }}
                            <input type="hidden" name="post_id" value="{{ $bidDetail->post }}">

                            <div class="form-group required">
                                  <div class="col-sm-12">
                                      @if($bidDetail->user->averageRating>0.0000 && $bidDetail->user->averageRating<=0.5555)
                                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5"><i class="far fa-star"></i></label>
                                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4"><i class="far fa-star"></i></label>
                                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3"><i class="far fa-star"></i></label>
                                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2"><i class="far fa-star"></i></label>
                                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1"  for="star-1" ><i class="fa-solid fa-star-half-stroke"></i></label>
                                    
                                      @elseif($bidDetail->user->averageRating>=0.5555 && $bidDetail->user->averageRating<=1.0000)
                                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5"><i class="far fa-star"></i></label>
                                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4"><i class="far fa-star"></i></label>
                                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3"><i class="far fa-star"></i></label>
                                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2"><i class="far fa-star"></i></label>
                                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1"  for="star-1" ><i class="fa-solid fa-star"></i></label>
                                      @elseif($bidDetail->user->averageRating>=1.0000 && $bidDetail->user->averageRating<=1.5555)
                                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5"><i class="far fa-star"></i></label>
                                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4"><i class="far fa-star"></i></label>
                                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3"><i class="far fa-star"></i></label>
                                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2" ><i class="fa-solid fa-star-half-stroke"></i></label>
                                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1"  for="star-1" ><i class="fa-solid fa-star"></i></label>
                                      @elseif($bidDetail->user->averageRating>=1.5555 && $bidDetail->user->averageRating<=2.0000)
                                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5"><i class="far fa-star"></i></label>
                                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4"><i class="far fa-star"></i></label>
                                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3"><i class="far fa-star"></i></label>
                                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2" ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1"  for="star-1" ><i class="fa-solid fa-star"></i></label>
                                      @elseif($bidDetail->user->averageRating>=2.0000 && $bidDetail->user->averageRating<=2.5555)
                                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5"><i class="far fa-star"></i></label>
                                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4"><i class="far fa-star"></i></label>
                                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3" ><i class="fa-solid fa-star-half-stroke"></i></label>
                                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2" ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1"  for="star-1" ><i class="fa-solid fa-star"></i></label>
                                      @elseif($bidDetail->user->averageRating>=2.5555 && $bidDetail->user->averageRating<=3.0000)
                                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5"><i class="far fa-star"></i></label>
                                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4"><i class="far fa-star"></i></label>
                                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3" ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2" ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1"  for="star-1" ><i class="fa-solid fa-star"></i></label>
                                      @elseif($bidDetail->user->averageRating>=3.0000 && $bidDetail->user->averageRating<=3.5555)
                                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5"><i class="far fa-star"></i></label>
                                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4"><i class="fa-solid fa-star-half-stroke"></i></label>
                                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3" ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2" ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1"  for="star-1" ><i class="fa-solid fa-star"></i></label>
                                      @elseif($bidDetail->user->averageRating>=3.5555 && $bidDetail->user->averageRating<=4.0000)
                                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5"><i class="far fa-star"></i></label>
                                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4"> <i class="fa-solid fa-star"></i></label>
                                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3" > <i class="fa-solid fa-star"></i></label>
                                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2" > <i class="fa-solid fa-star"></i></label>
                                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1"  for="star-1" > <i class="fa-solid fa-star"></i></label>
                                      @elseif($bidDetail->user->averageRating>=4.0000 && $bidDetail->user->averageRating<4.5555)
                                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5"><i class="fa-solid fa-star-half-stroke"></i></label>
                                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4"  ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3" ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2" ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1"  for="star-1" ><i class="fa-solid fa-star"></i></label>
                                      @elseif($bidDetail->user->averageRating>=4.5555 && $bidDetail->user->averageRating<5.0000)
                                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5"><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4"  ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3" ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2" ><i class="fa-solid fa-star"></i></label>
                                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1"  for="star-1" ><i class="fa-solid fa-star"></i></label>
                                      @else
                                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                      <label class="star star-5" for="star-5">
                                          <i class="far fa-star"></i>
                                      </label>
                                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                      <label class="star star-4" for="star-4">
                                          <i class="far fa-star"></i>
                                      </label>
                                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                      <label class="star star-3" for="star-3">
                                          <i class="far fa-star"></i>
                                      </label>
                                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                      <label class="star star-2" for="star-2">
                                          <i class="far fa-star"></i>
                                      </label>
                                         
                                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                      <label class="star star-1" for="star-1">
                                          <i class="far fa-star"></i>
                                      </label>
                                      @endif
                                 
                                   </div>
                                </div>
                                <input type="text" class="form-control"  name="comment"/>
                                <input value="ok" id="comment" type="submit"  />
                        </form>
                  </div>  
                  <span class="ml-1 font-weight-bold"> {{  number_format($bidDetail->user->averageRating,1,'.','') }}</span>
              </div>
              @endif
              {{-- <form action="{{ route('review_store') }}" method="post">
                @csrf
                <input type="text" class="form-control" name="review"/>
                <input value="olk" id="comment" type="submit"  />
              </form> --}}
              @endif
              @endif
            </div>
        
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