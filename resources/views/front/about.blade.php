@include('front.includes.header')

<div class="aboutArea mb-30">
    <h1 class="section-title">{{$about->title}}</h1>
    <div class="about-text container">
        {!! $about->content !!}
    </div>
</div>

@include('front.includes.footer')
