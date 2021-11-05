@extends('admin.layouts.master')
@section('content')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #28a745;
            border-color: #3d9970;
        }
    </style>
@include('admin.partials.breadcrump',[$title="ایجاد محصول"])
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
                            <h3 class="card-title">ایجاد محصول</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>عنوان محصول</label>
                                    <input type="text" class="form-control" name="title"  placeholder="عنوان محصول را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label>عنوان انگلیسی</label>
                                    <input type="text" class="form-control" name="title_en"  placeholder="عنوان انگلیسی محصول را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label>قیمت محصول</label>
                                    <input type="text" class="form-control" name="price"  placeholder="قیمت محصول را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label>انتخاب رنگ</label>
                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="یک رنگ انتخاب کنید" name="colors[]" style="width: 100%;text-align: right" tabindex="-1" aria-hidden="true">
                                      @foreach($colors as $key=>$value)
                                        <option style="" value="{{$key}}" >{{$value}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>گارانتی محصول</label>
                                    <input type="text" class="form-control" name="guaranty"  placeholder="گارانتی محصول را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label>تعداد محصول</label>
                                    <input type="text" class="form-control" name="product_count"  placeholder="تعداد محصول را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">انتخاب عکس</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب عکس</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>توضیحات محصول</label>
                                    <textarea class="form-control" name="description"  cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>دسته بندی</label>
                                    <select class="form-select select2 p-4 select2-hidden-accessible" name="category_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($categories as $key=>$value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>برند</label>
                                    <select class="form-select select2 p-4 select2-hidden-accessible" name="brand_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($brands as $key=>$value)
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
@section('scripts')
    <script>
        $('select').select2({
            dir: "rtl",
            dropdownAutoWidth: true,
            dropdownParent: $('#parent')
        });
    </script>
@endsection
