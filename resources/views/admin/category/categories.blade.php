@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump',[$title="لیست دسته بندی"])

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
                                    <th class="text-primary text-center align-middle">ردیف</th>
                                    <th class="text-primary text-center align-middle">عنوان دسته بندی</th>
                                    <th class="text-primary text-center align-middle">عنوان اسلاگ</th>
                                    <th class="text-primary text-center align-middle">دسته پدر</th>
                                    <th class="text-primary text-center align-middle">تاریخ ایجاد</th>
                                    <th class="text-primary text-center align-middle">ویرایش</th>
                                    <th class="text-primary text-center align-middle">حذف</th>
                                </tr>
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="text-center align-middle">{{$i++}}</td>
                                        <td class="text-center align-middle">{{$category->title}}</td>
                                        <td class="text-center align-middle">{{$category->slug}}</td>
                                        <td class="text-center align-middle">{{$category->parent->title}}</td>
                                        <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->format('%B %d، %Y')}}</td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-app" href="{{route('categories.edit',$category->id)}}">
                                                <i class="fa fa-edit"></i> ویرایش
                                            </a>
                                        </td>
                                        <livewire:admin.delete-category :category="$category"/>
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

        window.addEventListener('deleteCat', event => {
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

                  Livewire.emit('destroyCategory',event.detail.id);

                     location.reload();
                }
            });
        })





    </script>
@endsection
