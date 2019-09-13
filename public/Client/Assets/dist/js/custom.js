(function ($) {
    //carousels
    $('#carousel-courses').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        navigation: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1140: {
                items: 4,
            }
        }
    });

    $('.top-menu-item').click(function (e) {
        e.preventDefault();
        if ($(window).width() < 415) {
            if ($(this).first().parent().find('ul').hasClass("sub-menu")) {
                $(this).first().parent().find('ul').removeClass("sub-menu").addClass("xs-sub-menu");
            }
            else {
                $(this).first().parent().find('ul').removeClass("xs-sub-menu").addClass("sub-menu");
            }

            if ($(this).first().parent().children().length == 1) {
                window.location.href = e.currentTarget.href
            }
        }
        else {
            window.location.href = e.currentTarget.href
        }
    });

    if ($(window).width() < 415) {
        $('#sticky-register').addClass("sticky-xs");
        $('#myCarousel').css({ 'height': '38vh' });
        $('#myCarousel > .carousel-inner').css({ 'height': '38vh' });
        $('#myCarousel > .carousel-inner > .active').css({ 'height': '38vh !important' });
    }
})(jQuery);

$(window).scroll(function () {
    showNavStickey();
    showRegisterStickey();

    //for animations
    clearTimeout($.data(this, "scrollCheck"));
    //$.data(this, "scrollCheck", setTimeout(function () {
    //    hideRegisterStickey();
    //}, 2000));

    $.data(this, "scrollCheck", setTimeout(function () {
        var i = 0, howManyTimes = 10;
        function f() {
            var itemId = "#" + i + "-teacher-item";
            if (inViewport(itemId, true)) {
                if (!$(itemId).hasClass("teacher-item-animate")) {
                    $(itemId).addClass("teacher-item-animate");
                }
            }
            i++;
            if (i < howManyTimes) {
                setTimeout(f, 100);
            }
        }
        f();
    }, 100));

    $.data(this, "scrollCheck", setTimeout(function () {
        if (inViewport("#milestone")) {
            runMilestoneCounter();
        }
    }, 100));
});

$(window).resize(function () {
    if ($(window).width() < 768) {
        $('.navbar-default').addClass('is-stickey');
    } else {
        $('.navbar-default.is-stickey').removeClass('is-stickey');
    }
});

function runMilestoneCounter() {
    //milestone
    $('.milestone-counter').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
}

function showNavStickey() {
    let distance = $(window).scrollTop();
    if (distance > 50) {
        $('.navbar-default').addClass('is-stickey');
    } else {
        $('.navbar-default.is-stickey').removeClass('is-stickey');
    }
}

function showRegisterStickey() {
    if (!$('#sticky-register').hasClass("show-sticky-register")) {
        $('#sticky-register').addClass("show-sticky-register");
    }
}

function hideRegisterStickey() {
    if ($('#sticky-register').hasClass("show-sticky-register")) {
        $('#sticky-register').removeClass("show-sticky-register");
    }
}

function inViewport(element, detectPartial) {
    element = $(element);
    detectPartial = (!!detectPartial);

    try {
        var viewport = $(window),
            vpWidth = viewport.width(),
            vpHeight = viewport.height(),
            vpTop = viewport.scrollTop(),
            vpBottom = vpTop + vpHeight,
            vpLeft = viewport.scrollLeft(),
            vpRight = vpLeft + vpWidth,

            elementOffset = element.offset(),
            elementTopArea = elementOffset.top + ((detectPartial) ? element.height() : 0),
            elementBottomArea = elementOffset.top + ((detectPartial) ? 0 : element.height());
        //elementLeftArea = elementOffset.left + ((detectPartial) ? element.width() : 0),
        //elementRightArea = elementOffset.left + ((detectPartial) ? 0 : element.width());
        //&& ((elementRightArea <= vpRight) && (elementLeftArea >= vpLeft))

        return ((elementBottomArea <= vpBottom) && (elementTopArea >= vpTop));
    } catch (err) {
        //console.log("error: " + element);
    }

}