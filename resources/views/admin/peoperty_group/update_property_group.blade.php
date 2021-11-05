@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump',[$title="ویرایش گروه مشخصات فنی"])
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
                            <h3 class="card-title">ویرایش گروه مشخصات فنی</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('property_groups.update',$property_group->id)}}">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>دسته بندی</label>
                                    <select class="form-select select2 p-4 select2-hidden-accessible" name="category_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($categories as $key=>$value)
                                            @if($property_group->category_id==$key)
                                                <option selected="selected" value="{{$key}}">{{$value}}</option>
                                            @else
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>عنوان گروه مشخصات فنی</label>
                                    <input type="text" class="form-control" name="title"  placeholder="عنوان دسته را وارد کنید" value="{{$property_group->title}}">
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

