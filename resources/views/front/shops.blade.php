@include('front.includes.header')

<div class="shop-section container">
    <div class="shop-head">
        <h1 class="section-title"> {{$words['shops']->translate(app()->getLocale())->word}}</h1>
    </div>
    <div class="brandsForPhone-boxes">
        @foreach($shops as $shop)
            <div class="brandsForPhone-boxItem">
                <div class="brandsLogo">
                    @foreach($shop->images as $image)
                        <img src="{{asset('storage/' . $image->image)}}"
                             alt="">
                    @endforeach

                </div>
                <div class="brandsPhone">
                    <div class="phoneNumber">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path
                                d="M19.0371 13.4459L14.3261 11.3349L14.3131 11.3289C14.0685 11.2243 13.8017 11.1823 13.5369 11.2068C13.272 11.2312 13.0174 11.3213 12.7961 11.4689C12.77 11.4861 12.745 11.5048 12.7211 11.5249L10.2871 13.5999C8.74507 12.8509 7.15306 11.2709 6.40405 9.74889L8.48207 7.27787C8.50207 7.25287 8.52107 7.22787 8.53907 7.20087C8.6835 6.98017 8.77113 6.72718 8.79416 6.46443C8.81719 6.20168 8.7749 5.93731 8.67107 5.69485V5.68285L6.55406 0.963807C6.41679 0.647069 6.18078 0.383216 5.88124 0.211638C5.5817 0.0400599 5.2347 -0.0300417 4.89204 0.0117978C3.537 0.190106 2.2932 0.855574 1.39295 1.88391C0.4927 2.91225 -0.00244095 4.23313 9.04871e-06 5.59985C9.04871e-06 13.5399 6.46005 20 14.4001 20C15.7668 20.0024 17.0877 19.5073 18.116 18.607C19.1444 17.7068 19.8098 16.463 19.9882 15.1079C20.0301 14.7654 19.9601 14.4185 19.7887 14.119C19.6173 13.8194 19.3537 13.5834 19.0371 13.4459ZM14.4001 18.4C11.0065 18.3963 7.75285 17.0465 5.35317 14.6468C2.95349 12.2471 1.60373 8.99352 1.60002 5.59985C1.59626 4.62333 1.94807 3.67883 2.58976 2.94273C3.23145 2.20664 4.11914 1.72928 5.08705 1.59981C5.08665 1.6038 5.08665 1.60782 5.08705 1.61181L7.18706 6.31186L5.12005 8.78588C5.09907 8.81002 5.08001 8.83577 5.06305 8.86288C4.91256 9.0938 4.82428 9.35968 4.80676 9.63475C4.78924 9.90982 4.84307 10.1848 4.96304 10.4329C5.86905 12.2859 7.73606 14.1389 9.60908 15.0439C9.85904 15.1628 10.1356 15.2148 10.4116 15.1948C10.6877 15.1748 10.9538 15.0836 11.1841 14.9299C11.2098 14.9126 11.2345 14.894 11.2581 14.8739L13.6891 12.7999L18.3891 14.9049C18.3891 14.9049 18.3971 14.9049 18.4001 14.9049C18.2723 15.8742 17.7956 16.7637 17.0594 17.407C16.3232 18.0503 15.3778 18.4033 14.4001 18.4Z"
                                fill="white" />
                        </svg>
                        <p>{{$shop->number}}</p>
                    </div>

                </div>
            </div>
        @endforeach




    </div>
    <div class="shop-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.8532801671386!2d49.799134083493776!3d40.41210098229761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4030876bf6a6a439%3A0x743da075832969fc!2sAvto%20Start%20M%C9%99rk%C9%99z%20Ehtiyat%20Hisseleri!5e0!3m2!1saz!2saz!4v1698647509946!5m2!1saz!2saz"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <div class="shop-details">
            <div class="workClock">
                <i class="fa-regular fa-clock"></i>
                <p>{{$words['work_hours']->translate(app()->getLocale())->word}}</p>
            </div>
{{--            <div class="workDays">--}}
{{--                <i class="ri-calendar-event-line"></i>--}}
{{--                <p>İş günləri: <span>Bazar ertəsi - Bazar</span></p>--}}
{{--            </div>--}}
            <div class="storeLocation">
                <i class="ri-map-pin-line"></i>
                <p>{{$words['main_address']->translate(app()->getLocale())->word}}</p>
            </div>
            <div class="storeNumber">
                <i class="ri-phone-line"></i>
                <p>{{$words['main_phone']->translate(app()->getLocale())->word}}</p>
            </div>
        </div>
    </div>
</div>

@include('front.includes.footer')
