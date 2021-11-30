@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump',[$title="لیست مقالات"])

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
                            <h3 class="card-title">لیست مقالات</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th class="text-primary text-center align-middle">ردیف</th>
                                    <th class="text-primary text-center align-middle">عکس مقاله</th>
                                    <th class="text-primary text-center align-middle">عنوان مقاله</th>
                                    <th class="text-primary text-center align-middle">تاریخ ایجاد</th>
                                    <th class="text-primary text-center align-middle">ویرایش</th>
                                    <th class="text-primary text-center align-middle">حذف</th>
                                </tr>
                                @foreach($articles as $article)
                                    <tr>
                                        <td class="text-center align-middle">{{$i++}}</td>
                                        <td class="text-center align-middle" >
                                            <img  style="width: 100px" src="{{url('images/articles/'.$article->photo)}}" alt="">
                                        </td>
                                        <td class="text-center align-middle">{{$article->title}}</td>
                                        <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($article->created_at)->format('%B %d، %Y')}}</td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-app" href="{{route('articles.edit',$article->id)}}">
                                                <i class="fa fa-edit"></i> ویرایش
                                            </a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <form class="btn btn-app" action="{{route('articles.destroy',$article->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="حذف" >
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination pagination-sm m-0  d-flex justify-content-center">
                            <p class="page-item "> {{$articles->appends(Request::except('page'))->links()}}</p>
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

