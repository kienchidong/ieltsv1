@extends('admin.layouts.master-layout')
@section('title')
    Thêm thể loai tin tức
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Thêm thể loại tin tức
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thêm thể loại tin tức</li>
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
                    <h3 style="text-align: left; padding-left: 5px">Thêm thể loại tin tức</h3>
                    <form role="form" method="POST" action="{{route('cate_blog.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên khóa học</label>
                                <input type="text" class="form-control" placeholder="Nhập vào đây" name="name"
                                       value="{{ old('name') }}">
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
    {{-- Datatable cate --}}
    <section class="content" style="margin-bottom: 50px">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        {{--<a class="btn btn-primary" id="btnadd" href="{{ route('add.products') }}" onclick="">Thêm Sản phẩm</a>--}}
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cate_blogs as $value)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$value->id}}</td>
                                    <td>{!! $value->name !!}</td>

                                    <td>
                                        @if($value->status==1)
                                            Hiển thị
                                        @else
                                            Ẩn
                                        @endif
                                    </td>
                                    <td>

                                        <div>

                                            <a class="btn btn-danger"
                                               href="{{ url('admin/blog/destroy-cate/'.$value->id) }}"
                                               onclick="return confirm('Hành động sẽ xóa thể loại tin tức này! bạn có muốn tiếp tục?')">Xóa</a>
                                            @if($value->status==1)
                                                <a class="btn btn-info"
                                                   href="{{ url('admin/blog/setactive-cate/'.$value->id.'/0') }}"
                                                   onclick="return confirm('Hành động sẽ ẩn thể loại tin tức này! bạn có muốn tiếp tục?')">Ẩn</a>
                                            @else
                                                <a class="btn btn-warning"
                                                   href="{{ url('admin/blog/setactive-cate/'.$value->id.'/1') }}"
                                                   onclick="return confirm('Hành động sẽ hiển thị thể loại tin tức mục này! bạn có muốn tiếp tục?')">Hiển
                                                    thị</a>

                                            @endif
                                        </div>
                                </tr>
                            @endforeach

                            </tbody>


                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    {{-- EndDatatable cate --}}

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

