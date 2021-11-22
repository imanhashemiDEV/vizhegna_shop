@extends('front.layouts.master')
@section('content')
    <div class="page-wrapper">
    @include('front.partials.header',[$categories=$categories])
    <!-- Page Content -->
        <main class="page-content">
            <div class="container">
                <div class="row mb-1">
                    <div class="col-12">
                        <!-- breadcrumb -->
                        <div class="breadcrumb mb-1">
                            <nav>
                                <a href="#">فروشگاه اینترنتی</a>
                                <a href="#">{{$product->category->parent->title}}</a>
                                <a href="#">{{$product->category->title}}</a>
                                <a>{{$product->title}}</a>
                            </nav>
                        </div>
                        <!-- end breadcrumb -->
                    </div>
                </div>
                <div class="product-detail shadow-around mb-5 py-5">
                    <div class="row mb-3 mx-0">
                        <div class="col-xl-4 col-lg-4 col-md-6 mb-md-0 mb-3">
                            <div class="product-gallery">
                                <div class="swiper-container gallery-slider pb-md-0 pb-3">
                                    <div class="swiper-wrapper">
                                        @foreach($product->galleries as $gallery)
                                            <div class="swiper-slide">
                                                <img src="{{url("/images/products/").'/'.$gallery->image}}"
                                                     data-large="{{url('/images/products/').'/'.$gallery->image}}" class="zoom-image"
                                                     alt="gallery item">
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination d-md-none"></div>
                                </div>
                                <div class="swiper-container gallery-slider-thumbs d-md-block d-none">
                                    <div class="swiper-wrapper">
                                        @foreach($product->galleries as $gallery)
                                        <div class="swiper-slide">
                                            <img src="{{url('/images/products/').'/'.$gallery->image}}" alt="gallery item">
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <ul class="product--actions">
                                    <li>
                                        <!-- در صورت نیاز به استفاده از فرم از کد زیر استفاده کنید -->
                                        <!-- <form action="">
                                            <button class="add-to-favorite"><i class="fas fa-heart"></i></button>
                                        </form> -->
                                        <a href="#" class="is-action add-to-favorite"><i class="fas fa-heart"></i></a>
                                        <span class="tooltip--action">افزودن به علاقمندی</span>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#shareLinkModal"><i
                                                class="fas fa-share-alt"></i></a>
                                        <span class="tooltip--action">اشتراک گذاری</span>
                                    </li>
                                    <li>
                                        <a href="#" class="is-action add-to-compare"><i class="fas fa-adjust"></i></a>
                                        <span class="tooltip--action">افزودن به لیست مقایسه</span>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#chartModal"><i
                                                class="fas fa-chart-area"></i></a>
                                        <span class="tooltip--action">نمودار قیمت</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-6">
                            <div class="product-title mb-3">
                                <h1>
                                    {{$product->title}}
                                </h1>
                                <h1 class="product-title-en">
                                    {{$product->title_en}}
                                </h1>
                            </div>
                            <div class="d-block mb-2">
                                <span class="font-weight-bold">برند:</span>
                                <a href="#" class="link--with-border-bottom">{{$product->brand->title}}</a>
                            </div>
                            <div class="d-block mb-4">
                                <span class="font-weight-bold">گارانتی:</span>
                                <span>{{$product->guaranty}} ماهه</span>
                            </div>
                            <div class="product-params-special">
                                <ul data-title="ویژگی‌های محصول">
                                    <li>
                                        <span>حافظه داخلی:</span>
                                        <span>32 گیگابایت</span>
                                    </li>
                                    <li>
                                        <span>مقدار RAM: </span>
                                        <span>3 گیگابایت</span>
                                    </li>
                                    <li>
                                        <span>اندازه:</span>
                                        <span>6.4 اینچ</span>
                                    </li>
                                    <li>
                                        <span>رزولوشن تصویر: </span>
                                        <span>1560 × 720 پیکسل</span>
                                    </li>
                                    <li>
                                        <span>تعداد سيم کارت:</span>
                                        <span>دو سیم کارت</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="alert alert-warning">
                                <div class="alert-body">
                                    <p class="d-flex align-items-center">
                                        <i class="fad fa-history ml-2"></i>
                                        حداکثر تا 3 روز تحویل داده می شود.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 mx-lg-0 mx-auto">
                            <div class="box-info-product">
                                <div class="product-colors mb-3">
                                    <span class="d-block mb-3">رنگ:</span>
                                    <div class="input-radio-color">
                                        <div class="input-radio-color__list">
                                            @foreach($product->colors as $color)
                                            <label class="input-radio-color__item input-radio-color__item--white"
                                                   style="color:{{$color->code}};">
                                                <input type="radio" name="color"> <span></span></label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="d-block mb-3">
                                    <span class="d-block">
                                        تعداد:
                                    </span>
                                    <div class="num-block">
                                        <div class="num-in">
                                            <span class="plus"></span>
                                            <input type="text" id="input_quantity" class="in-num" value="1" readonly="">
                                            <span class="minus dis"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-end mt-3">
                                    <div class="product-price">
                                        <div class="product-price-info">
                                            <div class="product-price-off">
                                                %10 <span>تخفیف</span>
                                            </div>
                                            <div class="product-price-prev">
                                                3,216,000
                                            </div>
                                        </div>
                                        <div class="product-price-real">
                                            <div class="product-price-raw">2,894,400 </div>
                                            تومان
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="" onclick="addToCart({{$product->id}})" class="add-to-cart">
                                        افزودن به سبد خرید
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <div class="row mx-0">
                            <div class="col-12">
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="services pt-3 row mx-0">
                        <div class="col-md-3 col-sm-6 mb-md-0 mb-4">
                            <div class="service-item">
                                <img src="{{url('front/images/services/delivery-person.png')}}" alt="">
                                <div class="service-item-body">
                                    <h6>تحویل سریع و رایگان</h6>
                                    <p>تحویل رایگان کالا برای کلیه سفارشات بیش از 500 هزار تومان</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-md-0 mb-4">
                            <div class="service-item">
                                <img src="{{url('front/images/services/recieve.png')}}" alt="">
                                <div class="service-item-body">
                                    <h6>۷ روز ضمانت بازگشت</h6>
                                    <p>در صورت نارضایتی به هر دلیلی می توانید محصول را بازگردانید</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-md-0 mb-4">
                            <div class="service-item">
                                <img src="{{url('front/images/services/headset.png')}}" alt="">
                                <div class="service-item-body">
                                    <h6>پشتیبانی ۲۴ ساعته</h6>
                                    <p>در صورت وجود هرگونه سوال یا ابهامی، با ما در تماس باشید</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-md-0 mb-4">
                            <div class="service-item">
                                <img src="{{url('front/images/services/debit-card.png/')}}" alt="">
                                <div class="service-item-body">
                                    <h6>پرداخت آنلاین ایمن</h6>
                                    <p>محصولات مدنظر خود را با خیال آسوده به صورت آنلاین خریداری کنید</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product-tab-content -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="product-tab-content">
                            <ul class="nav nav-tabs" id="product-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="productDescription-tab" data-toggle="tab"
                                       href="#productDescription" role="tab" aria-controls="productDescription"
                                       aria-selected="true">توضیحات</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="productParams-tab" data-toggle="tab" href="#productParams"
                                       role="tab" aria-controls="productParams" aria-selected="false">مشخصات فنی</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="productComments-tab" data-toggle="tab"
                                       href="#productComments" role="tab" aria-controls="productComments"
                                       aria-selected="false">نظرات</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="product-tab">
                                <div class="tab-pane fade show active" id="productDescription" role="tabpanel"
                                     aria-labelledby="productDescription-tab">
                                    <div class="product-desc">
                                        <div class="accordion accordion-product" id="accordionDescription">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn" type="button" data-toggle="collapse"
                                                                data-target="#collapseOne" aria-expanded="true"
                                                                aria-controls="collapseOne">
                                                            گلکسی سری A
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                     data-parent="#accordionDescription">
                                                    <div class="card-body">
                                                        <p>
                                                            گوشی های سری A شرکت سامسونگ از گوشی های میان رده این شرکت
                                                            هستند. اولین گوشی
                                                            تولید شده این سری گوشی های موبایل سامسونگ، Galaxy Alpha بود
                                                            که در سال 2014
                                                            روانه بازار شد. پس از آن اولین نسل گوشی های موبایل A3 و A5
                                                            در دسامبر سال
                                                            2014 معرفی شدند. گوشی های موبایل سری A سامسونگ، ویژگی های
                                                            خاص و تجملاتی گوشی
                                                            های سری S را ندارند. این سری از گوشی های سامسونگ را می توان
                                                            رقبای اصلی برای
                                                            محصولات مقرون‌به‌صرفه شرکت هایی مانند هوآوی و شیائومی دانست.
                                                            شرکت سامسونگ با
                                                            ساخت گوشی موبایل مدل A30S بار دیگر سعی کرده است تا سهم بازار
                                                            خود را در گوشی
                                                            های میان رده حفظ کند. گوشی های A30s و A50s در آگوست 2019

                                                        </p>
                                                        <img src="{{url('front/images/single-product/01.jpg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="productParams" role="tabpanel"
                                     aria-labelledby="productParams-tab">
                                    <div class="product-params">
                                        @foreach($product->category->property_groups as $group)
                                        <section>
                                            <h3 class="params-title">{{$group->title}}</h3>
                                            <ul class="params-list">
                                                @foreach($group->properties as $property)
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>{{$property->title}}</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                           {{$property->getProductValue($product->id)}}
                                                        </span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </section>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="productComments" role="tabpanel"
                                     aria-labelledby="productComments-tab">
                                    <!-- product-review -->
                                    @if(Session::has('message'))
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            {{session('message')}}
                                        </div>
                                    @endif
                                    <div class="product-review-form mb-3">
                                       @auth
                                            <form action="{{route('store.user.comment')}}" method="POST">
                                                @csrf
                                                <div class="row align-items-center">
                                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                                    <div class="col-12">
                                                        <div class="form-element-row">
                                                            <label for="phone-number" class="label-element">نظر شما</label>
                                                            <textarea name="body" id="comment" cols="30" rows="10"
                                                                      class="input-element"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-primary px-3">ارسال نظر <i
                                                                    class="fad fa-comment-alt-edit"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                برای نظر دادن باید در سایت لاگین کنید
                                            </div>
                                       @endauth
                                        <div class="section-title mb-1 mt-4">
                                            نظرات کاربران
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="comments-list">
                                        @foreach($product->comments as $comment)
                                        <div class="row">
                                            <div class="col-md-3 aside">
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-name">
                                                            {{$comment->user->name}}
                                                        </div>
                                                        <div class="comments-buyer-badge">خریدار</div>
                                                    </li>
                                                    <li>
                                                        <div class="cell">
                                                            {{$comment->created_at}}
                                                        </div>
                                                    </li>
                                                </ul>
{{--                                                <div class="alert alert-info">--}}
{{--                                                    <i class="fas fa-thumbs-up"></i> خرید این محصول را توصیه می‌کنم--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="col-md-9 article">
                                                <p>{{$comment->body}}</p>
{{--                                                <div class="footer">--}}
{{--                                                    <div class="comments-likes">--}}
{{--                                                        آیا این نظر برایتان مفید بود؟--}}
{{--                                                        <button class="btn-like" data-counter="۰">بله</button>--}}
{{--                                                        <button class="btn-like" data-counter="۰">خیر</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- end product-review -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end product-tab-content -->
                <section class="product-carousel">
                    <div class="section-title">
                        <i class="fad fa-retweet"></i>
                        پیشنهادهای مشابه
                    </div>
                    <div class="swiper-container slider-lg">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <div class="product-card-top">
                                        <a href="" class="product-image">
                                            <img src="{{url('front/images/products/01.jpg')}}" alt="product image">
                                        </a>
                                        <div class="product-card-actions">
                                            <button class="add-to-wishlist"><i class="fas fa-heart"></i></button>
                                            <button class="add-to-compare"><i class="fas fa-random"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-card-middle">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 65%;"></div>
                                            </div>
                                        </div>
                                        <h6 class="product-name">
                                            <a href="#">میز تحریر تاشوو تنظیم شو میلاد سفید
                                                70</a>
                                        </h6>
                                        <div class="product-price product-price-clone">650,000 تومان</div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            650,000 تومان
                                        </div>
                                        <a href="#" class="btn-add-to-cart">
                                            <i class="fad fa-cart-plus"></i>
                                            افزودن به سبد خرید
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <div class="product-card-top">
                                        <a href="" class="product-image">
                                            <img src="{{url('front/images/products/02.jpg')}}" alt="product image">
                                        </a>
                                        <div class="product-card-actions">
                                            <button class="add-to-wishlist"><i class="fas fa-heart"></i></button>
                                            <button class="add-to-compare"><i class="fas fa-random"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-card-middle">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 65%;"></div>
                                            </div>
                                        </div>
                                        <h6 class="product-name">
                                            <a href="#">میز تحریر مدل M191</a>
                                        </h6>
                                        <div class="product-price product-price-clone">650,000 تومان</div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            650,000 تومان
                                        </div>
                                        <a href="#" class="btn-add-to-cart">
                                            <i class="fad fa-cart-plus"></i>
                                            افزودن به سبد خرید
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <div class="product-card-top">
                                        <a href="" class="product-image">
                                            <img src="{{url('front/images/products/03.jpg')}}" alt="product image">
                                        </a>
                                        <div class="product-card-actions">
                                            <button class="add-to-wishlist"><i class="fas fa-heart"></i></button>
                                            <button class="add-to-compare"><i class="fas fa-random"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-card-middle">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 65%;"></div>
                                            </div>
                                        </div>
                                        <h6 class="product-name">
                                            <a href="#">میز تحریر و لپ تاپ تاشو سایز بزرگ مدل
                                                G0025</a>
                                        </h6>
                                        <div class="product-price product-price-clone">650,000 تومان</div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            650,000 تومان
                                        </div>
                                        <a href="#" class="btn-add-to-cart">
                                            <i class="fad fa-cart-plus"></i>
                                            افزودن به سبد خرید
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <div class="product-card-top">
                                        <a href="" class="product-image">
                                            <img src="{{url('front/images/products/04.jpg')}}" alt="product image">
                                        </a>
                                        <div class="product-card-actions">
                                            <button class="add-to-wishlist"><i class="fas fa-heart"></i></button>
                                            <button class="add-to-compare"><i class="fas fa-random"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-card-middle">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 65%;"></div>
                                            </div>
                                        </div>
                                        <h6 class="product-name">
                                            <a href="#">میز تحریر مدل 80 Owens B</a>
                                        </h6>
                                        <div class="product-price product-price-clone">650,000 تومان</div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            650,000 تومان
                                        </div>
                                        <a href="#" class="btn-add-to-cart">
                                            <i class="fad fa-cart-plus"></i>
                                            افزودن به سبد خرید
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <div class="product-card-top">
                                        <a href="" class="product-image">
                                            <img src="{{url('front/images/products/05.jpg')}}" alt="product image">
                                        </a>
                                        <div class="product-card-actions">
                                            <button class="add-to-wishlist"><i class="fas fa-heart"></i></button>
                                            <button class="add-to-compare"><i class="fas fa-random"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-card-middle">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 65%;"></div>
                                            </div>
                                        </div>
                                        <h6 class="product-name">
                                            <a href="#">میز تحریر مدل الیت</a>
                                        </h6>
                                        <div class="product-price product-price-clone">650,000 تومان</div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            650,000 تومان
                                        </div>
                                        <a href="#" class="btn-add-to-cart">
                                            <i class="fad fa-cart-plus"></i>
                                            افزودن به سبد خرید
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <div class="product-card-top">
                                        <a href="" class="product-image">
                                            <img src="{{url('front/images/products/06.jpg')}}" alt="product image">
                                        </a>
                                        <div class="product-card-actions">
                                            <button class="add-to-wishlist"><i class="fas fa-heart"></i></button>
                                            <button class="add-to-compare"><i class="fas fa-random"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-card-middle">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 65%;"></div>
                                            </div>
                                        </div>
                                        <h6 class="product-name">
                                            <a href="#">میز تحریر مدل چند حالته MT11</a>
                                        </h6>
                                        <div class="product-price product-price-clone">650,000 تومان</div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            650,000 تومان
                                        </div>
                                        <a href="#" class="btn-add-to-cart">
                                            <i class="fad fa-cart-plus"></i>
                                            افزودن به سبد خرید
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <div class="product-card-top">
                                        <a href="" class="product-image">
                                            <img src="{{url('front/images/products/07.jpg')}}" alt="product image">
                                        </a>
                                        <div class="product-card-actions">
                                            <button class="add-to-wishlist"><i class="fas fa-heart"></i></button>
                                            <button class="add-to-compare"><i class="fas fa-random"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-card-middle">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 65%;"></div>
                                            </div>
                                        </div>
                                        <h6 class="product-name">
                                            <a href="#">میز تحریر تاشو و تنظیم شو سپهر یاس مدل
                                                60</a>
                                        </h6>
                                        <div class="product-price product-price-clone">650,000 تومان</div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            650,000 تومان
                                        </div>
                                        <a href="#" class="btn-add-to-cart">
                                            <i class="fad fa-cart-plus"></i>
                                            افزودن به سبد خرید
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <div class="product-card-top">
                                        <a href="" class="product-image">
                                            <img src="{{url('front/images/products/08.jpg')}}" alt="product image">
                                        </a>
                                        <div class="product-card-actions">
                                            <button class="add-to-wishlist"><i class="fas fa-heart"></i></button>
                                            <button class="add-to-compare"><i class="fas fa-random"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-card-middle">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 65%;"></div>
                                            </div>
                                        </div>
                                        <h6 class="product-name">
                                            <a href="#">میز تحریر باکسدار و صندلی طرح توت فرنگی
                                                (وایت بردی،تاشو،تنظیم شونده ارتفاع)</a>
                                        </h6>
                                        <div class="product-price product-price-clone">650,000 تومان</div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            650,000 تومان
                                        </div>
                                        <a href="#" class="btn-add-to-cart">
                                            <i class="fad fa-cart-plus"></i>
                                            افزودن به سبد خرید
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </section>
            </div>
        </main>
    <!-- end Page Content -->
    @include('front.partials.footer')
    </div>
@endsection
