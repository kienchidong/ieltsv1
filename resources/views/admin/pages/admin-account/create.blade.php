@extends('admin.layouts.master-layout')
@section('title')
    Tạo tài khoản Quản trị viên
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Thêm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thêm tài khoản Quản trị viên</li>
        </ol>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <h3 style="text-align: left; padding-left: 5px">Thêm tài khoàn Quản trị viên</h3>
                    <form role="form" method="POST" action="{{ route('admin.account.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="" class="col-md-3 col-form-label text-md-right">Tên (*)</label>
                                <input type="text" class="form-control" placeholder="Tên" name="name"
                                       value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-3 col-form-label text-md-right">Email(*)</label>
                                <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>Quyền(*)</label><br>
                                <select name="role" id="" onchange="selectrole(this)">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <script>
                                    function selectrole(obj) {
                                        var hide = document.getElementsByClassName('role');
                                        for (var i = 0; i < hide.length; i++) {
                                            hide[i].classList.add('hide');
                                        }
                                        var show = document.getElementById('describle-role-'+obj.value);
                                        show.classList.remove('hide');
                                    }
                                </script>
                                @foreach($roles as $key => $role)
                                    @if($key==0)
                                        <div id="describle-role-{{ $role->id }}" class="role">
                                            ( {{ $role->describe }} )
                                        </div>
                                    @else
                                        <div id="describle-role-{{ $role->id }}" class="role hide">
                                            ( {{ $role->describe }} )
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                                <input id="password" type="password" class="form-control backgroundinput @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  onchange="lengthPasswword(this)">

                                <div id="lengthpass" style="color: red; font-size: 15px"></div>
                                <script>
                                    function lengthPasswword(obj) {
                                        var x = obj.value;
                                        if (x.length < 8) {
                                            document.getElementById('lengthpass').style.display = 'block';
                                            document.getElementById('lengthpass').innerHTML = '<span>Mật khẩu phải nhiều hơn 8 ký tự!</span>';
                                        } else {
                                            document.getElementById('lengthpass').style.display = 'none';
                                        }
                                    }
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>
                                    <input id="password-confirm" type="password" class="form-control backgroundinput" name="password_confirmation" required autocomplete="new-password" onchange="confirmPasswword(this)">
                                    <p id="errorpass" style="color: red; font-size: 15px"></p>
                                    <script>
                                        function confirmPasswword(obj) {
                                            var y = document.getElementById('password').value;
                                            var x = obj.value;
                                            if (x != y) {
                                                document.getElementById('errorpass').style.display = 'block';
                                                document.getElementById('errorpass').innerHTML = '<span>Mật khẩu nhập lại không đúng!</span>';
                                            } else {
                                                document.getElementById('errorpass').style.display = 'none';
                                            }
                                        }
                                    </script>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-primary" href="{{ route('admin.account.list') }}">Trở lại</a>
                                <input type="submit" name="submit" class="btn btn-success" value="Thêm" />
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

