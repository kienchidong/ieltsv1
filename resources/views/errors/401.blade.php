<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{asset('')}}">
    <title>My Tam Mart - Errors</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-kien.png') }}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        ul li a {
            text-decoration: none !important;
        }
    </style>
</head>

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-5 offset-md-2">
            <button type="button" onclick="quay_lai_trang_truoc()" class="btn btn-primary">Quay lại</button>
            <h1 style="padding: 50px 0">Oops!</h1>
            <h3>You don't have permission to go to this page</h3>
            <h6 style="margin: 30px 0"><strong>If you are dissatisfield, please contact adminstrator</strong></h6>
            <ul>
                <li>Or you can go</li>
                <li><a href="{{ Route('admin.dashboard') }}">Giao diện chính</a></li>
                {{--<li><a href="">Just looking around</a></li>--}}
            </ul>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('') }}/assets/admin/dist/img/401.gif" alt="">
        </div>
    </div>
</div>

<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<script>
    function quay_lai_trang_truoc(){
        history.back();
    }
</script>