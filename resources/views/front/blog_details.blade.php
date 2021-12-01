@extends('front.layouts.master')
@section('content')
    <div class="page-wrapper">
    @include('front.partials.header',[$categories=$categories])
    <!-- Page Content -->
        <main class="page-content">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-3 col-md-4 sticky-sidebar order-2 order-md-1">
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
                    <div class="col-lg-9 col-md-8 order-1 order-md-2">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="shadow-around">
                                    <div class="px-3">
                                        <!-- breadcrumb -->
                                        <div class="breadcrumb py-2">
                                            <nav>
                                                <a href="#">فروشگاه اینترنتی</a>
                                                <a href="#">مقالات</a>
                                                <a href="#">علم و تکنولوژی</a>
                                            </nav>
                                        </div>
                                        <!-- end breadcrumb -->
                                        <div class="blog-card single-blog">
                                            <div class="blog-card-title mb-3">
                                                <h2 class="text-right"><a href="#">{{$article->title}}</a></h2>
                                            </div>
                                            <div class="blog-card-footer mb-3">
                                                <div class="author">
                                                    <a href="#">{{$article->user->name}}</a>
                                                </div>
                                                <div class="date">
                                                    <i class="fad fa-clock"></i>
                                                    {{\Hekmatinasser\Verta\Verta::instance($article->created_at)->format('%B %d، %Y')}}
                                                </div>
                                            </div>
                                            <div class="blog-card-body">
                                                <p>
                                                    {!! $article->body !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tags mb-5">
                                            <a href="#">#واتساپ</a>
                                        </div>
                                        <hr>
                                        <!-- product-review -->
                                        <div class="product-review-form my-5">
                                            <div class="section-title font-weight-bold mb-1 mt-4 mb-3">
                                                نظر شما
                                            </div>
                                            <form action="#">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-6">
                                                        <div class="form-element-row">
                                                            <label for="phone-number" class="label-element">عنوان نظر
                                                                شما
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
                                                            <label for="phone-number" class="label-element">نظر
                                                                شما</label>
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
                                        <div class="product-review mb-4">
                                            <div class="blockquote comment mb-4">
                                                <div class="blockquote-content mb-2">
                                                    <div class="d-sm-flex align-items-center mb-2">
                                                        <h6 class="font-weight-bold mb-0">عنوان نظر</h6><span
                                                            class="d-none d-sm-inline mx-3 text-muted opacity-50">|</span>
                                                        <div class="ratings-container mb-0">
                                                            <div class="ratings">
                                                                <div class="ratings-val" style="width: 88%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با
                                                        استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد
                                                        نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                                                        کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان
                                                        جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را
                                                        برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در
                                                        زبان فارسی ایجاد کرد.
                                                    </p>
                                                    <footer class="testimonial-footer d-flex align-items-center">
                                                        <div class="testimonial-avatar">
                                                            <img src="./assets/images/avatar/avatar.png"
                                                                 alt="Review Author Avatar">
                                                        </div>
                                                        <div class="pr-2 flex-grow-1">
                                                            <div class="blockquote-footer">
                                                                <span
                                                                    class="d-block font-weight-bold text-dark">حامد</span>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <cite class="text-sm">در تاریخ ۷ فروردین ۱۳۹۹</cite>
                                                                    <a href="#"
                                                                       class="link--with-border-bottom ml-1">پاسخ</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </footer>
                                                </div>
                                                <div class="blockquote comment mb-0">
                                                    <div class="blockquote-content">
                                                        <div class="d-sm-flex align-items-center mb-2">
                                                            <h6 class="font-weight-bold mb-0">عنوان نظر</h6><span
                                                                class="d-none d-sm-inline mx-3 text-muted opacity-50">|</span>
                                                            <div class="ratings-container mb-0">
                                                                <div class="ratings">
                                                                    <div class="ratings-val" style="width: 88%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و
                                                            با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه
                                                            و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی
                                                            تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای
                                                            کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و
                                                            آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم
                                                            افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص
                                                            طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد.
                                                        </p>
                                                        <footer class="testimonial-footer d-flex align-items-center">
                                                            <div class="testimonial-avatar">
                                                                <img src="./assets/images/avatar/avatar.png"
                                                                     alt="Review Author Avatar">
                                                            </div>
                                                            <div class="pr-2 flex-grow-1">
                                                                <div class="blockquote-footer">
                                                                    <span
                                                                        class="d-block font-weight-bold text-dark">جلال</span>
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <cite class="text-sm">در تاریخ ۷ فروردین
                                                                            ۱۳۹۹</cite>
                                                                        <a href="#"
                                                                           class="link--with-border-bottom ml-1">پاسخ</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </footer>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="blockquote comment mb-4">
                                                <div class="blockquote-content">
                                                    <div class="d-sm-flex align-items-center mb-2">
                                                        <h6 class="font-weight-bold mb-0">عنوان نظر</h6><span
                                                            class="d-none d-sm-inline mx-3 text-muted opacity-50">|</span>
                                                        <div class="ratings-container mb-0">
                                                            <div class="ratings">
                                                                <div class="ratings-val" style="width: 88%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با
                                                        استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد
                                                        نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                                                        کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان
                                                        جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را
                                                        برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در
                                                        زبان فارسی ایجاد کرد.</p>
                                                    <footer class="testimonial-footer d-flex align-items-center">
                                                        <div class="testimonial-avatar">
                                                            <img src="./assets/images/avatar/avatar.png"
                                                                 alt="Review Author Avatar">
                                                        </div>
                                                        <div class="pr-2 flex-grow-1">
                                                            <div class="blockquote-footer">
                                                                <span
                                                                    class="d-block font-weight-bold text-dark">سامان</span>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <cite class="text-sm">در تاریخ ۷ فروردین ۱۳۹۹</cite>
                                                                    <a href="#"
                                                                       class="link--with-border-bottom ml-1">پاسخ</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </footer>
                                                </div>
                                            </div>
                                            <div class="blockquote comment mb-4">
                                                <div class="blockquote-content">
                                                    <div class="d-sm-flex align-items-center mb-2">
                                                        <h6 class="font-weight-bold mb-0">عنوان نظر</h6><span
                                                            class="d-none d-sm-inline mx-3 text-muted opacity-50">|</span>
                                                        <div class="ratings-container mb-0">
                                                            <div class="ratings">
                                                                <div class="ratings-val" style="width: 88%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با
                                                        استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد
                                                        نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                                                        کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان
                                                        جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را
                                                        برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در
                                                        زبان فارسی ایجاد کرد.</p>
                                                    <footer class="testimonial-footer d-flex align-items-center">
                                                        <div class="testimonial-avatar">
                                                            <img src="./assets/images/avatar/avatar.png"
                                                                 alt="Review Author Avatar">
                                                        </div>
                                                        <div class="pr-2 flex-grow-1">
                                                            <div class="blockquote-footer">
                                                                <span
                                                                    class="d-block font-weight-bold text-dark">سامان</span>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <cite class="text-sm">در تاریخ ۷ فروردین ۱۳۹۹</cite>
                                                                    <a href="#"
                                                                       class="link--with-border-bottom ml-1">پاسخ</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </footer>
                                                </div>
                                            </div>
                                            <div class="blockquote comment mb-4">
                                                <div class="blockquote-content">
                                                    <div class="d-sm-flex align-items-center mb-2">
                                                        <h6 class="font-weight-bold mb-0">عنوان نظر</h6><span
                                                            class="d-none d-sm-inline mx-3 text-muted opacity-50">|</span>
                                                        <div class="ratings-container mb-0">
                                                            <div class="ratings">
                                                                <div class="ratings-val" style="width: 88%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با
                                                        استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد
                                                        نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                                                        کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان
                                                        جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را
                                                        برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در
                                                        زبان فارسی ایجاد کرد.</p>
                                                    <footer class="testimonial-footer d-flex align-items-center">
                                                        <div class="testimonial-avatar">
                                                            <img src="./assets/images/avatar/avatar.png"
                                                                 alt="Review Author Avatar">
                                                        </div>
                                                        <div class="pr-2 flex-grow-1">
                                                            <div class="blockquote-footer">
                                                                <span
                                                                    class="d-block font-weight-bold text-dark">سام</span>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <cite class="text-sm">در تاریخ ۷ فروردین ۱۳۹۹</cite>
                                                                    <a href="#"
                                                                       class="link--with-border-bottom ml-1">پاسخ</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </footer>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end product-review -->
                                    </div>
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
