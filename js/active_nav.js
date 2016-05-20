jQuery(document).ready(function ($) {
    var path = window.location.pathname.split("/").pop();
    if (path == '') {
        path = 'index.php';
    }
    var target = $('nav a[href="' + path + '"]');
    target.addClass('active');
});
