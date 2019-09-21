@extends('admin.layouts.master-layout')
@section('title')
    Giới thiệu
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Thêm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thêm</li>
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
            <div class="col-md-12">
                <div class="box box-primary">
                    <h3 style="text-align: left; padding-left: 5px">Giới thiệu về Xuân Phi Ielts</h3>
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Địa chỉ:</label>
                                <textarea class="form-control" name="address" rows="5" placeholder="Địa chỉ"></textarea>
                            </div>
                            <div class="form-group">
                                <label >Số Điện thoại:</label>
                                <input type="text" class="form-control" placeholder="Số Điện thoại" name="phone" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label >Email:</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung (*)</label>
                                <div class="form-group">
                                        <textarea name="content" rows="10" placeholder="Nhập nội dung"
                                                  class="form-control">{{ old('contentt') }}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh </label>
                                <input type="file" id="image" name="image" onchange="showIMG()">
                            </div>
                            <div class="form-group">
                                <label for="" style="margin-left: 10px"> Ảnh hiển thị : </label>
                                <div id="viewImg">

                                </div>
                            </div>


                            <div class="form-group">
                                <label>Hiển thị</label>
                                <label class="radio-inline">
                                    <input name="active" value="1" checked="" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="active" value="0" type="radio">Không
                                </label>
                            </div>
                            {{--Hết tiêu điểm--}}
                            {{--Nổi bật--}}
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="footer_hot" value="1" checked="" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="footer_hot" value="0" type="radio">Không
                                </label>
                            </div>
                            {{--Hết nối bật--}}
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
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
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

