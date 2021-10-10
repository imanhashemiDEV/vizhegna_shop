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

                    <?php $i = (isset($_GET['page'])) ? (($_GET['page'] - 1) * 20) + 1 : 1; ?>

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
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>{{$category->parent->title}}</td>
                                        <td>{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->format('%B %d، %Y')}}</td>
                                        <td>
                                            <a class="btn btn-app" href="{{route('categories.edit',$category->id)}}">
                                                <i class="fa fa-edit"></i> ویرایش
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-app" onclick="deleteItem({{$category->id}})">
                                                <i class="fa fa-trash"></i> حذف
                                            </a>
                                        </td>
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
@section('scripts')
    <script>
        function deleteItem(id) {

            Swal.fire({
                title: 'حذف دسته بندی',
                text: "آیا از حذف مطمئن هستید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax(
                        {
                            url: "http://127.0.0.1:8000/admin/categories/"+id,
                            type: 'delete',
                            dataType: "JSON",
                            data: {
                                "id": id
                            },
                            success: function (response)
                            {
                                Swal.fire(
                                    'دسته حذف شد',
                                    'دسته مورد نظر با موفقیت حذف شد',
                                    'باشه'
                                )

                               // location.reload();
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                }
            });
        }
    </script>
@endsection
