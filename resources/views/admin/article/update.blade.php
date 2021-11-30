@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump',[$title="ویرایش مقاله"])
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
                            <h3 class="card-title">ویرایش مقاله</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('articles.update',$article->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>عنوان مقاله</label>
                                    <input type="text" class="form-control" name="title" value="{{$article->title}}">
                                </div>
                                <div class="form-group">
                                    <label>متن مقاله</label>
                                    <textarea  cols="30" rows="10" type="text" class="form-control myEditor" name="body" >{{$article->body}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">انتخاب عکس</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="pic" onchange="loadFile(event)" name="photo">
                                            <label class="custom-file-label" for="pic">انتخاب عکس</label>
                                        </div>
                                    </div>
                                    <div class="form-group my-3">
                                        <div class="custom-file">
                                            <img src="{{url('images/articles/'.$article->photo)}}" id="output" width="150" onclick="select_file()">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>دسته بندی</label>
                                    <select class="form-select select2 p-4 select2-hidden-accessible" name="category_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($categories as $key=>$value)
                                            @if($article->category_id==$key)
                                                <option selected="selected" value="{{$key}}">{{$value}}</option>
                                            @else
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endif
                                        @endforeach
                                    </select>
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

