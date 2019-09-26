	<footer class="container-fluid">
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

	        @foreach($contacts as $value)
				<div class="right-icon">
					<a target="_blank" href="{{$value->link}}">
						<div class="box-menu-right">
							<img src="{{asset('images/contacts').'/'.$value->icon}}" alt="">
						</div>
						<span class="right-icon-content">{{$value->name}}</span>
					</a>

				</div>
			@endforeach

	    </div>
	</section>
	<script type="text/javascript" src="js/backtotop.js"></script>
