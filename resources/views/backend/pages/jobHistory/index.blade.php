@extends('backend.layouts.main')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">History</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Default</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">History</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
                
            
               
            
           
        </div>
        
            <!--end::Page title-->
            <!--begin::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->

    <div class="post d-flex flex-column-fluid mt-5" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->

        {{-- @include('backend.pages.service.store') --}}
        <!--begin::Tables Widget 13-->
            <div class="card mb-5 mb-xl-8 p-3">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5 ">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">History Module</span>
                    </h3>
                </div>
                    <h4 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-4 mb-1">Job History</span>
                    </h4>
                
            
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Posted By</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td>{{ $postHistory->job_title }}</td>
                        <td>{{ $postHistory->user->first_name.' '.$postHistory->user->last_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($postHistory->created_at)->format('d/m/Y')}}</td>
                    </tr>
                </tbody>
            </table>
        
                <h4 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-4 mb-1">Proposal History</span>
                </h4>
      
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Proposal By</th>
                    <th>Total Milestones</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($postHistory->bid as $key => $bid)
                    <td>{{ $bid->user->first_name.' '.$bid->user->last_name }}</td>
                    <td>{{ count($bid->deliverables) }}</td>
                    <td>{{ \Carbon\Carbon::parse($bid->created_at)->format('d/m/Y')}}</td>
                    @endforeach
                   
                </tr>
            </tbody>
        </table>
        
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Milestone Detail</span>
            </h3>
            <h4 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-4 mb-1">First Created Milestone</span>
            </h4>
       
    
    <table class="table table-light">
        <thead>
            <tr>
                <th>Milestone</th>
                <th>Day</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>

                @foreach($postHistory->bid as $key => $bid)
                    @foreach($bid->deliverables as $key => $deliverable)
                    <tr>
                        <td>{{ $deliverable->deliverable_title }}</td>
                        <td>{{ $deliverable->deliverable_duration }}</td>
                        <td>{{ \Carbon\Carbon::parse($deliverable->created_at)->format('d/m/Y')}}</td>
                    </tr>
                    @endforeach
                @endforeach
                
            
        </tbody>
    </table>
 
        <h4 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-4 mb-1">Job Poster Reviews on it</span>
        </h4>
    

<table class="table table-light">
    <thead>
        <tr>
            <th>Comment </th>
            {{-- <th>Action </th> --}}
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($postHistory->bid as $keys => $bid)
           No {{ $key+1 }}
                    @foreach($bid->proposalHistory as $key => $history)
                    <tr>
                        
                        <td>{{ $history->deliverable_description }}</td>
                        {{-- <td>{{ $history->action }}</td> --}}
                        <td>{{ \Carbon\Carbon::parse($history->created_at)->format('d/m/Y')}}</td>
                    </tr>
                    @endforeach
                @endforeach
        </tr>
    </tbody>
</table>

    <h4 class="card-title align-items-start flex-column">
        <span class="card-label fw-bolder fs-4 mb-1">Updated Milestone</span>
    </h4>


<table class="table table-light">
<thead>
    <tr>
        <th>Milestone </th>
        <th>Day </th>
        <th>Comment </th>
        <th>Action </th>
        <th>Created At</th>
    </tr>
</thead>
<tbody>

    @foreach($postHistory->bid as $key => $bid)
   No {{ $key+1 }}
        @foreach($bid->proposalHistory as $key => $history)
      
        <tr>
            <td>{{ $history->deliverable_title }}</td>
            <td>{{ $history->deliverable_duration }}</td>
            <td>{{ $history->deliverable_description }}</td>
            <td>{{ $history->action }}</td>
            <td>{{ \Carbon\Carbon::parse($history->created_at)->format('d/m/Y')}}</td>
        </tr>
        @endforeach
    @endforeach
    

</tbody>
</table>
</div>
            <!--end::Tables Widget 13-->

            <!--end::Heading-->

        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

    </div>
    <!--end::Container-->
    </div>
    <!--end::Post-->


@endsection



