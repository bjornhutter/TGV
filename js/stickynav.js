// JavaScript Document

$(document).ready(function () {

    var navOffset = $(".nav-index").offset().top;

    $(".nav-index").wrap('<div class="nav-placeholder"></div>');

    $(".nav-placeholder").height($(".nav-index").outerHeight());
    
    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();

        if (scrollPos >= navOffset) {
            $(".nav-index").addClass("fixed");
        } else {
            $(".nav-index").removeClass("fixed");
        }

    });

});




