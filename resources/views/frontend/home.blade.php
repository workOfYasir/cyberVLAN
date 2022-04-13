
@extends('frontend.layouts.app')

@section('content')
<!-- Start Banner -->
<section class="banner bg-holder bg-overlay-black-30 text-white" style="background-image: url({{asset('images/bg/banner-01.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center position-relative">
                <p class="lead mb-4 mb-lg-5 fw-normal">Find Jobs, Employment & Career Opportunities</p>
                <div class="job-search-field">
                    <div class="job-search-item">
                        <form class="form row ">
                            {{-- <div class="col-lg-5">
                                <div class="form-group mb-3">
                                    <div class="d-flex">
                                        <label class="form-label">What</label>
                                        <span class="ms-auto">e.g. job, company, title</span>
                                    </div>
                                    <div class="position-relative left-icon">
                                        <input type="text" class="form-control" name="job_title" placeholder="Job title, skill or company">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-lg-5">
                                <div class="form-group mb-3">
                                    <div class="d-flex">
                                        <label class="form-label">Where</label>
                                        <span class="ms-auto">e.g. city, county or postcode</span>
                                    </div>
                                    <div class="position-relative left-icon">
                                        <input type="text" class="form-control location-input" name="job_title" placeholder="Town, city or postcode">
                                        <i class="far fa-compass"></i>
                                        <a href="#">
                                            <div class="detect">
                                                <span class="d-none d-sm-block">Detect</span>
                                                <i class="fas fa-crosshairs"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-12 text-center">
                               
                                <div class="form-group mb-3 form-action">
                                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-search"></i> Find Jobs</button>
                                </div>
                               
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</section>
<!-- End Banner -->

<!-- Start Category-style -->
<section class="space-ptb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 mb-4 mb-lg-0">
                <div class="section-title">
                    <h2 class="title">Services</h2>
                    <p class="mb-0">I truly believe Augustine’s words are true and if you look at history you know it is true.</p>
                </div>
                <a class="btn btn-outline btn-lg" href="#">View More Jobs</a>
            </div>
            <div class="col-lg-9 mt-0 mt-md-3 mt-lg-0">
                <div class="category-style text-center">
                    @forelse ($services as $skill)
                        <a href="#" data-bs-toggle="modal"  data-bs-target="#exampleModalCenter2" class="category-item">
                            {{-- <div class="category-icon mb-4">
                                <i class="flaticon-account"></i>
                            </div> --}}
                            <h6>{{ $skill->category->category_name }}</h6>
                            <h4>{{ $skill->name }}</h4>
                            <span class="mb-0">{{ $open_jobs }} Open Position </span>
                        </a>
                        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header p-4">
                                  <h4 class="mb-0 text-center">Service Detail</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if(@$skill->category->maincategory->category_name!='')
                                  
                                    Main Category:
                                    {{@$skill->category->maincategory->category_name }}
                                    @endif
                                    <hr>
                                    @if(@$skill->category->category_name!='')
                                  
                                    Sub Category:
                                    {{ @$skill->category->category_name }}
                                    @endif
                                    <hr>
                                    Name:
                                    {{ $skill->name }}
                                    @if(@$skill->description!='')
                                    Description:
                                    {{ @$skill->description }}
                                    @endif
                                </div>
                            </div>
                        </div>  
                    </div>  
                    @empty
                        
                    @endforelse
                    
                    {{-- <a href="#" class="category-item">
                        <div class="category-icon mb-4">
                            <i class="flaticon-conversation"></i>
                        </div>
                        <h6>Apprenticeships</h6>
                        <span class="mb-0">287 Open Position </span>
                    </a>
                    <a href="#" class="category-item">
                        <div class="category-icon mb-4">
                            <i class="flaticon-money"></i>
                        </div>
                        <h6>Banking</h6>
                        <span class="mb-0">542 Open Position </span>
                    </a>
                    <a href="#" class="category-item">
                        <div class="category-icon mb-4">
                            <i class="flaticon-mortarboard"></i>
                        </div>
                        <h6>Education</h6>
                        <span class="mb-0">785 Open Position </span>
                    </a>
                    <a href="#" class="category-item">
                        <div class="category-icon mb-4">
                            <i class="flaticon-worker"></i>
                        </div>
                        <h6>Engineering</h6>
                        <span class="mb-0">862 Open Position </span>
                    </a>
                    <a href="#" class="category-item">
                        <div class="category-icon mb-4">
                            <i class="flaticon-businessman"></i>
                        </div>
                        <h6>Estate Agency</h6>
                        <span class="mb-0">423 Open Position </span>
                    </a>
                    <a href="#" class="category-item">
                        <div class="category-icon mb-4">
                            <i class="flaticon-coding"></i>
                        </div>
                        <h6>IT & Telecoms</h6>
                        <span class="mb-0">253 Open Position </span>
                    </a>
                    <a href="#" class="category-item">
                        <div class="category-icon mb-4">
                            <i class="flaticon-balance"></i>
                        </div>
                        <h6>Legal</h6>
                        <span class="mb-0">689 Open Position </span>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category-styl -->

<!-- Start Divider -->
<div class="container ">
    <div class="row">
        <div class="col-12">
            <hr class="m-0">
        </div>
    </div>
</div>
<!-- End Divider -->
@if(auth()->check())
    

<!-- Start Jobs-listing -->
<section class="space-ptb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="title">Jobs You May be Interested in</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="browse-job d-flex border-0 pb-3">
                    <div class="mb-4 mb-md-0">
                        <ul class="nav nav-tabs justify-content-center d-flex" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Recent Jobs</a>
                            </li>
                        </ul>
                    </div>
                    <div class="job-found ms-auto mb-0">
                        <span class="badge badge-lg bg-primary">{{ $postDetail->count() }}</span>
                        <h6 class="ms-3 mb-0">Job Found</h6>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                     
                    <!-- Recent jobs -->
                     <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mt-4">
@foreach ($postDetail as $post)

<div class="col-lg-6 mb-4 mb-sm-0">
    <!-- Freelance -->
    <div class="job-list">
        <div class="job-list-logo">
            <img class="img-fluid" src="{{asset('images/profiles/'.$post->user->userDetails[0]->user_profile)}}" alt="">
        </div>
        <div class="job-list-details">
            <div class="job-list-info">
                <div class="job-list-title">
                    <h5 class="mb-0"><a href="{{ route('post.detail',$post->id) }}">{{ $post->job_title }}</a></h5>
                </div>
                <div class="job-list-option">
                    <ul class="list-unstyled">
                        <li>
                            <span>via</span>
                            <a href="{{ route('public_profile', $post->user->unni_id ) }}">{{ $post->user->first_name.' '.$post->user->last_name }}</a>
                        </li>
                        <br>
                        
                        <li><i class="fas fa-filter pe-1"></i>
                            @foreach ( $post->postDetail  as $detail)
                                {{ $detail->service->name.', ' }}
                            @endforeach
                        </li>
                        <li><i class="fas fa-funnel-dollar pe-1"></i>{{ $post->job_budget }}</li>
                        @if($post->postDetail[0]->job_timeline_id!=0 || $post->postDetail[0]->job_timeline_id!=null)
                        <li><a class="freelance" href="#"><i class="fas fa-suitcase pe-1"></i>  
                                {{ $post->postDetail[0]->jobTimeline->name }}
                        </a></li>
                        @endif
                           
                    </ul>
                </div>
            </div>
        </div>
        <div class="job-list-favourite-time">
            <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
            <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>1H ago</span>
        </div>
    </div>
</div>
@endforeach

                
                        </div>
                    </div>
                 
                </div>
            </div>
            <div class="col-12 justify-content-center d-flex mt-md-5 mt-4">
                <a class="btn btn-outline btn-lg" href="#">View More Jobs</a>
            </div>
        </div>
    </div>
</section>
<!-- End Jobs-listing -->

<!-- Start Candidates & Companies -->
<section class="space-pb">
    <div class="container">
        <div class="row">
            <!-- Featured Candidates -->
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="section-title">
                    <h2 class="title">Featured Candidates</h2>
                    <p>We know this in our gut, but what can we do about it? How can we motivate ourselves?</p>
                </div>
                @foreach ($freelancerDetail as $user)
                <div class="candidate-list">
                    <div class="candidate-list-image">
                        <img class="img-fluid" src="{{asset('images/profiles/'.$user->userDetails[0]->user_profile)}}" alt="">
                    </div>
                    <div class="candidate-list-details">
                        <div class="candidate-list-info">
                            <div class="candidate-list-title">
                                <h5 class="mb-0"><a href="{{ route('public_profile', $user->unni_id ) }}">{{ $user->first_name.' '.$user->last_name }}</a></h5>
                            </div>
                            <div class="candidate-list-option">
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-filter pe-1"></i> 
                                        @foreach ( $user->skills as $service)
                                            {{ $service->service->name.', ' }}
                                        @endforeach</li>
                                    <li><i class="fas fa-map-marker-alt pe-1"></i> {{ $user->userDetails[0]->user_address_country.', '. $user->userDetails[0]->user_address_city }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="candidate-list-favourite-time">
                        <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                        <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>3D ago</span>
                    </div>
                </div> 
                @endforeach
             
               


             
            </div>
            <div class="col-lg-1"></div>
            <!-- Top Companies -->
            <div class="col-lg-4">
                <div class="section-title">
                    <h2 class="title">Top Companies</h2>
                    <p>Here are some tips and methods for motivating yourself:
                       
                    </p>
                </div>
                <div class="owl-carousel owl-nav-bottom-center" data-nav-arrow="false" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="2" data-xs-items="1" data-xx-items="1" data-space="15" data-autoheight="true">
                    @foreach ($userDetail as $user)
                    <div class="item">
                        <div class="employers-grid">
                            <div class="employers-list-logo">
                                <img class="img-fluid" src="{{asset('images/profiles/'.$user->userDetails[0]->user_profile)}}" alt="">
                            </div>
                            <div class="employers-list-details">
                                <div class="employers-list-info">
                                    <div class="employers-list-title">
                                        <h5 class="mb-0"><a href="employer-detail.html">{{ $user->first_name.' '.$user->last_name }}</a></h5>
                                    </div>
                                    <div class="employers-list-option">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-map-marker-alt pe-1"></i>{{ $user->userDetails[0]->user_address_country.', '.$user->userDetails[0]->user_address_city }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="employers-list-position">
                                <a class="btn btn-sm btn-dark" href="#">Open position</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                  
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Candidates & Companies -->
@endif
<!-- Start Easiest Way to Use -->
<section class="space-pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section-title center">
                    <h2 class="title">Easiest Way to Use</h2>
                    <p>Give yourself the power of responsibility. Remind yourself the only thing stopping you is yourself.</p>
                </div>
            </div>
        </div>
        <div class="row bg-holder-pattern mt-3 mt-md-4 me-md-0 ms-md-0" style="background-image: url('images/step/pattern-01.png');">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="feature-step text-center">
                    <div class="feature-info-icon">
                        <i class="flaticon-resume"></i>
                    </div>
                    <div class="feature-info-content pb-2 pb-md-0">
                        <h5>Create Account</h5>
                        <p class="mb-0">Create an account and access your saved settings on any device.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="feature-step text-center">
                    <div class="feature-info-icon">
                        <i class="flaticon-recruitment"></i>
                    </div>
                    <div class="feature-info-content pb-2 pb-md-0">
                        <h5>Find Your Vacancy</h5>
                        <p class="mb-0">Don't just find. Be found. Put your CV in front of great employers.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-0">
                <div class="feature-step text-center">
                    <div class="feature-info-icon">
                        <i class="flaticon-position"></i>
                    </div>
                    <div class="feature-info-content pb-2 pb-md-0">
                        <h5>Get A Job</h5>
                        <p class="mb-0">Your next career move starts here. Choose Job from thousands of companies</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Easiest Way to Use -->

<!-- Start Feature-info -->
<section class="space-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="feature-info feature-info-02 p-4 p-md-5 bg-primary">
                    <div class="feature-info-icon mb-3 text-dark">
                        <i class="flaticon-team"></i>
                    </div>
                    <div class="feature-info-content ps-sm-4 ps-0">
                        <h5 class="text-white">Looking For Job?</h5>
                        <p class="text-white">Your next role could be with one of these top leading organizations.</p>
                        <a href="#">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="feature-info feature-info-02 p-4 p-md-5 bg-dark">
                    <div class="feature-info-icon mb-3 text-primary">
                        <i class="flaticon-job-3"></i>
                    </div>
                    <div class="feature-info-content ps-sm-4 ps-0">
                        <h5 class="text-white">Are You Recruiting?</h5>
                        <p class="text-white">Five million searchable CVs in one place with our linked CV database.</p>
                        <a href="#">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Feature-info -->

<!-- Start Plans&and Packages -->
<section class="space-pb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-xl-3 mb-2 mb-md-4 mb-lg-0">
                <div class="section-title">
                    <h2 class="title">Buy Our Plans and Packages</h2>
                    <p>So, make the decision to move forward. Commit your decision to paper, just to bring it into focus. Then, go for it!</p>
                </div>
                <a class="btn btn-outline btn-lg" href="#">Try 1 month free</a>
            </div>
            <div class="col-lg-8 col-xl-9 pt-0 pt-md-3 pt-lg-0">
                <div class="row g-0">
                    <div class="col-md-4 text-center">
                        <div class="pricing-plan">
                            <div class="pricing-price">
                                <span><sup>$</sup><strong>0</strong>/month</span>
                                <h5 class="pricing-title">Free Forever</h5>
                            </div>
                            <ul class="list-unstyled pricing-list">
                                <li>Appear in general results</li>
                                <li>Accept mobile app </li>
                                <li>Manage candidates directly from your account</li>
                            </ul>
                            <a class="btn btn-outline" href="#">Post a Job</a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="pricing-plan active">
                            <div class="pricing-price">
                                <span><sup>$</sup><strong>10</strong>/day</span>
                                <h5 class="pricing-title">Sponsor Jobs</h5>
                            </div>
                            <ul class="list-unstyled pricing-list">
                                <li>Premium placement</li>
                                <li>PPC on your Job</li>
                                <li>Reach more candidates</li>
                                <li>Desktop, mobile and Job Alerts</li>
                            </ul>
                            <a class="btn btn-outline" href="#">Get Started</a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="pricing-plan mb-0 mb-md-3">
                            <div class="pricing-price">
                                <span><sup>$</sup><strong>299</strong>/month</span>
                                <h5 class="pricing-title">Premium Plan</h5>
                            </div>
                            <ul class="list-unstyled pricing-list">
                                <li>Job ad live for six-weeks</li>
                                <li>50 Feature Jobs </li>
                                <li>Premium placement </li>
                                <li>Desktop, mobile and Job Alerts</li>
                            </ul>
                            <a class="btn btn-outline" href="#">Select Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Plans&and Packages -->

<!-- Start Why You Choose Job Among Other Job Site -->
<section class="space-pb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-md-5 mb-lg-0 pe-lg-5">
                <div class="row">
                    <div class="col-sm-7">
                        <img class="img-fluid w-100" src="images/about/01.png" alt="">
                    </div>
                    <div class="col-sm-5 mt-sm-5 mt-4">
                        <img class="img-fluid mb-sm-2 w-100" src="images/about/02.png" alt="">
                        <div class=" mt-3">
                            <a class="popup-icon popup-youtube bg-holder bg-overlay-black-80" href="https://www.youtube.com/watch?v=LgvseYYhqU0">
                                <i class="flaticon-play-button"></i>
                                <img class="img-fluid w-100" src="images/about/03.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pt-2 pt-sm-3 pt-md-0">
                <div class="section-title">
                    <h2 class="title">Why You Choose Job Among Other Job Site?</h2>
                    <p>I truly believe Augustine’s words are true and if you look at history you know it is true. There are many people in the world with amazing talents. who realize only a small percentage of their potential. We all know people who
                        live this truth.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="d-flex mb-lg-5 mb-4">
                            <i class="font-xlll text-primary flaticon-team"></i>
                            <h6 class="ps-3 align-self-center mb-0">Best talented people</h6>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex mb-lg-5 mb-4">
                            <i class="font-xlll text-primary flaticon-job-3"></i>
                            <h6 class="ps-3 align-self-center mb-0">Easy to find candidate</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="d-flex mb-md-0 mb-4">
                            <i class="font-xlll text-primary flaticon-chat"></i>
                            <h6 class="ps-3 align-self-center mb-0">Easy to communicate</h6>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex">
                            <i class="font-xlll text-primary flaticon-job-2"></i>
                            <h6 class="ps-3 align-self-center mb-0">Global recruitment option</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Why You Choose Job Among Other Job Site -->


<!-- Start Browse Hundreds of Jobs -->
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bg-light px-lg-5">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="px-md-5 px-4 pt-5 pt-lg-0">
                                <div class="section-title">
                                    <h2 class="title">Browse Hundreds of Jobs</h2>
                                    <p class="lead">We are efficiently delivering tons of jobs straight to your pocket.</p>
                                </div>
                            
                            </div>
                        </div>
                        <div class="col-lg-5 mt-4 mt-md-5 text-center">
                            <img class="img-fluid" src="images/mobile-app.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Browse Hundreds of Jobs -->

<!-- Start Blog and Career Advice -->
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section-title center">
                    <h2 class="title">Blog and Career Advice</h2>
                    <p>Data trends and insights, tips for employers, product updates and best practices</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-md-0 mb-4">
                <div class="blog-post justify-content-center text-center">
                    <div class="blog-post-image">
                        <img class="img-fluid" src="images/blog/03.jpg" alt="">
                    </div>
                    <div class="blog-post-content">
                        <div class="blog-post-details pb-0">
                            {{-- <div class="blog-post-time">
                                <a href="#">February 4, 2019</a>
                            </div> --}}
                            <div class="blog-post-title">
                                <h5><a href="#">Sell yourself in a job interview</a></h5>
                            </div>
                            {{-- <div class="justify-content-center mt-2 d-flex">
                                <a class="btn btn-link p-0" href="#">Read More <i class="fas fa-long-arrow-alt-right ps-2"></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-md-0 mb-4">
                <div class="blog-post text-center">
                    <div class="blog-post-image">
                        <img class="img-fluid" src="images/blog/04.jpg" alt="">
                    </div>
                    <div class="blog-post-content">
                        <div class="blog-post-details pb-0">
                            {{-- <div class="blog-post-time">
                                <a href="#">March 10, 2019</a>
                            </div> --}}
                            <div class="blog-post-title">
                                <h5><a href="#">Hype or Helpful to the Jobs Market.</a></h5>
                            </div>
                            {{-- <div class="justify-content-center mt-2 d-flex">
                                <a class="btn btn-link p-0" href="#">Read More <i class="fas fa-long-arrow-alt-right ps-2"></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-post text-center">
                    <div class="blog-post-image">
                        <img class="img-fluid" src="images/blog/05.jpg" alt="">
                    </div>
                    <div class="blog-post-content">
                        <div class="blog-post-details pb-0">
                            {{-- <div class="blog-post-time">
                                <a href="#">May 15, 2020</a>
                            </div> --}}
                            <div class="blog-post-title">
                                <h5><a href="#">How to become an Account Manager</a></h5>
                            </div>
                            {{-- <div class="justify-content-center mt-2 d-flex">
                                <a class="btn btn-link p-0" href="#">Read More <i class="fas fa-long-arrow-alt-right ps-2"></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End  Blog and Career Advice -->
@endsection
<script>
    $('#exampleModalCenter2').on('hide', function() {
window.location.reload();
});
</script>