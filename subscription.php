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
    <meta name="description" content="Prenumerera på Tidskrift för genusvetenskap! Tidskriften kommer ut med fyra nummer per år och innehåller aktuell tvärvetenskaplig genusforskning.">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Prenumerera | Tidskrift för genusvetenskap</title>
    <link rel="icon" href="img/tgv_favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,600italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/active_nav.js"></script>
    <script src="js/stickynav.js"></script>
    <script src="js/nav_mobile_toggle.js"></script>
</head>
<body>

<?php include('includes/header_other.inc') ?>
<?php include('includes/navigation.inc') ?>
<?php include('includes/navigation_mobile.inc') ?>
<?php include('includes/db_connect.inc'); ?>
<main class="price-info-wrapper">
    <?php
    $subInfoResult = mysqli_query($link, "SELECT * FROM tgv_subscription_info") or die(mysqli_error($link));
    echo '<section class="subscription-info">';
    while ($subInfoRow = mysqli_fetch_array($subInfoResult)) {
        $subInfoId = $subInfoRow['id'];
        $subInfoTitle = $subInfoRow['title'];
        $subInfoContent = $subInfoRow['content'];
        echo '<h1 class="subscription-info-main-title">' . $subInfoTitle . '</h1>';
        echo '<p>' . $subInfoContent . '</p>';
        if (isset($_SESSION['user'])) {
            echo '<p><a href="dashboard_subscription.php#2" class="edit" target="_blank">Redigera</a></p>';
        }
        echo '</section>';
    }
    ?>
    <?php
    $priceResult = mysqli_query($link, "SELECT * FROM tgv_price") or die(mysqli_error($link));
    echo '<section class="subscription-price">';
    while ($priceRow = mysqli_fetch_array($priceResult)) {
        $priceId = $priceRow['id'];
        $priceTitle = $priceRow['title'];
        $priceContent = $priceRow['content'];
        echo '<h2 class="subscription-price-main-title">' . $priceTitle . '</h2>';
        echo '<p>' . $priceContent . '</p>';
        if (isset($_SESSION['user'])) {
            echo '<p><a href="dashboard_subscription.php#1" class="edit" target="_blank">Redigera</a></p>';
        }
        echo '</section>';
    }
    ?>
</main>

<?php include('includes/footer.inc') ?>
</body>
</html>