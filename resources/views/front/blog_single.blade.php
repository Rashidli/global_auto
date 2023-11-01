@include('front.includes.header')

<!--Start Blog Details Area-->
<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details">
                    <div class="top-img blog_image">
                        <img src="{{asset('storage/' . $blog->image)}}" alt="Image">
                    </div>
                    <div class="blog-details-content">
{{--                        <div class="user-and-date">--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <i class="ri-user-heart-line"></i>--}}
{{--                                    By <a href="#">Admin</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <i class="ri-calendar-check-line"></i>--}}
{{--                                    10-May-22--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <h3>{{$blog->title}}</h3>
                        <div>
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Blog Details Area-->

@include('front.includes.footer')
