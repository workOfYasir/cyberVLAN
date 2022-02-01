<!-- Start Header -->
@php
if (\Route::current()->getName() == 'home') {
$home = true;
}
else
$home = false;
@endphp
<header @class([ 'header' , 'header-transparent'=> $home,'bg-dark' => ! $home,])>
    <nav class="navbar navbar-static-top navbar-expand-lg navbar-light header-sticky">
        <div class="container-fluid">
            <button id="nav-icon4" type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">
                <!-- <img class="img-fluid" src="{{ asset('images/logo.svg') }}" alt="logo"> -->
                CyberVLAN
            </a>
            <div class="navbar-collapse collapse justify-content-start">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="properties.html" class="nav-link" data-bs-toggle="dropdown">Job<i class="fas fa-chevron-down fa-xs"></i></a>
                        <ul class="dropdown-menu megamenu dropdown-menu-lg">
                            <li>
                                <div class="row">
                                    <div class="col-sm-4 mb-2 mb-sm-0">
                                        <h6 class="mb-3 nav-title">Job Post</h6>
                                        <ul class="list-unstyled mt-lg-3">
                                            @role('client')
                                            <li><a href="{{ route('post.create') }}">Post Job</a></li>
                                            @endrole
                                            @role('superAdmin')
                                            <li><a href="{{ route('post.create') }}">Post Job</a></li>
                                            @endrole
                                            <li><a href="{{ route('post.list') }}">Show Job</a></li>                                            
                                        </ul>
                                    </div>                 
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('freelancer.list') }}">Employers</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('client.list') }}">Companies</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('messanger') }}" >
                            <i class="fas fa-comment-dots" style="font-size: 20px;"></i>
                        </a>
                    </li>
                </ul>
            </div>
           
                <div class="add-listing">
                    @auth
                    <div class="nav-item dropdown">
                       
                        <a class="btn btn-white btn-md dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->first_name.' '.Auth::user()->last_name }} <i class="fas fa-chevron-down fa-xs"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @role('superAdmin')
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endrole
                            <li><a class="dropdown-item" href="{{ route('profile',Auth::user()->unni_id) }}">Profile</a></li>
                            {{-- <li><a class="dropdown-item" href="dashboard-candidates-change-password.html">Change Password </a></li>
                            <li><a class="dropdown-item" href="dashboard-candidates-my-resume.html">My Resume</a></li>
                            <li><a class="dropdown-item" href="dashboard-candidates-manage-jobs.html">Manage Jobs</a></li>
                            <li><a class="dropdown-item" href="dashboard-candidates-saved-jobs.html">Saved Jobs</a></li> --}}
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a class="btn btn-white btn-md" href="{{ route('login') }}"><i class="far fa-user pe-2"></i>Sign In</a>
                    @if (Route::has('register'))
                    <a class="btn btn-white btn-md" href="{{ route('register') }}"><i class="far fa-user pe-2"></i>Register</a>
                    @endif
                    @endif
                </div>
           
        </div>
    </nav>
</header>
<!-- End Header -->