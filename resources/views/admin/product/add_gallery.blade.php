@extends('admin.layouts.master')
@section('content')
@include('admin.partials.breadcrump',[$title="ایجاد لیست تصاویر"])
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
                            <h3 class="card-title">ایجاد  لیست تصاویر</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" class="dropzone" method="POST" action="{{route('store.product.gallery',$product->id)}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="fallback">
                                            <input type="file" name="file" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row mt-5">
                            @foreach($product->galleries as $gallery)
                            <div class="col-md-4  d-flex justify-content-center border align-middle">
                                <img src="{{url('/images/products/'.$gallery->image)}}" style="width: 100px;" alt="">
                                <form action="{{route('delete.product.gallery',$gallery->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <label>حذف عکس</label>
                                    <button type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
