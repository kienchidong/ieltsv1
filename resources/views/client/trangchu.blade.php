@extends('client.layouts.master-layout')

@section('title')
    Trang Chủ
@endsection
@section('content')
    @include('client.layouts.banner1')
    {{--  <section class="section-1">
        <div class="container">
            <h3 class="section-title">4 bước để chinh phục kỳ thi ielst</h3>
            <div class="process-bg">
                <img src="image/process-bg.png" alt="">
                <div class="row d-flex justify-content-around">
                    <div class="process prc-1">
                        <img src="image/process1.png" alt="">
                        <span class="process-content">Kiểm tra trình độ</span>
                    </div>
                    <div class="process prc-2">
                        <img src="image/process2.png" alt="">
                        <span class="process-content">Đăng ký khóa học</span>
                    </div>
                    <div class="process prc-3">
                        <img src="image/process3.png" alt="">
                        <span class="process-content">Nâng cao kiến thức</span>
                    </div>
                    <div class="process prc-4">
                        <img src="image/process4.png" alt="">
                        <span class="process-content">Tự tin bước vào phòng thi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>  --}}
    <section class="section-11" style="background-image: url(http://localhost/ieltsv1/public/image/workshop.jpg) !important">
        <div class="back-ground" style="background : #000"></div>
        <div class="container-fluid">
            <div class="container work-shop">
                <div>
                    {{--  <span>The Ielts</span>
                    <span>Work Shop</span>  --}}
                    {{--  <a href="">Xem Thêm</a>  --}}
                </div>

            </div>
        </div>
    </section>
    <section class="section-2">
        <div class="container-fluid">
            <div class="container">
                <h3 class="section-title pt-4">Hot Posts</h3>
                <div class="row pb-5">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="course-box">
                            <img src="image/course.jpg" alt="">
                            <div class="overlay">
                                <div class="course-title">
                                <span>
                                    Dành cho những bạn đặt mục tiêu 5.5 – 6.5+ IElst và cao hơn
                                    Khoá học bao gồm 24 buổi học, tuyển tập tài liệu bổ trợ miễn phí, chấm bài essay và
                                    kiểm
                                    tra hàng tuần
                                </span>
                                    <div class="d-flex justify-content-between mt-3">
                                        <span class="text-uppercase pt-1">senior</span>
                                        <span class="course-gia">6.500.000</span>
                                    </div>
                                    <a class="view-more" href="">Xem Thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="course-box">
                            <img class="img-responsive" src="image/course.jpg" alt="">
                            <div class="overlay">
                                <div class="course-title">
                                <span>
                                    Dành cho những bạn đặt mục tiêu 5.5 – 6.5+ IElst và cao hơn
                                    Khoá học bao gồm 24 buổi học, tuyển tập tài liệu bổ trợ miễn phí, chấm bài essay và
                                    kiểm
                                    tra hàng tuần
                                </span>
                                    <div class="d-flex justify-content-between mt-3">
                                        <span class="text-uppercase pt-1">senior</span>
                                        <span class="course-gia">6.500.000</span>
                                    </div>
                                    <a class="view-more" href="">Xem Thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="course-box">
                            <img class="img-responsive" src="image/course.jpg" alt="">
                            <div class="overlay">
                                <div class="course-title">
                                <span>
                                    Dành cho những bạn đặt mục tiêu 5.5 – 6.5+ IElst và cao hơn
                                    Khoá học bao gồm 24 buổi học, tuyển tập tài liệu bổ trợ miễn phí, chấm bài essay và
                                    kiểm
                                    tra hàng tuần
                                </span>
                                    <div class="d-flex justify-content-between mt-3">
                                        <span class="text-uppercase pt-1">senior</span>
                                        <span class="course-gia">6.500.000</span>
                                    </div>
                                    <a class="view-more" href="">Xem Thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="thuvien" class="section-thuvien" style="    background-image: url(http://localhost/ieltsv1/public/image/library.jpg) !important">
        <div class="container-fluid" id="library">
            <div class="container">
                <h3 class="section-title text-white">Thư viện</h3>
                <div class="library">

                    @foreach($cate_librarys as $value)
                        <a href="{{route('client.librarys.index',$value->slug)}}">
                            <div class="library-box">
                                <div class="box-chu">

                                </div>
                                <span>{{$value->name}}</span>
                                {{--  <i class="fa fa-headphones fa-3x text-center"></i>  --}}
                                <img src="{{asset('images/cate-librarys').'/'.$value->icon}}" alt="">
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="section-3">
        <div class="container-fluid">
            <div class="container" id="khoahoc">
                <h3 class="section-title">Khóa học</h3>
                <div class="row pb-5">

                    <div class="col-md-6 library-left">
                        <h5 id="khoahoc" class="section-title">Offline</h5>
                        <a href="{{ url('landing') }}">
                            <div class="tree-skill">
                                <img class="tree" src="image/tree1.png" alt="">
                                <div class="skill">
                                    <a href="{{ url('landing') }}">
                                        Khóa rễ
                                    </a>
                                </div>
                                <div class="skill skill-2">
                                    <a href="{{ url('landing') }}">
                                        Khóa gốc
                                    </a>
                                </div>
                                <div class="skill skill-3">
                                    <a href="{{ url('landing') }}">
                                        Khóa thân
                                    </a>
                                </div>
                                <div class="skill skill-4">
                                    <a href="{{ url('landing') }}">
                                        Khóa ngọn
                                    </a>
                                </div>
                        </a>
                    </div>

                </div>
                <div class="col-md-6 library-right">
                    <h5 class="section-title">Online</h5>
                    <div class="row">
                        <div class="col-md-12 mt-5">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/VBBrkpDp_3U"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            <a class="dk-online btn btn-outline-secondary" href="">Tìm Hiểu Thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    {{--  <section class="section-4">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 statistic">
                        <i class="fa fa-book fa-5x"></i>
                        <span class="stat-count">2228</span>
                        <span>E-Book Được bán</span>
                    </div>
                    <div class="col-md-3 statistic">
                        <i class="fa fa-briefcase fa-5x"></i>
                        <span class="stat-count">20</span>
                        <span>Khóa học</span>
                    </div>
                    <div class="col-md-3 statistic">
                        <i class="fa fa-calendar-check fa-5x"></i>
                        <span class="stat-count">2228</span>
                        <span>Học viên</span>
                    </div>
                    <div class="col-md-3 statistic">
                        <i class="fa fa-graduation-cap fa-5x"></i>
                        <span class="stat-count">2228</span>
                        <span>Học viên đạt 6.5 Ilest</span>
                    </div>
                </div>
            </div>
        </div>
    </section>  --}}
    {{--  <section class="section-5">
        <div class="container-fluid">
            <div class="container">
                <h3 class="section-title">Giáo Viên Ielst</h3>
                <div class="row teacher">
                    <div class="col-md-3">
                        <div class="avatar-teacher">
                            <img src="image/1.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-9 d-flex flex-column">
                        <span class="teacher-name">
                            <span> Thầy : Trần Hồng Dũng</span>
                        </span>
                        <span class="teacher-info">
                            Đạt điểm Ielst 8.5 Năm 2019
                        </span>
                        <span class="teacher-info">
                            Giảng viên đại học quốc gia Việt Nam
                        </span>
                        <span class="teacher-info">
                            Du học Anh từ 2010 - 2018
                        </span>
                        <span>Thông tin thêm Facebook : <a href="">Trần Hồng Dũng</a></span>
                    </div>
                </div>
                <div class="row teacher">
                    <div class="col-md-3 order-2">
                        <div class="avatar-teacher">
                            <img src="image/1.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-9 order-1 d-flex flex-column">
                        <span class="teacher-name">
                            <span> Thầy : Trần Hồng Dũng</span>
                        </span>
                        <span class="teacher-info">
                            Đạt điểm Ielst 8.5 Năm 2019
                        </span>
                        <span class="teacher-info">
                            Giảng viên đại học quốc gia Việt Nam
                        </span>
                        <span class="teacher-info">
                            Du học Anh từ 2010 - 2018
                        </span>
                        <span>Thông tin thêm Facebook : <a href="">Trần Hồng Dũng</a></span>
                    </div>
                </div>
                <div class="row teacher">
                    <div class="col-md-3">
                        <div class="avatar-teacher">
                            <img src="image/1.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-9 d-flex flex-column">
                        <span class="teacher-name">
                            <span> Thầy : Trần Hồng Dũng</span>
                        </span>
                        <span class="teacher-info">
                            Đạt điểm Ielst 8.5 Năm 2019
                        </span>
                        <span class="teacher-info">
                            Giảng viên đại học quốc gia Việt Nam
                        </span>
                        <span class="teacher-info">
                            Du học Anh từ 2010 - 2018
                        </span>
                        <span>Thông tin thêm Facebook : <a href="">Trần Hồng Dũng</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>  --}}
    <section id="blog" class="section-6 pb-4">
        <div class="container-fluid">
            <div class="container">
                <h3 class="section-title">
                    Blog Chia Sẻ
                </h3>
                @foreach($blogs as $value)

                    <div class="blog">
                        <div class="d-flex justify-content-between blog-title">
                            <a href="{{ route('client.blogs.detail',$value->slug)}}"
                               class="title-blog">{{Str::substr($value->name,0,100)}}</a>
                            <div class="time-blog">
                                <i class="fa fa-calendar-alt"></i>
                                <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d-m-Y')}}</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-img">
                                <img src="{{asset('images/blogs/'.$value->image)}}" class="img-reponsive" alt="">
                            </div>
                            <span>{{ Str::substr($value->summary,0,256) }}
                    </span>
                            <a href="{{ route('client.blogs.detail',$value->slug) }}"
                               class="doctiep btn btn-outline-danger">
                                Đọc tiếp
                            </a>
                        </div>
                        <div class="border-bottom">

                        </div>
                    </div>
                @endforeach
                <div style="text-align: center">
                    <a class="btn btn-xuanphi" href="{{ route('client.blogs.index') }}">Xem Thêm</a>
                </div>

            </div>
        </div>
        </div>
    </section>
    <section class="section-7">
        <div class="back-ground"></div>
        <div class="container-fluid">
            <div class="container danhgia">
                <h3 class="section-title text-dark">Cảm nhận của học viên về Xuan Phi Ielst</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="coment-box">
                            <div class="comment-title">
                                Em chả biết nói gì ngoài việc e rất yêu cô Thủy :)) học hết khóa đầu rất nhớ cô, chỉ
                                muốn đi
                                học cô tiếp
                                :( Cô rất tận tình nè, hiền nè, xinh nè, giảng hay dễ hiểu nè, khiến e ko sợ đi học nữa,
                                cô
                                cũng buồn cười nữa =)
                            </div>
                            <div class="coment-member">
                                <div class="comment-avt">
                                    <img src="https://photo-3-baomoi.zadn.vn/w1000_r1/2018_10_03_180_28002521/27ad3ab469f580abd9e4.jpg"
                                         alt="">
                                </div>
                                <div class="coment-name">
                                    <a href="">Hoàng Thu Hà</a> <br>
                                    <span>Khóa Ielst-01</span>
                                    <div class="star">
                                        <i class="fa fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="coment-box">
                            <div class="comment-title">
                                Em chả biết nói gì ngoài việc e rất yêu cô Thủy :)) học hết khóa đầu rất nhớ cô, chỉ
                                muốn đi
                                học cô tiếp
                                :( Cô rất tận tình nè, hiền nè, xinh nè, giảng hay dễ hiểu nè, khiến e ko sợ đi học nữa,
                                cô
                                cũng buồn cười nữa =)
                            </div>
                            <div class="coment-member">
                                <div class="comment-avt">
                                    <img src="https://photo-3-baomoi.zadn.vn/w1000_r1/2018_10_03_180_28002521/27ad3ab469f580abd9e4.jpg"
                                         alt="">
                                </div>
                                <div class="coment-name">
                                    <a href="">Hoàng Thu Hà</a> <br>
                                    <span>Khóa Ielst-01</span>
                                    <div class="star">
                                        <i class="fa fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="coment-box">
                            <div class="comment-title">
                                Em chả biết nói gì ngoài việc e rất yêu cô Thủy :)) học hết khóa đầu rất nhớ cô, chỉ
                                muốn đi
                                học cô tiếp
                                :( Cô rất tận tình nè, hiền nè, xinh nè, giảng hay dễ hiểu nè, khiến e ko sợ đi học nữa,
                                cô
                                cũng buồn cười nữa =)
                            </div>
                            <div class="coment-member">
                                <div class="comment-avt">
                                    <img src="https://photo-3-baomoi.zadn.vn/w1000_r1/2018_10_03_180_28002521/27ad3ab469f580abd9e4.jpg"
                                         alt="">
                                </div>
                                <div class="coment-name">
                                    <a href="">Hoàng Thu Hà</a> <br>
                                    <span>Khóa Ielst-01</span>
                                    <div class="star">
                                        <i class="fa fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                        <i class="fas fa-star star-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        (function ($) {
            function count($this) {
                var current = parseInt($this.html(), 10);
                current = current + 1;
                $this.html(++current);
                if (current > $this.data('count')) {
                    $this.html($this.data('count'))
                } else {
                    setTimeout(function () {
                        count($this)
                    }, 50) // Tốc độ đếm số, số 1 là nhanh nhất
                }
            }

            $(".stat-count").each(function () {
                $(this).data('count', parseInt($(this).html(), 10));
                $(this).html('0');
                count($(this))
            })
        })(jQuery);


    </script>


    <script type="text/javascript" src="lib/OwlCarousel 2-2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/banner-carousel-config.js"></script>
    <script type="text/javascript" src="lib/jquery.min.js"></script>
    </section>

@endsection
