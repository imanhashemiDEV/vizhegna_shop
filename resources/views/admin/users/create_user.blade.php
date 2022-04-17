@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump', [($title = 'ایجاد کاربر')])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-3">

                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('message') }}
                        </div>
                    @endif

                    @include('admin.partials.errors')

                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ایجاد کاربر</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>نام و نام خانوادگی</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="نام و نام خانوادگی را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label>ایمیل</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="ایمیل را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label>پسورد</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="پسورد را وارد کنید">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">تاریخ برگزاری</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text-left hasDatepicker" name="date"
                                        id="tarikh" autocomplete="off">
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
        $('select').select2({
            dir: "rtl",
            dropdownAutoWidth: true,
            dropdownParent: $('#parent')
        });


        var customOptions = {
            placeholder: "روز / ماه / سال",
            twodigit: false,
            closeAfterSelect: true,
            nextButtonIcon: "fa fa-arrow-circle-right",
            previousButtonIcon: "fa fa-arrow-circle-left",
            buttonsColor: "#5867dd",
            markToday: true,
            markHolidays: true,
            highlightSelectedDay: true,
            sync: true,
            gotoToday: true
        }

        kamaDatepicker('tarikh', customOptions);
    </script>
@endsection
