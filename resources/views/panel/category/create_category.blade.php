@extends('panel.layouts.master')
@include('panel.partials.header')
@include('panel.partials.sidebar')
@section('content')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">ایجاد دسته بندی</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">عنوان دسته بندی</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ایمیل را وارد کنید">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">اسلاگ</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="پسورد را وارد کنید">
                    </div>
                    <div class="form-group">
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option selected="selected">مازندران</option>
                            <option>شیراز</option>
                            <option>گلستان</option>
                            <option>اردبیل</option>
                            <option>خوزستان</option>
                            <option>سیستان و بلوچستان</option>
                            <option>مشهد</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>


@endsection
