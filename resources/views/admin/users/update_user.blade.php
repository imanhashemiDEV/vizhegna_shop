@extends('admin.layouts.master')
@section('content')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #28a745;
            border-color: #3d9970;
        }
    </style>
    @include('admin.partials.breadcrump',[$title="ویرایش کاربر"])
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
                            <h3 class="card-title">ویرایش کاربر</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('users.update',$user->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>نام و نام خانوادگی</label>
                                    <input type="text" class="form-control" name="title"  placeholder="نام و نام خانوادگی را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label>ایمیل</label>
                                    <input type="text" class="form-control" name="title_en"  placeholder="ایمیل را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label>پسورد</label>
                                    <input type="text" class="form-control" name="price"  placeholder="پسورد را وارد کنید">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ویرایش</button>
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

