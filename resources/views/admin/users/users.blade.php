@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.breadcrump',[$title="لیست کاربر ها"])

    <div class="content">
        <div class="container-fluid">
            <div class="row">

               <livewire:admin.user-list>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('scripts')
    <script>
        function doCheck() {

                var ids = [];
                $.each($("input:checked"), function() {
                    ids.push($(this).val());
                });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax(
                {
                    url: url + "/admin/get_checked_user/",
                    type: 'post',
                    dataType: "JSON",
                    data: {
                        "ids": ids
                    },
                    success: function (response)
                    {


                    },
                    error: function(xhr) {
                         console.log(xhr.responseText);
                    }
                });
        }
    </script>
@endsection
