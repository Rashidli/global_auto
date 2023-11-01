@include('front.includes.header')

<div class="birKart-aboutArea mb-30">
    <h1 class="section-title">
        {{$service->title}}
    </h1>
    <div class="about-text container">
        {!! $service->content !!}
    </div>
</div>

@include('front.includes.footer')
