"use strict";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const navBarPadding = 54;

// Smooth scrolling using jQuery easing
$('.js-scroll-trigger').click(function(e) {
    e.preventDefault();
    $('.navbar-collapse').collapse('hide');
    var target = $('#'+ $(this).attr('data-target'));
    if (target.length) {
        $('html, body').animate({
            scrollTop: (target.offset().top - navBarPadding)
        }, 1500, "easeInOutExpo");
        return false;
    }
});