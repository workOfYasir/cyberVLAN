

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
                            <li><a class="active" href="{{ route('profile',Auth::user()->unni_id) }}">Profile</a></li>
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a target="_blank" href="{{ route('public_profile',Auth::user()->unni_id) }}">Public Profile</a></li>
                            <li><a href="dashboard-candidates-change-password.html">Change Password</a></li>
                            <li><a href="dashboard-candidates-manage-jobs.html">Manage Jobs</a></li>
                            <li><a href="dashboard-candidates-saved-jobs.html">Saved Jobs</a></li>
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
                @if (count($errors) > 0)
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
                {!! Form::open(array('method' => 'POST','route' => ['profile_update'], 'enctype'=>'multipart/form-data')) !!}
                @csrf
                <input type="hidden" name="qqxid" value="{{$user->unni_id}}">
                <input type="hidden" name="xxzyzz" value="{{$user->id}}">
                <div class="user-dashboard-info-box">
                    <div class="section-title-02 mb-2 d-grid">
                        <h4>Basic Information</h4>
                    </div>
                    <div class="cover-photo-contact d-flex ">
                        <div class="upload-file m-5">
                            <label for="formFile" class="form-label">Upload Profile Photo</label>
                            <input type="file" class="form-control profile" id="user_profile" name="profile">
                        </div>
                   
                        <div class="upload-file m-5">
                            @role('superAdmin')
                            <label for="formFile" class="form-label">  Company Document legal</label>
                            @endrole 
                            @role('client')
                            <label for="formFile" class="form-label">  Company Document legal</label>
                            @endrole 
                            @role('freelancer')
                            <label for="formFile" class="form-label"> Upload Certificate</label>
                            @endrole
                            <input type="file" class="form-control" id="user_company" name="document">
                        </div>
                  
                    </div>
                    @include('frontend.image-cropper')
                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            @role('superAdmin')
                            <label class="form-label">Company First Name</label>
                            @endrole
                            @role('client')
                            <label class="form-label">Company First Name</label>
                            @endrole
                            @role('freelancer')
                            <label class="form-label">First Name</label>
                            @endrole
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{$user->first_name}}">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            @role('superAdmin')
                            <label class="form-label">Company Last Name</label>
                            @endrole
                            @role('client')
                            <label class="form-label">Company Last Name</label>
                            @endrole
                            @role('freelancer')
                            <label class="form-label">Last Name</label>
                            @endrole
                            
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{$user->last_name}}">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label">Website</label>
                            <input type="url" class="form-control" id="user_website" name="user_website" placeholder="website" value="{{$user_details->user_website}}">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            @role('superAdmin')
                            <label class="form-label">Foundation Date</label>
                            @endrole
                            @role('client')
                            <label class="form-label">Foundation Date</label>
                            @endrole
                            @role('freelancer')
                            <label class="form-label">Date of Birth</label>
                            @endrole
                            <div class="input-group date">
                                <input type="date" class="form-control" id="user_dob" name="user_dob" value="{{$user_details->user_dob}}">
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="d-block mb-3">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_gender" id="user_gender1" value="Male" @if($user_details->user_gender=='Male'){{'checked'}} @endif>
                                <label class="form-check-label" for="user_gender1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_gender" id="user_gender2" value="Female" @if($user_details->user_gender=='Female'){{'checked'}} @endif>
                                <label class="form-check-label" for="user_gender2">Female</label>
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="Phone" value="{{$user_details->user_phone}}">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="user_mobile" name="user_mobile" placeholder="Mobile" value="{{$user_details->user_mobile}}">
                        </div>
                        <div class="form-group mb-0 col-md-12">
                            <label class="form-label">Skills</label>
                            <select class="form-control select2" name="service[]" id="service" multiple="multiple">
                                @foreach($services as $service)
                                    <option value="{{$service->id}}"
                                        @foreach($user_details->freelancerSkill as $selectedSkill){{$selectedSkill->freelancer_skill_id == $service->id ? 'selected': ''}}   @endforeach
                                        >{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @role('freelancer')
                        <div class="form-group mb-0 col-md-12">
                            <label class="form-label">Project Timeline</label>{{ $user_permissions[0]->id }}
                            <select class="form-control select" name="permission" id="permission">
                                <option disabled hidden selected> Select Premission </option>
                                @foreach($permissions as $project_timeline)
                                    <option value="{{$project_timeline->name}}"
                                        {{ $user_permissions[0]->id== $project_timeline->id ? 'selected' : ''}}
                                        >{{$project_timeline->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endrole
                        <div class="form-group mb-0 col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="5" id="description" name="description" placeholder="Description">{{$user_details->description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="user-dashboard-info-box">
                    <div class="form-group mb-0">
                        <h4 class="mb-3">Address</h4>
                        <div class="row">
                            <div class="form-group mb-3 col-md-12">
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Location" value="{{$user_details->user_address}}">
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" id="user_address_city" name="user_address_city" placeholder="City" value="{{$user_details->user_address_city}}">
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Zip Code</label>
                                <input type="text" class="form-control" id="user_address_zip" name="user_address_zip" placeholder="Zip Code" value="{{$user_details->user_address_zip}}">
                            </div>
                            <div class="form-group mb-3 col-md-4">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" id="user_address_country" name="user_address_country" placeholder="Country" value="{{$user_details->user_address_country}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-dashboard-info-box">
                    <div class="section-title-02 mb-3">
                        <h4>Social Links</h4>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label">Facebook</label>
                            <input type="url" class="form-control" id="user_facebook" name="user_facebook" placeholder="Facebook" value="{{$user_details->user_facebook}}">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label">Instagram</label>
                            <input type="url" class="form-control" id="user_insta" name="user_insta" placeholder="Instagram" value="{{$user_details->user_insta}}">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label">Twitter</label>
                            <input type="url" class="form-control" id="user_twitter" name="user_twitter" placeholder="Twitter" value="{{$user_details->user_twitter}}">
                        </div>
                        <div class="form-group mb-0 col-md-6">
                            <label class="form-label">Linkedin</label>
                            <input type="url" class="form-control" id="user_linkedin" name="user_linkedin" placeholder="Linkedin" value="{{$user_details->user_linkedin}}">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label">GitHub</label>
                            <input type="url" class="form-control" id="user_github" name="user_github" placeholder="GitHub" value="{{$user_details->user_github}}">
                        </div>
                    </div>
                </div>
                @role('freelancer')
              
                <div class="user-dashboard-info-box" id="works">
                    <div class="form-group work-form-wrapper mb-0">
                        <div class="col-md-12">
                            <h4 class="mb-3">Jobs History</h4>
                        </div>
                        <div class="col-md-12 text-end">
                            <a type="button" class="btn btn-md btn-primary" id="addWork">➕</a>
                        </div>
                        @php
                            $index = 0;
                        @endphp
                        @foreach ($user_details->freelancerWork as $work)
                        
                        <br><hr><br>
                        
                        <div id="work_{{ $index }}">
                            <input type="hidden" name="work" id="work_id_{{ $index }}" value={{ $work->id }}>
                        <div class="row">
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-md" style="color: #ff8a00" onclick="deleteWork({{ $index }})"  title="Delete Work" id="destroyWork">❌</button>
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Starting Date</label>
                                <div class="input-group date">
                                    <input type="date" class="form-control" id="work_starting_{{ $index }}" name="work_starting[]" value="{{ $work->starting_date }}"  placeholder="Starting Date">
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Ending Date</label>
                                <div class="input-group date">
                                    <input type="date" class="form-control" id="work_ending_{{ $index }}" name="work_ending[]" value="{{ $work->ending_date }}" placeholder="Ending Date">
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Company</label>
                                <input type="text" class="form-control" id="company_name_{{ $index }}" name="company_name[]" value="{{ $work->company }}" placeholder="Company Name">
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label">Designation</label>
                                <input type="text" class="form-control" id="designation_{{ $index }}" name="designation[]" value={{ $work->designation }} placeholder="Designation">
                            </div>
                            <div class="form-group mb-0 col-md-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="5" id="company_description_{{ $index }}" name="company_description[]" placeholder="Description">{{ $work->description }}</textarea>
                            </div>
                        </div>
                    </div>
                        @php
                        $index++
                    @endphp
                        @endforeach

                        <input type="hidden" name="row" id="row" value={{ $index }}>

                    </div>
                </div>
               
                @endrole
                       
                <input type="hidden" name="work_starting[]">
                @role('freelancer')
                <div class="user-dashboard-info-box" id="projects">
                    <div class="form-group project-form-wrapper mb-0">
                        <div class="col-md-12">
                            <h4 class="mb-3">Projects</h4>
                        </div>
                        <div class="col-md-12 text-end">
                            <a type="button" class="btn btn-md btn-primary" id="addProject">➕</a>
                        </div>
                        @php
                        $index = 0;
                        @endphp
                        @foreach ($projects as $project)
                        <div id="project_{{ $index }}">
                            <input type="hidden" name="project" id="project_id_{{ $index }}" value={{ $project->id }}>
                        <div class="row">
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-md" style="color: #ff8a00" onclick="deleteProject({{ $index }})"  title="Delete Work" id="destroyWork">❌</button>
                            </div>
                            <div class="form-group mb-3 col-md-12">
                                <label class="form-label">Project Title</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="project_title_{{ $index }}" name="project_title[]"  value={{ $project->title }} placeholder="Project Title">
                                </div>
                            </div>
                            <div class="form-group mb-0 col-md-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="5" id="project_description_{{$index}}" name="project_description[]" value={{ $project->description }} placeholder="Project Details">{{$user_details->description}}</textarea>
                            </div>
                        </div>
                    </div>
                        @php
                            $index++
                        @endphp
                        @endforeach
                        <input type="hidden" name="row" id="project_row" value={{ $index }}>
                    </div>
                </div>
                @endrole
                <input type="hidden" name="project_title[]">
                <div class="user-dashboard-info-box">
                    <div class="section-title-02 mb-3">
                        <h4>Bank Details</h4>
                    </div>

                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label">Account Title</label>
                            <input type="text" class="form-control" id="user_account_title" name="user_account_title" placeholder="Account Title" value="{{$user_details->user_account_title}}">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label">Bank Name</label>
                            <input type="text" class="form-control" id="user_account_bank" name="user_account_bank" placeholder="Bank Name" value="{{$user_details->user_account_bank}}">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label">IBAN Number</label>
                            <input type="text" class="form-control" id="user_account_iban" name="user_account_iban" placeholder="IBAN Number" value="{{$user_details->user_account_iban}}">
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-md btn-primary">Save Settings</button>
                {!! Form::close() !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                @php
           
                $auth_id = Auth::user()->unni_id;
                $secret_code =uniqid();
                $referral_link=$user->unni_id.'/'.$secret_code;
                
                @endphp
                @if($auth_id==$uuid)
                
                <label class="form-label">Your Referral Link & code</label>
                <input type="text" class="form-control" value="{{  url('register',$user->unni_id) }}" id="myReferralLink" readonly>
                @endif


           
            </div>
            <br />
            <div class="col-md-12">
                <br /><button class="btn btn-md btn-primary" onclick="copyMyReferralLink()">Copy Link</button>
            </div>
        </div>
    </div>
</section>
<!--================================= My Profile -->
<script>
    function copyMyReferralLink() {
        var copyText = document.getElementById("myReferralLink");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
    }
    var image_update = "{{ route('image_update') }}";
</script>

@endsection