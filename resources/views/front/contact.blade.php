@include('front.includes.header')

<!--Start Contact Area-->
<div class="contact-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-contact-card">
                    <div class="icon">
                        <i class="flaticon-placeholder"></i>
                    </div>
                    <h3>{{$words['address']->translate(app()->getLocale())->word}}:</h3>
                    <span>{{$words['main_address']->translate(app()->getLocale())->word}}</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-contact-card">
                    <div class="icon">
                        <i class="flaticon-mail"></i>
                    </div>
                    <h3>{{$words['email_address']->translate(app()->getLocale())->word}}:</h3>
                    <a href="mailto:{{$words['main_email']->translate(app()->getLocale())->word}}"><span
                            class="__cf_email__"
                            data-cfemail="244d564d5741644349454d480a474b49">{{$words['main_email']->translate(app()->getLocale())->word}}</span></a>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-contact-card">
                    <div class="icon">
                        <i class="flaticon-phone-call-1"></i>
                    </div>
                    <h3>{{$words['phone_text']->translate(app()->getLocale())->word}}:</h3>
                    <a href="tel:{{$words['main_phone']->translate(app()->getLocale())->word}}">{{$words['main_phone']->translate(app()->getLocale())->word}}</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-contact-card">
                    <div class="icon">
                        <i class="flaticon-desktop"></i>
                    </div>
                    <h3>{{$words['fax_text']->translate(app()->getLocale())->word}}:</h3>
                    <a href="tel:{{$words['main_phone']->translate(app()->getLocale())->word}}">{{$words['main_phone']->translate(app()->getLocale())->word}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Contact Area-->


<!--Start Contact Form Area-->
<div class="contact-form-area pb-100">
    <div class="container">
        <div class="section-title">
            <span>{{$words['get_in_touch']->translate(app()->getLocale())->word}}</span>
            <h2>{{$words['need_help']->translate(app()->getLocale())->word}}</h2>
        </div>
        <div class="contacts-form">
            @if(session('message'))
                <div class="success" style="font-size: 30px;
    color: green;">{{session('message')}}</div>
            @endif
            <form  action="{{route('contact_form')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="{{$words['name']->translate(app()->getLocale())->word}}" id="name" class="form-control"
                                  required >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="{{$words['email']->translate(app()->getLocale())->word}}" class="form-control"
                                 required >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="phone_number" id="phone_number" placeholder="{{$words['number']->translate(app()->getLocale())->word}}"
                                 required  class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="{{$words['message']->translate(app()->getLocale())->word}}" id="message"
                                  required        cols="30" rows="6" ></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12">
                        <button type="submit" class="default-btn active">
                            <span> {{$words['send_message']->translate(app()->getLocale())->word}}</span>
                            <i class="ri-arrow-right-line"></i>
                        </button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Contact Form Area-->

@include('front.includes.footer')
