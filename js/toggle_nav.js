/*====================================
 =            ON DOM READY            =
 ====================================*/
$(function () {
    $('.toggle-nav').click(function () {
        // Calling a function in case you want to expand upon this.
        toggleNav();
    });
});


/*========================================
 =            CUSTOM FUNCTIONS            =
 ========================================*/
/*function toggleNav() {
 if ($('#site-wrapper').hasClass('show-nav')) {
 // Do things on Nav Close
 $('#site-wrapper').removeClass('show-nav');
 } else {
 // Do things on Nav Open
 $('#site-wrapper').addClass('show-nav');
 }

 //$('#site-wrapper').toggleClass('show-nav');
 }*/

function toggleNav() {
    if ($('#site-wrapper').hasClass('show-nav')) {
        // Logic here if browser doesn't support/have CSS3 Transforms
        $('#site-wrapper').css('margin-right', '0px');
        $('#site-wrapper').removeClass('show-nav');
    } else {
        // Logic here if browser doesn't support/have CSS3 Transforms
        $('#site-wrapper').css('margin-right', '-300px');
        $('#site-wrapper').addClass('show-nav');
    }

    //$('#site-wrapper').toggleClass('show-nav');
}

$(document).keyup(function (e) {
    if (e.keyCode == 27) {
        if ($('#site-wrapper').hasClass('show-nav')) {
            // Assuming you used the function I made from the demo
            toggleNav();
        }
    }
});