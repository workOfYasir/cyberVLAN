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

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="{{asset('js/jquery.appear.js')}}"></script>
    <script src="{{asset('js/counter/jquery.countTo.js')}}"></script>
    <script src="{{asset('js/owl-carousel/owl-carousel.min.js')}}"></script>
    <script src="{{asset('js/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

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
            width: 160,
            height: 160,
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
});
    </script>
</body>

</html>