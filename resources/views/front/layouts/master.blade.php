<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خانه | HAMTA - Ecommerce HTML Template</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="{{url('front/css/font-awesome.min.css')}}">
    <!-- Bootstrap 4.5.3 -->
    <link rel="stylesheet" href="{{url('front/bootstrap/css/bootstrap.min.css')}}">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{url('front/css/plugins/apexcharts.css')}}">
    <link rel="stylesheet" href="{{url('front/css/plugins/jquery.classycountdown.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/plugins/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/plugins/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/plugins/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/plugins/swiper.min.css')}}">
    <!-- CSS Template -->
    <link rel="stylesheet" href="{{url('front/css/theme.css')}}">
    <!-- Here goes your custom.css -->
    <link rel="stylesheet" href="{{url('front/css/custom.css')}}">
    <!-- colors: amber,blue,brown,cyan,default,green,indigo,orange,pink,purple,red,teal,yellow -->
    <link rel="stylesheet" href="{{url('front/css/colors/default.css')}}" id="colorswitch">
</head>

<body>

@yield('content')

<!-- JS Global Compulsory -->
<script src="{{url('front/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{url('front/js/plugins/popper.min.js')}}"></script>
<script src="{{url('front/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- JS Implementing Plugins -->
<script src="{{url('front/js/plugins/apexcharts.min.js')}}"></script>
<script src="{{url('front/js/plugins/jquery.knob.js')}}"></script>
<script src="{{url('front/js/plugins/jquery.throttle.js')}}"></script>
<script src="{{url('front/js/plugins/jquery.classycountdown.min.js')}}"></script>
<script src="{{url('front/js/plugins/jquery.nicescroll.min.js')}}"></script>
<script src="{{url('front/js/plugins/nouislider.min.js')}}"></script>
<script src="{{url('front/js/plugins/sweetalert2.all.min.js')}}"></script>
<script src="{{url('front/js/plugins/select2.full.min.js')}}"></script>
<script src="{{url('front/js/plugins/swiper.min.js')}}"></script>
<script src="{{url('front/js/plugins/ResizeSensor.min.js')}}"></script>
<script src="{{url('front/js/plugins/theia-sticky-sidebar.min.js')}}"></script>
<script src="{{url('front/js/plugins/zoomsl.min.js')}}"></script>
<script src="{{url('front/js/plugins/wNumb.js')}}"></script>
<!-- JS Template -->
<script src="{{url('front/js/theme.js')}}"></script>
<!-- Here goes your custom.js -->
<script src="{{url('front/js/custom.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#countdown--offer-slider').ClassyCountdown({
            theme: "black",
            end: $.now() + 645600,
            labels: false,
        });
    });
</script>
</body>

</html>
