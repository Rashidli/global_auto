@include('front.includes.header')



<div class="ourService container">
    <div class="section-title mb-20">
        <h2>{{$words['brands']->translate(app()->getLocale())->word}}</h2>
    </div>
    <div class="ourService-boxes mt-30">

        @foreach($all_brends as $all_brend)
            <a href="javascript: void(0)" class="ourService-box">
                <img src="{{asset('storage/' . $all_brend->image)  }}" alt="">
                <h5>{{$all_brend->title}}</h5>
            </a>
        @endforeach

    </div>
</div>
<br>
<br>


@include('front.includes.footer')
