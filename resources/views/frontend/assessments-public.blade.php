

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
                            <li><a class="{{ Request::routeIs('profile',Auth::user()->unni_id) ? 'active' : '' }}" href="{{ route('profile',Auth::user()->unni_id) }}">Profile</a></li>
                            @role('superAdmin')
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endrole
                            <li><a target="_blank" href="{{ route('public_profile',Auth::user()->unni_id) }}">Public Profile</a></li>
                            <li><a href="{{ route('accessments.show') }}" class="{{ Request::routeIs('accessments.show') ? 'active' : '' }}">Assessments</a></li> 
                            {{-- <li><a href="dashboard-candidates-change-password.html">Change Password</a></li> --}}
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



<!--================================= My Profile -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @elseif(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                
                <div class="user-dashboard-info-box">
                    <div class="section-title-02 mb-2 d-grid">
                        <h4>Assessments Done</h4>
                        <div class="col-12 d-block">

                        
                            @forelse ($existed as $existed_assessment)
                          
                            {{ $existed_assessment->freelancerSkill[0]->service->name }}
                            
                            <div class="col-3">
                                <div class="progress mb-md-0">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $existed_assessment->score->percentage }}%" aria-valuenow="{{ $existed_assessment->score->percentage }}" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar-title">{{ $existed_assessment->name }}</div>
                                        <span class="progress-bar-number">{{ $existed_assessment->score->percentage.'%' }}</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                            No More Assessments are Completed
                            @endforelse

                        </div>  
                    </div>
                </div>
        
            </div>
        </div>
    
    </div>
</section>


@endsection