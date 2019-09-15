	<header class="header container-fluid">

	</header>

	<nav class="nav-horizontal container-fluid">
	    <div class="background-header"></div>
	    <div class="nav-horizontal-container container">
	        <div class="nav-horizontal-content">
	            <div class="d-flex justify-content-center">

	                <div class="logo">
	                    <a href="{{ url('/') }}">
	                        <img src="image/logo.png" alt="">
	                    </a>

	                </div>
	                <ul class="nav-ul-lv-1">
	                    <li><a href="/">Giới thiệu</a></li>
	                    <li>
	                        <a href="#khoahoc">khóa học<i class="fa fa-sort-down"></i></a>
	                        <ul class="nav-ul-lv-2">
	                            <li><a href="{{ url('/course') }}">Offline</a></li>
	                            <li><a href="#">Online</a></li>
	                        </ul>
	                    </li>
	                    <li>
                            <a href="#thuvien">Thư viện<i class="fa fa-sort-down"></i></a>

	                        <ul class="nav-ul-lv-2">
	                            <li><a href="{{ url('thuvien/nghe') }}">Listening</a></li>
	                            <li><a href="{{ url('thuvien/noi') }}">Speacking</a></li>
                                <li><a href="{{ url('thuvien/doc') }}">Reading</a></li>
                                <li><a href="{{ url('thuvien/viet') }}">Writing</a></li>
                                <li><a href="{{ url('thuvien/total') }}">For new Member</a></li>
	                        </ul>
	                    </li>
	                    <li><a href="#blog">blog</a>
	                    </li>
	                    <li><a href="{{ url('lienhe') }}">liên hệ</a></li>
	                </ul>
	                <ul class="nav-ul-lv-1">
                        <li><a href="{{ url('dangky') }}"
                            style="    border: 3px solid #19687D;
                            border-radius: 5px;"
                            >Đăng ký</a></li>
	                </ul>
	            </div>
	            <div class="menu-mobile-button"><i class="fas fa-bars"></i></div>
	        </div>
	    </div>
	</nav>
	<script type="text/javascript" src="js/nav-horizontal.js"></script>

	<section class="menu-mobile">
	    <div class="menu-mobile-bg"></div>
	    <div class="menu-mobile-box">
	        <div class="menu-mobile-info">

	        </div>
	        <div class="menu-mobile-content">
	            <div class="menu-left">
	                <div class="menu-left-title">
	                    <h3>Menu</h3>
	                </div>
	                <div class="menu-left-content">

	                    <ul class="menu-left-ul-lv-1">
	                        <li><a href="/">Giới thiệu</a></li>
	                        <li>
	                            <a href="#khoahoc">khóa học</a>
	                            {{-- <i class="fas fa-plus"></i>
	                            <ul class="menu-left-ul-lv-child">
	                                <li><a href="#">Lĩnh vực 1</a></li>
	                                <li><a href="#">Lĩnh vực 2</a></li>
	                                <li><a href="#">Lĩnh vực 3</a></li>
	                            </ul> --}}
	                        </li>
	                        <li>
	                            <a href="#thuvien">thư viện</a>
	                            {{-- <i class="fas fa-plus"></i>
                                    <ul class="menu-left-ul-lv-child">
                                        <li><a href="#">Lĩnh vực 1</a></li>
                                        <li><a href="#">Lĩnh vực 2</a></li>
                                        <li><a href="#">Lĩnh vực 3</a></li>
                                    </ul> --}}
	                        </li>
	                        <li><a href="#blog">blog</a>
	                            {{-- <i class="fas fa-plus"></i>
	                            <ul class="menu-left-ul-lv-child">
	                                <li>
	                                    <a href="#">Thư viện</a>
	                                </li>
	                            </ul> --}}
	                        </li>
	                        {{--  <li><a href="#">wall of fame</a></li>  --}}
	                        <li><a href="{{ url('lienhe') }}">liên hệ</a></li>
	                    </ul>

	                </div> <!-- menu-left-content -->
	            </div> <!-- menu-left -->
	            <script type="text/javascript" src="js/menu-left-js.js"></script>
	        </div>
	    </div>
	    <script type="text/javascript" src="js/menu-mobile.js"></script>
	</section>
