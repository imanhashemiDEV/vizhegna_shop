<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>فروشگاه ویژگان</title>
    <link rel="stylesheet" href="{{url('panel/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/dist/css/adminlte.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{url('panel/dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/plugins/sweet_alert/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/dist/css/custom-style.css')}}">
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('admin.partials.header')
@include('admin.partials.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- jQuery -->
<script src="{{url('panel/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('panel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('panel/dist/js/adminlte.min.js')}}"></script>

<script src="{{url('panel/plugins/select2/select2.full.min.js')}}"></script>

<script src="{{url('panel/plugins/sweet_alert/sweetalert2.all.min.js')}}"></script>
<script src="{{url('js/custom.js')}}"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    })
</script>
@yield('scripts')
</body>

</html>
