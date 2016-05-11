// JavaScript Document

$(document).ready(function () {

    var navOffset = $("nav").offset().top;

    $("nav").wrap('<div class="nav-placeholder"></div>');

    $(".nav-placeholder").height($("nav").outerHeight());
    
    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();

        if (scrollPos >= navOffset) {
            $("nav").addClass("fixed");
        } else {
            $("nav").removeClass("fixed");
        }

    });

});




