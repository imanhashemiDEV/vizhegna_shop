@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump',[$title="لیست مجوز ها"])

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

                    <?php $i = (isset($_GET['page'])) ? (($_GET['page'] - 1) * 10) + 1 : 1; ?>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست مجوز ها</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th class="text-primary text-center align-middle">ردیف</th>
                                    <th class="text-primary text-center align-middle">عنوان مجوز</th>
                                    <th class="text-primary text-center align-middle">ویرایش</th>
                                    <th class="text-primary text-center align-middle">حذف</th>
                                    <th class="text-primary text-center align-middle">تاریخ ایجاد</th>
                                </tr>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td class="text-center align-middle">{{$i++}}</td>
                                        <td class="text-center align-middle">{{$permission->name}}</td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-app" href="{{route('permissions.edit',$permission->id)}}">
                                                <i class="fa fa-edit"></i> ویرایش
                                            </a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <form  method="post" action="{{route('permissions.destroy',$permission->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-app " ><i class="fa fa-edit">حذف</i></button>
                                            </form>
                                        </td>
                                        <td class="text-center align-middle ">{{\Hekmatinasser\Verta\Verta::instance($permission->created_at)->format('%B %d، %Y')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination pagination-sm m-0  d-flex justify-content-center">
                            <p class="page-item "> {{$permissions->appends(Request::except('page'))->links()}}</p>
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
