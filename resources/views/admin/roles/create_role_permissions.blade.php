@extends('admin.layouts.master')
@section('content')
@include('admin.partials.breadcrump',[$title="ایجاد مجوزهای نقش"])
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
                            <h3 class="card-title">ایجاد مجوزهای نقش</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('store.role.permission',$role->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <label>{{$role->name}}</label>
                                @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input @if($role->hasPermissionTo($permission->name)) checked  @endif type="checkbox" name="permissions[]" value="{{$permission->name}}" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">{{$permission->name}}</label>
                                </div>
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
