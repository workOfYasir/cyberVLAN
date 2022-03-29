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
                        <h4 class="text-center"></h4>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="candidate" role="tabpanel">
                            <form class="mt-4" method="POST" novalidate="novalidate" action="#">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label class="form-label" for="job-proposal">Job Proposal</label>
                                        <textarea class="form-control" type="text" name="job-proposal" cols="10" rows="20" autocomplete="off" ></textarea>
                                    </div>
                    
                                    <div class="mb-3 col-12">
                                        <label class="form-label" for="job-budget">Job Budget</label>
                                        <input class="form-control" type="text" name="job-budget" autocomplete="off" />
                                    </div>
                                    More Links: <span class="fa fa-plus add"></span>
                                    <div class="mb-3 col-12 appending_div">
                                      
                                    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var i = 1;
        $('.add').on('click', function() {
            var field = '<br><div>Link URL '+i+': <input type="text" name="blog_linku_one[]"> &nbsp; Link Name '+i+':  <input type="text" name="blog_linkn_one[]"></div>';
            $('.appending_div').append(field);
            i = i+1;
        })
    })
</script>