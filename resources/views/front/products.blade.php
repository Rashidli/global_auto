@include('front.includes.header')
<br>
<br>
<div class="ourService container">
    <div class="section-title mb-20">
        <h2>{{$words['products']->translate(app()->getLocale())->word}}</h2>
    </div>
{{--    <p class="ourService-text">{{$words['service_slogan']->translate(app()->getLocale())->word}}</p>--}}
    <div class="ourService-boxes mt-30">
        @foreach($products as $product)
            <a href="javascript: void(0)" class="ourService-box">
                <img src="{{asset('storage/' . $product->image)  }}" alt="">
                <h5>{{$product->title}}</h5>
            </a>
        @endforeach

    </div>
</div>
<br>
<br>
<br>

@include('front.includes.footer')
