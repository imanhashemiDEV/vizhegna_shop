@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump',[$title="لیست برند ها"])

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
                            <h3 class="card-title">لیست برندها</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th class="text-primary text-center align-middle">ردیف</th>
                                    <th class="text-primary text-center align-middle">عکس برند</th>
                                    <th class="text-primary text-center align-middle">عنوان برند</th>
                                    <th class="text-primary text-center align-middle">تاریخ ایجاد</th>
                                    <th class="text-primary text-center align-middle">ویرایش</th>
                                    <th class="text-primary text-center align-middle">حذف</th>
                                </tr>
                                @foreach($brands as $brand)
                                    <tr>
                                        <td class="text-center align-middle">{{$i++}}</td>
                                        <td class="text-center align-middle" >
                                            <img  style="width: 100px" src="{{url('images/brands/'.$brand->image)}}" alt="">
                                        </td>
                                        <td class="text-center align-middle">{{$brand->title}}</td>
                                        <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($brand->created_at)->format('%B %d، %Y')}}</td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-app" href="{{route('brands.edit',$brand->id)}}">
                                                <i class="fa fa-edit"></i> ویرایش
                                            </a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-app" onclick="deleteItem({{$brand->id}})">
                                                <i class="fa fa-trash"></i> حذف
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination pagination-sm m-0  d-flex justify-content-center">
                            <p class="page-item "> {{$brands->appends(Request::except('page'))->links()}}</p>
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
                title: 'حذف برند ',
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
                            url: url + "/admin/brands/"+id,
                            type: 'delete',
                            dataType: "JSON",
                            data: {
                                "id": id
                            },
                            success: function (response)
                            {
                                Swal.fire(
                                    'برند حذف شد',
                                    'برند مورد نظر با موفقیت حذف شد',
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
