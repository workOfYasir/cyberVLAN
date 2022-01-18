<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>{{ config('app.name', 'CyberVLAN') }}</title>
    <meta charset="utf-8" />
    <!-- <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico')}}" /> -->
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->


    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">


            <!-- Side Bar -->
            @include('backend.layouts.components.asidebar')


            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!-- Header Content -->
                @include('backend.layouts.components.header')

                <!--begin::Content-->
                @yield('content')

                <!--end::Content-->

                <!-- Footer Content -->
                @include('backend.layouts.components.footer')

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->


    <!--end::Main-->

    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{ asset('js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('js/custom/widgets.js')}}"></script>
    <script src="{{ asset('js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{ asset('js/custom/modals/create-app.js')}}"></script>
    <script src="{{ asset('js/custom/modals/upgrade-plan.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        let user_table;
        $(document).ready(function() {

            user_table = $('#user-table').DataTable();

            $('.edit-service').on('click', function() {
                var prop_id = $(this).data('id');
                console.log(prop_id);

                $.ajax({
                    type: 'GET',
                    url: "{{route('service.edit', '')}}" + "/" + prop_id,
                    dataType:'json',
                    success: function(data) {
                        console.log(data[0])
                        $('.service_title').val(data[0].name);
                    }
                })

            })
            $('.edit-category').on('click', function() {
                var prop_id = $(this).data('id');
                console.log(prop_id);

                $.ajax({
                    type: 'GET',
                    url: "{{route('category.edit', '')}}" + "/" + prop_id,
                    dataType:'json',
                    success: function(data) {
                        console.log('cat',data[0])
                        $('.category_title').val(data[0].category_name);
                        $('.category_id').val(data[0].id);
                        $('.category_status').val(data[0].status);
                        $('#parent_categoryy').val(data[0].parent_category).attr('select',true)
                       
                       
                  
                        if(data[0].status==null)
                        {
                            $(".category_status").prop("checked", false);
                            
                        }else if(data[0].status==1){
                            $(".category_status").prop("checked", true);
                        }
                    }
                })

            })
            $('.edit-role').on('click', function() {
                var prop_id = $(this).data('id');
                console.log(prop_id);

                $.ajax({
                    type: 'GET',
                    url: "{{route('roles.edit', '')}}" + "/" + prop_id,

                    success: function(data) {
                        console.log(data[0])
                        $('.role-name').val(data[0].name);
                    }
                })

            })
            var userCount = 0
            $('.edit-user').on('click', function() {
                var prop_id = $(this).data('id');
                console.log(prop_id);

                $.ajax({
                    type: 'GET',
                    url: "{{route('users.edit', '')}}" + "/" + prop_id,

                    success: function(data) {

                        console.log(data);
                        console.log(data['roles']);
                        console.log(data['permissions']);
                        console.log(data['userRole']);
                        $('.user_id').val(data['data']['id'])
                        $('.user_name').val(data['data']['first_name']);
                        $('.user_email').val(data['data']['email']);
                        if (userCount == 0) {
                            for (let i = 0; i < (data['roles'].length); i++) {

                                $('.user_role').append('<option value="' + data['roles'][i] + '" ' + ((data['roles'][i] == data['userRole']) ? 'selected' : '') + '>' + data['roles'][i] + '</option>');
                                userCount++;
                            }
                            for (let i = 0; i < (data['permissions'].length); i++) {

                                $('.user_permission').append('<option value="' + data['permissions'][i] + '" ' + ((data['permissions'][i] == data['userPermission']) ? 'selected' : '') + '>' + data['permissions'][i] + '</option>');
                                userCount++;
                            }
                        }
                    }
                })

            })
            $('.approve-btn').on('click', function() {
                
             
              $('.approve-form').submit(function (e){
                e.preventDefault();
                approve_data = $('.approve-user-data').val();
                
                
                approve=1;
                $.ajax({
                    type: 'POST',
                    url: "{{route('users.approve')}}",
                    data: {
                        "_token":"{{ csrf_token() }}",
                        "approve_id":approve_data,
                        "approve":approve,
                        },
                    success: function(data) {
                       console.log(data);
                       for (let index = 0; index < data.length; index++) {
                        
                        $('.approve-badge-'+data[index]).html('<label class="badge badge-light-success status-badge"id="status-badge">Approve</label>')
                       }
                        
                   
                    }
                })
              })
              
            });

            $('.unapprove-btn').on('click', function() {

            $('.approve-form').submit(function (e){
                e.preventDefault();
            approve_data = $('.approve-user-data').val();
            
            approve=0;
            $.ajax({
                type: 'POST',
                url: "{{route('users.approve')}}",
                data: {
                    "_token":"{{ csrf_token() }}",
                    "approve_id":approve_data,
                    "approve":approve,
                    },
                success: function(data) {
                    
                       for (let index = 0; index < data.length; index++) {
                        
                        $('.approve-badge-'+data[index]).empty().append('<label class="badge badge-light-danger status-badge"id="status-badge">Pending</label>')
                      }              
                    
                }
            })
            })

            });
           
            $('.project-assigned').click(function (e){
                id = $('.proposal-id').text();
                
            
                let assign='{{route("payment.assign", ":id") }}',
                assignUrl = assign.replace(':id', id);     
                let payment ='{{route("payment.make", ":payment_id") }}',
                paymentUrl = payment.replace(':id', id); 
            $.ajax({
                type: 'GET',
                url: assignUrl,
                
                success: function(status) {
                    console.log('yes',status);
                 
                    if(status == 0) {
                        console.log('status0:',status);
                        $('.project-assigned').empty().append('<span class="badge badge-light-danger">Not Assigned</span>  ')
                        
                    }else{
                        console.log('status1:',status);
                        $('.project-assigned').empty().append('<span class="badge badge-light-success">Assigned</span> <a href="'+paymentUrl+'"><span class="badge badge-light-success">Payment</span></a>')
                    }             
                    
                }
            })
            })
        })
    </script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>

</html>