<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/logo/'.$introduces->logo) }}" style="background: white" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="">
                <a href="{{ url('admin') }}">
                    <i class="fa fa-dashboard"></i> <span>Trang Chủ</span>
                </a>
            </li>
            {{--Mẫu form--}}
            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Form</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/form/create')}}"><i class="fa fa-circle-o"></i> Thêm</a></li>
                    <li><a href="{{url('admin/form/index')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>

                </ul>
            </li> -->
            {{--Librarys --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Thư viện</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('library.create')}}"><i class="fa fa-circle-o"></i> Thêm thư viện</a></li>
                    <li><a href="{{route('library.index')}}"><i class="fa fa-circle-o"></i> Danh sách thư viện </a></li>
                    <li><a href="{{route('cate_library.create')}}"><i class="fa fa-circle-o"></i> Thêm thể loại</a></li>
                    <li><a href="{{route('cate_library.index')}}"><i class="fa fa-circle-o"></i> Danh sách thể loại thư viện </a></li>


                </ul>
            </li>
            {{--Blogs --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Tin tức</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('blog.create')}}"><i class="fa fa-circle-o"></i> Thêm tin tức</a></li>
                    <li><a href="{{route('blog.index')}}"><i class="fa fa-circle-o"></i> Danh sách tin tức </a></li>
                    {{--<li><a href="{{route('cate_blog.create')}}"><i class="fa fa-circle-o"></i> Thêm thể loại</a></li>--}}

                </ul>
            </li>


            {{--Khóa học--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Khóa học offline </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="{{route('course_enrolling.index')}}"><i class="fa fa-circle-o"></i> Danh sách đang tuyển</a></li>
                    <li><a href="{{route('course_enrolling.create')}}"><i class="fa fa-circle-o"></i> Thêm khóa đang tuyển</a></li>


                </ul>
            </li>
            {{--Giáo viên --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Giáo viên  </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="{{route('teacher.index')}}"><i class="fa fa-circle-o"></i> Danh sách giáo viên </a></li>
                    <li><a href="{{route('teacher.create')}}"><i class="fa fa-circle-o"></i> Thêm giáo viên</a></li>


                </ul>
            </li>
            <li>
                <a href="{{ route('course.online') }}">
                    <i class="fa fa-internet-explorer"></i>
                    <span> Khóa học Online </span>
                </a>
            </li>
            <li>
                <a href="{{ route('infor.list') }}">
                    <i class="fa fa-list"></i>
                    <span> Học viên đăng ký </span>
                </a>
            </li>
            <li class="header">Quản Trị Viên</li>
            <li><a href="{{ route('admin.account.list') }}"><i class="fa fa-user text-red"></i> <span>Tài khoản Quản trị Viên</span></a></li>
            <li class="">
                <a href="{{ route('introduce.list') }}">
                    <i class="fa fa-info-circle"></i>
                    <span>Giới thiệu </span>
                </a>
            </li>
            {{--Khóa học--}}
            <li >
                <a href="{{route('course_offline.index')}}">
                    <i class="fa fa-pie-chart"></i>
                    <span>Chủ đề khóa học offline </span>
                </a>
            </li>
            {{--Khóa học--}}
            <li >
                <a href="{{route('registration.index')}}">
                    <i class="fa fa-pie-chart"></i>
                    <span>Đăng ký  </span>
                </a>
            </li>
            {{--Liên hệ--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Liên hệ </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('contact.create')}}"><i class="fa fa-circle-o"></i> Thêm</a></li>
                    <li><a href="{{route('contact.index')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-picture-o"></i>
                    <span>Hình Ảnh </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('home.slider')}}"><i class="fa fa-circle-o"></i> Slider Trang chủ</a></li>
                    <li><a href="{{route('home.background')}}"><i class="fa fa-circle-o"></i> Hình Nền Trang Chủ</a></li>
                    <li><a href="{{route('library.background')}}"><i class="fa fa-circle-o"></i> Hình Nền Thư Viện</a></li>
                    <li><a href="{{route('comment.background')}}"><i class="fa fa-circle-o"></i> Hình Nền Bình luận</a></li>
                </ul>
            </li>
    </section>
    <!-- /.sidebar -->
</aside>
