<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kontakta oss på Tidskrift för Genusvetenskap!">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Kontakt | Tidskrift för genusvetenskap</title>
    <link rel="icon" href="img/tgv_favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,600italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/active_nav.js"></script>
    <script src="js/nav_mobile_toggle.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
        function initialize() {
            var myLatLng = new google.maps.LatLng(59.406517, 13.582419);

            var styleArray = [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"administrative","elementType":"labels","stylers":[{"saturation":"-100"}]},{"featureType":"administrative","elementType":"labels.text","stylers":[{"gamma":"0.75"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"lightness":"-37"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f9f9f9"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"saturation":"-100"},{"lightness":"40"},{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"labels.text.fill","stylers":[{"saturation":"-100"},{"lightness":"-37"}]},{"featureType":"landscape.natural","elementType":"labels.text.stroke","stylers":[{"saturation":"-100"},{"lightness":"100"},{"weight":"2"}]},{"featureType":"landscape.natural","elementType":"labels.icon","stylers":[{"saturation":"-100"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"saturation":"-100"},{"lightness":"80"}]},{"featureType":"poi","elementType":"labels","stylers":[{"saturation":"-100"},{"lightness":"0"}]},{"featureType":"poi.attraction","elementType":"geometry","stylers":[{"lightness":"-4"},{"saturation":"-100"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"},{"visibility":"on"},{"saturation":"-95"},{"lightness":"62"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road","elementType":"labels","stylers":[{"saturation":"-100"},{"gamma":"1.00"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"gamma":"0.50"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"saturation":"-100"},{"gamma":"0.50"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"},{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"lightness":"-13"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"lightness":"0"},{"gamma":"1.09"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"},{"saturation":"-100"},{"lightness":"47"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"lightness":"-12"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"saturation":"-100"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"},{"lightness":"77"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"lightness":"-5"},{"saturation":"-100"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"saturation":"-100"},{"lightness":"-15"}]},{"featureType":"transit.station.airport","elementType":"geometry","stylers":[{"lightness":"47"},{"saturation":"-100"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},{"featureType":"water","elementType":"geometry","stylers":[{"saturation":"53"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":"-42"},{"saturation":"17"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"lightness":"61"}]}];

            var map = new google.maps.Map(document.getElementById("map"),
                {
                    styles: styleArray,
                    zoom: 13,
                    scrollwheel: false,
                    center: myLatLng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

            var marker = new google.maps.Marker(
                {
                    position: myLatLng,
                    map: map,
                    title: 'TGV'
                });
        }
    </script>
</head>
<body onload="initialize()" onunload="GUnload()">
<?php include('includes/navigation_mobile.inc') ?>
<?php include('includes/navigation.inc') ?>
<main class="contact-wrapper">
    <?php
    include('includes/db_connect.inc');
    $contactResult = mysqli_query($link, "SELECT * FROM tgv_contact") or die(mysqli_error($link));

    echo '<section class="contact-info">';
    $contactRow = mysqli_fetch_array($contactResult);

    $contactId = $contactRow['id'];
    $contactTitle = $contactRow['title'];
    $contactAddress = $contactRow['address'];
    $contactPhone = $contactRow['phone'];
    $contactEmail = $contactRow['email'];
    
    echo '<h1 class="contact-info-main-title">' . $contactTitle . '</h1>';
    echo '<ul class="contact-info-ul">';
    echo '<li class="contact-info-li">' . $contactAddress . '</li>';
    echo '<li class="contact-info-li">' . $contactPhone . '</li>';
    echo '<li class="contact-info-li">' . $contactEmail . '</li>';
    echo '</ul>';
    


    if (isset($_SESSION['user'])) {

    //Behöver inte GET ID
    //echo '<p><a href="contact_edit.php?id=' . $contactId . '">Redigera</a></p>';

    echo '<p><a href="dashboard_contact.php" class="edit" target="_blank">Redigera</a></p>';

    }
    echo '</section>';

?>
    <?php
   include('includes/db_connect.inc');
    $contactInfoResult = mysqli_query($link, "SELECT * FROM tgv_contact_info") or die(mysqli_error($link));

    echo ' <section class="contact-more-info">';
    $contactInfoRow = mysqli_fetch_array($contactInfoResult);

    $contactInfoId = $contactInfoRow['id'];
    $contactInfoContent = $contactInfoRow['content'];

    echo '<p>' . $contactInfoContent . '</p>';

    if (isset($_SESSION['user'])) {
        echo '<p><a href="dashboard_contact.php" class="edit" target="_blank">Redigera</a></p>';
    }
    echo '</section>';

    ?>
<section class="contact-map">
    <div id="map">
        </div>
    </section>
</main>

<?php include('includes/footer.inc') ?>
</body>
<script src="js/menu_toggle.js"></script>
</html>