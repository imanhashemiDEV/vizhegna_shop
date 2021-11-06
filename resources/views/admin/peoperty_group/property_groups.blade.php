@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump',[$title="لیست گروه مشخصات فنی"])

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
                            <h3 class="card-title">لیست گروه مشخصات فنی</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th class="text-primary text-center align-middle">ردیف</th>
                                    <th class="text-primary text-center align-middle">عنوان گروه مشخصات فنی</th>
                                    <th class="text-primary text-center align-middle">دسته بندی</th>
                                    <th class="text-primary text-center align-middle">ویرایش</th>
                                    <th class="text-primary text-center align-middle">حذف</th>
                                </tr>
                                @foreach($property_groups as $property_group)
                                    <tr>
                                        <td class="text-center align-middle">{{$i++}}</td>
                                        <td class="text-center align-middle">{{$property_group->title}}</td>
                                        <td class="text-center align-middle">{{$property_group->category->title}}</td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-app" href="{{route('property_groups.edit',$property_group->id)}}">
                                                <i class="fa fa-edit"></i> ویرایش
                                            </a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-app" onclick="deleteItem({{$property_group->id}})">
                                                <i class="fa fa-trash"></i> حذف
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination pagination-sm m-0  d-flex justify-content-center">
                            <p class="page-item "> {{$property_groups->appends(Request::except('page'))->links()}}</p>
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
                    title: 'حذف گروه مشخصات فنی',
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
                                url: url + "/admin/property_groups/"+id,
                                type: 'delete',
                                dataType: "JSON",
                                data: {
                                    "id": id
                                },
                                success: function (response)
                                {
                                    Swal.fire(
                                        'گروه مشخصات فنی حذف شد',
                                        'گروه مشخصات فنی مورد نظر با موفقیت حذف شد',
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
