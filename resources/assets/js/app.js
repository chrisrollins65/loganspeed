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

/* ==========================================================================
 Contact Form
 ========================================================================== */

var contactFormSubmitted = false;
$('#contact-form').submit(function(e){
    e.preventDefault();
    if (contactFormSubmitted) {
        return;
    }
    contactFormSubmitted = true;
    var $this = $(this);
    $.post(logan.contactPostUrl, $this.serialize())
        .done(function() {
            $this.find(':input').attr('disabled', 'disabled');
            $this.fadeTo("slow", 0.15, function() {
                $this.find('label').css('cursor', 'default');
                $('.success-cf').fadeIn();
            });
        })
        .fail(function() {
            $this.fadeTo("slow", 0.15, function() {
                $('.error-cf').fadeIn();
            });
        })
});