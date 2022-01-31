@extends('frontend.layouts.app')

@section('content')
<!--================================= inner banner -->
<div class="header-inner bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-primary">Post</h2>
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                    <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Post </span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--================================= inner banner -->

<!--================================= Signin -->
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="login-register">
                    <div class="section-title">
                        <h4 class="text-center">Post New Job</h4>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="candidate" role="tabpanel">
                            <form class="mt-4" method="POST" novalidate="novalidate" action="{{ route('post.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="mb-4 col-12">
                                        <label class="form-label" for="job-title">Job Title</label>
                                        <input class="form-control" type="text" name="job-title" autocomplete="off" />
                                    </div>
                                    <div class="mb-4 col-12">
                                        <label class="form-label" for="job-description">Job Description</label>
                                        <textarea class="form-control " type="text" name="job-description" autocomplete="off" >
                                        </textarea>
                                       
                                    </div>
                                    <div class="mb-4 col-12">
                                        <label class="form-label" for="job-requirment">Job Requirment </label>
                                        <textarea class="form-control" type="text" name="job-requirments" autocomplete="off" >
                                        </textarea>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <label class="form-label" for="job-budget">Job Budget</label>
                                        <input class="form-control" type="text" name="job-budget" autocomplete="off" />
                                    </div>
                                    <div class="form-group mb-4 col-md-12">
                                        <label class="form-label">Skills</label>
                                        <select class="form-control select2" name="service[]" id="service" multiple="multiple">
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 col-md-12">
                                        <label class="form-label">Project Timeline</label>
                                        <select class="form-control select" name="job_timeline" id="job_timeline" >
                                            <option disabled hidden selected> Select Permission </option>
                                            @foreach($permissions as $project_timeline)
                                                <option value="{{$project_timeline->id}}">{{$project_timeline->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 col-md-12" id="hours">
                                    </div>
                                    <div class="form-group mb-4 col-md-12" id="days">
                                    </div>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="budget_status" id="budget_status" value="checkedValue" checked>
                                        Fixed Budget
                                  </label>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary d-grid">Publish</button>
                                    </div>
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('frontscripts')
    <script src="{{ asset('js/custom/jobs-timeline.js') }}"></script>
@endpush