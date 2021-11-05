@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump',[$title="ایجاد رنگ"])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-3">

                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{session('message')}}
                        </div>
                @endif

                @include('admin.partials.errors')

                <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ایجاد رنگ</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('colors.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>عنوان رنگ</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="عنوان رنگ را وارد کنید">
                                </div>
                                <div id="cp2" class="input-group colorpicker-element" title="Using input value"
                                     data-colorpicker-id="2">
                                    <input type="text" class="form-control input-lg" name="code" value="#DD0F20FF">
                                    <span class="input-group-append">
                                    <span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i
                                            style="background: rgb(135, 85, 89);"></i></span>
                                    </span>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ثبت</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
    <script>
        $(function () {
            $('#cp2').colorpicker();
        });
    </script>
@endsection
