@include('front.includes.header')
<br>
<br>
<div class="ourService container">
    <div class="section-title mb-20">
        <h2>{{$words['products']->translate(app()->getLocale())->word}}</h2>
    </div>
    {{--    <p class="ourService-text">{{$words['service_slogan']->translate(app()->getLocale())->word}}</p>--}}
    <div class="ourService-boxes mt-30">
        @foreach($oilproducts as $oilproduct)
            <a href="javascript: void(0)" class="ourService-box">
                <img src="{{asset('storage/' . $oilproduct->image)  }}" alt="">
                <h5>{{$oilproduct->title}}</h5>
            </a>
        @endforeach

    </div>
</div>
<br>
<br>
<br>

@include('front.includes.footer')
<?php
