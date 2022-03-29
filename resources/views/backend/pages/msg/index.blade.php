@extends('backend.layouts.main')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Services</h1>
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
                    <li class="breadcrumb-item text-dark">Services</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
                
            
                    {{-- <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Status:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div>
                                <select class="form-select form-select-solid" data-placeholder="Select option" >
                                    <option></option>
                                    @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->first_name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Input-->
                        </div>
                    </div>

                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Status:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div>
                                <select class="form-select form-select-solid" data-placeholder="Select option" >
                                    <option></option>
                                    @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->first_name }}</option> 
                                    @endforeach
                                    
                                </select>
                            </div>
                            <!--end::Input-->
                        </div>
                    </div>

                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Status:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div>
                                <input type="submit" class="form-control" />
                            </div>
                            <!--end::Input-->
                        </div>
                    </div> --}}
              <form action="{{ route('msg.index') }}">
                <div class="form-group">
                    <label for="exampleSelect">Example label</label>
                    <select class="form-control" id="exampleSelect" name="sender">
                       @foreach ($users as $item)
                       <option value="{{ $item->id }}">{{ $item->first_name }}</option>
                       @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelect">Example label</label>
                    <select class="form-control" id="exampleSelect" name="reciver">
                        @foreach ($users as $item)
                       <option value="{{ $item->id }}">{{ $item->first_name }}</option>
                       @endforeach
                    </select>
                </div>
                <input type="submit" />
              </form>
           
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
            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Services Module</span>
                    </h3>

                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3 col-12 d-flex">
                    @if(isset($msgSender) &&isset($msgReciever))

<div class="col-6 ">

@php
    $i = 0;
    $r = 0;
@endphp
                        @foreach ($msgSender as $key => $item)
                       
                        <div class="bg-primary sender-{{ $key }} p-3" style="border:1px solid white; border-radius:10px">

                            @php
                                parse_str($item->message,$extracted);
                                if($extracted['link']==null)
                                {
                                    echo $extracted['link'].$extracted['msg'];
                                }else{
                                  
                                    
                                        echo '<a class="text-light" href="'.$extracted['link'].'">'.$extracted['link'].'</a> '.$extracted['msg'];
                                  
                                }
                                $i++;
                            @endphp
                            </div>
                            
                        @endforeach
                        <div class="sender-loop">{{ $i }}</div>
                    </div>
                 
                    <div class="col-6">
                        @foreach ($msgReciever as $key => $item)
                        <div class="bg-success reciever-{{ $key }} p-3" style="border:1px solid white; border-radius:10px">
                        @php
                            parse_str($item->message,$extracted);
                            if($extracted['link']==null)
                            {
                                echo $extracted['link'].$extracted['msg'];
                            }else{
                               
                                    echo '<a class="text-light" href="'.$extracted['link'].'">'.$extracted['link'].'</a> '.$extracted['msg'];
                                    
                            }
                            $r++;
                        @endphp
                         </div>

                    @endforeach
                    <div class="reciever-loop">{{ $r }}</div>
                </div>
                    @endif
                    <!--begin::Table container-->
                    {{-- <div class="table-responsive">
                        <!--begin::Table-->
                        {{-- <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="w-25px">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check" />
                                    </div>
                                </th>
                                <th class="min-w-150px">Sr#</th>
                                <th class="min-w-140px">Title</th>
                                <th class="min-w-120px">Category</th>
                                <th class="min-w-120px">Description</th>
                                <th class="min-w-120px">Status</th>
                                <th class="min-w-100px text-end">Actions</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            
                            </tbody>
                            <!--end::Table body-->
                        </table> --}}
                        <!--end::Table-->
                    {{-- </div> --}} 
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
   var height = [];
   sender_loop = $('.sender-loop').text();
   reciever_loop = $('.reciever-loop').text();
   for (let index = 0; index <  sender_loop; index++) {

      $('.sender-'+index).innerHeight();
    height.push($('.sender-'+index).innerHeight())
  
   }
   for (let index = 0; index < reciever_loop; index++) {
       
       $('.reciever-'+index).css('height',height[0]+'px')
   }
   console.log(height);
</script>
@endpush


