/**
 * Created by Bjorn on 2016-05-17.
 */
$(document).ready(function () {

    $("#add-toggle").click(function () {
        $("#add-staff, #add-article").stop(true, true).slideToggle(400);


    });

    $("#add-news-toggle").click(function () {
        $("#add-news-post").stop(true, true).slideToggle(400);


    });


});

$(document).ready(function () {
    $("#add-toggle").click(function () {
        if ($(this).hasClass("add-toggle-icon-plus"))
            $("#add-toggle").removeClass("add-toggle-icon-plus").addClass("add-active");
        else {
            $("#add-toggle").removeClass("add-active").addClass("add-toggle-icon-plus");
        }
    })
});

$(document).ready(function () {
    $("#add-news-toggle").click(function () {
        if ($(this).hasClass("add-toggle-icon-plus"))
            $("#add-news-toggle").removeClass("add-toggle-icon-plus").addClass("add-active");
        else {
            $("#add-news-toggle").removeClass("add-active").addClass("add-toggle-icon-plus");
        }
    })
});