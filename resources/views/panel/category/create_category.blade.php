@extends('panel.layouts.master')
@section('content')
@include('panel.partials.breadcrump',[$title="ایجاد دسته بندی"])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-3">
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
                                        <option value="1">شیراز</option>
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
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
