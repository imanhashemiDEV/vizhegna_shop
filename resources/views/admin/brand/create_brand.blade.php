@extends('admin.layouts.master')
@section('content')
@include('admin.partials.breadcrump',[$title="ایجاد برند"])
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
                            <h3 class="card-title">ایجاد برند</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('brands.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>عنوان برند</label>
                                    <input type="text" class="form-control" name="title"  placeholder="عنوان برند را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">انتخاب عکس</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="pic" onchange="loadFile(event)" name="image">
                                            <label class="custom-file-label" for="pic">انتخاب عکس</label>
                                        </div>
                                    </div>

                                    <div class="form-group my-3">
                                        <div class="custom-file">
                                        <img src="{{ url('panel/dist/img/pic_1.jpg') }}" id="output" width="150" onclick="select_file()">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer mt-5">
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
        function select_file () {
            document.getElementById('pic').click();
        }

        function loadFile (event)
        {
            let render=new FileReader;
            render.onload=function ()
            {
                var output=document.getElementById('output');
                output.src=render.result;
            };
            render.readAsDataURL(event.target.files[0]);
        }

    </script>
@endsection
