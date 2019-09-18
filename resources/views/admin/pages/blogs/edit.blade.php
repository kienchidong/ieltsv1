@extends('admin.layouts.master-layout')
@section('title')
    Sửa tin tức
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Sửa tin tức
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('blog.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sửa tin tức</li>
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
                            <li><a href="{{route('blog.create')}}"><i class="fa fa-envelope-o"></i> Thêm tin tức
                                </a></li>
                            <li><a href="{{route('blog.index')}}"><i class="fa fa-file-text-o"></i> Danh
                                    sách tin tức<span class="label label-primary pull-right">{{$blog_count}}</span></a></li>
                            <li><a href="{{route('cate_blog.create')}}"><i class="fa fa-envelope-o"></i> Thêm thể loại
                                    <span class="label label-primary pull-right">{{$cate_blog_count}}</span></a></li>


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
                    <form role="form" method="POST" action="{{route('blog.update',$blog->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label>Thể loại tin tức(*)</label>
                                <select class="form-control" name="cate_id">
                                    <option value="{{$blog->cate_idd}}">{{$blog->cate_name}}</option>
                                    @foreach($cate_blogs as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bài viết (*)</label>
                                <input type="text" class="form-control" placeholder="Nhập vào đây" name="name"
                                       value="{{ $blog->name }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung (*)</label>
                                <div class="form-group">
                                        <textarea name="contentt" rows="10" placeholder="Nhập nội dung"
                                                  class="form-control">{{ $blog->content }}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh </label>
                                <input type="file" id="image" name="image" onchange="showIMG()">
                            </div>
                            <div class="form-group">
                                <label for="" style="margin-left: 10px"> Hiển thị : </label>
                                <div id="viewImg">
                                    <img width="100px" height="150px" src="{{asset('')}}images/blogs/{{$blog->image}}">
                                </div>
                            </div>



                            <div class="box-footer">
                                <a href="{{route('blog.index')}}" class="btn btn-warning">Quay lại</a>
                                <button type="submit" class="btn btn-primary">Lưu</button>
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

