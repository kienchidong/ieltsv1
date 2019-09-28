@extends('admin.layouts.master-layout')
@section('title')
    Thêm thư viện
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Thêm thư viện
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('library.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thêm thư viện</li>
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

                            <li><a href="{{route('library.index')}}"><i class="fa fa-file-text-o"></i> Danh
                                    sách thư viện<span class="label label-primary pull-right">{{$library_count}}</span></a></li>
                            {{--<li><a href="{{route('cate_library.index')}}"><i class="fa fa-file-text-o"></i> Danh--}}
                                    {{--sách thể loại thư viện<span class="label label-primary pull-right">{{$cate_library_count}}</span></a></li>--}}
                            <li><a href="{{route('library.create')}}"><i class="fa fa-envelope-o"></i> Thêm thư viện</a></li>
                            {{--<li><a href="{{route('cate_library.create')}}"><i class="fa fa-envelope-o"></i> Thêm thể loại</a></li>--}}


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
                    <h3 style="text-align: left; padding-left: 5px">Thêm bài viết</h3>
                    <form role="form" method="POST" action="{{route('library.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label>Thể loại bài viết (*)</label>
                                <select class="form-control" name="cate_id">
                                    @foreach($cate_librarys as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bài viết (*)</label>
                                <input type="text" class="form-control" placeholder="Nhập vào đây" name="name"
                                       value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt (*)</label>
                                <div class="form-group">
                                        <textarea name="summary" rows="4" placeholder="Nhập tóm tắt"
                                                  class="form-control">{{ old('summary') }}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung (*)</label>
                                <div class="form-group">
                                        <textarea name="content" rows="10" placeholder="Nhập nội dung"
                                                  class="form-control">{{ old('content') }}</textarea>
                                </div>
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

