@include('front.includes.header')

<!--Start Banner Area-->
<div class="banner-style-two-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-content-two">
                    <h1>{{$hero->title}}</h1>
                    <div>
                        {!! $hero->content !!}
                    </div>
                    <div class="banner-btn">
                        <a href="https://million.az/services/bank/Ferrium" class="default-btn btn active mr-20">{{$words['pay_credit']->translate(app()->getLocale())->word}} <i
                                class="ri-arrow-right-line"></i></a>
                        <a href="{{route('brands')}}" class="default-btn btn">{{$words['brands']->translate(app()->getLocale())->word}} <i
                                class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-image-area">
                    <img src="{{asset('storage/' . $hero->image)}}" class="banner-shape" alt="Shape">


                </div>
            </div>
        </div>
    </div>
</div>
<!--End Banner Area-->

<!-- =========== Why-US Start ============ -->
<div class="wyh-us container ptb-100">
    @foreach($features as $feature)
        <div class="whyUs-box">

            <div class="box_img">
                <img src="{{asset('storage/' . $feature->image)}}" alt="">
            </div>
            <div class="box-txt">
                <h5 class="whyUs_boxTitle">{{$feature->title}}</h5>
                <div>{!! $feature->content !!}</div>
            </div>

        </div>
    @endforeach

</div>
<!-- =========== Why-US End ============ -->


<!-- =========== Our services Start ============ -->

<div class="ourService container">
    <div class="section-title mb-20">
        <h2>{{$words['products']->translate(app()->getLocale())->word}}</h2>
    </div>
    <div class="ourService-boxes mt-30">

        @foreach($mains as $main)
            <a href="{{route('all_brends' , $main->id)}}" class="ourService-box">
                <img src="{{asset('storage/' . $main->image)  }}" alt="">
                <h5>{{$main->title}}</h5>
            </a>
        @endforeach

    </div>
</div>
<br>
<br>

<!-- =========== Our services End ============ -->

<!-- =========== Our services Start ============ -->

<div class="ourService container">
    <div class="section-title mb-20">
        <h2>{{$words['services']->translate(app()->getLocale())->word}}</h2>
    </div>
    <p class="ourService-text">{{$words['service_slogan']->translate(app()->getLocale())->word}}</p>
    <div class="ourService-boxes mt-30">
        @foreach($services as $service)
            <a href="{{route('service_single' , $service->id)}}" class="ourService-box">
                <img src="{{asset('storage/' . $service->image)  }}" alt="">
                <h5>{{$service->title}}</h5>
            </a>
        @endforeach

    </div>
</div>

<!-- =========== Our services End ============ -->

<!-- =========== Car Space Brands Start ============ -->

<div class="carSpare-brands container ptb-100">
    <div class="section-title mb-20">
        <h2>{{$words['brands']->translate(app()->getLocale())->word}}</h2>
    </div>
    <div class="carSpare-brands-boxes mt-30">
        @foreach($brands as $brand)
            <a href="{{route('brand_products' , $brand->id)}}" class="carSpare-brands-box">
                <img src="{{ asset('storage/' . $brand->image) }}" alt="">
            </a>
        @endforeach

    </div>
</div>

<!-- =========== Car Space Brands End ============ -->

<!-- =========== Car Space Brands Start ============ -->

<div class="carSpare-brands container ptb-100">
{{--    <div class="section-title mb-20">--}}
{{--        <h2>{{$words['brands']->translate(app()->getLocale())->word}}</h2>--}}
{{--    </div>--}}
    <div class="carSpare-brands-boxes mt-30">
        @foreach($newbrands as $brand)
            <a href="{{route('oil_products' , $brand->id)}}" class="carSpare-brands-box">
                <img src="{{ asset('storage/' . $brand->image) }}" alt="">
            </a>
        @endforeach

    </div>
</div>

<!-- =========== Car Space Brands End ============ -->

<!-- =========== Credit Area Start ============ -->

<div class="creditArea container ptb-100">
    <div class="creditApply">
        <img src="https://images.pexels.com/photos/3760067/pexels-photo-3760067.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
             alt="">
        <h1 class="creditApply-title"> {{$words['online_loan_application']->translate(app()->getLocale())->word}} </h1>
        <p class="creditApply-txt">{{$words['loan_text']->translate(app()->getLocale())->word}}
        </p>
        <a class="creditApply-btn" href="{{route('credit_form')}}">
            {{$words['apply']->translate(app()->getLocale())->word}}
            <i class="ri-arrow-right-s-line"></i>
        </a>
    </div>
    <div class="creditPayment">
        <img src="https://images.pexels.com/photos/4968391/pexels-photo-4968391.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
             alt="">

        <h1 class="creditPayment-title">{{$words['online_loan_payment']->translate(app()->getLocale())->word}}</h1>
        <p class="creditPayment-txt"> {{$words['payment_text']->translate(app()->getLocale())->word}}
        </p>
        <a class="creditPayment-btn" href="https://million.az/services/bank/Ferrium">
            {{$words['pay']->translate(app()->getLocale())->word}}
            <i class="ri-arrow-right-s-line"></i>
        </a>
    </div>
</div>

<!-- =========== Credit Area End ============ -->


<!--Start Clients Reviews Area-->
<div class="clients-reviews-area">
    <div class="container">
        <div class="section-title">
            <span>Globalavto.az</span>
            <h2>{{$words['customer_reviews']->translate(app()->getLocale())->word}}</h2>
        </div>
        <div class="reviews-slider owl-carousel owl-theme">
            @foreach($testimonials as $testimonial)
                <div class="single-review-box">
                    <div class="client-profile">
                        <img src="{{asset('storage/' . $testimonial->image)}}" alt="Image">
                        <h3>{{$testimonial->title}}</h3>
                    </div>

                    <div>
                        {!! $testimonial->content !!}
                    </div>
                    <div class="quote">
                        <i class="flaticon-left-quotes-sign"></i>
                    </div>
                </div>
            @endforeach



        </div>
    </div>
</div>
<!--End Clients Reviews Area-->


<!--Start Blog Area-->
<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>Globalavto.az</span>
            <h2>{{$words['news']->translate(app()->getLocale())->word}}</h2>
        </div>
        <div class="row justify-content-center">

            @foreach($blogs as $blog)
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="single-blog-card style2">
                        <div class="blog-img">
                            <a href="{{route('blog_single', $blog->id)}}"><img src="{{asset('storage/' . $blog->image)}}"
                                                                 alt="Image"></a>
                        </div>
                        <div class="blog-content">

                            <h3><a href="{{route('blog_single', $blog->id)}}">{{$blog->title}}</a>
                            </h3>
                            <a href="{{route('blog_single', $blog->id)}}" class="default-btn btn for-card">{{$words['details']->translate(app()->getLocale())->word}} <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="text-center">
            <a href="{{route('blogs')}}" class="default-btn btn">{{$words['explore_more']->translate(app()->getLocale())->word}} <i class="ri-arrow-right-line"></i></a>
        </div>
    </div>
</div>
<!--End Blog Area-->

@include('front.includes.footer')
