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
            <h3 class="card-title">لیست کاربر ها</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">

            <input type="text" class="form-control" wire:model='search'>

            <table class="table table-hover">
                <tbody>
                <tr>
                    <th class="text-primary text-center align-middle">ردیف</th>
                    <th class="text-primary text-center align-middle">انتخاب</th>
                    <th class="text-primary text-center align-middle">نام و نام خانوادگی</th>
                    <th class="text-primary text-center align-middle">ایمیل</th>
                    <th class="text-primary text-center align-middle">نقش های کاربر</th>
                    <th class="text-primary text-center align-middle">ویرایش</th>
                    <th class="text-primary text-center align-middle">تاریخ ایجاد</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td class="text-center align-middle">{{$i++}}</td>
                        <td class="text-center align-middle">
                            <input type="checkbox" name="foos[]" value="{{$user->id}}">
                        </td>
                        <td class="text-center align-middle">{{$user->name}}</td>
                        <td class="text-center align-middle">{{$user->email}}</td>
                        <td class="text-center align-middle">
                            <a class="btn btn-app" href="{{route('create.user.roles',$user->id)}}">
                                <i class="fa fa-user"></i>نقش های کاربر
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <a class="btn btn-app" href="{{route('users.edit',$user->id)}}">
                                <i class="fa fa-edit"></i> ویرایش
                            </a>
                        </td>
                        <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($user->created_at)->format('%B %d، %Y')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination pagination-sm m-0  d-flex justify-content-center">
            <p class="page-item "> {{$users->appends(Request::except('page'))->links()}}</p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
