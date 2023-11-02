@include('front.includes.header')

<div class="shop-section container">
    <div class="shop-head">
        <h1 class="section-title"> {{$words['shops']->translate(app()->getLocale())->word}}</h1>
    </div>
    <div class="shop-hero">
        <div class="brandsForPhone-boxes">

            @foreach($shops as $shop)
                <div class="brandsForPhone-boxItem">
                    <div class="brandsLogo">
                        @foreach($shop->images as $image)
                            <img src="{{asset('storage/' . $image->image)}}"
                                 alt="">
                        @endforeach
                    </div>
                    <div class="phoneNumber">
                        <p>{{$shop->number}}</p>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="shop-details">
            <div class="shop-connect-details">
                <div class="workClock">
                    <i class="fa-regular fa-clock"></i>
                    <p>{{$words['work_hours']->translate(app()->getLocale())->word}}</p>
                </div>
                <div class="storeLocation">
                    <i class="ri-map-pin-line"></i>
                    <p>{{$words['main_address']->translate(app()->getLocale())->word}}</p>
                </div>
                <div class="storeNumber">
                    <i class="ri-phone-line"></i>
                    <p>{{$words['main_phone']->translate(app()->getLocale())->word}}</p>
                </div>
            </div>
            <div class="shop-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.8532801671386!2d49.799134083493776!3d40.41210098229761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4030876bf6a6a439%3A0x743da075832969fc!2sAvto%20Start%20M%C9%99rk%C9%99z%20Ehtiyat%20Hisseleri!5e0!3m2!1saz!2saz!4v1698647509946!5m2!1saz!2saz"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>


</div>

@include('front.includes.footer')
