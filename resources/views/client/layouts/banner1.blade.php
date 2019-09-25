<section class="section-banner">
    <div class="container-fluid title-background">
            <div class="banner owl-carousel owl-theme">
                @foreach($homesliders as $value)
                    <div class="item">
                        <div class="silder-image">
                            <img src="{{ asset('images/sliders/'.$value->image) }}"
                                alt="First slide">
                        </div>
                        <div class="col-md-12 banner-title">
                                {{--<div class="text">English</div>--}}
                                <div class="text ml-3">
                                  <span>{{ $value->title }}</span>
                                </div class="text">
                        </div>
                    </div>
                @endforeach
             {{--   <div class="item">
                    <div class="silder-image">
                        <img src="image/bg1.jpg"
                            alt="First slide">
                    </div>

                </div>
                <div class="item">
                    <div class="silder-image">
                        <img src="image/bg1.jpg"
                            alt="First slide">
                    </div>
                </div>--}}
            </div>
        </div>
    </div>

</section>
<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/doitac-carousel-config.js"></script>
