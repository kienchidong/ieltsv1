@extends('client.layouts.master-layout')
@section('title')
    Chi Tiết Blog
@endsection
@section('content')
<div class="container-fluid">
    <div class="container py-5">
        <div class="col-md-10 offset-md-1">
            <h3 class="text-center border-bot">{{$blog->name}}</h3>
            <div class="d-flex flex-column course-content">
                {!! $blog->content !!}
                <h6 class="text-right">Xuan Phi</h6>
            </div>
        </div>
        <div class="col-md-10 offset-md-1">
                <h5 class="text-left border-bot">Các blog liên quan</h5>
                <div class="blog-page owl-carousel owl-theme">
                    @foreach($blogs as $value)
                        <div class="item">
                            <div class="silder-image">
                                <img width="100%" height="160px" src="{{asset('images/blogs').'/'.$value->image}}"
                                     alt="First slide">
                            </div>
                            <div class="home-tt-text">
                                <a href="{{ route('client.blogs.detail',$value->slug)}}">{{Str::substr($value->name,0,25)}}</a><br>
                                <span style="font-size:10px">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)}}</span>
                            </div>

                        </div>
                    @endforeach


                    </div>
        </div>


        <script type="text/javascript" src="lib/jquery.min.js"></script>
        <script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/banner-carousel-config.js"></script>


    </div>
</div>
@endsection
