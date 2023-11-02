@include('front.includes.header')



<div class="ourService container">
    <div class="section-title mb-20">
        <h2>{{$words['products']->translate(app()->getLocale())->word}}</h2>
    </div>
    <div class="ourService-boxes mt-30">

        @foreach($all_products as $all_product)
            <a href="{{route('all_brends' , $all_product->id)}}" class="ourService-box">
                <img src="{{asset('storage/' . $all_product->image)  }}" alt="">
                <h5>{{$all_product->title}}</h5>
            </a>
        @endforeach

    </div>
</div>
<br>
<br>


@include('front.includes.footer')
