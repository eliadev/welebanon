$(function () {
    "use strict";
    // Header shrink while page scroll
    adjustHeader();
    doSticky();
    $(window).on('scroll', function () {
        adjustHeader();
        doSticky();
    });
	
    function adjustHeader()
    {
        var windowWidth = $(window).width();
        if(windowWidth > 992) {
            if ($(document).scrollTop() >= 100) {
                if($('.header-shrink').length < 1) {
                    $('.sticky-header').addClass('header-shrink');
                }
                if($('.do-sticky').length < 1) {
                    $('.logo img').attr('src', '/assets/img/logo-black.png');
                }
            }
            else {
                $('.sticky-header').removeClass('header-shrink');
                if($('.do-sticky').length < 1) {
                    $('.logo img').attr('src', '/assets/img/logo-white.png');
                }
            }
        } else {
            $('.logo img').attr('src', '/assets/img/logo-black.png');
        }
    }

    function doSticky()
    {
        if ($(document).scrollTop() > 40) {
            $('.do-sticky').addClass('sticky-header');
            //$('.do-sticky').addClass('header-shrink');
        }
        else {
            $('.do-sticky').removeClass('sticky-header');
            //$('.do-sticky').removeClass('header-shrink');
        }
    }
});
