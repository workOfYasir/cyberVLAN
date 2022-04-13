

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


                      <!-- Button to Open the Modal -->
                      @if ($bid->deliverable==1)
                      <div class="login d-inline-block me-4">
                        <a href="#" data-bs-toggle="modal" class="btn btn-info" data-bs-target="#exampleModalCenter">Pay  <i class="fab fa-paypal" aria-hidden="true"></i></a>
                      </div>
                      @if ($bid->deliverable>1)
                      <div class="login d-inline-block me-4">
                        <a href="#" data-bs-toggle="modal" class="btn btn-info" data-bs-target="#exampleModalCenter2">Pay  <i class="fab fa-paypal" aria-hidden="true"></i></a>
                      </div>
                      @else
                      <div class="login d-inline-block me-4">
                        <a href="#" data-bs-toggle="modal" class="btn btn-info" data-bs-target="#exampleModalCenter">Pay with <i class="fab fa-paypal" aria-hidden="true"></i></a>
                      </div>
                      @endif
                     
  
                      {{-- <a class="btn btn-primary m-3" href="{{ route('processTransaction',$bid->job_budget) }}">Pay ${{ $bid->job_budget }}</a> --}}
                      @if($bid->status==0)
                      <a class="btn btn-primary m-3" href="{{ route('ProjectAssign',$bid->id) }}"> Start Project </a>
                      @else
                       <a class="btn btn-primary m-3" href="#">Project Started</a>
                     @endif
                     @if($bid->status==1)
                        <a class="btn btn-primary m-3"  href="{{ route('completeProject',$bid->id) }}"> Complete Task </a>
                     @elseif($bid->status==2)
                        <a class="btn btn-primary m-3" href="{{  route('post.review_detail',['bid_id'=>$bid->id,'post_id'=>$bid->post->id]) }}">Task Completed </a>
                     @endif
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

 <!-- The Modal payment 3 -->
 <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header p-4">
        <h4 class="mb-0 text-center">Payment Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="login-register">
          
          <div class="tab-content">
            <div class="tab-pane active" id="candidate" role="tabpanel">
              <form class="mt-4" action="{{ route('processTransaction',$bid->job_budget) }}">
                <input type="hidden" name="reciever" value="{{ $bid->candidate_id }}">
                <input type="hidden" name="post_id" value="{{ $bid->post->id }}" >
                <input type="hidden" name="sender" value="{{ $bid->job_poster_id }}">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th>
                        <div class="mb-3 col-12">
                          <label class="form-label" for="Email2">Name</label>
                          
                        </div>
                      </th>
                      <th>
                        <div class="mb-3 col-12">
                          <label class="form-label" for="Email2">Days</label>
                          
                        </div>
                      </th>
                      <th>
                        <div class="mb-3 col-12">
                          <label class="form-label" for="Email2">Price</label>
                          
                        </div>
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($postDeliverables as $key => $postDeliverable)
                    <tr>
                      <td>
                        <div class="mb-3 col-12">
                          <input type="text" class="form-control" value="{{ $postDeliverable->deliverable_title }}" name="title" id="title">  
                        </div>
                      </td>
                      <td>
                        <div class="mb-3 col-12">
                          <input type="text" class="form-control" value="{{ $postDeliverable->deliverable_duration }}" name="days" id="days">  
                        </div>
                      </td>
                      <td>
                        <div class="mb-3 col-12">
                          <input type="text" class="form-control" value="{{ $bid->job_budget/$deliverableCount }}" name="price" id="price">  
                        </div>
                      </td>
                      <td>
                        <input class="btn btn-primary d-grid" type="submit" />
                      </td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                </table>

                </div>
              </form>
            </div>
            
          </div>
      
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- The Modal payment 1 & 2 -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header p-4">
          <h4 class="mb-0 text-center">Payment Form</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <div class="login-register">
            
            <div class="tab-content">
              <div class="tab-pane active" id="candidate" role="tabpanel">
                <form class="mt-4" action="{{ route('processTransaction',$bid->job_budget) }}">
                  <input type="hidden" name="reciever" value="{{ $bid->candidate_id }}">
                  <input type="hidden" name="post_id" value="{{ $bid->post->id }}" >
                  <input type="hidden" name="sender" value="{{ $bid->job_poster_id }}">
                    <div class="row">
                    <div class="mb-3 col-12">
                      <label class="form-label" for="Email2">Bank Email</label>
                      <input type="hidden" class="form-control" value="sb-sfzid13867679@personal.example.com" name="email" id="email">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12">
                          <label class="form-label" for="Email2">Project Price</label>
                          <input type="hidden" class="form-control" name="price" value="{{ $bid->job_budget }}" id="price"> 
                          <input type="text" disabled class="form-control" name="price" value="{{ $bid->job_budget }}" id="price">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 col-12">
                      <label class="form-label" for="Email2">Remaining Price</label>
                      <span id="remaining" data-amount="{{ $bid->job_budget }}">{{ $bid->job_budget }}</span>
                    </div>    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <input class="btn btn-primary d-grid" type="submit" />
                    </div>                   
                  </div>
                </form>
              </div>
              {{-- <div class="tab-pane fade" id="employer" role="tabpanel">
                <form class="mt-4" action="{{ route('public_profile', $bid->user->unni_id ) }}">
                    <div class="row">
                      <div class="mb-3 col-12">
                        <label class="form-label" for="Email2">Bank Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                      </div>
                      <div class="row">
                          <div class="mb-3 col-12">
                            <label class="form-label" for="Email2">Project Price</label>
                            <input type="text" class="form-control" name="price" id="price">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="mb-3 col-12">
                        <label class="form-label" for="Email2">Remaining Price</label>
                        <span id="remaining" data-amount="{{ $bid->job_budget }}">{{ $bid->job_budget }}</span>
                      </div>    
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <input class="btn btn-primary d-grid" type="submit" />Sign In
                      </div>
                     
                    </div>
                  </form>
              </div> --}}
            </div>
        
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('frontscripts')
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
<script>
$(document).ready(function (){
        var remaining_amount = $('#remaining').attr("data-amount");
        remaining_amount = parseInt(remaining_amount);
        
    $('#price').change(function(){
         var price = $('#price').val();
         price = parseInt(price);
        
         var newPrice = remaining_amount - price
         
         $('#remaining').text(newPrice);
    })
})
   
</script>
@endpush