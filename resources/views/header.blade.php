<header class="header container-fluid">

</header>

<nav class="nav-horizontal container-fluid">
	<div class="background-header"></div>
	<div class="nav-horizontal-container container">
		<div class="nav-horizontal-content">
			<div class="d-flex justify-content-center menu">

				<div class="logo">
					<a href="{{ url('/') }}">
						<img src="image/logo11.png" alt="">
					</a>

				</div>
				<ul class="nav-ul-lv-1">
					<li><a href="{{ url('/course') }}">Giới thiệu</a></li>
					<li >
						<a href="#khoahoc" id="khoahoc-li">khóa học<i class="fa fa-sort-down"></i></a>
						<ul class="nav-ul-lv-2">
							<li><a href="{{ url('landing') }}">Offline</a></li>
							<li><a href="#khoahoc">Online</a></li>
						</ul>
					</li>
					<li >
						<a href="#thuvien" id="library-li">Thư viện<i class="fa fa-sort-down"></i></a>

						<ul class="nav-ul-lv-2">
							<li><a href="{{ url('thuvien/nghe') }}">Listening</a></li>
							<li><a href="{{ url('thuvien/noi') }}">Speacking</a></li>
							<li><a href="{{ url('thuvien/doc') }}">Reading</a></li>
							<li><a href="{{ url('thuvien/viet') }}">Writing</a></li>
							<li><a href="{{ url('thuvien/total') }}">For new Member</a></li>
						</ul>
					</li>
					<li><a href="#blog" id="blog-li">blog</a>
					</li>
					<li id="contact-li"><a href="#">liên hệ</a></li>
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

						</li>
						<li>
							<a href="#thuvien">thư viện</a>

						</li>
						<li><a href="#blog">blog</a>

						</li>
						<li><a href="{{ url('lienhe') }}">liên hệ</a></li>
					</ul>

				</div>
			</div>
			<script type="text/javascript" src="js/menu-left-js.js"></script>
		</div>
	</div>
	<script type="text/javascript" src="js/menu-mobile.js"></script>
</section>
