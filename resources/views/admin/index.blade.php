
@extends('admin.layouts.master-layout')
@section('title')
    Trang chủ
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Trang chủ</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Bài Viết</span>
                        <span class="info-box-number">{{ $count_blog }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sách</span>
                        <span class="info-box-number">{{ $count_library }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"> Khóa Học</span>
                        <span class="info-box-number">{{ $count_course }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="{{ route('infor.list') }}">Người Đăng Ký</a></span>
                        <span class="info-box-number">{{ $count_information }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{ route('edit.time', $count_time->id) }}" method="post">
                        @csrf
                        <div class="box-header with-border">
                            <h3 class="box-title">Thời Gian Nhận Ưu Đãi</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">

                                <div class="col-md-8">
                                    <input type="date" name="date" class="form-control" value="{{ $count_time->date }}" onchange="selecttime(this)"/>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <div id="count-time" class="">
                                        <h3>Thời gian còn lại</h3>
                                        <div>
                                            <span id="day"></span> Ngày :
                                            <span id="hour"></span> Giờ :
                                            <span id="minute"></span> Phút :
                                            <span id="second"></span> Giây
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- ./box-body -->
                        <div class="box-footer">
                            <div class="">
                                <input type="submit" value="Thay đổi" class="btn btn-success">
                            </div>
                            <!-- /.row -->
                        </div>
                    </form>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
    <script>

        function selecttime(obj) {
            var date = new Date().getTime();
            var time = new Date(obj.value).getTime();
            var distance = time-date;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24))+1;

            if(days >=0){
                document.getElementById('day').innerText = days.toString();
                document.getElementById('count-time').classList.remove('hide');
            }
            else{
                alertify.alert('Ngày '+obj.value+ ' Đã qua! bạn không thể chọn ngày này');
                obj.value = '{{ $count_time->date }}';
            }
        }
        $(document).ready(function () {
            start();
        });
        var date = new Date();
        var time = new Date('{{ $count_time->date }}').getTime();
        var distance = time-date.getTime();
        var d = Math.floor(distance / (1000 * 60 * 60 * 24))+1; //ngày
        document.getElementById('day').innerText = d.toString();

        var h = 24 - parseInt(date.getHours()); // Giờ
        var m = 60 - parseInt(date.getMinutes()); // Phút
        var s = 60 - parseInt(date.getSeconds()); // Giây

        var timeout = null; // Timeout

        function start() {
            if (h === null) {
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
                clearTimeout(timeout);
                alert('Hết giờ');
                return false;
            }


            document.getElementById('hour').innerText = h.toString();
            document.getElementById('minute').innerText = m.toString();
            document.getElementById('second').innerText = s.toString();

            timeout = setTimeout(function () {
                s--;
                start();
            }, 1000);
        }

        function stop() {
            clearTimeout(timeout);
        }

    </script>

@endsection