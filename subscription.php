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
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Prenumerera | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/stickynav.js"></script>
    <script src="js/active_nav.js"></script>
</head>
<body>

<?php include('includes/navigation.inc') ?>
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
            echo '<p><a href="dashboard_subscription.php" class="edit">Redigera</a></p>';
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
        echo '<h1 class="subscription-price-main-title">' . $priceTitle . '</h1>';
        echo '<p>' . $priceContent . '</p>';
        if (isset($_SESSION['user'])) {
            echo '<p><a href="dashboard_subscription.php" class="edit">Redigera</a></p>';
        }
        echo '</section>';
    }
    ?>
</main>

<?php include('includes/footer.inc') ?>
</body>
</html>