@extends('front.layouts.master')
@section('content')
    <div class="page-wrapper">
    @include('front.partials.header',[$categories=$categories])
    <!-- Page Content -->
        <main class="page-content">
            <div class="container">
                <div class="row d-none d-sm-block">
                    <div class="col-12 mb-3">
                        <div class="banner">
                            <a href="#">
                                <img src="{{url('front/images/banner/banner-lg-01.gif')}}" alt="banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-8 ml-lg-0 mb-3">
                        <div class="main-slider">
                            <div class="swiper-container main-page-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img src="{{url('front/images/main-slider/slider-1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img src="{{url('front/images/main-slider/slider-2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img src="{{url('front/images/main-slider/slider-3.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img src="{{url('front/images/main-slider/slider-4.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img src="{{url('front/images/main-slider/slider-5.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img src="front/images/main-slider/slider-6.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img src="front/images/main-slider/slider-7.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img src="front/images/main-slider/slider-8.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img src="front/images/main-slider/slider-9.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="swiper-container main-page-slider-thumbs d-none d-sm-block">
                                <div class="swiper-wrapper">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 col-sm-6 col-12">
                                <div class="banner mb-3">
                                    <a href="#">
                                        <img src="front/images/banner/banner-md-03.gif" alt="banner">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-6 col-12">
                                <div class="banner">
                                    <a href="#">
                                        <img src="{{url('front/images/banner/banner-md-2.jpg')}}" alt="banner">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($categories as $category)
                    @if(count($category->subcategory()) > 0)
                        <section class="product-carousel in-box">
                            <div class="section-title">
                                <i class="fad fa-pen-nib"></i>
                                {{$category->title}}
                            </div>
                            <div class="swiper-container slider-lg">
                                <div class="swiper-wrapper">
                                    @foreach($category->subcategory() as $product )
                                        <div class="swiper-slide">
                                            <div class="product-card">
                                                <div class="product-card-top">
                                                    <a href="{{route('product.detail',$product->id)}}" class="product-image">
                                                        <img src="{{url('/images/products/'.$product->image)}}"
                                                             alt="product image">
                                                    </a>
                                                    <div class="product-card-actions">
                                                        <button class="add-to-wishlist"><i class="fas fa-heart"></i>
                                                        </button>
                                                        <button class="add-to-compare"><i class="fas fa-random"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="product-card-middle">
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 65%;"></div>
                                                        </div>
                                                    </div>
                                                    <h6 class="product-name">
                                                        <a href="#">{{$product->title}}</a>
                                                    </h6>
                                                    <div class="product-price product-price-clone">{{$product->price}} ??????????</div>
                                                </div>
                                                <div class="product-card-bottom">
                                                    <div class="product-price">
                                                        {{$product->price}} ??????????
                                                    </div>
                                                    <a href="" onclick="addToCart({{$product->id}})" class="btn-add-to-cart">
                                                        <i class="fad fa-cart-plus"></i>
                                                        ???????????? ???? ?????? ????????
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </section>
                    @endif
                @endforeach

                <div class="row mb-5">
                    <div class="col-md-3 col-6 mb-lg-0 mb-3">
                        <div class="banner">
                            <a href="#">
                                <img src="{{url('front/images/banner/banner-sm-01.jpg')}}" alt="banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-lg-0 mb-3">
                        <div class="banner">
                            <a href="#">
                                <img src="{{url('front/images/banner/banner-sm-02.jpg')}}" alt="banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-lg-0 mb-3">
                        <div class="banner">
                            <a href="#">
                                <img src="{{url('front/images/banner/banner-sm-03.jpg')}}" alt="banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3  col-6 mb-lg-0 mb-3">
                        <div class="banner">
                            <a href="#">
                                <img src="{{url('front/images/banner/banner-sm-04.jpg')}}" alt="banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6 mb-lg-0 mb-3">
                        <div class="banner">
                            <a href="#">
                                <img src="{{url('front/images/banner/banner-md-01.jpg')}}" alt="banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-lg-0 mb-3">
                        <div class="banner">
                            <a href="#">
                                <img src="{{url('front/images/banner/banner-md-02.jpg')}}" alt="banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12 mb-4">
                        <div class="section-title">
                            <i class="fad fa-sort-size-up-alt"></i>
                            ???????????? ???????? ????
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-card product-card-horizontal border-bottom">
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
                                    <a href="#">?????? ?????????? ?????????? ?????????? ???? ?????????? ????????
                                        70</a>
                                </h6>
                                <div class="product-price product-price-clone">650,000 ??????????</div>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    650,000 ??????????
                                </div>
                                <a href="#" class="btn-add-to-cart">
                                    <i class="fad fa-cart-plus"></i>
                                    ???????????? ???? ?????? ????????
                                </a>
                            </div>
                        </div>
                        <div class="product-card product-card-horizontal border-bottom">
                            <div class="product-card-top">
                                <a href="" class="product-image">
                                    <img src="front/images/products/02.jpg" alt="product image">
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
                                    <a href="#">?????? ?????????? ?????? M191</a>
                                </h6>
                                <div class="product-price product-price-clone">650,000 ??????????</div>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    650,000 ??????????
                                </div>
                                <a href="#" class="btn-add-to-cart">
                                    <i class="fad fa-cart-plus"></i>
                                    ???????????? ???? ?????? ????????
                                </a>
                            </div>
                        </div>
                        <div class="product-card product-card-horizontal">
                            <div class="product-card-top">
                                <a href="" class="product-image">
                                    <img src="front/images/products/03.jpg" alt="product image">
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
                                    <a href="#">?????? ?????????? ?? ???? ?????? ???????? ???????? ???????? ??????
                                        G0025</a>
                                </h6>
                                <div class="product-price product-price-clone">650,000 ??????????</div>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    650,000 ??????????
                                </div>
                                <a href="#" class="btn-add-to-cart">
                                    <i class="fad fa-cart-plus"></i>
                                    ???????????? ???? ?????? ????????
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-card product-card-horizontal border-bottom">
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
                                    <a href="#">?????? ?????????? ?????? 80 Owens B</a>
                                </h6>
                                <div class="product-price product-price-clone">650,000 ??????????</div>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    650,000 ??????????
                                </div>
                                <a href="#" class="btn-add-to-cart">
                                    <i class="fad fa-cart-plus"></i>
                                    ???????????? ???? ?????? ????????
                                </a>
                            </div>
                        </div>
                        <div class="product-card product-card-horizontal border-bottom">
                            <div class="product-card-top">
                                <a href="" class="product-image">
                                    <img src="front/images/products/05.jpg" alt="product image">
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
                                    <a href="#">?????? ?????????? ?????? ????????</a>
                                </h6>
                                <div class="product-price product-price-clone">650,000 ??????????</div>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    650,000 ??????????
                                </div>
                                <a href="#" class="btn-add-to-cart">
                                    <i class="fad fa-cart-plus"></i>
                                    ???????????? ???? ?????? ????????
                                </a>
                            </div>
                        </div>
                        <div class="product-card product-card-horizontal">
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
                                    <a href="#">?????? ?????????? ?????? ?????? ?????????? MT11</a>
                                </h6>
                                <div class="product-price product-price-clone">650,000 ??????????</div>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    650,000 ??????????
                                </div>
                                <a href="#" class="btn-add-to-cart">
                                    <i class="fad fa-cart-plus"></i>
                                    ???????????? ???? ?????? ????????
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-card product-card-horizontal border-bottom">
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
                                    <a href="#">?????? ?????????? ???????? ?? ?????????? ???? ???????? ?????? ??????
                                        60</a>
                                </h6>
                                <div class="product-price product-price-clone">650,000 ??????????</div>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    650,000 ??????????
                                </div>
                                <a href="#" class="btn-add-to-cart">
                                    <i class="fad fa-cart-plus"></i>
                                    ???????????? ???? ?????? ????????
                                </a>
                            </div>
                        </div>
                        <div class="product-card product-card-horizontal border-bottom">
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
                                    <a href="#">?????? ?????????? ?????????????? ?? ?????????? ?????? ?????? ??????????
                                        (???????? ?????????????????????????????? ?????????? ????????????)</a>
                                </h6>
                                <div class="product-price product-price-clone">650,000 ??????????</div>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    650,000 ??????????
                                </div>
                                <a href="#" class="btn-add-to-cart">
                                    <i class="fad fa-cart-plus"></i>
                                    ???????????? ???? ?????? ????????
                                </a>
                            </div>
                        </div>
                        <div class="product-card product-card-horizontal">
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
                                    <a href="#">?????? ?????????? ?????? M191</a>
                                </h6>
                                <div class="product-price product-price-clone">650,000 ??????????</div>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    650,000 ??????????
                                </div>
                                <a href="#" class="btn-add-to-cart">
                                    <i class="fad fa-cart-plus"></i>
                                    ???????????? ???? ?????? ????????
                                </a>
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
