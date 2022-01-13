

@extends( (Auth::user()->approve == 1) ?  'frontend.layouts.app' :'frontend.layouts.unapproved')
@section('content')
<!--================================= inner banner -->
<div class="header-inner bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="candidates-user-info">
                    <div class="jobber-user-info">
                        <div class="profile-avatar">
                            <img class="img-fluid profile-image" src="{{asset('/images/profiles/'.$user_details->user_profile)}}" alt="">
                        </div>
                        <div class="profile-avatar-info ms-4">
                            <h3>{{ $user->first_name.' '.$user->last_name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================================= inner banner -->

<!--================================= Dashboard Nav -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sticky-top secondary-menu-sticky-top">
                    <div class="secondary-menu">
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{ route('profile',Auth::user()->unni_id) }}" class="{{ Request::routeIs('profile',Auth::user()->unni_id) ? 'active' : '' }}">Profile</a></li>
                            @role('superAdmin')
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endrole
                            <li><a target="_blank" href="{{ route('public_profile',Auth::user()->unni_id) }}">Public Profile</a></li>
                            <li><a href="{{ route('accessments.show')}}" class="{{ Request::routeIs('accessments.show') ? 'active' : '' }}" >Assessments</a></li> 
                            <li><a href="{{ route('post.my',Auth::user()->unni_id) }}" class="{{ Request::routeIs('post.my',Auth::user()->unni_id) ? 'active' : '' }}" >My Jobs</a></li>
                            {{-- <li><a href="#">Manage Jobs</a></li>
                            <li><a href="#">Saved Jobs</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================= Dashboard Nav -->
<!--================================= Body -->
<section>
    <div class="container">
        <div class="row">

            @foreach ($postTimeline as $post)
            <div class="col-12">
              <div class="job-list ">
                <div class="job-list-logo">
                  <img class="img-fluid" src="{{asset('images/profiles/'.$post->user->userDetails[0]->user_profile)}}" alt="">
                </div>
                <div class="job-list-details">
                  <div class="job-list-info">
                    <div class="job-list-title">

                      <h5 class="mb-0"><a href="{{ route('post.detail',$post->id) }}">{{ $post->job_title  }}</a></h5>
                    </div>
                    <div class="job-list-option">
                      <ul class="list-unstyled">
                        <li> <span>via</span> <a href="{{ route('public_profile', $post->user->unni_id ) }}">{{ $post->user->first_name.' '.$post->user->last_name }}</a> </li>
                        <li><i class="fas fa-map-marker-alt pe-1"></i>{{ $post->user->userDetails[0]->user_address_country.', '.$post->user->userDetails[0]->user_address_city }}</li>
                        <li><i class="fas fa-filter pe-1"></i>
                          @foreach ($post->postDetail as $detail)
                              {{ $detail->service->name }},
                          @endforeach
                        </li>
                        <li><a class="freelance" href="#"><i class="fas fa-suitcase pe-1"></i>{{ $post->postDetail[0]->jobTimeline->name }}</a></li>
                      </ul>
                    </div>
                  </div>
                  @if($bids[0]->id!=null)
                        <a class="btn btn-primary text-right" href="{{ route('post.bids',Auth::user()->unni_id) }}">Bids</a>
                  @endif
                </div>
                <div class="job-list-favourite-time">
                    
                     <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a> <span class="job-list-time order-1"><i class="fas fa-funnel-dollar pe-1"></i>{{ $post->job_budget }}</span><span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>1M ago</span> </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================================= Body -->

@endsection