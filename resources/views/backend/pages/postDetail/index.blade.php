@extends('backend.layouts.main')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Proposals</h1>
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
                    <li class="breadcrumb-item text-dark">Proposals</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                
                <!--begin::Button-->
                {{-- <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_service_target">Create</a> --}}
                <!--end::Button-->
            </div>
            <!--end::Actions-->
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
            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Proposals Module</span>
                    </h3>

                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-bordered text-dark align-middle gs-0 gy-3">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="w-25px">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check" />
                                    </div>
                                </th>
                                <th class="min-w-150px">Sr#</th>
                                <th class="min-w-140px">Post</th>
                                {{-- <th class="min-w-120px">Bids</th>
                                <th class="min-w-120px">Candidates</th> --}}
                                <th class="min-w-120px">Poster</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody >
                            @forelse($post as $key => $posts)
                                <tr>
                                    <td>
                                        <div id="all" style="cursor: pointer;"  onclick="toggle({{ $key }})" >+</div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6 postDetail-id">{{$posts->id}}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('post.detail',$posts->id) }}" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$posts->job_title}}</a>
                                        @if($posts->approve==0)
                                        <span class="badge badge-danger">Not Approved</span>
                                        @elseif($posts->approve==1)
                                        <span class="badge badge-success">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('public_profile',$posts->user->unni_id)}}" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$posts->user->first_name}}</a>
                                    </td>
                                </tr>

                                
                                <tr style="display: none;" id="toggle-{{$key}}" >
                                    
                                    <td colspan="2">
                                    @forelse($posts->bid as $key => $bid)
                                        <a href="/post/bid_detail/{{ $bid->id }}" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{($key+1).': '.$bid->job_proposal}}</a>
                                     
                                        <hr />
                                    @empty
                                        No Proposal
                                    @endforelse
                                    </td>
                                    <td colspan="2">
                                        @forelse($posts->bid as $key => $bid)
                                        <a href="{{route('public_profile',$bid->user->unni_id)}}" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6"  >{{($key+1).': '.$bid->user->first_name}}</a>
                                      
                                        <hr />
                                        @empty
                                            No Proposal
                                        @endforelse
                                    </td>
                                    <td>
                                        @if($bid->status==1)
                                        <span class="badge badge-primary">Assigned</span>
                                        <a href="{{ route('jobHistory',$posts->id) }}" class="badge badge-secondary">History</a>
                                        
                                    @elseif($bid->status==2)
                                        <span class="badge badge-success">Payment Released</span>
                                        <a href="{{ route('jobHistory',$posts->id) }}" class="badge badge-secondary">History</a>
                                        @else
                                        <span class="badge badge-warning">Not Assigned</span>
                                        <a href="{{ route('jobHistory',$posts->id) }}" class="badge badge-secondary">History</a>
                                    @endif
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            @empty
                                <h4 class="card-title text-center flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Post Not Found</span>
                                </h4>
                            @endforelse
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        {{-- @include('backend.pages.proposals.detail') --}}
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
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

@push('scripts')

<script>
// $(document).ready(function() {
//   $('#all').click(function() {
//       console.log('ok');
     

//   });

// });
function toggle(value){
    // console.log("#toggle-"+value);
    $("#toggle-"+value).slideToggle("slow");
}
</script>
@endpush


