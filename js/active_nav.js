jQuery(document).ready(function($){
    // Get current path and find target link
    var path = window.location.pathname.split("/").pop();

    // Account for home page with empty path
    if ( path == '' ) {
        path = 'index.php';
    }

    var target = $('nav a[href="'+path+'"]');
    // Add active class to target link
    target.addClass('active');
});