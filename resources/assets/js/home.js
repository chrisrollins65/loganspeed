"use strict";

/* ==========================================================================
 Background Slideshow images
 ========================================================================== */

$(".main").backstretch([
    "img/bg-1.jpg",
    "img/bg-2.jpg",
    "img/bg-3.jpg"
], {
    fade: 750,
    duration: 4000
});


/* ==========================================================================
 On Scroll animation
 ========================================================================== */

if ($(window).width() > 992) {
    new WOW().init();
}


/* ==========================================================================
 Fade On Scroll
 ========================================================================== */

if ($(window).width() > 992) {

    $(window).on('scroll', function() {
        $('.main').css('opacity', function() {
            return 1 - ($(window).scrollTop() / $(this).outerHeight());
        });
    });
}


/* ==========================================================================
 Textrotator
 ========================================================================== */

$(".rotate").textrotator({
    animation: "dissolve",
    separator: ",",
    speed: 2500
});

/* ==========================================================================
 Contact Form
 ========================================================================== */

var submitted = false;
$('#contact-form').submit(function(e){
    e.preventDefault();
    if (submitted) {
        return;
    }
    submitted = true;
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

// Collapse Navbar
var navbarCollapse = function navbarCollapse() {
    if ($("#mainNav").offset().top >= 100) {
        $("#mainNav").addClass("navbar-shrink");
    } else {
        $("#mainNav").removeClass("navbar-shrink");
    }
};
// Collapse now if page is not at top
navbarCollapse();
// Collapse the navbar when page is scrolled
$(window).scroll(navbarCollapse);
