

<div class="col-lg-9">
    <!--=================================
    right-sidebar -->
    <div class="row mb-4">
       <div class="col-md-6">
        <div class="section-title mb-3 mb-lg-4">
          <h6 class="mb-0">Showing <span class="text-primary"> Jobs</span></h6>
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
       
      @foreach ($jobs as $post)
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
                              </div>
                              <div class="job-list-favourite-time"> <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a> <span class="job-list-time order-1"><i class="fas fa-funnel-dollar pe-1"></i>{{ $post->job_budget }}</span><span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>1M ago</span> </div>
                            </div>
                          </div>
                          @endforeach

    </div>
 
  </div>