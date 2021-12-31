@extends('backend.layouts.main')


@section('content')

    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Accessments</h1>
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
                    <li class="breadcrumb-item text-dark">Accessments</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Wrapper-->
                <div class="me-4">
                    <!--begin::Menu-->
                    {{-- <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
											</svg>
										</span>
                        <!--end::Svg Icon-->Filter</a> --}}
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6168393d79e01">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->
                        <!--begin::Form-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_6168393d79e01" data-allow-clear="true">
                                        <option></option>
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="2">In Process</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Member Type:</label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="d-flex">
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                        <span class="form-check-label">Author</span>
                                    </label>
                                    <!--end::Options-->
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                        <span class="form-check-label">Customer</span>
                                    </label>
                                    <!--end::Options-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Notifications:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                    <label class="form-check-label">Enabled</label>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Menu-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Button-->
                {{-- <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_role_target">Create</a> --}}
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    
    <div class="post d-flex flex-column-fluid mt-5" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="post d-flex flex-column-fluid mt-5" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
   <!--begin::Card-->
   <div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Roles Module</span>
        </h3>

    </div> 
      <!--begin::Body-->
      <div class="card-body py-3">
          <form action="{{ route('accessments.store') }}" >
        @for($i = 1; $i < 3; $i++)
        <div class="form-floating mt-5 mb-3">
            <textarea class="form-control" placeholder="Enter Question" name="question[]" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Question No {{ $i }}</label>
        </div>
        <label>Option No 1</label>
        <div class="input-group input-group-sm mt-3 mb-3">
            <div class="input-group-text">
              <input class="form-check-input mt-0 answer-radio-{{ $i }}1" onclick="setAnswerVal({{ $i }},1)" type="radio"  name="answer_radio_1[]" aria-label="Radio button for following text input">
            </div>
            <input type="hidden" class="answer-{{ $i }}-1" name="answer[]">
            <input type="text" class="form-control option-{{ $i }}-1" name="option_1[]" aria-label="Text input with radio button"  aria-describedby="inputGroup-sizing-sm">
        </div>
        <label>Option No 2</label>
        <div class="input-group input-group-sm mt-3 mb-3">
            <div class="input-group-text">
              <input class="form-check-input mt-0 answer-radio-{{ $i }}2" onclick="setAnswerVal({{ $i }},2)" type="radio"  name="answer_radio_2[]" aria-label="Radio button for following text input">
            </div>
            <input type="hidden" class="answer-{{ $i }}-2" name="answer[]">
            <input type="text" class="form-control option-{{ $i }}-2" name="option_2[]" aria-label="Text input with radio button">
        </div>
        <label>Option No 3</label>
        <div class="input-group input-group-sm mt-3 mb-3">
            <div class="input-group-text">
              <input class="form-check-input mt-0 answer-radio-{{ $i }}-3" onclick="setAnswerVal({{ $i }},3)" type="radio" name="answer_radio_3[]"  aria-label="Radio button for following text input">
            </div>
            <input type="hidden" class="answer-{{ $i }}-3" name="answer[]">
            <input type="text" class="form-control option-{{ $i }}-3" name="option_3[]" aria-label="Text input with radio button">
        </div>
        <label>Option No 4</label>
        <div class="input-group input-group-sm  mb-3 mt-2">
            <div class="input-group-text">
              <input class="form-check-input mt-0 answer-radio-{{ $i }}-4" onclick="setAnswerVal({{ $i }},4)" type="radio" name="answer_radio_4[]"  aria-label="Radio button for following text input">
            </div>
            <input type="hidden" class="answer-{{ $i }}-4" name="answer[]">
            <input type="text" class="form-control option-{{ $i }}-4" name="option_4[]" aria-label="Text input with radio button">
        </div>
        <hr class="m-5 ">
  @endfor
  <button type="submit" >submit</button>
    </form>
    </div>
</div>
                </div></div>                 

        </div></div>
        <script>
function setAnswerVal(QuestionNo,OptionNo) {
    console.log('QuestionNo',QuestionNo);
    console.log('OptionNo',OptionNo);
    var optionVal = $('.option-'+QuestionNo+'-'+OptionNo).val();
    console.log('optionVal',optionVal);
    $('.answer-'+QuestionNo+'-'+OptionNo).val(optionVal);
    var selectedOptionVal = $('.answer-'+QuestionNo+'-'+OptionNo).val() 
    console.log('selectedOptionVal',selectedOptionVal);
    $('.option-'+QuestionNo+'-'+OptionNo).change(function () {
        var optionVal = $('.option-'+QuestionNo+'-'+OptionNo).val();
        console.log('change optionVal',optionVal);
        $('.answer-'+QuestionNo+'-'+OptionNo).val(optionVal);
        var selectedOptionVal = $('.answer-'+QuestionNo+'-'+OptionNo).val() 
        console.log('change selectedOptionVal',selectedOptionVal);
    })
}
        </script>
@endsection