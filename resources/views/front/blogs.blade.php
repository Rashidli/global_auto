@include('front.includes.header')

<!--Start Blog Area-->
<div class="blog-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span>{{$words['news']->translate(app()->getLocale())->word}}</span>
            <h2>{{$words['news_slogan']->translate(app()->getLocale())->word}}</h2>

        </div>

        <div class="row justify-content-center">
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-sm-6">
                    <div class="single-blog-card style2">
                        <div class="blog-img">
                            <a href="{{route('blog_single', $blog->id)}}"><img src="{{asset('storage/' . $blog->image)}}"
                                                                 alt="Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul>
                                <li>
                                    <i class="ri-calendar-check-line"></i>
                                    {{$blog->created_at->format('m.d.Y')}}
                                </li>
                            </ul>
                            <h3><a href="{{route('blog_single', $blog->id)}}">{{$blog->title}}</a></h3>
                            <a href="{{route('blog_single', $blog->id)}}" class="default-btn btn for-card">{{$words['details']->translate(app()->getLocale())->word}} <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>
<!--End Blog Area-->

@include('front.includes.footer')
