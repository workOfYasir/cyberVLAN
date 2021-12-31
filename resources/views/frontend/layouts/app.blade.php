<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'CyberVLAN') }}</title>

    <!-- Favicon -->
    <link href="{{asset('images/favicon.ico')}}" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="{{asset('css/font-awesome/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/flaticon/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="{{asset('css/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/magnific-popup/magnific-popup.css')}}" />
  
    <!-- Template Style -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />

</head>

<body>

    @include('frontend.components.header')


    @yield('content')


    @include('frontend.components.footer')
    <script src="{{asset('js/jquery-3.6.0.min.js')}}" ></script>

    <!-- Javascript -->
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- JS Global Compulsory (Do not remove)-->

    <script src="{{asset('js/popper/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/profile.js')}}"></script>

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="{{asset('js/jquery.appear.js')}}"></script>
    <script src="{{asset('js/counter/jquery.countTo.js')}}"></script>
    <script src="{{asset('js/owl-carousel/owl-carousel.min.js')}}"></script>
    <script src="{{asset('js/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    
    <!-- select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Template Scripts (Do not remove)-->
    <script src="{{asset('js/custom.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#external_reference').click(function() {
                if ($(this).prop("checked") == true) {
                    $("#reference-details").show();
                } else if ($(this).prop("checked") == false) {
                    $("#reference-details").hide();
                }
            });
            $('.select2').select2();
        });
    </script>
</body>

</html>