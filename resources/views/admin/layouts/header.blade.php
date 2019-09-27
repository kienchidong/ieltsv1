<header class="main-header">

    <!-- Logo -->
    <a  target="_blank" href="{{url('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>XP</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Xuân Phi </b>Ielts</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('images/logo/'.$introduces->logo) }}" style="background: white" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('images/logo/'.$introduces->logo) }}" style="background: white" class="img-circle" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}  -
                                @foreach($roles as $role)
                                    @if(Auth::user()->level==$role->id)
                                        {{ $role->name }}
                                    @endif
                                @endforeach
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">

                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('admin.account.profile') }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </nav>
</header>
