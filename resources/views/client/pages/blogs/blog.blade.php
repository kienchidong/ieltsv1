@extends('client.layouts.master-layout')
@section('title')
    Blog
@endsection
@section('content')
    <div class="container-fluid">
        <div class="blog-page-img">
            <div class="col-md-12 banner-title2">
                <span class="delay-1">B</span>
                <span class="delay-2">L</span>
                <span class="delay-3">O</span>
                <span class="delay-4">G</span>&nbsp

                <span class="delay-5">T</span>
                <span class="delay-2">I</span>
                <span class="delay-5">Ế</span>
                <span class="delay-4">N</span>
                <span class="delay-4">G</span>&nbsp

                <span class="delay-1">A</span>
                <span class="delay-3">N</span>
                <span class="delay-1">H</span>
            </div>
        </div>
        <div class="container">
            @foreach($blogs as $value)

                <div class="blog">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="title-blog">{{$value->name}}</a>
                        <div class="time-blog">
                            <i class="fa fa-calendar-alt"></i>
                            <span>{{Carbon\Carbon::parse($value->created_at)->format('d-m-Y')}}</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-img">
                            <img src="{{asset('images/blogs').'/'.$value->image}}" class="img-reponsive" alt="">
                        </div>
                        <span>{!! substr($value->summary,0,256) !!}
                </span>
                        <a href="{{  url('chia-se'.'/'.$value->slug)}}" class="doctiep btn btn-outline-danger">
                            Đọc tiếp
                        </a>
                    </div>
                    <div class="border-bottom">

                    </div>
                </div>

            @endforeach


            <nav aria-label="Page navigation example" class="text-right">
                <ul class="pagination">
                    <div style="float: right" align="right">
                        {{$blogs->links()}}
                    </div>
                </ul>
            </nav>
        </div>
    </div>


    <script type="text/javascript" src="lib/OwlCarousel 2-2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/banner-carousel-config.js"></script>
    <script type="text/javascript" src="lib/jquery.min.js"></script>
@endsection
