

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
                            {{-- <li><a href="{{ route('review.list',Auth::user()->unni_id) }}" class="{{ Request::routeIs('review.list',Auth::user()->unni_id) ? 'active' : '' }}">Reviews</a></li> --}}
                            {{-- <li><a href="#">Saved Jobs</a></li> --}}
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
            <button type="button" class="btn btn-primary" id="review">
                Launch demo modal
              </button>
            @foreach ($reviews as $review)
            <div class="col-12">
              <div class="job-list ">
                <div class="job-list-logo">
                  <img class="img-fluid" src="{{asset('images/profiles/'.$review->user->userDetails[0]->user_profile)}}" alt="">
                </div>
                <div class="job-list-details">
                  <div class="job-list-info">
                    <div class="job-list-title">
<h4><a href="{{ route('public_profile', $review->user->unni_id ) }}">{{ $review->user->first_name.' '.$review->user->last_name }}</a></h4>

                      <h5 class="mb-0"><a href="{{ route('post.detail',$review->post->id) }}"><small class="text-muted">Job: </small> {{ $review->post->job_title  }}</a></h5>
                      <h6 class="mb-0"><a href="{{ route('post.bid_detail',$review->id) }}"><small class="text-muted">Bid: </small>{{ $review->job_proposal }}</a></h6>
                    </div>
                    <div class="job-list-option">
                      <ul class="list-unstyled">
                        {{-- <li> <span>via</span> <a href="{{ route('public_profile', $review->user->unni_id ) }}">{{ $review->user->first_name.' '.$review->user->last_name }}</a> </li> --}}
                        <li><i class="fas fa-map-marker-alt pe-1"></i>{{ $review->user->userDetails[0]->user_address_country.', '.$review->user->userDetails[0]->user_address_city }}</li>
                        <li><i class="fas fa-filter pe-1"></i>
                          @foreach ($review->post->postDetail as $detail)
                              {{ $detail->service->name }},
                          @endforeach
                        </li>
                        <li><a class="freelance" href="#"><i class="fas fa-suitcase pe-1"></i>{{ $review->post->postDetail[0]->jobTimeline->name }}</a></li>
                      </ul>
                      
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
                    
                    <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a> <span class="job-list-time order-1"><i class="fas fa-funnel-dollar pe-1"></i>{{ $review->job_budget }}</span><span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>1M ago</span> </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Modal -->

</section>
<div id="myModal" class="modal show fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" >
<!--================================= Body -->

@endsection
@push('frontscripts')
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
<script>
    $('#review').click(function (){

    })
</script>
@endpush