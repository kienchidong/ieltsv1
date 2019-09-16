@extends('master-layout')
@section('title')
    Đăng Ký
@endsection
@section('content')
<section class="lienhe">
    <div class="container-fluid">
        <div class="container">
            {{--  <h3 class="text-center border-bot">Liên hệ ngay với chúng tôi</h3>  --}}
            <div class="row">
                <div class="col-md-5">
                    <img class="img-contact" src="image/logo.png" alt="">
                    <h3 class="text-center">Trung Tâm Ielst Xuan Phi</h3>
                    <div class="location d-flex flex-column">
                        <span>Địa chỉ : Tòa nhà Dream House, số 63, ngõ 136 Chùa Láng, Hà Nội </span>
                        <span>Email : xuanphiielst@gmail.com</span>
                        <span>Điện Thoại : 096 890 7276</span>
                        <span>Facebook : <a href="facebook.com">Xuan Phi</a></span>
                    </div>
                </div>
                <div class="col-md-7 form-lienhe">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Họ và Tên</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Số Điên Thoại</label>
                                <input type="number" class="form-control" id="phone">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="select">Khóa học</label>
                                <select class="form-control" id="select">
                                  <option>Cơ bản</option>
                                  <option>Nâng cao</option>
                                  <option>datastructure and algorithms</option>

                                </select>
                                <small id="select" class="form-text text-muted">
                                    Thông tin của bạn sẽ được chúng tôi kiểm tra và phản hồi sớm nhất !
                                  </small
                              </div>
                        </div>
                        {{--  <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>  --}}

                        <button type="submit" class="btn btn-primary">Đăng Ký</button>
                    </form>
                    <iframe class="mt-4"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1
                    d3724.2375398297418!2d105.80500911457912!3d21.02317939334537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab687560f3ad%3A0xa5522c45c9015e23!2zS2jDoWNoIHPhuqFuIERyZWFtIEhvdXNl!5e0!3m2!1svi!2s!4v1568473282304!5m2!1svi!2s"
                    width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
