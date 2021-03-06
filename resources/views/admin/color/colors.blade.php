@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump',[$title="لیست رنگ ها"])

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
                            <h3 class="card-title">لیست رنگ ها</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th class="text-primary text-center align-middle">ردیف</th>
                                    <th class="text-primary text-center align-middle">عنوان رنگ</th>
                                    <th class="text-primary text-center align-middle">کد رنگ</th>
                                    <th class="text-primary text-center align-middle">ویرایش</th>
                                    <th class="text-primary text-center align-middle">حذف</th>
                                </tr>
                                @foreach($colors as $color)
                                    <tr>
                                        <td class="text-center align-middle">{{$i++}}</td>
                                        <td class="text-center align-middle">{{$color->title}}</td>
                                        <td class="text-center align-middle">{{$color->code}}</td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-app" href="{{route('colors.edit',$color->id)}}">
                                                <i class="fa fa-edit"></i> ویرایش
                                            </a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-app" onclick="deleteItem({{$color->id}})">
                                                <i class="fa fa-trash"></i> حذف
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination pagination-sm m-0  d-flex justify-content-center">
                            <p class="page-item "> {{$colors->appends(Request::except('page'))->links()}}</p>
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
                    title: 'حذف رنگ',
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
                                url: url + "/admin/colors/"+id,
                                type: 'delete',
                                dataType: "JSON",
                                data: {
                                    "id": id
                                },
                                success: function (response)
                                {
                                    Swal.fire(
                                        'رنگ حذف شد',
                                        'رنگ مورد نظر با موفقیت حذف شد',
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
