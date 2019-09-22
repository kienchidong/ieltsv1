	<footer class="container-fluid">
	    {{--  <div class="container-fluid footer-1">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-4">
	                    <h5>LIÊN KẾT</h5>
	                    <div class="d-flex">
	                        <div class="icon-lk">
	                            <img src="image/icon-fb.jpg" alt="facebook">
	                        </div>
	                        <div class="icon-lk">
	                            <img src="image/icon-zalo.png" alt="zalo">
	                        </div>
	                        <div class="icon-lk">
	                            <img src="image/youtube-icon.png" alt="youtube">
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-8">
	                    <h5>ĐĂNG KÝ NHẬN THÔNG TIN </h5>
	                    <div class="form-dk">
	                        <form>
	                            <div class="form-group">
	                                <input type="text" class="form-control" id="" aria-describedby="text"
	                                    placeholder="Nhập vào email">
	                            </div>
	                            <button type="button" class="btn btn-warning">Đăng Ký</button>
	                        </form>

	                    </div>

	                </div>
	            </div>

	        </div>
	    </div>  --}}
	    <div class="container-fluid footer-2">
	        <div class="container" id="contact">
	            <div class="row">
	                <div class="col-md-3 logo-footer">
	                    <a href="">
	                        <img src="{{ asset('images/logo/'.$introduces->logo) }}" alt="">
	                    </a>
	                </div>
	                <div class="col-md-4 link-lk">
	                    <h4>LIÊN HỆ</h4>
	                    <a href="">Địa chỉ : {{ $introduces->address }}</a>
	                    <a href="tel:{{ $introduces->phone }}">Số Điện Thoại : {{ $introduces->phone }}</a>
	                    <a href="mailto:{{ $introduces->email }}">Email : {{ $introduces->email }}</a>
	                </div>
	                <div class="col-md-5 link-lk">
	                    <h4>ĐĂNG KÝ NHẬN THÔNG TIN </h4>
	                    <div class="form-dk">
	                        <form>
	                            <div class="form-group">
	                                <input type="text" class="form-control" id="" aria-describedby="text"
	                                    placeholder="Nhập vào số điện thoại">
	                            </div>
	                            <button type="button" class="btn btn-warning">Đăng Ký</button>
	                        </form>

	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</footer>
	<section class="back-to-top">
	    <div class="back-to-top-button">
	        <i class="fas fa-angle-double-up"></i>
	    </div>
	</section>
	<section class="menu-right">
	    <div class="d-flex flex-column">
	        <div class="right-icon">
	            <a href="">
	                <div class="box-menu-right">
	                    <img src="{{ asset('images/logo/'.$introduces->logo) }}" alt="">
	                </div>
	                <span class="right-icon-content">Xuân Phi IELTS</span>
	            </a>

	        </div>
	        <div class="right-icon">
	            <a href="tel:{{ $introduces->phone }}">
	                <div class="box-menu-right">
	                    <i class="fas fa-phone-square fa-2x" style="transform: rotate(90deg);"></i>
	                </div>
	                <span class="right-icon-content">{{ $introduces->phone }}</span>
	            </a>

	        </div>
	        <div class="right-icon">
	            <a href="">
	                <div class="box-menu-right">
                            <i class="fab fa-facebook fa-2x"></i>
	                </div>
	                <a href="{{ $introduces->facebook }}" target="_blank" class="right-icon-content">Mr . Xuân Phi</a>
	            </a>

	        </div>

	    </div>
	</section>
	<script type="text/javascript" src="js/backtotop.js"></script>
