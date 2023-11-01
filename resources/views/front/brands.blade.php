@include('front.includes.header')

<div class="carSpare-brands container ptb-100">
    <div class="section-title mb-20">
        <h2>{{$words['brands']->translate(app()->getLocale())->word}}</h2>
    </div>
    <div class="carSpare-brands-boxes mt-30">
        @foreach($brands as $brand)
            <a href="javascript: void(0)" class="carSpare-brands-box">
                <img src="{{ asset('storage/' . $brand->image) }}" alt="">
            </a>
        @endforeach

    </div>
</div>

@include('front.includes.footer')
