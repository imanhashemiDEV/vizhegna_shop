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

                    <?php $i = (isset($_GET['page'])) ? (($_GET['page'] - 1) * 10) + 1 : 1; ?>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست دسته بندی ها</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th class="text-primary text-center">ردیف</th>
                                    <th class="text-primary text-center">عنوان دسته بندی</th>
                                    <th class="text-primary text-center">عنوان اسلاگ</th>
                                    <th class="text-primary text-center">دسته پدر</th>
                                    <th class="text-primary text-center">تاریخ ایجاد</th>
                                    <th class="text-primary text-center">ویرایش</th>
                                    <th class="text-primary text-center">حذف</th>
                                </tr>
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="text-center">{{$i++}}</td>
                                        <td class="text-center">{{$category->title}}</td>
                                        <td class="text-center">{{$category->slug}}</td>
                                        <td class="text-center">{{$category->parent->title}}</td>
                                        <td class="text-center">{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->format('%B %d، %Y')}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-app" href="{{route('categories.edit',$category->id)}}">
                                                <i class="fa fa-edit"></i> ویرایش
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-app" onclick="deleteItem({{$category->id}})">
                                                <i class="fa fa-trash"></i> حذف
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination pagination-sm m-0  d-flex justify-content-center">
                            <p class="page-item "> {{$categories->appends(Request::except('page'))->links()}}</p>
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
                                url: url + "/admin/categories/"+id,
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
                                    );
                                },
                                error: function(xhr) {
                                    console.log(xhr.responseText);
                                }
                            });

                        location.reload();
                    }
                });
            }
    </script>
@endsection
