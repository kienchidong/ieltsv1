<!DOCTYPE html>
<html lang="en">

<head>
    <title>Khóa học offline</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('image/logo11.png') }}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('')}}admin_example/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
{{--  <link rel="stylesheet" href="{{asset('')}}admin_example/bower_components/font-awesome/css/font-awesome.min.css">
--}}
<!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('')}}admin_example/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('')}}css/landing-page.css">
    {{--  <link rel="stylesheet" href="{{asset('')}}css/style.css"> --}}
    <link rel="stylesheet" href="{{asset('owl-carousel/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('owl-carousel/owlcarousel/assets/owl.theme.default.min.css')}}">

    <link rel="stylesheet" type="text/css" href="lib/fontawesome.5.7.2/css/all.min.css">
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{asset('owl-carousel/owlcarousel/owl.carousel.js')}}"></script>
    <script src="https://kit.fontawesome.com/2476b12f4d.js"></script>

    <link rel="stylesheet" href="{{ asset('alertify/alertify.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('alertify/alertify.core.css') }}">
    <link rel="stylesheet" href="{{ asset('alertify/alertify.default.css') }}">
    <script src="{{ asset('alertify/alertify.min.js') }}"></script>
    <script language="javascript">
        $(document).ready(function () {
            start();
        });
        var date = new Date();
        var time = new Date('{{ $time->date }}').getTime();
        var distance = time-date.getTime();
        var d = Math.floor(distance / (1000 * 60 * 60 * 24))+1; //ngày

        var h = 24 - parseInt(date.getHours()); // Giờ
        var m = 60 - parseInt(date.getMinutes()); // Phút
        var s = 60 - parseInt(date.getSeconds()); // Giây

        var timeout = null; // Timeout

        function start() {
            if (d === null) {
                d = 0;
                h = 0;
                m = 0;
                s = 0;
            }

            if (s === -1) {
                m -= 1;
                s = 59;
            }
            if (m === -1) {
                h -= 1;
                m = 59;
            }

            if (h === -1) {
                d -= 1;
                h = 23;
            }
            if (d === -1) {
                clearTimeout(timeout);
                alert('Hết giờ');
                return false;
            }

            document.getElementById('day-count').innerText = d.toString();
            document.getElementById('hour-count').innerText = h.toString();
            document.getElementById('minute-count').innerText = m.toString();
            document.getElementById('second-count').innerText = s.toString();

            timeout = setTimeout(function () {
                s--;
                start();
            }, 1000);
        }

        function stop() {
            clearTimeout(timeout);
        }

    </script>
</head>

<body style="background-color: #f4f6f8">
@if(session('thongbao'))
    <script type="text/javascript">
        alertify.success('{{ session('thongbao') }}');
    </script>
@endif
@if(session('error'))
    <script type="text/javascript">
        alertify.error('{{ session('error') }}');
    </script>
@endif
@if(count($errors) > 0)
    <script type="text/javascript">
        @foreach($errors->all() as $err)
        alertify.error('{{ $err }}');
        @endforeach
    </script>

@endif
<section class="header-landing" style="background-image: url('{{ asset('image/bg1.jpg') }}') !important;">
    <div style="background: rgba(0,0,0,0.3)">

        <div class="container-fluid">
            <div class="container">
                <div class="logo" style="padding: 10px">
                    <a href="{{ url('') }}">
                        <img src="{{ asset('images/logo/'.$introduces->logo) }}" width="100px" alt="">
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row landing-count">
                            <h4 class="text-landing text-uppercase">Nhanh tay lên để nhận được Ưu đãi</h4>
                            <div class="count-count">
                                <div class="vu">
                                    <h5 class="text-landing">Ngày</h5>
                                    <span id="day-count" class="number-count" title="ngày">Ngày</span>
                                </div>
                                <div class="vu">
                                    <h5 class="text-landing">Giờ</h5>
                                    <span id="hour-count" class="number-count" title="giờ">Giờ</span>
                                </div>
                                <div class="vu">
                                    <h5 class="text-landing">Phút</h5>
                                    <span id="minute-count" class="number-count" title="phút">Phút</span>
                                </div>
                                <div class="vu">
                                    <h5 class="text-landing">Giây</h5>
                                    <span id="second-count" class="number-count" title="giây">Giây</span>
                                </div>
                            </div>
                            <div class="count-form col-12 col-lg-12 col-sm-12 col-md-12">
                                <form action="{{ route('information') }}" method="post">
                                @csrf
                                    <input type="text" class="count-input" name="name" required placeholder="Họ và tên" value="{{ old('name') }}"/>
                                    <input type="text" class="count-input" name="email" required placeholder="Nhập Email" value="{{ old('email') }}"/>
                                    <input type="text" class="count-input" name="phone" required placeholder="Nhập Sô điện thoại" value="{{ old('phone') }}"/>
                                    <input type="submit" value="GỬI LIÊN HỆ TỚI CHÚNG TÔI">
                                </form>
                            </div>


                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="landing-offline">
                            <h3 class="title-ss" style="color: white">HỌC OFFLINE TRỰC TIẾP<br> <span
                                        style="text-align: center">CÙNG
                                    XUÂN PHI IELTS</span>
                            </h3>

                        </div>
                        <hr>
                        <div class="landing-dangky">
                            <a target="_blank" class="btn btn-dangky" href="{{$registration->link}}">Đăng
                                Ký</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-lg-12 col-md-12 landing-infor">
                    <div class="row">
                        <div class="col-md-3 hihi d-flex">
                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            <span>
                                <strong>Hotline:</strong><br>
                                <span>{{ $introduces->phone }}</span>
                            </span>
                        </div>
                        <div class="col-md-6 hihi d-flex">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                <strong>Địa chỉ :</strong><br>
                                <span>{{ $introduces->address }}</span>
                            </span>
                        </div>
                        <div class="col-md-3 hihi d-flex">
                            <i class="fab fa-facebook-square"></i>
                            <span>
                                <strong>Facebook:</strong><br>
                                <span><a style="color : black" target="_blank" href="{{ $introduces->facebook }}">Xuân Phi</a></span>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<section class="landing-lydo">
    <h1>4 Lý do chọn Xuân Phi IELTS</h1>
    <div class="container">
        <div class="row" style="text-align: center">
            <div class="col-md-3 item-lydo">
                <div class="lydo">
                    <img src="{{ asset('') }}/image/offline1.png" width="150px" alt="">
                    <h4>Chương trình cá nhân hoá</h4>
                </div>
            </div>
            <div class="col-md-3 item-lydo">
                <div class="lydo">
                    <img src="{{ asset('') }}/image/offline2.png" width="150px" alt="">
                    <h4>Giảng viên tận tâm</h4>
                </div>
            </div>
            <div class="col-md-3 item-lydo">
                <div class="lydo">
                    <img src="{{ asset('') }}/image/offline3.png" width="150px" alt="">
                    <h4>Tài liệu cập nhật</h4>
                </div>
            </div>
            <div class="col-md-3 item-lydo">
                <div class="lydo">
                    <img src="{{ asset('') }}/image/offline4.png" width="150px" alt="">
                    <h4>Truyền đạt dễ hiểu</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-khoahoc">
    <div class="container-fluid container-kh">
        <div class="khoahoc">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/course_offlines').'/'.$course_offlines[0]->image }}" alt="" width="100%"
                         height="100%">
                </div>
                <div class="col-md-6">
                    <h3>{{$course_offlines[0]->name}}</h3>
                    {!! $course_offlines[0]->content !!}
                </div>
            </div>
        </div>
        <div class="container-fluid kh2">
            <div class="khoahoc container-kh kh2">
                <div class="row">

                    <div class="col-md-6 order-0">
                        <h3>{{$course_offlines[1]->name}}</h3>
                        {!! $course_offlines[1]->content !!}
                    </div>
                    <div class="col-md-6 order-1">
                        <img src="{{ asset('images/course_offlines').'/'.$course_offlines[0]->image }}" alt=""
                             width="100%" height="100%">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid container-kh">
            <div class="khoahoc">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('images/course_offlines').'/'.$course_offlines[0]->image }}" alt=""
                             width="100%" height="100%">
                    </div>
                    <div class="col-md-6">
                        <h3>{{$course_offlines[2]->name}}</h3>
                        {!! $course_offlines[2]->content !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid kh2">
            <div class="khoahoc container-kh kh2">
                <div class="row">

                    <div class="col-md-6 order-0">
                        <h3>{{$course_offlines[3]->name}}</h3>
                        {!! $course_offlines[3]->content !!}
                    </div>
                    <div class="col-md-6 order-1">
                        <img src="{{ asset('images/course_offlines').'/'.$course_offlines[0]->image }}" alt=""
                             width="100%" height="100%">
                    </div>
                </div>
            </div>
        </div>

</section>
c</section>
<section id="teacher">
    <div class="container">
        <h3 class="title-ss">Đội Ngũ Giảng Dạy</h3>
        <div class="home-demo">
            <div class="row">
                <div class="large-12 columns">
                    <div class="owl-carousel">
                        @foreach($teacher as $value)
                            <div class="item container-image">

                                <img src="{{ asset('images/teachers').'/'.$value->image }}" style="width: 100%; height: 350px" alt=""
                                     class="image">
                                <div class="middle">
                                    <h4>{{$value->name}}</h4>
                                    <span>{{$value->position}}</span>
                                    <br>

                                    {{$value->content}}
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="khoahoc-now">
    <div class="container">
        <h3 class="title-ss">Khoá học đang tuyển sinh</h3>
        <div class="home-demo">
            <div class="row">
                <div class="large-12 columns">
                    <div class="owl-carousel">
                        @foreach($course_enrolling as $value)
                            <div class="item">

                                <div class="teacher-infor">
                                    <img src="{{ asset('images/course_enrolling').'/'.$value->image }}"
                                         style="width: 100%; height: 350px" alt="">
                                    <div class="name-ts">
                                        <h4>{{$value->name}}</h4>
                                    </div>
                                </div>


                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="text-center">
        <a target="_blank" class="btn btn-trinhdo" href="{{$registration->link}}">Đăng ký kiểm tra trình
            độ</a>
    </div>
</section>
<section class="section-7">
    <div class="back-ground"></div>
    <div class="container-fluid">
        <div class="container danhgia">
            <h3 class="title-ss" style="z-index : 20 ;position: relative;">Cảm nhận của học viên về Xuan Phi IeLTS
            </h3>
            <div class="row">
                @foreach($student as $value)
                    <div class="col-md-4">
                        <div class="coment-box">
                            <div class="comment-title">
                                {!! $value->content !!}
                            </div>
                            <div class="coment-member">
                                <div class="comment-avt">
                                    <img src="{{asset('images/student').'/'.$value->image}}"
                                         alt="">
                                </div>
                                <div class="coment-name">
                                    <a href="">{{$value->name}}</a> <br>
                                    <span>{{$value->course}}</span>
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
                @endforeach


            </div>
        </div>
    </div>
</section>
<section id="lienhe">
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-6 col-sm-6 col-md-6">
                <h2>Liên hệ chúng tôi</h2>
                <iframe class="mt-4"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1
                d3724.2375398297418!2d105.80500911457912!3d21.02317939334537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab687560f3ad%3A0xa5522c45c9015e23!2zS2jDoWNoIHPhuqFuIERyZWFtIEhvdXNl!5e0!3m2!1svi!2s!4v1568473282304!5m2!1svi!2s"
                        width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                <p style="line-height: 35px">
                    <span>Địa chỉ : {{ $introduces->address }}</span><br>
                    <span> Hotline: {{ $introduces->phone }}</span><br>
                    <span> Email: {{ $introduces->email }}</span><br>
                </p>
            </div>
            <div class="col-6 col-lg-6 col-sm-6 col-md-6">
                <h2 style="margin-left : 8px">Đăng ký để nhận ưu đãi sớm nhất</h2>
                <div class="form-dk">
                    <form action="{{ route('information') }}" method="post">
                    @csrf
                        <input type="text" name="name" required placeholder="Họ Và Tên" value="{{ old('name') }}"/>
                        <input type="email" name="email" required placeholder="Nhập Email" value="{{ old('email') }}"/>
                        <input type="text" name="phone" required placeholder="Nhập Số Điện Thoại" value="{{ old('phone') }}"/>
                        <textarea name="message" required id="" cols="15" rows="5"
                                  placeholder="Để lại lời nhắn cho chúng tôi">{{ old('message') }}</textarea>
                        <input type="submit" value="GỬI ĐI">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        margin: 10,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    })

</script>

</html>
