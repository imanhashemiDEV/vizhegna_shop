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
                                            <input type="text" class="in-num" value="1" readonly="">
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
                                    <a href="#" class="add-to-cart">
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
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn collapsed" type="button"
                                                                data-toggle="collapse" data-target="#collapseTwo"
                                                                aria-expanded="false" aria-controls="collapseTwo">
                                                            طراحی
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                     data-parent="#accordionDescription">
                                                    <div class="card-body">
                                                        <p>
                                                            گلکسی A30S با صفحه نمایش 6.4 اینچی، بریدگی های منحنی شکل و
                                                            حاشیه بسیار کم از
                                                            لبه ها، چیزی از طراحی پرچم داران سامسونگ کم ندارد. قاب جلویی
                                                            تا جای ممکن
                                                            ساده طراحی شده که جلوه زیبایی هم به آن داده است. به دلیل V
                                                            شکل بودن بریدگی
                                                            قسمت بالای آن، نام Infinty-V برای آن انتخاب شده است. لبه
                                                            ‎های گلکسی A30S به
                                                            صورت کاملا گرد طراحی شده است. قاب پشتی هم در نهایت سادگی و

                                                        </p>
                                                        <img src="./assets/images/single-product/02.jpg" alt="">
                                                        <p>
                                                            کلیدهای کنترل میزان صدا و کلید پاور هر دو در یک سمت گوشی
                                                            قرار گرفته‎اند تا
                                                            دسترسی به آن ها آسان تر باشد. درگاه دیگری برای نصب سیم کارت
                                                            و یا کارت حافظه

                                                        </p>
                                                        <img src="./assets/images/single-product/03.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn collapsed" type="button"
                                                                data-toggle="collapse" data-target="#collapseThree"
                                                                aria-expanded="false" aria-controls="collapseThree">
                                                            صفحه نمایش
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                     data-parent="#accordionDescription">
                                                    <div class="card-body">
                                                        <p>
                                                            صفحه نمایش 6.4 اینچی سوپر آمولد در گلکسی A30S بسیار زیبا و
                                                            بلند به نظر
                                                            می‎رسد. این پنل در کمتر گوشی در این گستره قیمتی دیده می‎شود.
                                                            در قسمت بالای
                                                            صفحه نمایش فقط یک دوربین سلفی قرار گرفته است و حاشیه های
                                                            بالایی و کناری در
                                                            گلکسی A30S بسیار باریک شده به طوری که صفحه نمایش آن توانسته
                                                        </p>
                                                        <img src="{{url('front/images/single-product/04.jpg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingFour">
                                                    <h5 class="mb-0">
                                                        <button class="btn collapsed" type="button"
                                                                data-toggle="collapse" data-target="#collapseFour"
                                                                aria-expanded="false" aria-controls="collapseFour">
                                                            دوربین
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                                     data-parent="#accordionDescription">
                                                    <div class="card-body">
                                                        <p>
                                                            گلکسی A30S از یک دوربین سه گانه بهره می‎برد؛ دوربین اصلی
                                                            A30s سنسور 25
                                                            مگاپیکسلی با دریچه‌ی دیافراگم f/1.7 و فوکوس خودکار (PDAF)
                                                            است و سنسور 8
                                                            مگاپیکسلی دیگر از نوع فوق عریض (Ultrawide) با فاصله کانونی
                                                            لنز 13میلی‌متر
                                                            است. برخلاف A30 در آن از سنسور عمق استفاده نشده بود، گوشی

                                                        </p>
                                                        <img src="{{url('front/images/single-product/05.jpg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingFive">
                                                    <h5 class="mb-0">
                                                        <button class="btn collapsed" type="button"
                                                                data-toggle="collapse" data-target="#collapseFive"
                                                                aria-expanded="false" aria-controls="collapseFive">
                                                            سخت افزار و نرم افزار
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                                     data-parent="#accordionDescription">
                                                    <div class="card-body">
                                                        <p>
                                                            سخت افزار به کار رفته در A30s تغییری نسیبت به مدل A30 نداشته
                                                            است. در گوشی
                                                            گلکسی A30S هم از تراشه Exynos 7904 و پردازنده گرافیکی Mali
                                                            G71 MP2 استفاده
                                                            شده است. تراشه Exynos 7904 استفاده شده در این گوشی با پردازش
                                                            14 نانومتری
                                                            ساخته شده و از دو از هسته قدرتمند Cortex-A73 و شش هسته کم
                                                        </p>
                                                        <img src="{{url('front/images/single-product/06.jpg')}}" alt="">
                                                        <p>
                                                            این گوشی با سیستم‌عامل اندروید نسخه 9.0 به بازار عرضه شده
                                                            است که سیستم‌عاملی
                                                            به‌روز است. البته رابط کاربری سامسونگ هم مکمل اندروید 9.0 آن
                                                            است
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingSix">
                                                    <h5 class="mb-0">
                                                        <button class="btn collapsed" type="button"
                                                                data-toggle="collapse" data-target="#collapseSix"
                                                                aria-expanded="false" aria-controls="collapseSix">
                                                            باتری
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                                     data-parent="#accordionDescription">
                                                    <div class="card-body">
                                                        <p>
                                                            این گوشی هوشمند انرژی مورد نیاز خود را از یک باتری 4000 میلی
                                                            آمپر ساعتی
                                                            تامین می‎کند و به این معنا است که شارژ کافی برای به اشتراک

                                                        </p>
                                                        <img src="{{url('front/images/single-product/07.jpg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingSeven">
                                                    <h5 class="mb-0">
                                                        <button class="btn collapsed" type="button"
                                                                data-toggle="collapse" data-target="#collapseSeven"
                                                                aria-expanded="false" aria-controls="collapseSeven">
                                                            جمع بندی
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                                     data-parent="#accordionDescription">
                                                    <div class="card-body">
                                                        <p>
                                                            اگر می‌خواهید گوشی داشته باشید که تا مدت‌ها بدون دردسر و
                                                            مشکل نیازی‌های
                                                            اولیه‌تان را برطرف کندGalaxy A30S انتخاب خوبی است.
                                                            صفحه‌نمایش Super AMOLED
                                                            این گوشی کم نقص است و تجربه مطلوبی را برای کاربر به دنبال
                                                            دارد. انجام کارهای
                                                            روزمره هم با این گوشی به‌راحتی انجام می‌شود اما اگر گیمر
                                                            حرفه‌ای هستید باید
                                                            به فکر خرید گوشی بالا رده و البته گران‌قیمت‌تری باشید.
                                                            دوربین سلفی این گوشی
                                                            هم دیگر مزیت آن است که عکس‌هایی بسیار باکیفیت می‌گیرد. گوشی
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="productParams" role="tabpanel"
                                     aria-labelledby="productParams-tab">
                                    <div class="product-params">
                                        <section>
                                            <h3 class="params-title">مشخصات کلی</h3>
                                            <ul class="params-list">
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>ابعاد</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            7.8 × 74.7 × 158.5 میلی‌متر
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>توضیحات سیم کارت</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            سایز نانو (8.8 × 12.3 میلی‌متر)
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>وزن</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            166 گرم
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>ویژگی‌های خاص</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            مناسب عکاسی , فبلت , مجهز به حس‌گر اثرانگشت , مناسب عکاسی
                                                            سلفی
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>تعداد سیم کارت</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            دو سیم کارت
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </section>
                                        <section>
                                            <h3 class="params-title">پردازنده</h3>
                                            <ul class="params-list">
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>تراشه</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            Exynos 7904 (14 nm) Chipset
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>پردازنده ی مرکزی</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            Dual--Core Cortex-A73 + Hexa-Core Cortex-A53 CPU
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>نوع پردازنده</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            64 بیت
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>فرکانس پردازنده‌ی مرکزی</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            1.6 و 1.8 گیگاهرتز
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>پردازنده ی گرافیکی</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            Mali-G71 MP2 GPU
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </section>
                                        <section>
                                            <h3 class="params-title">سایر مشخصات</h3>
                                            <ul class="params-list">
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>حس‌گرها</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            قطب‌نما (Compass) , شتاب‌سنج (Accelerometer) , مجاورت
                                                            (Proximity) , اثرانگشت
                                                            زیر صفحه نمایش (FingerPrint|Under-Display)
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>باتری قابل تعویض</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            خیر
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>مشخصات باتری</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            باتری از نوع لیتیوم پلیمری با ظرفیت 4000 میلی‌ آمپر ساعت
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key"></div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            امکان شارژ سریع باتری با توان 15 وات (Fast battery charging
                                                            15W)
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="params-list-key">
                                                        <span>اقلام همراه گوشی</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span>
                                                            دفترچه‌ راهنما , کابل USB , شارژر
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </section>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="productComments" role="tabpanel"
                                     aria-labelledby="productComments-tab">
                                    <!-- product-review -->
                                    <div class="product-review-form mb-3">
                                        <form action="#">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="form-element-row">
                                                        <label for="phone-number" class="label-element">عنوان نظر شما
                                                            (اجباری)</label>
                                                        <input type="text" class="input-element">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>امتیاز شما:</label>
                                                        <div class="add-rating">
                                                            <input type="radio" name="rating" id="rating-1">
                                                            <label for="rating-1"></label>
                                                            <input type="radio" name="rating" id="rating-2">
                                                            <label for="rating-2"></label>
                                                            <input type="radio" name="rating" id="rating-3">
                                                            <label for="rating-3"></label>
                                                            <input type="radio" name="rating" id="rating-4">
                                                            <label for="rating-4"></label>
                                                            <input type="radio" name="rating" id="rating-5">
                                                            <label for="rating-5"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-element-row">
                                                        <label for="phone-number" class="label-element">ایمیل
                                                            شما</label>
                                                        <input type="text" class="input-element">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-element-row">
                                                        <label for="phone-number" class="label-element">نظر شما</label>
                                                        <textarea name="comment" id="comment" cols="30" rows="10"
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
                                        <div class="section-title mb-1 mt-4">
                                            نظرات کاربران (۵)
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="comments-list">
                                        <div class="row">
                                            <div class="col-md-3 aside">
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-name">
                                                            کاربر اینجانب
                                                        </div>
                                                        <div class="comments-buyer-badge">خریدار</div>
                                                    </li>
                                                    <li>
                                                        <div class="cell">
                                                            در تاریخ ۷ فروردین ۱۳۹۹
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="alert alert-info">
                                                    <i class="fas fa-thumbs-up"></i> خرید این محصول را توصیه می‌کنم
                                                </div>
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-title">رنگ:</div>
                                                        <div class="cell color-cell">
                                                            <span class="shopping-color-value"
                                                                  style="background-color: #FFFFFF;"></span>سفید
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cell cell-title">فروشنده:</div>
                                                        <div class="cell seller-cell">
                                                            <a href="#" class="border-bottom-dt">زندگیِ مدرن</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 article">
                                                <div class="header">
                                                    <div>راضیم</div>
                                                </div>
                                                <p>من ۳روز که خریدم و راضی هستم دوربینش خوبه فقط به نظرم باتری
                                                    زود تموم میشه البته دائما هم باهاش کار میکنم ولی هر روز
                                                    شارژش می‌کنم گوشیه خوش دستیه</p>
                                                <div class="footer">
                                                    <div class="comments-likes">
                                                        آیا این نظر برایتان مفید بود؟
                                                        <button class="btn-like" data-counter="۰">بله</button>
                                                        <button class="btn-like" data-counter="۰">خیر</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 aside">
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-name">
                                                            کاربر اینجانب
                                                        </div>
                                                        <div class="comments-buyer-badge">خریدار</div>
                                                    </li>
                                                    <li>
                                                        <div class="cell">
                                                            در تاریخ ۷ فروردین ۱۳۹۹
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="alert alert-info">
                                                    <i class="fas fa-thumbs-up"></i> خرید این محصول را توصیه می‌کنم
                                                </div>
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-title">رنگ:</div>
                                                        <div class="cell color-cell">
                                                            <span class="shopping-color-value"
                                                                  style="background-color: #000000;"></span>مشکی
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cell cell-title">فروشنده:</div>
                                                        <div class="cell seller-cell">
                                                            <a href="#" class="border-bottom-dt">زندگیِ مدرن</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 article">
                                                <div class="header">
                                                    <div>مدل 128 گیگ با رام 4 پیشنهاد میشه</div>
                                                </div>
                                                <p>سلام بعد از چند روز استفاده ازش راضی هستم و فکرشو نمیکردم به
                                                    عنوان یه گوشی تقریبا میان رده راضیم کنه و تصورم یه گوشیه
                                                    ضعیف بود.به عنوان کسی که زیاد با کامپیوتر و گوشی سر و کار
                                                    داره و سرعت و امکانات براش مهمه کاملا توقعاتمو برآروده
                                                    کرد.طراحی به روز و جذابی هم داره.رنگ مشکی 128 گیگ با رام 4
                                                    رو گرفتم که زیبایی خاصی داره.از دیجیکالا هم تشکر میکنم که
                                                    محصولو به موقع در تعطیلات به دستم رسوند و گارانتی و برگه
                                                    نحوه رجستر کردن گوشی همراهش بود و بسته بندی خوبی
                                                    طولانی مدت ندارند.</p>
                                                <div class="comments-evaluation">
                                                    <div class="comments-evaluation-positive">
                                                        <span>نقاط قوت</span>
                                                        <ul>
                                                            <li>فینگر تاچ عالی نیست ولی رضایت بخشه.تاچ قوی داره
                                                            </li>
                                                            <li>نور صفحه نمایش زیاد و کیفت صفحه نمایش قابل قبوله
                                                            </li>
                                                            <li>سخت افزار مناسب و سرعت خوب
                                                            </li>
                                                            <li>داشتن کاور ژله ای شفاف همراه گوشی و صدای واضح و
                                                                بلند
                                                            </li>
                                                            <li>میزان شارژ دهی مناسب و دوربین سلفی خوب</li>
                                                        </ul>
                                                    </div>

                                                    <div class="comments-evaluation-negative">
                                                        <span>نقاط ضعف</span>
                                                        <ul>
                                                            <li>نداشتن گلاس صفحه
                                                            </li>
                                                            <li>سیم شارژر خیلی کوتاهه</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="footer">
                                                    <div class="comments-likes">
                                                        آیا این نظر برایتان مفید بود؟
                                                        <button class="btn-like" data-counter="۰">بله</button>
                                                        <button class="btn-like" data-counter="۰">خیر</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 aside">
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-name">
                                                            کاربر اینجانب
                                                        </div>
                                                        <div class="comments-buyer-badge">خریدار</div>
                                                    </li>
                                                    <li>
                                                        <div class="cell">
                                                            در تاریخ ۷ فروردین ۱۳۹۹
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="alert alert-info">
                                                    <i class="fas fa-thumbs-up"></i> خرید این محصول را توصیه می‌کنم
                                                </div>
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-title">رنگ:</div>
                                                        <div class="cell color-cell">
                                                            <span class="shopping-color-value"
                                                                  style="background-color: #FFFFFF;"></span>سفید
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cell cell-title">فروشنده:</div>
                                                        <div class="cell seller-cell">
                                                            <a href="#" class="border-bottom-dt">زندگیِ مدرن</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 article">
                                                <div class="header">
                                                    <div>راضیم</div>
                                                </div>
                                                <p>من ۳روز که خریدم و راضی هستم دوربینش خوبه فقط به نظرم باتری
                                                    زود تموم میشه البته دائما هم باهاش کار میکنم ولی هر روز
                                                    شارژش می‌کنم گوشیه خوش دستیه</p>
                                                <div class="footer">
                                                    <div class="comments-likes">
                                                        آیا این نظر برایتان مفید بود؟
                                                        <button class="btn-like" data-counter="۰">بله</button>
                                                        <button class="btn-like" data-counter="۰">خیر</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 aside">
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-name">
                                                            کاربر اینجانب
                                                        </div>
                                                        <div class="comments-buyer-badge">خریدار</div>
                                                    </li>
                                                    <li>
                                                        <div class="cell">
                                                            در تاریخ ۷ فروردین ۱۳۹۹
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="alert alert-info">
                                                    <i class="fas fa-thumbs-up"></i> خرید این محصول را توصیه می‌کنم
                                                </div>
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-title">رنگ:</div>
                                                        <div class="cell color-cell">
                                                            <span class="shopping-color-value"
                                                                  style="background-color: #FFFFFF;"></span>سفید
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cell cell-title">فروشنده:</div>
                                                        <div class="cell seller-cell">
                                                            <a href="#" class="border-bottom-dt">زندگیِ مدرن</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 article">
                                                <div class="header">
                                                    <div>راضیم</div>
                                                </div>
                                                <p>من ۳روز که خریدم و راضی هستم دوربینش خوبه فقط به نظرم باتری
                                                    زود تموم میشه البته دائما هم باهاش کار میکنم ولی هر روز
                                                    شارژش می‌کنم گوشیه خوش دستیه</p>
                                                <div class="footer">
                                                    <div class="comments-likes">
                                                        آیا این نظر برایتان مفید بود؟
                                                        <button class="btn-like" data-counter="۰">بله</button>
                                                        <button class="btn-like" data-counter="۰">خیر</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 aside">
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-name">
                                                            کاربر اینجانب
                                                        </div>
                                                        <div class="comments-buyer-badge">خریدار</div>
                                                    </li>
                                                    <li>
                                                        <div class="cell">
                                                            در تاریخ ۷ فروردین ۱۳۹۹
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="alert alert-info">
                                                    <i class="fas fa-thumbs-up"></i> خرید این محصول را توصیه می‌کنم
                                                </div>
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-title">رنگ:</div>
                                                        <div class="cell color-cell">
                                                            <span class="shopping-color-value"
                                                                  style="background-color: #FFFFFF;"></span>سفید
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cell cell-title">فروشنده:</div>
                                                        <div class="cell seller-cell">
                                                            <a href="#" class="border-bottom-dt">زندگیِ مدرن</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 article">
                                                <div class="header">
                                                    <div>راضیم</div>
                                                </div>
                                                <p>من ۳روز که خریدم و راضی هستم دوربینش خوبه فقط به نظرم باتری
                                                    زود تموم میشه البته دائما هم باهاش کار میکنم ولی هر روز
                                                    شارژش می‌کنم گوشیه خوش دستیه</p>
                                                <div class="footer">
                                                    <div class="comments-likes">
                                                        آیا این نظر برایتان مفید بود؟
                                                        <button class="btn-like" data-counter="۰">بله</button>
                                                        <button class="btn-like" data-counter="۰">خیر</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 aside">
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-name">
                                                            کاربر اینجانب
                                                        </div>
                                                        <div class="comments-buyer-badge">خریدار</div>
                                                    </li>
                                                    <li>
                                                        <div class="cell">
                                                            در تاریخ ۷ فروردین ۱۳۹۹
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="alert alert-danger">
                                                    <i class="fas fa-thumbs-down"></i> خرید این محصول را توصیه نمی‌کنم
                                                </div>
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-title">رنگ:</div>
                                                        <div class="cell color-cell">
                                                            <span class="shopping-color-value"
                                                                  style="background-color: #FFFFFF;"></span>سفید
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cell cell-title">فروشنده:</div>
                                                        <div class="cell seller-cell">
                                                            <a href="#" class="border-bottom-dt">زندگیِ مدرن</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 article">
                                                <div class="header">
                                                    <div>راضیم</div>
                                                </div>
                                                <p>من ۳روز که خریدم و راضی هستم دوربینش خوبه فقط به نظرم باتری
                                                    زود تموم میشه البته دائما هم باهاش کار میکنم ولی هر روز
                                                    شارژش می‌کنم گوشیه خوش دستیه</p>
                                                <div class="footer">
                                                    <div class="comments-likes">
                                                        آیا این نظر برایتان مفید بود؟
                                                        <button class="btn-like" data-counter="۰">بله</button>
                                                        <button class="btn-like" data-counter="۰">خیر</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 aside">
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-name">
                                                            کاربر اینجانب
                                                        </div>
                                                        <div class="comments-buyer-badge">خریدار</div>
                                                    </li>
                                                    <li>
                                                        <div class="cell">
                                                            در تاریخ ۷ فروردین ۱۳۹۹
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="alert alert-info">
                                                    <i class="fas fa-thumbs-up"></i> خرید این محصول را توصیه می‌کنم
                                                </div>
                                                <ul class="comments-user-shopping">
                                                    <li>
                                                        <div class="cell cell-title">رنگ:</div>
                                                        <div class="cell color-cell">
                                                            <span class="shopping-color-value"
                                                                  style="background-color: #FFFFFF;"></span>سفید
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cell cell-title">فروشنده:</div>
                                                        <div class="cell seller-cell">
                                                            <a href="#" class="border-bottom-dt">زندگیِ مدرن</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 article">
                                                <div class="header">
                                                    <div>راضیم</div>
                                                </div>
                                                <p>من ۳روز که خریدم و راضی هستم دوربینش خوبه فقط به نظرم باتری
                                                    زود تموم میشه البته دائما هم باهاش کار میکنم ولی هر روز
                                                    شارژش می‌کنم گوشیه خوش دستیه</p>
                                                <div class="footer">
                                                    <div class="comments-likes">
                                                        آیا این نظر برایتان مفید بود؟
                                                        <button class="btn-like" data-counter="۰">بله</button>
                                                        <button class="btn-like" data-counter="۰">خیر</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
