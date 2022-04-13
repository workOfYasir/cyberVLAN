@extends( (Auth::user()->approve == 1) ?  'frontend.layouts.app' :'frontend.layouts.unapproved')

@section('content')
<!--================================= banner -->
<div class="candidate-banner bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="candidate-list bg-light">
                    <div class="candidate-list-image">
                        <img class="img-fluid" src="{{asset('images/profiles/'.$user_details->user_profile)}}" alt="Image Unavailable" />
                    </div>
                    <div class="candidate-list-details">
                        <div class="candidate-list-info">
                            <div class="candidate-list-title">
                                <h5 class="mb-0">{{ $user->first_name.' '.$user->last_name }}</h5>
                            </div>
                            
                            <div class="candidate-list-option">
                                <ul class="list-unstyled">
                                   
                                    <li>
                                        <i class="fas fa-map-marker-alt pe-1"></i>
                                        {{$user_details->user_address_city}}, {{$user_details->user_address_country}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="stars col"> 
                        <div id="rateYo" data-rateyo-rating="{{ $user->averageRating}}"> </div>
                        {{-- <form class="form-horizontal poststars" action="{{route('productStar', $user->id)}}" id="addStar" method="POST"> --}}
                            {{ csrf_field() }}
                                  <div class="form-group required text-end">
                                    <h6 class="ml-1 font-weight-bold"> {{  number_format($user->averageRating,1,'.','') }}</h6>
                                    <div class="col-sm-12">

                                        @if($user->averageRating>0.0000 && $user->averageRating<=0.5555)
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
                                      
                                        @elseif($user->averageRating>=0.5555 && $user->averageRating<=1.0000)
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
                                        @elseif($user->averageRating>=1.0000 && $user->averageRating<=1.5555)
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
                                        @elseif($user->averageRating>=1.5555 && $user->averageRating<=2.0000)
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
                                        @elseif($user->averageRating>=2.0000 && $user->averageRating<=2.5555)
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
                                        @elseif($user->averageRating>=2.5555 && $user->averageRating<=3.0000)
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
                                        @elseif($user->averageRating>=3.0000 && $user->averageRating<=3.5555)
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
                                        @elseif($user->averageRating>=3.5555 && $user->averageRating<=4.0000)
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
                                        @elseif($user->averageRating>=4.0000 && $user->averageRating<4.5555)
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
                                        @elseif($user->averageRating>=4.5555 && $user->averageRating<5.0000)
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
{{--                                                      
                                  <input type="text" class="form-control" value="{{ $comment[0]->comment }}" name="comment"/>
                                  <input value="ok" id="comment" type="submit"  /> --}}
                          {{-- </form> --}}
                    </div> 
                    {{-- <div class="widget ms-auto mb-0">
                        <div class="company-detail-meta ms-auto">
                            <ul class="list-unstyled mt-3 mb-0 ms-2 ms-sm-0">
                                <li>
                                    <div class="share-box share-dark-bg">
                                        <a href="#">
                                            <i class="fas fa-share-alt"></i><span class="ps-2">Share</span></a>
                                        <ul class="list-unstyled share-box-social">
                                            <li>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-print"></i><span class="ps-2">Print</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--================================= banner -->

<section class="space-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sticky-top secondary-menu-sticky-top">
                    <div class="secondary-menu">
                        <ul>
                            <li><a href="#about"> About </a></li>
                            <li><a href="#experience"> Work Experience </a></li>
                            <li><a href="#portfolio"> Portfolio </a></li>
                            <li><a href="#skill"> professional Skill </a></li> 
                            <li><a href="{{ route('accessment.public') }}"> Assessments </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="jobber-candidate-detail">
                    <div id="about">
                        <h5 class="mb-3">About Me</h5>
                        <div class="border p-3">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="d-flex">
                                        <i class="font-xll text-primary align-self-center flaticon-account"></i>
                                        <div class="feature-info-content ps-3">
                                            <label class="mb-0">Name:</label>
                                            <span class="d-block fw-bold text-dark">{{ $user->first_name.' '.$user->last_name }}</span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="d-flex">
                                        <i class="
                            font-xll
                            text-primary
                            align-self-center
                            flaticon-contact
                          "></i>
                                        <div class="feature-info-content ps-3">
                                            <label class="mb-0">Mobile:</label>
                                            <span class="d-block fw-bold text-dark">{{$user_details->user_mobile}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="d-flex">
                                        <i class="
                            font-xll
                            text-primary
                            align-self-center
                            flaticon-contact
                          "></i>
                                        <div class="feature-info-content ps-3">
                                            <label class="mb-0">Phone :</label>
                                            <span class="d-block fw-bold text-dark">{{$user_details->user_phone}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="d-flex">
                                        <i class="
                            font-xll
                            text-primary
                            align-self-center
                            flaticon-appointment
                          "></i>
                                        <div class="feature-info-content ps-3">
                                        
                                            @if(!empty($user_role))
                                            <label class="mb-0">Date Of Birth :</label>
                                            @else
                                            <label class="mb-0">Company Foundation Date :</label>
                                            @endif
                                            <span class="d-block fw-bold text-dark">{{$user_details->user_dob}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="d-flex">
                                        <i class="
                            font-xll
                            text-primary
                            align-self-center
                            flaticon-map
                          "></i>
                                        <div class="feature-info-content ps-3">
                                            <label class="mb-0">Address :</label>
                                            <span class="d-block fw-bold text-dark">{{$user_details->user_address_city}}, {{$user_details->user_address_country}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="d-flex">
                                        <i class="
                                            font-xll
                                            text-primary
                                            align-self-center
                                            flaticon-man
                                          "></i>

                                        <div class="feature-info-content ps-3">
                                            @if(!empty($user_role))
                                            <label class="mb-0">Sex :</label>
                                            @else                                           
                                            <label class="mb-0">Owner's Gender :</label>
                                            @endif
                                            <span class="d-block fw-bold text-dark">{{$user_details->user_gender}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="d-flex">
                                        <i class="
                                            font-xll
                                            text-primary
                                            align-self-center
                                            flaticon-approval
                                        "></i>
                                        <div class="feature-info-content ps-3">
                                            <label class="mb-0">Email:</label>
                                            <span class="d-block fw-bold text-dark">{{$user->email}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 offset-md-4 col-sm-6 mb-4">
                                    <div class="d-flex">
                                        <i class="
                                            font-xll
                                            text-primary
                                            align-self-center
                                            flaticon-time
                                        "></i>
                                        <div class="feature-info-content ps-3">
                                            <label class="mb-0">Job Timeline:</label>
                                            <span class="d-block fw-bold text-dark">
                                                @if(!empty($user->getPermissionNames()))
                                                @foreach($user->getPermissionNames() as $v)
                                                   {{ $v }}</label>
                                                @endforeach
                                            @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 mt-sm-5">
                            <p>{{$user_details->description}}</p>
                        </div>
                    </div>
                  
                    <hr class="my-4 my-md-5" />
                    @if(!empty($user_role))
                    @if(!empty($user_details->freelancerWork[0]->starting_date))
                    <div id="experience">
                        <h5 class="mb-3">Work & Experience</h5>
                        <div class="jobber-candidate-timeline">
                            <div class="jobber-timeline-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            @foreach ($user_details->freelancerWork as $work)
                            <div class="jobber-timeline-item">
                                <div class="jobber-timeline-cricle">
                                    <i class="far fa-circle"></i>
                                </div>
                                <div class="jobber-timeline-info">
                                    <span class="jobber-timeline-time">{{ $work->starting_date }} <b>to</b> {{ $work->ending_date }}</span>
                                    <h6 class="mb-2">{{ $work->designation }}</h6>
                                    <span>- {{ $work->company }}</span>
                                    <p class="mt-2">
                                        {{$work->description}}
                                    </p>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                    <hr class="my-4 my-md-5" />
                    @endif
                    @endif

                    
                    <div id="skill">

                        <h5 class="mb-3">Professional Skills</h5>
                        <div class="">
                            <blockquote class="blockquote">
                                So how do we get clarity? Simply by asking ourselves lots of
                                questions: What do I really want? What does success look
                                like to me? How will this achievement change my life? How
                                can I use this success to make a difference for others?
                            </blockquote>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($user_details->freelancerSkill as $skill)
                         
                                {{ $skill->service->category->category_name }}
                                <div class="progress mb-md-0">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar-title">{{ $skill->service->name }}</div>
                                        <span class="progress-bar-number">70%</span>
                                    </div>
                                </div>
                               
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr class="my-4 my-md-5" />
                    <div id="portfolio" class="popup-gallery">
                        <h5 class="mb-3">Portfolio</h5>
                        <div class="owl-carousel mb-lg-5 mb-4" data-nav-arrow="false" data-items="3" data-md-items="3" data-sm-items="3" data-xs-items="2" data-space="15">
                            <div class="item">
                                <a class="portfolio-img" href="images/gallery/01.jpg"><img class="img-fluid" src="images/gallery/01.jpg" alt="" /></a>
                            </div>
                            <div class="item">
                                <a class="portfolio-img" href="images/gallery/02.jpg"><img class="img-fluid" src="images/gallery/02.jpg" alt="" /></a>
                            </div>
                            <div class="item">
                                <a class="portfolio-img" href="images/gallery/03.jpg"><img class="img-fluid" src="images/gallery/03.jpg" alt="" /></a>
                            </div>
                        </div>
                        <p>
                            The sad thing is the majority of people have no clue about
                            what they truly want. They have no clarity. When asked the
                            question, responses will be superficial at best, and at worst,
                            will be what someone else wants for them.
                        </p>
                    </div>
                    <hr class="my-4 my-md-5" />
                    <h6>Reviews</h6>
                    @foreach ($user->jobCandidate as $candidate)
                        @foreach ($candidate->post->ratingOn as $rating)
                        <div class="stars"> 
                            <div id="rateYo" data-rateyo-rating="{{ $rating->rating}}"> </div>
                        
                                {{ csrf_field() }}
                                      <div class="form-group required">
                                        <div class="col-sm-12">
                                            @if($rating->rating>0 && $rating->rating<=1)
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
                                            @elseif($rating->rating>=1 && $rating->rating<=2)
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
                                            @elseif($rating->rating>=2 && $rating->rating<=3)
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
                                            @elseif($rating->rating>=3 && $rating->rating<=4)
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
                                            @elseif($rating->rating>=4 && $rating->rating<5)
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
                                            <label class="star star-5" for="star-5"><i class="far fa-star"></i></label>
                                            <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                            <label class="star star-4" for="star-4"><i class="far fa-star"></i></label>
                                            <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                            <label class="star star-3" for="star-3"><i class="far fa-star"></i></label>
                                            <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                            <label class="star star-2" for="star-2"><i class="far fa-star"></i></label>   
                                            <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                            <label class="star star-1" for="star-1"><i class="far fa-star"></i></label>
                                            @endif
                                       
                                         </div>
                                      </div>
                             
                        </div> 
                        <span class="ml-1 font-weight-bold"> {{  $rating->user->first_name . ' ' . $rating->user->last_name }}</span>
                         <div id="portfolio" class="popup-gallery">
                            <input class="form-control" disabled type="text" value="{{ $rating->comment }}" />
                        </div>
                        @endforeach
                       @endforeach
                    {{-- </div> --}}
                  {{-- </div> --}}
                    </div>
                    <div class="d-flex flex-row">
                        
                </div>
            </div>
            <!--================================= sidebar -->
            <div class="col-lg-4">
                <div class="sidebar mb-0">
                    <div class="widget">
                        <div class="widget-title">
                            <h5>
                           
                            @if(!empty($user_role))
                            Cerfificate
                            @else
                            Company Legal Document
                            @endif
                            
                            </h5>
                        </div>
                        <div class="company-contact-inner widget-box">
                            {{ $user_details->user_document }}
                            <br>
                            @if(!empty($user_details->user_document))
                            <iframe src="{{ asset('/images/documents/'.$user_details->user_document) }}"></iframe>
                            <a class="btn btn-primary btn-outline-primary d-grid" href="{{ asset('/images/documents/'.$user_details->user_document) }}">
                           
                            View
                           
                  
                        </a>
                        @endif
                        </div>
                        
                    </div>
                    <div class="widget">
                        <div class="widget-title">
                            <h5>Contact {{ $user->first_name.' '.$user->last_name }}</h5>
                        </div>
                        <div class="company-contact-inner widget-box">
                            <form>
                                <div class="form-group mb-3">
                                    <label class="form-label">Full name</label>
                                    <input type="text" class="form-control" placeholder="" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" placeholder="" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Subject</label>
                                    <input type="text" class="form-control" placeholder="" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                                <a class="btn btn-primary btn-outline-primary d-grid" href="#">Send Email</a>
                            </form>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-add">
                            <img class="img-fluid" src="images/add-banner.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <!--================================= sidebar -->
        </div>
    </div>
</section>

<!--================================= feature -->
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
                    <a class="ms-auto align-self-center" href="#">Apply now<i class="fas fa-long-arrow-alt-right"></i>
                    </a>
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
                    <a class="ms-auto align-self-center" href="#">Post a job<i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </div>
            </div>
            @endrole
        </div>
    </div>
</section>
<!--================================= feature -->
@endsection
@push('frontscripts')

@endpush