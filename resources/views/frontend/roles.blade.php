@extends( (Auth::user()->approve == 1) ?  'frontend.layouts.app' :'frontend.layouts.unapproved')
@section('content')
<section class="space-ptb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10 col-md-12">
          <div class="login-register">
            <div class="section-title">
             <h4 class="text-center">Login to Your Account</h4>
            </div>
            <fieldset>
              <legend class="px-2">Choose your Account Type</legend>
              <ul class="nav nav-tabs nav-tabs-border d-flex" role="tablist">
                <li class="nav-item me-4">
                  <a class="nav-link active" onclick="role(1)" id="candidate"  data-bs-toggle="tab"  role="tab" aria-selected="false">
                    <div class="d-flex">
                      <div class="tab-icon">
                        <i class="flaticon-users"></i>
                      </div>
                      <div class="ms-3">
                        <h6 class="mb-0">Candidate</h6>
                        <p class="mb-0">Log in as Candidate</p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  data-bs-toggle="tab" onclick="role(2)" id="employer"  role="tab" aria-selected="false">
                    <div class="d-flex">
                      <div class="tab-icon">
                        <i class="flaticon-suitcase"></i>
                      </div>
                      <div class="ms-3">
                        <h6 class="mb-0">Employer</h6>
                        <p class="mb-0">Log in as Employer</p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </fieldset>
            <form action="{{ route('roleStore') }}" method="post">
                @csrf
                <input type="text" class="role" name="role">
<button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
<script>
    function role(val)
    {
        if(val==1){
            $('.role').val(1)
        }else{
            $('.role').val(2)
        }
     
    }
</script>