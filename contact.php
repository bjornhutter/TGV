<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Kontakt | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
        var myLatLng = new google.maps.LatLng(59.406517, 13.582419);
        function initialize() {
            var map = new google.maps.Map(document.getElementById("map"),
                {
                    zoom: 17,
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

<header>

</header>
<?php include('includes/navigation.inc') ?>
<main class="contact-wrapper">
<?php
include('includes/db_connect.inc');
$result = mysqli_query($link, "SELECT * FROM contact") or die(mysqli_error());

echo '<section class="contact-info">';
echo '<ul class="contact-info-ul">';
while ($row = mysqli_fetch_array($result)) {

    $id = $row['id'];
    $title = $row['title'];
    $adress = $row['adress'];
    $phone = $row['phone'];
    $email = $row['email'];

    echo '<p>' . $title . '</p>';
    echo '<li class="contact-info-li">' . $adress . '</li>';
    echo '<li class="contact-info-li">' . $phone . '</li>';
    echo '<li class="contact-info-li">' . $email . '</li>';

    //if (isset($_SESSION['user'])) {
        echo '<p><a href="contact_edit.php?id=' . $id . '">Redigera</a></p>';
    //}
    echo '</ul>';
    echo '</section>';
}
?>
<section class="contact-map">
    <div id="map">

    </div>
</section>
</main>

<?php include('includes/footer.inc') ?>
</body>
</html>