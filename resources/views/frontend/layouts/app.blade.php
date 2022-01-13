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
    @livewireStyles
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
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

    @livewireScripts
    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="{{asset('js/jquery.appear.js')}}"></script>
    <script src="{{asset('js/counter/jquery.countTo.js')}}"></script>
    <script src="{{asset('js/owl-carousel/owl-carousel.min.js')}}"></script>
    <script src="{{asset('js/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
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
    
    var bs_modal = $('#modal');
    var image = document.getElementById('image');
    var cropper,reader,file;
   

    $("body").on("change", ".profile", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            bs_modal.modal('show');
        };


        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    bs_modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function() {
      
        canvas = cropper.getCroppedCanvas({
            width: 660,
            height: 660,
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
            console.log('base64data',base64data);
            var qqxid = $('#qqxid').val();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: image_update,
                    data: {
                        "_token":"{{ csrf_token() }}",
                        profile: base64data,
                        qqxid: qqxid,
                    },
                    success: function(data) { 
                        console.log(data);
                        bs_modal.modal('hide');
                      
                    }
                });
            };
        });
    });
    var mymap = L.map('mapid');
    var longitude = 0;
    var latitude = 0;
    if(longitude == '' && latitude == ''){
        longitude = 70.16970962757074;
        latitude = 30.16332991435404;      
        zoom = 3;
    }else{
        longitude = $('.longitude').val();
        latitude = $('.latitude').val();
        latitude = parseFloat(latitude);
        longitude = parseFloat(longitude);
        zoom = 13;
    }
   
    console.log(longitude);
    var marker = null;
    var icon = L.icon({iconUrl: "{{asset('/images/vendor/leaflet/dist/marker-icon.png') }}"}); 
        icon.options.shadowSize = [0,0];
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=sk.eyJ1Ijoid29yay1vZi15YXNpciIsImEiOiJja3h1MGs5MDcxNnJsMndvMGh2YmR3MGNoIn0.gQLKyWvfXm_OanVqhNb9Sw', {
            attribution: 'Map data © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
        }).addTo(mymap);
        mymap.setView(new L.LatLng(latitude,longitude), zoom);
        marker = L.marker([latitude,longitude ]).addTo(mymap)
        $('.latitude').val(longitude);
        $('.longitude').val(latitude);
        mymap.on('click', function(e) {
            $('#addresses option').remove();
            $('#addresses').append('<option hidden disabled >Select Val</option>');
            if (marker !== null) {
            mymap.removeLayer(marker);
        }
        longitude = e.latlng.lng;
        latitude = e.latlng.lat;

    marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap)
    $('.latitude').val(latitude);
    $('.longitude').val(longitude);

     
    latitude = parseFloat(latitude)
    longitude = parseFloat(longitude)   
    console.log(longitude);
        var settings = {
        "url": "http://api.positionstack.com/v1/reverse?access_key=2c8f3fed03eebb532675b86d0776583f&query="+latitude+","+longitude,
        "method": "GET",
        "timeout": 0,
        };

        $.ajax(settings).done(function (response) {
        console.log(response.data[0]);
            // for (let indexes = 0; indexes < response.data.length; indexes++) {
            //     $('#addresses').append('<option value="'+indexes+'" >'+response.data[indexes].label+'</option>')
            // }
            // var selectedIndex = $('#addresses').val();
            // console.log(selectedIndex);
            $('#user_address').val(response.data[0].label)
            $('#user_address_city').val(response.data[0].county)
            $('#user_address_country').val(response.data[0].country)

        });

    });
  
    var settings = {
        "url": "http://api.positionstack.com/v1/reverse?access_key=2c8f3fed03eebb532675b86d0776583f&query="+latitude+","+longitude,
        "method": "GET",
        "timeout": 0,
        };
    $.ajax(settings).done(function (response) {
    console.log(response.data[0]);
        // for (let index = 0; index < response.data.length; index++) {
        //     $('#addresses').append('<option value="'+index+'" >'+response.data[index].label+'</option>')      
        // }
        // var selectedIndex = $('#addresses').val();
        // console.log(response.data[selectedIndex]);
        $('#user_address').val(response.data[0].name+', '+response.data[0].street+', '+response.data[0].county+', '+response.data[0].region+', '+response.data[0].country)
        $('#user_address_city').val(response.data[0].county)
        $('#user_address_country').val(response.data[0].country)

    });
});
</script>
</body>

</html>