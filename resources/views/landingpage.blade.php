<!DOCTYPE html>
<html lang="en">
<head>
    <title>Landing page</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-kien.png') }}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('')}}admin_example/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('')}}admin_example/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('')}}admin_example/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('')}}css/landing-page.css">
    <link rel="stylesheet" href="{{asset('owl-carousel/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('owl-carousel/owlcarousel/assets/owl.theme.default.min.css')}}">

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{asset('owl-carousel/owlcarousel/owl.carousel.js')}}"></script>
    <script language="javascript">
        $(document).ready(function () {
            start();
        });
        var date = new Date();
        var d = 31 - parseInt(date.getDate()); // ngày
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
<body>
<section class="header-landing" style="background-image: url('{{ asset('image/bg1.jpg') }}') !important;">
    <div style="background: rgba(0,0,0,0.3)">
        <div class="container-landing">
            <div class="row">
                <div class="col-12 col-lg-12 col-sm-12 col-md-12">
                    <a href="{{ url('') }}">
                        <img src="{{ asset('image/logo.png') }}" alt="" width="8%">
                    </a>
                </div>
                <div class="col-5 col-lg-5 col-sm-5 col-md-5">
                    <div class="landing-count">

                        <div class="row count-content">
                            <h4 class="text-landing">Nhanh tay lên<br> Bạn muốn nhận được Ưu đãi</h4>
                            <div class="col-3 col-lg-3 col-sm-3 col-md-3">
                                <h5 class="text-landing">Ngày</h5>
                                <span id="day-count" class="number-count" title="ngày">Ngày</span>
                            </div>
                            <div class="col-3 col-lg-3 col-sm-3 col-md-3">
                                <h5 class="text-landing">Giờ</h5>
                                <span id="hour-count" class="number-count" title="giờ">Giờ</span>
                            </div>
                            <div class="col-3 col-lg-3 col-sm-3 col-md-3">
                                <h5 class="text-landing">Phút</h5>
                                <span id="minute-count" class="number-count" title="phút">Phút</span>
                            </div>
                            <div class="col-3 col-lg-3 col-sm-3 col-md-3">
                                <h5 class="text-landing">Giây</h5>
                                <span id="second-count" class="number-count" title="giây">Giây</span>
                            </div>
                            <div class="count-form col-12 col-lg-12 col-sm-12 col-md-12">
                                <form action="" method="post">
                                    @csrf
                                    <input type="text" class="count-input" name="name" required
                                           placeholder="Họ và tên"/>
                                    <input type="text" class="count-input" name="email" required
                                           placeholder="Nhập Email"/>
                                    <input type="text" class="count-input" name="phone" required
                                           placeholder="Nhập Sô điện thoại"/>
                                    <input type="submit" value="GỬI LIÊN HỆ TỚI CHÚNG TÔI">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-7 col-lg-7 col-sm-7 col-md-7">
                    <div class="landing-offline">
                        <h3 style="color: white">HỌC OFFLINE TRỰC TIẾP<br> <span style="text-align: center">CÙNG XUÂN PHI IELTS</span>
                        </h3>

                    </div>
                    <hr>
                    <div class="landing-dangky">
                        <h3>Hà Đức Kiên</h3>

                        <a class="btn btn-dangky" href="#">Đăng Ký</a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-12 col-md-12 landing-infor">
                    <div class="row">
                        <div class="col-4 col-md-4 col-lg-4 col-sm-4">
                            <div class="left">
                                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            </div>
                            <div class="right">
                            <span>
                            <strong>HotLine:</strong><br>
                            <span>096 8907276</span>
                        </span>
                            </div>

                        </div>
                        <div class="col-4 col-md-4 col-lg-4 col-sm-4">
                            <div class="left">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="right">
                            <span>
                            <strong>Địa Điểm:</strong><br>
                            <span>Số 9A, Ngõ 9, Hoàng cầu</span>
                        </span>
                            </div>

                        </div>
                        <div class="col-4 col-md-4 col-lg-4 col-sm-4">
                            <div class="left">
                                <i class="fa fa-facebook-official" aria-hidden="true"></i>
                            </div>
                            <div class="right">
                                <h3><a href="#" style="color: black;">FaceBook</a></h3>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="landing-lydo">
    <h1>5 Lý do chọn Xuân Phi IELTS</h1>
    <div class="container">
        <div class="row" style="text-align: center">
            <div class="col-12 col-md-12 col-sm-4 col-lg-4 item-lydo">
                <div class="lydo">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <h4>Chương trình cá nhân hoá</h4>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-4 col-lg-4 item-lydo">
                <div class="lydo">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    <h4>Giảng viên tận tâm</h4>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-4 col-lg-4 item-lydo">
                <div class="lydo">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <h4>Tài liệu cập nhật</h4>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-6 col-lg-6 item-lydo">
                <div class="lydo">
                    <i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>
                    <h4>Hỗ trợ 1 - 1</h4>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-6 col-lg-6 item-lydo">
                <div class="lydo">
                    <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                    <h4>Truyền đạt dễ hiểu</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="landing-khoahoc">
    <div id="khoa-re" class="khoahoc">
        <div class="khoahoc-left">
            <img src="{{ asset('image/bg3.jpg') }}" alt="" width="100%" height="100%">
        </div>
        <div class="khoahoc-right">
            <div class="khoahoc-content">
                <div>
                    <h3>KHOÁ RỄ</h3>
                    <h4>Pre-IELTS level 0</h4>
                    <ol>

                        <li>
                            <span>ĐỐI TƯỢNG:</span>
                            <ul>
                                <li>Đã có khả năng tiếng Anh cơ bản</li>
                                <li>Các kỹ năng Nghe - Đọc còn chậm, vốn từ hạn chế</li>
                                <li>Phản xạ Nói chậm, chưa biết cách viết luận tiếng Anh</li>
                            </ul>
                        </li>
                        <li>
                            <span>MỤC TIÊU:</span>
                            <ul>
                                <li>Có phản xạ Nghe - Nói trực tiếp tiếng Anh không thông qua tiếng Việt</li>
                                <li>Tự tin giao tiếp sử dụng tiếng Anh trong môi trường làm việc, trả lời phỏng vấn</li>
                                <li>Có khả năng nói - viết câu tiếng Anh rõ ý, đúng ngữ pháp</li>
                                <li>Có khả năng sử dụng linh hoạt vốn từ vựng trong các kỹ năng</li>
                                <li>Tự tin ôn luyện IELTS mục tiêu 6.0+ trong vòng 3-4 tháng tiếp theo</li>
                            </ul>
                        </li>
                        <li>
                            <span>THÔNG TIN KHÓA HỌC:</span>
                            <ul>
                                <li>Thời lượng: 20 buổi (15 buổi kỹ năng + 5 buổi chuyên sâu phát âm và phản xạ nói)
                                </li>
                                <li>Thời gian: 2 buổi/ tuần; 2 giờ/ buổi; 19.00 – 21.00 các buổi tối</li>
                                <li>Địa điểm: Tòa nhà Dream house, ngõ 136 phố Chùa Láng, Hà Nội</li>
                                <li>Học phí: 4,800,000</li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div id="khoa-goc" class="khoahoc">

        <div class="khoahoc-left">
            <div class="khoahoc-content">
                <div>
                    <h3>KHOÁ GỐC</h3>
                    <h4>Pre-IELTS level 1</h4>
                    <ol>

                        <li>
                            <span>ĐỐI TƯỢNG:</span>
                            <ul>
                                <li>Trình độ tương đương Beginner - Elementary</li>
                                <li>Ngữ pháp và phát âm còn yếu</li>
                                <li>Vốn từ vựng còn rất hạn chế</li>
                                <li>Phản xạ nói chậm</li>
                                <li>Chưa có khả năng sử dụng cấu trúc câu, phát triển ý một cách hợp lý</li>
                            </ul>
                        </li>
                        <li>
                            <span>MỤC TIÊU:</span>
                            <ul>
                                <li>Có khả năng Nghe – Nói tiếng Anh khá</li>
                                <li>Có thể nói được các câu liền mạch theo phản xạ</li>
                                <li>Nắm và sử dụng được ngữ pháp cơ bản</li>
                                <li>Trình độ tương đương 5.0 – 5.5 IELTS</li>
                            </ul>
                        </li>
                        <li>
                            <span>THÔNG TIN KHÓA HỌC:</span>
                            <ul>
                                <li>Thời lượng: 22 buổi (17 buổi kỹ năng + 5 buổi chuyên sâu phát âm và phản xạ nói)
                                </li>
                                <li>Thời gian: 2 buổi/ tuần; 2 giờ/ buổi; 19.00 – 21.00 các buổi tối</li>
                                <li>Địa điểm: Tòa nhà Dream house, ngõ 136 phố Chùa Láng, Hà Nội</li>
                                <li>Học phí: 4,800,000</li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>

        </div>
        <div class="khoahoc-right">
            <img src="{{ asset('image/bg3.jpg') }}" alt="" width="100%" height="100%">
        </div>
    </div>
    <div id="khoa-than" class="khoahoc">
        <div class="khoahoc-left">
            <img src="{{ asset('image/bg3.jpg') }}" alt="" width="100%" height="100%">
        </div>
        <div class="khoahoc-right">
            <div class="khoahoc-content">
                <div>
                    <h3>KHOÁ THÂN</h3>
                    <h4>Pre-IELTS level 2</h4>
                    <ol>

                        <li>
                            <span>ĐỐI TƯỢNG:</span>
                            <ul>
                                <li>Đã có khả năng tiếng Anh cơ bản</li>
                                <li>Các kỹ năng Nghe - Đọc còn chậm, vốn từ hạn chế</li>
                                <li>Phản xạ Nói chậm, chưa biết cách viết luận tiếng Anh</li>
                            </ul>
                        </li>
                        <li>
                            <span>MỤC TIÊU:</span>
                            <ul>
                                <li>Có phản xạ Nghe - Nói trực tiếp tiếng Anh không thông qua tiếng Việt</li>
                                <li>Tự tin giao tiếp sử dụng tiếng Anh trong môi trường làm việc, trả lời phỏng vấn</li>
                                <li>Có khả năng nói - viết câu tiếng Anh rõ ý, đúng ngữ pháp</li>
                                <li>Có khả năng sử dụng linh hoạt vốn từ vựng trong các kỹ năng</li>
                                <li>Tự tin ôn luyện IELTS mục tiêu 6.0+ trong vòng 3-4 tháng tiếp theo</li>
                            </ul>
                        </li>
                        <li>
                            <span>THÔNG TIN KHÓA HỌC:</span>
                            <ul>
                                <li>Thời lượng: 20 buổi (15 buổi kỹ năng + 5 buổi chuyên sâu phát âm và phản xạ nói)
                                </li>
                                <li>Thời gian: 2 buổi/ tuần; 2 giờ/ buổi; 19.00 – 21.00 các buổi tối</li>
                                <li>Địa điểm: Tòa nhà Dream house, ngõ 136 phố Chùa Láng, Hà Nội</li>
                                <li>Học phí: 4,800,000</li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div id="khoa-ngon" class="khoahoc">

        <div class="khoahoc-left">
            <div class="khoahoc-content">
                <div>
                    <h3>KHOÁ NGỌN</h3>
                    <h4>Pre-IELTS Chuyên sâu</h4>
                    <ol>

                        <li>
                            <span>ĐỐI TƯỢNG:</span>
                            <ul>
                                <li>Đã có thể giao tiếp cơ bản bằng tiếng Anh</li>
                                <li>Kỹ năng viết còn chậm, chưa viết được bài luận học thuật hoàn chỉnh</li>
                                <li>Vốn từ vựng học thuật và nâng cao còn hạn chế</li>
                                <li>Có định hướng thi IELTS rõ ràng</li>
                            </ul>
                        </li>
                        <li>
                            <span>MỤC TIÊU:</span>
                            <ul>
                                <li>Nắm được cách làm các dạng bài IELTS Reading và Listening</li>
                                <li>Có khả năng phát triển ý và sử dụng từ ngữ ghi điểm cho IELTS Speaking</li>
                                <li>Có khả năng giao tiếp, thảo luận, tranh luận tiếng Anh</li>
                                <li>Có khả năng viết bài luận 250 từ rõ ràng, mạch lạc</li>
                                <li>Có khả năng sử dụng linh hoạt vốn từ vựng trong các kỹ năng</li>
                                <li>Tự tin ôn luyện IELTS mục tiêu 6.5+ trong vòng 3-4 tháng tiếp theo</li>
                            </ul>
                        </li>
                        <li>
                            <span>THÔNG TIN KHÓA HỌC:</span>
                            <ul>
                                <li>Thời lượng: 20 buổi (15 buổi kỹ năng + 5 buổi chuyên sâu phát âm và phản xạ nói)
                                </li>
                                <li>Thời gian: 2 buổi/ tuần; 2 giờ/ buổi; 19.00 – 21.00 các buổi tối</li>
                                <li>Địa điểm: Tòa nhà Dream house, ngõ 136 phố Chùa Láng, Hà Nội</li>
                                <li>Học phí: 4,800,000</li>

                            </ul>
                        </li>
                    </ol>
                </div>
            </div>

        </div>
        <div class="khoahoc-right">
            <img src="{{ asset('image/bg3.jpg') }}" alt="" width="100%" height="100%">
        </div>
    </div>
</section>
<section id="teacher">
    <div class="container">
        <h3>OUR TEACHER</h3>
        <div class="home-demo">
            <div class="row">
                <div class="large-12 columns">
                    <div class="owl-carousel">
                        <div class="item">
                            <div class="teacher-infor">
                                <img src="{{ asset('image/1.png') }}" style="width: 100%; height: 350px" alt="">
                                <div class="">
                                    <h4>Hà Đức Kiên</h4>
                                    <span>CEO</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="teacher-infor">
                                <img src="{{ asset('image/1.png') }}" style="width: 100%; height: 350px" alt="">
                                <div class="">
                                    <h4>Hà Đức Kiên</h4>
                                    <span>CEO</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="teacher-infor">
                                <img src="{{ asset('image/1.png') }}" style="width: 100%; height: 350px" alt="">
                                <div class="">
                                    <h4>Hà Đức Kiên</h4>
                                    <span>CEO</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="teacher-infor">
                                <img src="{{ asset('image/1.png') }}" style="width: 100%; height: 350px" alt="">
                                <div class="">
                                    <h4>Hà Đức Kiên</h4>
                                    <span>CEO</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="teacher-infor">
                                <img src="{{ asset('image/1.png') }}" style="width: 100%; height: 350px" alt="">
                                <div class="">
                                    <h4>Hà Đức Kiên</h4>
                                    <span>CEO</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="teacher-infor">
                                <img src="{{ asset('image/1.png') }}" style="width: 100%; height: 350px" alt="">
                                <div class="">
                                    <h4>Hà Đức Kiên</h4>
                                    <span>CEO</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="teacher-infor">
                                <img src="{{ asset('image/1.png') }}" style="width: 100%; height: 350px" alt="">
                                <div class="">
                                    <h4>Hà Đức Kiên</h4>
                                    <span>CEO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="khoahoc-now">
    <div class="container">
        <h3 style="text-align: center">Khoá học đang tuyển sinh</h3>
        <div class="home-demo">
            <div class="row">
                <div class="large-12 columns">
                    <div class="owl-carousel">
                        <div class="item">
                            <div class="teacher-infor">
                                <img src="{{ asset('image/1.png') }}" style="width: 100%; height: 350px" alt="">
                                <div class="">
                                    <h4>Lớp Ngọn Tháng 10/2019</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="text-center">
        <a class="btn btn-trinhdo">Đăng ký kiểm tra trình độ</a>
    </div>
</section>
<section id="feedback">
    <h3 class="text-center">Học viên nói về Xuân Phi IELTS</h3>
    <div class="container">
        <div class="landing-comment">
            <div class="comment-content">
                <p>
                    <strong>Hà Đức Kiên:</strong>
                    <span>Em chả biết nói gì ngoài việc e rất yêu cô Thủy :)) học hết khóa đầu rất nhớ cô, chỉ muốn đi học cô tiếp :( Cô rất tận tình nè, hiền nè, xinh nè, giảng hay dễ hiểu nè, khiến e ko sợ đi học nữa, cô cũng buồn cười nữa =)</span>
                </p>
            </div>
            <div class="comment-content">
                <p>
                    <strong>Hà Đức Kiên:</strong>
                    <span>Em chả biết nói gì ngoài việc e rất yêu cô Thủy :)) học hết khóa đầu rất nhớ cô, chỉ muốn đi học cô tiếp :( Cô rất tận tình nè, hiền nè, xinh nè, giảng hay dễ hiểu nè, khiến e ko sợ đi học nữa, cô cũng buồn cười nữa =)</span>
                </p>
            </div>
            <div class="comment-content">
                <p>
                    <strong>Hà Đức Kiên:</strong>
                    <span>Em chả biết nói gì ngoài việc e rất yêu cô Thủy :)) học hết khóa đầu rất nhớ cô, chỉ muốn đi học cô tiếp :( Cô rất tận tình nè, hiền nè, xinh nè, giảng hay dễ hiểu nè, khiến e ko sợ đi học nữa, cô cũng buồn cười nữa =)</span>
                </p>
            </div>
        </div>
    </div>
</section>
<section id="lienhe">
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-6 col-sm-6 col-md-6">
                <h2>Liên hệ chúng tôi</h2>
                <iframe class="mt-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1
                d3724.2375398297418!2d105.80500911457912!3d21.02317939334537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab687560f3ad%3A0xa5522c45c9015e23!2zS2jDoWNoIHPhuqFuIERyZWFtIEhvdXNl!5e0!3m2!1svi!2s!4v1568473282304!5m2!1svi!2s"
                        width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                <p style="line-height: 35px">
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ: tầng 6A, Số 9A, Hoàng Cầu, Hà Nội</span><br>
                    <span><i class="fa fa-phone" aria-hidden="true"></i> Hotline: 0972 220 777</span><br>
                    <span><i class="fa fa-envelope-o" aria-hidden="true"></i> Email: kienchidong@gmail.com</span><br>
                </p>
            </div>
            <div class="col-6 col-lg-6 col-sm-6 col-md-6">
                <h2>Đăng ký để nhận ưu đãi sớm nhất</h2>
                <div class="form-dk">
                    <form action="" method="post">
                        @csrf
                        <input type="text" name="name" required placeholder="Họ Và Tên"/>
                        <input type="email" name="email" required placeholder="Nhập Email"/>
                        <input type="text" name="phone" required placeholder="Nhập Số Điện Thoại"/>
                        <textarea name="content" required id="" cols="15" rows="5"
                                  placeholder="Để lại lời nhắn cho chúng tôi"></textarea>
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
