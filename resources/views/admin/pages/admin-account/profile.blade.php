@extends('admin.layouts.master-layout')
@section('title')
    {{ Auth::user()->name }}
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Thêm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{ Auth::user()->name }}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <h3 style="text-align: left; padding-left: 5px">Thêm Thêm</h3>
                    <form role="form" method="POST" action="{{ route('admin.account.profile.edit') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên:</label>
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                                <input id="old-password" type="password" class="form-control backgroundinput @error('password') is-invalid @enderror" name="oldpassword"  autocomplete="new-password"  onchange="checkpass(this)">

                                <div id="lengthpassold" style="color: red; font-size: 15px"></div>
                                <script>
                                    function checkpass(obj) {
                                        var agrs = {
                                            url: "{{ route('admin.account.checkpass') }}", // gửi ajax đến file result.php
                                            type: "post", // chọn phương thức gửi là post
                                            dataType: "text", // dữ liệu trả về dạng text
                                            data: { // Danh sách các thuộc tính sẽ gửi đi
                                                _token: '{{ csrf_token() }}',
                                                id: {{ Auth::user()->id }},
                                                password: obj.value,
                                            },
                                            success: function (result) {

                                                $('#lengthpassold').html(result);
                                            }
                                        };
                                        $.ajax(agrs);
                                    }
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                                <input id="password" type="password" class="form-control backgroundinput @error('password') is-invalid @enderror" name="password"  autocomplete="new-password"  onchange="lengthPasswword(this)">

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
                                <input id="password-confirm" type="password" class="form-control backgroundinput" name="password_confirmation" autocomplete="new-password" onchange="confirmPasswword(this)">
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
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Sửa</button>
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
@endsection

