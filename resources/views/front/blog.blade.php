@extends('front.layouts.master')
@section('content')
    <div class="page-wrapper">
    @include('front.partials.header',[$categories=$categories])
    <!-- Page Content -->
        <main class="page-content">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-3 col-md-4 sticky-sidebar filter-options-sidebar">
                        <div class="d-md-none">
                            <div class="header-filter-options">
                                <span>جستجوی پیشرفته <i class="fad fa-sliders-h"></i></span>
                                <button class="btn-close-filter-sidebar"><i class="fal fa-times"></i></button>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="widget widget-category shadow-around">
                                <div class="widget-title">دسته بندی مقالات</div>
                                <div class="widget-content">
                                    <ul>
                                        <li>
                                            <a href="#" class="parent">علم و تکنولوژی</a>
                                            <ul>
                                                <li><a href="#">موبایل و گجت</a></li>
                                                <li><a href="#">اپلیکیشن و نرم افزار</a></li>
                                                <li><a href="#">تجارت الکترونیک</a></li>
                                                <li><a href="#">خودرو و حمل و نقل</a></li>
                                                <li><a href="#">زمین و محیط زیست</a></li>
                                                <li><a href="#">فناوری اطلاعات</a></li>
                                                <li><a href="#">هوا فضا</a></li>
                                                <li><a href="#">هوش مصنوعی و رباتیک</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" class="parent">بازی ویدئویی</a></li>
                                        <li><a href="#" class="parent">کتاب و ادبیات</a></li>
                                        <li><a href="#" class="parent">هنر و سینما</a></li>
                                        <li><a href="#" class="parent">سبک زندگی</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget widget-tags shadow-around">
                                <div class="widget-title">داغ ترینها</div>
                                <div class="widget-content">
                                    <a href="#">#هوا فضا</a>
                                    <a href="#">#خودرو</a>
                                    <a href="#">#سینما</a>
                                    <a href="#">#بازی</a>
                                    <a href="#">#سامسونگ</a>
                                    <a href="#">#هوش_مصنوعی</a>
                                    <a href="#">#هنر</a>
                                    <a href="#">#اپل</a>
                                    <a href="#">#طنز</a>
                                    <a href="#">#بازیگران</a>
                                </div>
                            </div>
                            <div class="widget shadow-around">
                                <div class="widget-content">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">محبوب ترینها</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="d-md-none">
                            <button class="btn-filter-sidebar">
                                جستجوی پیشرفته <i class="fad fa-sliders-h"></i>
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- breadcrumb -->
                                <div class="breadcrumb mb-2 pt-2">
                                    <nav>
                                        <a href="#">فروشگاه اینترنتی</a>
                                        <a href="#">مقالات</a>
                                        <a href="#">علم و تکنولوژی</a>
                                    </nav>
                                </div>
                                <!-- end breadcrumb -->
                            </div>
                        </div>
                        <div class="listing-items blog-listing-items">
                            <div class="row">
                                @foreach($articles as $article)
                                <div class="col-lg-4 col-sm-6 mb-3">
                                    <div class="blog-card">
                                        <div class="blog-card-thumbnail">
                                            <a href="{{route('blog.article.details',$article->id)}}">
                                                <img src="{{url('images/articles/'.$article->photo)}}"
                                                     alt="{{$article->title}}">
                                            </a>
                                        </div>
                                        <div class="blog-card-title">
                                            <h2><a href="#">{{$article->title}}</a></h2>
                                        </div>
                                        <div class="blog-card-excerpt">
                                            <p>{!! $article->body !!}</p>
                                        </div>
                                        <div class="blog-card-footer">
                                            <div class="author">
                                                <a href="#">{{$article->user->name}}</a>
                                            </div>
                                            <div class="date">
                                                <i class="fad fa-clock"></i>
                                                {{\Hekmatinasser\Verta\Verta::instance($article->created_at)->format('%B %d، %Y')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-0">
                                <div class="pagination pagination-sm m-0  d-flex justify-content-center">
                                    <p class="page-item "> {{$articles->appends(Request::except('page'))->links()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    <!-- end Page Content -->
    @include('front.partials.footer')
    </div>
@endsection
