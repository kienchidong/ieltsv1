@extends('admin.layouts.master-layout')
@section('title')
    Thêm khóa học đang tuyển
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Thêm khóa học đang tuyển
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('course_enrolling.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thêm khóa học đang tuyển </li>
        </ol>
    </section>
    <br>
    <div>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach

            </div>

        @endif
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        {{-- Mục lục --}}
                        <h3 class="box-title">Danh mục</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">

                            <li><a href="{{route('course_offline.create')}}"><i class="fa fa-envelope-o"></i> Thêm chủ đề khóa học
                                </a></li>

                            <li><a href="{{route('course_offline.index')}}"><i class="fa fa-file-text-o"></i> Danh
                                    sách chủ đề <span class="label label-primary pull-right">{{$course_offline_count}}</span></a></li>
                            <li><a href="{{route('course_enrolling.create')}}"><i class="fa fa-envelope-o"></i> Thêm tuyển khóa học
                                </a></li>
                            <li><a href="{{route('course_enrolling.index')}}"><i class="fa fa-file-text-o"></i> Danh
                                    sách đang tuyển <span class="label label-primary pull-right">{{$course_enrolling_count}}</span></a></li>

                        </ul>
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
                {{-- End mục luc --}}

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <h3 style="text-align: left; padding-left: 5px">Thêm khóa học đang tuyển </h3>
                    <form role="form" method="POST" action="{{route('course_enrolling.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên khóa học</label>
                                <input type="text" class="form-control" placeholder="Khóa ngọn tháng 10" name="name"
                                       value="{{ old('name') }}">
                            </div>



                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh </label>
                                <input type="file" id="image" name="image" onchange="showIMG()">
                            </div>
                            <div class="form-group">
                                <label for="" style="margin-left: 10px"> Hiển thị : </label>
                                <div id="viewImg">

                                </div>
                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>

                        </div>

                    </form>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


    <script>

        function showIMG() {
            var fileInput = document.getElementById('image');
            var filePath = fileInput.value; //lấy giá trị input theo id
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; //các tập tin cho phép
            //Kiểm tra định dạng
            if (!allowedExtensions.exec(filePath)) {
                alert('Bạn chỉ có thể dùng ảnh dưới định dạng .jpeg/.jpg/.png/.gif extension.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('viewImg').innerHTML = '<img style="width:100px; height: 100px;" src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

    </script>

@endsection

