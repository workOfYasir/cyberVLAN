

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
                            <li><a href="{{ route('post.my',Auth::user()->unni_id) }}" class="{{ Request::routeIs('post.my',Auth::user()->unni_id) ? 'active' : '' }} {{ Request::routeIs('post.bids',Auth::user()->unni_id) ? 'active' : '' }}" >My Jobs</a></li>
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
           
            @foreach ($bids as $bid)
            <div class="col-12">
              <div class="job-list ">
                <div class="job-list-logo">
                  <img class="img-fluid" src="{{asset('images/profiles/'.$bid->user->userDetails[0]->user_profile)}}" alt="">
                </div>
                <div class="job-list-details">
                  <div class="job-list-info">
                    <div class="job-list-title">

                      <h5 class="mb-0"><a href="{{ route('post.detail',$bid->post->id) }}"><small class="text-muted">Job: </small> {{ $bid->post->job_title  }}</a></h5>
                      <h6 class="mb-0"><a href="{{ route('post.bid_detail',$bid->id) }}"><small class="text-muted">Bid: </small>{{ $bid->job_proposal }}</a></h6>
                    </div>
                    <div class="job-list-option">
                      <ul class="list-unstyled">
                        <li> <span>via</span> <a href="{{ route('public_profile', $bid->user->unni_id ) }}">{{ $bid->user->first_name.' '.$bid->user->last_name }}</a> </li>
                        <li><i class="fas fa-map-marker-alt pe-1"></i>{{ $bid->user->userDetails[0]->user_address_country.', '.$bid->user->userDetails[0]->user_address_city }}</li>
                        <li><i class="fas fa-filter pe-1"></i>
                          @foreach ($bid->post->postDetail as $detail)
                              {{ $detail->service->name }},
                          @endforeach
                        </li>
                        <li><a class="freelance" href="#"><i class="fas fa-suitcase pe-1"></i>{{ $bid->post->postDetail[0]->jobTimeline->name }}</a></li>
                      </ul>
                      <a class="btn btn-primary m-3" href="{{ route('processTransaction',$bid->job_budget) }}">Pay ${{ $bid->job_budget }}</a>
                      @if(\Session::has('error'))
                          <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                          {{ \Session::forget('error') }}
                      @endif
                      @if(\Session::has('success'))
                          <div class="alert alert-success">{{ \Session::get('success') }}</div>
                          {{ \Session::forget('success') }}
                      @endif
                    </div>
                  </div>
                    
                </div>
                <div class="job-list-favourite-time">
                    
                    <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a> <span class="job-list-time order-1"><i class="fas fa-funnel-dollar pe-1"></i>{{ $bid->job_budget }}</span><span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>1M ago</span> </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================================= Body -->

@endsection
@push('frontscripts')
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
@endpush