@extends('admin.layouts.master-layout')
@section('title')
    Sửa cảm nhận học viên
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Sửa cảm nhận học viên
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('student.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sửa cảm nhận học viên</li>
        </ol>
    </section>
    <br>



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
                            <li><a href="{{route('student.create')}}"><i class="fa fa-envelope-o"></i> Thêm cảm nhận học viên
                                </a></li>
                            <li><a href="{{route('student.index')}}"><i class="fa fa-file-text-o"></i> Danh
                                    sách cảm nhận học viên<span class="label label-primary pull-right">{{$student_count}}</span></a></li>
                            {{--<li><a href="{{route('cate_student.create')}}"><i class="fa fa-envelope-o"></i> Thêm thể loại--}}
                                    {{--<span class="label label-primary pull-right">{{$cate_student_count}}</span></a></li>--}}


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
                    <h3 style="text-align: left; padding-left: 5px">Sửa bài viết</h3>
                    <form role="form" method="POST" action="{{route('student.update',$student->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            {{--<div class="form-group">--}}
                            {{--<label>Thể loại bài viết (*)</label>--}}
                            {{--<select class="form-control" name="cate_id">--}}
                            {{--@foreach($cate_students as $value)--}}
                            {{--<option value="{{$value->id}}">{{$value->name}}</option>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên học viên (*)</label>
                                <input type="text" class="form-control" placeholder="Nhập vào đây" name="name"
                                       value="{{ $student->name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Khóa học (*)</label>
                                <input type="text" class="form-control" placeholder="Nhập vào đây" name="course"
                                       value="{{ $student->course }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Khóa học (*)</label>
                                <input type="text" class="form-control" placeholder="Nhập vào đây" name="contenttt"
                                       value="{{ $student->content }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh </label>
                                <input type="file" id="image" name="image" onchange="showIMG()">
                            </div>
                            <div class="form-group">
                                <label for="" style="margin-left: 10px"> Hiển thị : </label>
                                <div id="viewImg">
                                    <img width="100px" height="100px"
                                         src="{{asset('')}}images/student/{{$student->image}}">
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

