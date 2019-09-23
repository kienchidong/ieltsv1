@extends('master-layout')
@section('title')
    Chi Tiết Bài Viết
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container py-5">
            <div class="col-md-10 offset-md-1">
                <h3 class="text-center border-bot">{{$library->name}}</h3>
                <div class="d-flex flex-column course-content">
                    <span>{!! $library->content !!}</span>

                </div>
            </div>
            <div class="col-md-10 offset-md-1">
                <h5 class="text-left border-bot">Các sách liên quan</h5>
                <div class="blog-page owl-carousel owl-theme">
                    @foreach($librarys as $key=> $value)
                        <div class="item">
                            <div class="silder-image">
                                <img src="{{asset('')}}images/librarys/{{$value->image}}"
                                     alt="First slide">
                            </div>
                            <div class="home-tt-text">
                                <a href="">{{$value->name}}}</a><br>
                            </div>
                            <span style="font-size:10px">{{$value->created_at}}}</span>

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
