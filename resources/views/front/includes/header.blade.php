<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap Css-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/bootstrap.min.css">
    <!--Meanmenu Css-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/meanmenu.css">
    <!--Owl carousel-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/owl.carousel.min.css">
    <!--Owl Theme-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/owl.theme.default.min.css">
    <!--Magnific-popup-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/magnific-popup.css">
    <!--Flaticon-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/flaticon.css">
    <!--Remixicon-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/remixicon.css">
    <!--Odometer-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/odometer.min.css">
    <!--Aos css-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/aos.css">
    <!--Style css-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/style.css">
    <!--Dark css-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/dark.css">
    <!--Responsive css-->
    <link rel="stylesheet" href="{{asset('/')}}front/css/responsive.css">
    <!--FontAweasome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>GlobalAvto</title>
    <link rel="icon" type="image/png" href="{{asset('/')}}front/images/logo.png">

</head>

<body>


<!--Start Top Header-->
<div class="tob-header-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-4">
                <div class="heder-left-content">
                    <div class="content">
                        <i class="ri-user-voice-line"></i>
                        <p>Globalavto :  {{$words['welcome']->translate(app()->getLocale())->word}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="heder-right-content">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-md-7">
                            <div class="time-content">
                                <i class="ri-time-line"></i>
                                <p>{{$words['work_hours']->translate(app()->getLocale())->word}}</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-5">
                            <div class="social-content">
                                <ul>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Top Header-->

<!-- Start Navbar Area -->
<div class="navbar-area ">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="{{route('main_page')}}">
                        <img style="width: 200px;" src="{{asset('/')}}front/images/logo.png" class="logo-icon-1" alt="logo">
                        <img style="width: 200px;" src="{{asset('/')}}front/images/logo.png" class="logo-icon-2" alt="logo">

                        <img style="width: 200px;" src="{{asset('/')}}front/images/logo.png" class="main-logo" alt="logo">
                        <img style="width: 200px;" src="{{asset('/')}}front/images/logo.png" class="white-logo" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('main_page')}}">
                    <img style="width: 200px;" src="{{asset('/')}}front/images/logo.png" class="main-logo" alt="logo">
                    <img style="width: 200px;" src="{{asset('/')}}front/images/logo.png" class="white-logo" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{route('main_page')}}" class="nav-link">
                                {{$words['main']->translate(app()->getLocale())->word}}
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link"> {{$words['about']->translate(app()->getLocale())->word}}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('brands')}}" class="nav-link ">
                                {{$words['brands']->translate(app()->getLocale())->word}}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('all_products')}}" class="nav-link ">
                                {{$words['products']->translate(app()->getLocale())->word}}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="javascript: void(0)" class="nav-link dropdown-toggle">
                                {{$words['services']->translate(app()->getLocale())->word}}
                            </a>

                            <ul class="dropdown-menu">

                                @foreach($services as $service)
                                    <li class="nav-item">
                                        <a href="{{route('service_single', $service->id)}}" class="nav-link">{{$service->title}}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('shops')}}" class="nav-link ">
                                {{$words['shops']->translate(app()->getLocale())->word}}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">
                                {{$words['credit']->translate(app()->getLocale())->word}}
                            </a>

                            <ul class="dropdown-menu">

                                @foreach($cards as $card)
                                    <li class="nav-item">
                                        <a href="{{route('card_single', $card->id)}}" class="nav-link">{{$card->title}}</a>
                                    </li>
                                @endforeach
                                <li class="nav-item">
                                    <a href="{{route('credit_form')}}" class="nav-link">{{$words['apply']->translate(app()->getLocale())->word}}</a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('blogs')}}" class="nav-link ">
                                {{$words['news']->translate(app()->getLocale())->word}}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('contact')}}" class="nav-link">{{$words['contact']->translate(app()->getLocale())->word}}</a>
                        </li>
                        <li class="nav-item">

                            <div class="changeLang dropdown">
                                <button class="activeLang btn  dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  <span style=" text-transform: capitalize;"> {{app()->getLocale()}}</span>
                                </button>
                                <ul class="changeLang-menu dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="langItem dropdown-item" style="{{app()->getLocale() === 'az' ? 'display:none' : ''}}" href="{{route('change.locale','az')}}">Az</a></li>
                                    <li><a class="langItem dropdown-item" style="{{app()->getLocale() === 'en' ? 'display:none' : ''}}" href="{{route('change.locale','en')}}">En</a></li>
                                    <li><a class="langItem dropdown-item" style="{{app()->getLocale() === 'ru' ? 'display:none' : ''}}" href="{{route('change.locale','ru')}}">Ru</a></li>
                                </ul>
                            </div>


                        </li>
                        <li class="nav-item">
                            <div class="option-item">
                                <a href="https://million.az/services/bank/Ferrium" class="default-btn btn "> {{$words['pay_credit']->translate(app()->getLocale())->word}} <i
                                        class="ri-arrow-right-line"></i></a>
                            </div>
                        </li>
                    </ul>

                </div>
        </div>
        </nav>
    </div>
</div>
</div>
<div class="others-option-for-responsive">
    <div class="container">
        <div class="dot-menu">
            <div class="inner">

            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
