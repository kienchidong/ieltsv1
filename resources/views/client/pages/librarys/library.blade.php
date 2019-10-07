@extends('client.layouts.master-layout')
@section('title')

    {{$cate_name->name}}
@endsection
@section('content')

    <section class="section-library pb-5" style="background-color : #f4f6f8">
        <div class="container-fluid">
            <div class="library-img" style="
            @if($librarybackground->image != null)
                    background-image: url('{{ asset('images/sliders/'.$librarybackground->image) }}') !important;
             @endif       ">
                {{--  <img src="image/library_img.jpg" alt="">  --}}
                <div class="col-md-12 banner-title2">
                    <span class="delay-1">t</span>
                    <span class="delay-2">h</span>
                    <span class="delay-3">ư</span>&nbsp
                    <span class="delay-4">v</span>
                    <span class="delay-5">i</span>
                    <span class="delay-5">ệ</span>
                    <span class="delay-4">n</span>&nbsp
                    <span class="delay-4">t</span>
                    <span class="delay-2">ế</span>
                    <span class="delay-1">n</span>
                    <span class="delay-3">g</span>&nbsp
                    <span class="delay-1">a</span>
                    <span class="delay-1">n</span>
                    <span class="delay-2">h</span>&nbsp
                    <span class="delay-3">c</span>
                    <span class="delay-4">ù</span>
                    <span class="delay-5">n</span>
                    <span class="delay-5">g</span>&nbsp
                    <span class="delay-4">x</span>
                    <span class="delay-3">u</span>
                    <span class="delay-2">â</span>
                    <span class="delay-1">n</span>&nbsp
                    <span class="delay-4">p</span>
                    <span class="delay-1">h</span>
                    <span class="delay-1">i</span>&nbsp
                    <span class="delay-2">i</span>
                    <span class="delay-3">e</span>
                    <span class="delay-4">l</span>
                    <span class="delay-5">t</span>
                    <span class="delay-1">s</span>
                </div>
            </div>
            <div class="container pt-4">
                <h3 style="text-align: center" class="text-uppercase">Thư viện - {{$cate_name->name}}</h3>
                {{--  <div class="book-library">
                    <div class="book-img w-clearfix">
                        <img src="image/book.jpg" alt="">
                    </div>
                    <div class="book-content">
                        <div class="book-content-content">
                            <h4>Ielst Cơ Bản</h4>
                            <span>Với sách này, thầy Bách tập trung hướng dẫn mọi người cách viết essay phần Task 2 trong
                                IELTS. Sách bao gồm phần đáp án do thầy Bách viết gồm : hướng dẫn phân tích từ khóa, hướng
                                dẫn brainstorming ý, bài viết theo phong cách đơn giản mạch lạc, giải thích từ vựng chi
                                tiết, dịch tiếng việt toàn bộ cả bài viết lẫn từ vựng để bạn ở trình độ mới bắt đầu cũng có
                                thể học theo. Toàn bộ bài viết đã được giám khảo bản xứ review -> đủ tốt để đạt band
                                8.0~9.0. Rất nhiều đề thi thật mới ra giống hệt trong sách này.</span>
                            <a href="" class="btn btn-danger">Xem thêm</a>
                        </div>
                    </div>
                </div>  --}}

                @foreach($library as $key=> $value)


                    <div class="book-library">
                        <div class="img-book">
                            <img src="{{asset('')}}images/librarys/{{$value->image}}" alt="">
                        </div>
                        <div class="content-book">
                            <div class="content-content-book">
                                <h4>{{$value->name}}</h4>
                                <div class="time-blog">
                                    <i class="fa fa-calendar-alt"></i>
                                    <span>{{Carbon\Carbon::parse($value->created_at)->format('d-m-Y')}}</span>
                                </div>
                                <br>
                                <span>{!! substr($value->summary,0,255) !!}</span>
                                <a href="{{ url('thu-vien').'/'.$cate_name->slug.'/'.$value->slug}}"
                                   class="btn btn-danger book-button">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>


                @endforeach
                <div style="float: right" align="right">
                    {{$library->links()}}
                </div>

            </div>
        </div>
    </section>

@endsection
