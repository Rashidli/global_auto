@include('front.includes.header')

<div class="birKart-aboutArea mb-30">
    <h1 class="section-title">{{$card->title}}</h1>
    <div class="about-text container">
        {!! $card->content !!}
    </div>
</div>

@include('front.includes.footer')
