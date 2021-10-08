@extends('panel.layouts.master')
@section('content')
    @include('panel.partials.breadcrump',[$title="لیست دسته بندی"])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{session('message')}}
                        </div>
                    @endif

                        <?php $i=(isset($_GET['page']))  ? (($_GET['page']-1)*20)+1 : 1; ?>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">لیست دسته بندی ها</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>عنوان دسته بندی</th>
                                        <th>عنوان اسلاگ</th>
                                        <th>دسته پدر</th>
                                        <th>تاریخ ایجاد</th>
                                    </tr>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>{{$category->parent->title}}</td>
                                        <td>{{$category->created_at}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection
