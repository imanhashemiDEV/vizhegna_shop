@extends('admin.layouts.master')
@section('content')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #28a745;
            border-color: #3d9970;
        }
    </style>
    @include('admin.partials.breadcrump',[$title="اضافه کردن ویژگی محصول"])
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
                            <h3 class="card-title">اضافه کردن ویژگی محصول</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('products.store')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                @foreach($product->category->property_groups as $property_group)
                                    <label>{{$property_group->title}}</label>
                                    @foreach( $property_group->properties as $property)
                                        <div class="form-group">
                                            <label>{{$property->title}}</label>
                                            <input type="text" class="form-control" name="title"
                                                   placeholder="عنوان محصول را وارد کنید">
                                        </div>
                                    @endforeach
                                @endforeach

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
    </script>
@endsection
