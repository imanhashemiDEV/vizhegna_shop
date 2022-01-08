@extends('admin.layouts.master')
@section('content')
@include('admin.partials.breadcrump',[$title="لیست لاگ ها"])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <iframe style="border-width: 0" width="100%" height="1000px" src="{{ route('log-viewer::dashboard') }}"></iframe>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection

