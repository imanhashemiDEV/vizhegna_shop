@extends('front.layouts.master')
@section('content')
    <div class="page-wrapper">
    @include('front.partials.header',[$categories=$categories])
    <!-- Page Content -->
        <main class="page-content">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12 mb-md-0 mb-3">
                        <form action="{{route('save.payment')}}" method="post">
                            @csrf
                        <div class="checkout-section shadow-around">
                            <div class="checkout-step">
                                <ul>
                                    <li class="active">
                                        <a href="#"><span>سبد خرید</span></a>
                                    </li>
                                    <li class="active">
                                        <span>نحوه ارسال و پرداخت</span>
                                    </li>
                                    <li>
                                        <span>اتمام خرید و ارسال</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="checkout-section-content">
                                <div class="checkout-section-title">آدرس تحویل سفارش</div>
                                <div class="row mx-0">
                                    @auth()
                                        @foreach(auth()->user()->addresses as $address)
                                            <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="address_id" name="address_id" value="{{$address->id}}"
                                                           class="custom-control-input">
                                                    <label class="custom-control-label address-select"
                                                           for="address_id">
                                                        <span class="head-address-select">به این آدرس ارسال شود</span>
                                                        <span>{{$address->address}}</span>
                                                        <span>
                                                    <i class="fa fa-user"></i>
                                                    {{auth()->user()->name}}
                                                </span>
                                                        <a href="#" class="link--with-border-bottom edit-address-btn"
                                                           data-toggle="modal" data-target="#editAddressModal">
                                                            ویرایش
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endauth
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
                                        <div class="custom-control custom-radio">
                                            <button class="add-address" data-toggle="modal"
                                                    data-target="#addAddressModal">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="shadow-around pt-3">
                            <div class="container">

                                <div class="row">
                                    @foreach(\Illuminate\Support\Facades\Session::get('cart')->items as $object)
                                        <div class="col-4">
                                            <li class="cart-item">
                                            <span class="d-flex align-items-center mb-2">
                                                <a href="#">
                                                    <img src="{{url('front/images/cart/item-1.jpg')}}" alt="">
                                                </a>
                                                <span>
                                                    <a href="#">
                                                        <span class="title-item">
                                                            {{$object['item']->title}}
                                                        </span>
                                                    </a>
                                                </span>
                                            </span>
                                                <span class="price">{{$object['qty']}}  عدد</span>
                                                <span class="price">{{$object['item']->price}}  تومان</span>
                                                <button class="remove-myitem"
                                                        onclick="removeFromCart({{$object['item']->id}})">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </li>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                            <hr>
                            <div class="d-flex justify-content-between px-3 py-2">
                                <span class="font-weight-bold">جمع</span>
                                <span class="font-weight-bold">
                                    {{\Illuminate\Support\Facades\Session::get('cart')->totalPrice}}
                                    <span class="text-sm">تومان</span>
                                </span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between px-3 py-2">
                                <span class="font-weight-bold">مبلغ قابل پرداخت</span>
                                <span class="font-weight-bold">
                                    {{\Illuminate\Support\Facades\Session::get('cart')->totalPrice}}
                                    <span class="text-sm">تومان</span>
                                </span>
                            </div>
                            <div class="d-flex px-3 py-4">
                                <button type="submit" class="btn btn-danger btn-block py-2">پرداخت و ثبت نهایی سفارش</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- end Page Content -->

        <!-- editAddressModal -->
        <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAddressModalLabel">ویرایش آدرس</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="text-sm text-muted mb-1">نام و نام خانوادگی:</div>
                                    <div class="text-dark font-weight-bold">
                                        <div class="form-element-row mb-0">
                                            <input type="text" class="input-element" value="جلال بهرامی راد">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="text-sm text-muted mb-1">شماره موبایل:</div>
                                    <div class="text-dark font-weight-bold">
                                        <div class="form-element-row mb-0">
                                            <input type="text" class="input-element dir-ltr" value="090********">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="text-sm text-muted mb-1">استان:</div>
                                    <div class="text-dark font-weight-bold">
                                        <div class="form-element-row mb-0">
                                            <select name="" id="" class="select2">
                                                <option value="0">انتخاب استان</option>
                                                <option value="1">خراسان شمالی</option>
                                                <option value="2">تهران</option>
                                                <option value="3">تبریز</option>
                                                <option value="4">شیراز</option>
                                                <option value="5">کرمان</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="text-sm text-muted mb-1">شهر:</div>
                                    <div class="text-dark font-weight-bold">
                                        <div class="form-element-row mb-0">
                                            <select name="" id="" class="select2">
                                                <option value="0">انتخاب شهر</option>
                                                <option value="1">بجنورد</option>
                                                <option value="2">شیروان</option>
                                                <option value="3">اسفراین</option>
                                                <option value="4">مانه و سملقان</option>
                                                <option value="5">راز و جرگلان</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="text-sm text-muted mb-1">آدرس کامل:</div>
                                    <div class="text-dark font-weight-bold">
                                        <div class="form-element-row mb-0">
                                            <textarea name="address" id="address" cols="30" rows="10"
                                                      class="input-element"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">ذخیره تغییرات <i
                                class="fad fa-money-check-edit"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end editAddressModal -->

        <!-- addAddressModal -->
        <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAddressModalLabel">آدرس جدید</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('add.user.address')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="text-sm text-muted mb-1">آدرس کامل:</div>
                                    <div class="text-dark font-weight-bold">
                                        <div class="form-element-row mb-0">
                                            <textarea name="address" id="address" cols="30" rows="10"
                                                      class="input-element"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ذخیره تغییرات <i
                                        class="fad fa-money-check-edit"></i></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- end addAddressModal -->
        <!-- end Page Content -->
        @include('front.partials.footer')
    </div>
@endsection
