@extends('admin.layouts.master')
@section('content')
@include('admin.partials.breadcrump',[$title="ایجاد دسته بندی"])
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
                            <h3 class="card-title">ایجاد دسته بندی</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('categories.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>عنوان دسته بندی</label>
                                    <input type="text" class="form-control" name="title"  placeholder="عنوان دسته را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label>دسته پدر</label>
                                    <select class="form-select select2 p-4 select2-hidden-accessible" name="parent_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" value="0">دسته اصلی</option>
                                        @foreach($categories as $key=>$value)
                                           <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
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
