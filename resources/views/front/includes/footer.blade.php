
<!--Start Footer Area-->
<div class="start-footer-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single-footer-widget footer-logo-area">
                    <a href="{{route('main_page')}}"><img src="{{asset('/')}}front/images/logo.png" alt="Logo"></a>
                    <p>{{$words['about_company']->translate(app()->getLocale())->word}}</p>
                    <div class="social-content">
                        <ul>
                            <li>
                                <span>{{$words['social_networks']->translate(app()->getLocale())->word}}</span>
                            </li>
                            <li>
                                <a href="{{$words['facebook']->translate(app()->getLocale())->word}}" target="_blank"><i
                                        class="ri-facebook-line"></i></a>
                            </li>

                            <li>
                                <a href="{{$words['instagram']->translate(app()->getLocale())->word}}" target="_blank"><i
                                        class="ri-instagram-line"></i></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-footer-widget footer-address-area">
                    <h3>{{$words['contact_informations']->translate(app()->getLocale())->word}}</h3>
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="flaticon-phone-call-1"></i>
                            </div>
                            <p>{{$words['contact_us']->translate(app()->getLocale())->word}}</p>
                            <a href="tel:{{$words['main_phone']->translate(app()->getLocale())->word}}">{{$words['main_phone']->translate(app()->getLocale())->word}}</a>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="flaticon-mail"></i>
                            </div>
                            <p>{{$words['email_address']->translate(app()->getLocale())->word}}</p>
                            <a href="mailto:{{$words['main_email']->translate(app()->getLocale())->word}}"><span class="__cf_email__">{{$words['main_email']->translate(app()->getLocale())->word}}</span></a>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="flaticon-place"></i>
                            </div>
                            <p>{{$words['address']->translate(app()->getLocale())->word}} </p>
                            <span>{{$words['main_address']->translate(app()->getLocale())->word}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-footer-widget footer-useful-links-area">
                    <h3>{{$words['useful_links']->translate(app()->getLocale())->word}}</h3>
                    <div class="link-list">
                        <ul>
                            <li>
                                <i class="ri-arrow-right-s-line"></i>
                                <a href="{{route('about')}}">{{$words['about']->translate(app()->getLocale())->word}}</a>
                            </li>
{{--                            <li>--}}
{{--                                <i class="ri-arrow-right-s-line"></i>--}}
{{--                                <a href="portfolio-style-one.html.htm">Geri qaytarma</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="ri-arrow-right-s-line"></i>--}}
{{--                                <a href="team.html">Çatdırılma</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="ri-arrow-right-s-line"></i>--}}
{{--                                <a href="services-style-one.html.htm">Məxfilik siyasəti</a>--}}
{{--                            </li>--}}
                            <li>
                                <i class="ri-arrow-right-s-line"></i>
                                <a href="{{route('blogs')}}">{{$words['news']->translate(app()->getLocale())->word}}</a>
                            </li>
                            <li>
                                <i class="ri-arrow-right-s-line"></i>
                                <a href="{{route('brands')}}">{{$words['brands']->translate(app()->getLocale())->word}}</a>
                            </li>
                            <li>
                                <i class="ri-arrow-right-s-line"></i>
                                <a href="{{route('shops')}}">{{$words['shops']->translate(app()->getLocale())->word}}</a>
                            </li>
                            <li>
                                <i class="ri-arrow-right-s-line"></i>
                                <a href="{{route('contact')}}">{{$words['contact']->translate(app()->getLocale())->word}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
{{--            <div class="col-lg-3 col-sm-6">--}}
{{--                <div class="single-footer-widget footer-instagram-area">--}}
{{--                    <h3>Instagram</h3>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-4">--}}
{{--                            <div class="instagram-img">--}}
{{--                                <img src="{{asset('/')}}front/images/instagram/instagram-img-1.jpg" alt="Image">--}}
{{--                                <div class="icon">--}}
{{--                                    <a href="https://instagram.com/?lang=en" target="_blank"><i--}}
{{--                                            class="flaticon-instagram-1"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-4">--}}
{{--                            <div class="instagram-img">--}}
{{--                                <img src="{{asset('/')}}front/images/instagram/instagram-img-2.jpg" alt="Image">--}}
{{--                                <div class="icon">--}}
{{--                                    <a href="https://instagram.com/?lang=en" target="_blank"><i--}}
{{--                                            class="flaticon-instagram-1"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-4">--}}
{{--                            <div class="instagram-img">--}}
{{--                                <img src="{{asset('/')}}front/images/instagram/instagram-img-3.jpg" alt="Image">--}}
{{--                                <div class="icon">--}}
{{--                                    <a href="https://instagram.com/?lang=en" target="_blank"><i--}}
{{--                                            class="flaticon-instagram-1"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-4">--}}
{{--                            <div class="instagram-img">--}}
{{--                                <img src="{{asset('/')}}front/images/instagram/instagram-img-4.jpg" alt="Image">--}}
{{--                                <div class="icon">--}}
{{--                                    <a href="https://instagram.com/?lang=en" target="_blank"><i--}}
{{--                                            class="flaticon-instagram-1"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-4">--}}
{{--                            <div class="instagram-img">--}}
{{--                                <img src="{{asset('/')}}front/images/instagram/instagram-img-5.jpg" alt="Image">--}}
{{--                                <div class="icon">--}}
{{--                                    <a href="https://instagram.com/?lang=en" target="_blank"><i--}}
{{--                                            class="flaticon-instagram-1"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-4">--}}
{{--                            <div class="instagram-img">--}}
{{--                                <img src="{{asset('/')}}front/images/instagram/instagram-img-6.jpg" alt="Image">--}}
{{--                                <div class="icon">--}}
{{--                                    <a href="https://instagram.com/?lang=en" target="_blank"><i--}}
{{--                                            class="flaticon-instagram-1"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<!--End Footer Area-->

<!--Start Copy Right Area-->
<div class="copy-right-area">
    <div class="container">
        <p>© <span>Globalavto</span> {{$words['prepared_site']->translate(app()->getLocale())->word}} <a href="https://166tech.az/" target="_blank">166Tech
                Agency</a></p>
    </div>
</div>
<!--End Copy Right Area-->

<div class="whatsApp-messenger">
    <a href="http://wa.me/{{$words['main_phone']->translate(app()->getLocale())->word}}">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2044px-WhatsApp.svg.png"
             alt="">
    </a>
</div>

<div class="callPhone">
    <a href="tel:{{$words['main_phone']->translate(app()->getLocale())->word}}">
        <img src="https://i.pinimg.com/originals/43/ac/f9/43acf98fb59be0b2aa824a682b8a2dc8.png" alt="">
    </a>
</div>

<!-- Jquery js -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('/')}}front/js/jquery.min.js"></script>
<!-- Bootstrap bundle js -->
<script src="{{asset('/')}}front/js/bootstrap.bundle.min.js"></script>
<!-- Meanmenu js -->
<script src="{{asset('/')}}front/js/jquery.meanmenu.js"></script>
<!-- Owl Carosel js -->
<script src="{{asset('/')}}front/js/owl.carousel.min.js"></script>
<!-- Magnific popup js -->
<script src="{{asset('/')}}front/js/jquery.magnific-popup.js"></script>
<!-- Aos js -->
<script src="{{asset('/')}}front/js/aos.js"></script>
<!-- Mixitup js -->
<script src="{{asset('/')}}front/js/mixitup.min.js"></script>
<!-- Odometer js -->
<script src="{{asset('/')}}front/js/odometer.min.js"></script>
<!-- Appear js -->
<script src="{{asset('/')}}front/js/appear.min.js"></script>
<!-- Form Validator js -->
<script src="{{asset('/')}}front/js/form-validator.min.js"></script>
<!-- Contact Form Script js -->
<script src="{{asset('/')}}front/js/contact-form-script.js"></script>
<!-- Ajaxchimp js -->
<script src="{{asset('/')}}front/js/ajaxchimp.min.js"></script>
<!--Custom js-->
<script src="{{asset('/')}}front/js/custom.js"></script>
</body>

</html>
