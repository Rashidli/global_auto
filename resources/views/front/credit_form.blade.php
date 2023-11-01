@include('front.includes.header')

<!--Start Contact Form Area-->
<div class="contact-form-area pb-100">
    <div class="container">
        <div class="section-title">
            <span>{{$words['get_in_touch']->translate(app()->getLocale())->word}}</span>
            <h2>{{$words['need_credit']->translate(app()->getLocale())->word}}</h2>
        </div>
        <div class="contacts-form">
            @if(session('message'))
                <div class="success" style="font-size: 30px;
    color: green;">{{session('message')}}</div>
            @endif
            <form  action="{{route('apply_credit')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="{{$words['names']->translate(app()->getLocale())->word}}" id="name" class="form-control"
                                   required >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="date" name="birth_date" placeholder="{{$words['birth_date']->translate(app()->getLocale())->word}}" class="form-control"
                                   required >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="license" placeholder="{{$words['license']->translate(app()->getLocale())->word}}" class="form-control"
                                   required >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="fin_code" placeholder="{{$words['fin_code']->translate(app()->getLocale())->word}}" class="form-control"
                                   required >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="address" placeholder="{{$words['address']->translate(app()->getLocale())->word}}" class="form-control"
                                   required >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="home_number"  placeholder="{{$words['home_number']->translate(app()->getLocale())->word}}" class="form-control"
                                   required >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="company"  placeholder="{{$words['company']->translate(app()->getLocale())->word}}" class="form-control"
                                   required >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="salary"  placeholder="{{$words['salary']->translate(app()->getLocale())->word}}" class="form-control"
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
                                <textarea name="message" class="form-control" placeholder="{{$words['credit_message']->translate(app()->getLocale())->word}}" id="message"
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
