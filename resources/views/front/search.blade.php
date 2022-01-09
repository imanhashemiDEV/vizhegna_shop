@extends('front.layouts.master')
@section('content')
    <div class="page-wrapper">
    @include('front.partials.header',[$categories=$categories])
    <!-- Page Content -->
        <main class="page-content">
            <div class="container">
                <form action="{{route('get.url')}}" method="get" >
                    <input type="text" value="{{$search}}" name="search">
                    <input type="submit" value="export excell" class="btn btn-success"/>
                </form>
            </div>
        </main>
    <!-- end Page Content -->
    @include('front.partials.footer')
    </div>
@endsection
