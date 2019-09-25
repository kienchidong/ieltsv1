<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Admin</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Switch Login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/'.$introduces->logo) }}" />
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="{{ asset('admin_example/login/css/style.css') }}" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <link href="//fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400,500,600,700,800" rel="stylesheet">
    <!-- //fonts -->
    <!-- Font-Awesome-File-Links -->
    <link rel="stylesheet" href="{{ asset('admin_example/login/css/font-awesome.css') }}" type="text/css" media="all">
</head>

<body>
<h1 class="title-agile text-center">Login Admin</h1>
<div class="content-w3ls">
    <div class="content-top-agile">
        <a target="_blank" href="{{ url('') }}"><img src="{{ asset('images/logo/'.$introduces->logo) }}" alt="" width="40%"></a>
    </div>
    <div class="content-bottom">
        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <div class="field-group">
                <span class="fa fa-user" aria-hidden="true"></span>
                <div class="wthree-field">
                    <input name="email" id="username" type="email" placeholder="Email*" required autocomplete="off" />
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="field-group pass">
                <span class="fa fa-lock" aria-hidden="true"></span>
                <div class="wthree-field">
                    <input name="password" id="paswword" type="password" placeholder="Password*" required autocomplete="off" />
                </div>

                <div class="showpass"><i class="fa fa-eye" aria-hidden="true" onclick="showpass()"></i></div>
                <script>
                    function showpass() {
                        var x= document.getElementById('paswword');
                        if(x.type=== 'password'){
                            x.type='text';
                        }
                        else{
                            x.type='password';
                        }
                    }
                </script>
            </div>
            <ul class="list-login">
                <li class="switch-agileits">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </li>

                <li class="clearfix"></li>
            </ul>
            <div class="wthree-field">
                <input id="saveForm" name="saveForm" type="submit" value="sign in"/>
            </div>
        </form>
    </div>
</div>
<div class="copyright text-center">
    <p>© 2018 Copy right
        <a target="_blank" href="http://talentwins.co/">Talent Wins Technology</a>
    </p>
</div>
</body>
<!-- //Body -->

</html>
