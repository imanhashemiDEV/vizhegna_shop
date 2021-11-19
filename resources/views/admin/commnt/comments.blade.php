@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump',[$title="لیست نظرات"])

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
                            <h3 class="card-title">لیست نظرات</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th class="text-primary text-center align-middle">ردیف</th>
                                    <th class="text-primary text-center align-middle">نام کاربر</th>
                                    <th class="text-primary text-center align-middle">متن نظر</th>
                                    <th class="text-primary text-center align-middle">تاریخ ایجاد</th>
                                    <th class="text-primary text-center align-middle">ویرایش</th>
                                </tr>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td class="text-center align-middle">{{$i++}}</td>
                                        <td class="text-center align-middle">{{$comment->user->name}}</td>
                                        <td class="text-center align-middle">{{$comment->body}}</td>
                                        <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('%B %d، %Y')}}</td>
                                        <td class="text-center align-middle">
                                            @if($comment->status==0)
                                                <form action="{{route('submit.comment',$comment->id)}}" method="post">
                                                  @csrf
                                                    <button class=" btn btn-success" type="submit">تایید</button>
                                                </form>
                                            @else
                                                <form action="{{route('submit.comment',$comment->id)}}" method="post">
                                                    @csrf
                                                    <button class=" btn btn-danger" type="submit">عدم تایید</button>
                                                </form>
                                            @endif


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination pagination-sm m-0  d-flex justify-content-center">
                            <p class="page-item "> {{$comments->appends(Request::except('page'))->links()}}</p>
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

