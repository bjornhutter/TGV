// JavaScript Document

$(document).ready(function () {

    var navOffset = $(".nav-sticky").offset().top;

    $(".nav-sticky").wrap('<div class="nav-placeholder"></div>');

    $(".nav-placeholder").height($(".nav-sticky").outerHeight());
    
    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();

        if (scrollPos >= navOffset) {
            $(".nav-sticky").addClass("fixed");
        } else {
            $(".nav-sticky").removeClass("fixed");
        }

    });

});




