@extends('client.layouts.master-layout')
@section('title')
    Blog
@endsection
@section('content')
    <div class="container-fluid">
        <div class="blog-page-img" style="
            @if(isset($background) && $background->image != null)
                    background-image: url('{{ asset('images/sliders/'.$background->image) }}') !important;
             @endif">
            <div class="col-md-12 banner-title2">
               <span>Có {{ $count }} Kết quả tìm được với từ khóa: "{{ $key }}"</span>
            </div>
        </div>
        <div class="container">
            @foreach($searchs as $value)

                <div class="blog">
                    <div class="d-flex justify-content-between blog-title">
                        <a href="#" class="title-blog">{{$value->name}}</a>
                        <div class="time-blog">
                            <i class="fa fa-calendar-alt"></i>
                            <span>{{Carbon\Carbon::parse($value->created_at)->format('d-m-Y')}}</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-img">
                            <img src="{{asset('images/librarys').'/'.$value->image}}" class="img-reponsive" alt="">
                        </div>
                        <span>{!! substr($value->summary,0,256) !!}
                </span>
                        <a href="{{  url('thu-vien/'.$value->cate.'/'.$value->slug)}}" class="doctiep btn btn-outline-warning">
                            Đọc tiếp
                        </a>
                    </div>
                    <div class="border-bottom">

                    </div>
                </div>

            @endforeach
            @foreach($blogs as $value)

                <div class="blog">
                    <div class="d-flex justify-content-between blog-title">
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
                        <a href="{{ url('chia-se'.'/'.$value->slug) }}" class="doctiep btn btn-outline-warning">
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
                     
                    </div>
                </ul>
            </nav>
        </div>
    </div>


    <script type="text/javascript" src="lib/OwlCarousel 2-2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/banner-carousel-config.js"></script>
    <script type="text/javascript" src="lib/jquery.min.js"></script>
@endsection
