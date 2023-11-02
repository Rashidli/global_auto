@include('front.includes.header')


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

@include('front.includes.footer')
