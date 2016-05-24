/**
 * Created by Bjorn on 2016-05-24.
 */

$(document).ready(function () {
    $(window).resize(function () {

        $("#menu-slidedown").css({display: block});


    });

    $("#menu-toggle").click(function () {

        $("#menu-slidedown").stop(true, true).slideToggle(400);
    });

});
