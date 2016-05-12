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
    <script src="js/active_nav.js"></script>
    <script src="js/stickynav.js"></script>
</head>
<body>

<header>

</header>
<?php include('includes/navigation.inc') ?>
<?php include('includes/db_connect.inc'); ?>
<main class="price-info-wrapper">
    <?php
    $result = mysqli_query($link, "SELECT * FROM tgv_subscription_info") or die(mysqli_error());

    echo '<section class="subscription-info">';
    while ($row = mysqli_fetch_array($result)) {

        $id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];

        echo '<h1 class="subscription-info-main-title">' . $title . '</h1>';
        echo '<p>' . $content . '</p>';

        //if (isset($_SESSION['user'])) {
        echo '<p><a href="subscription_info_edit.php?id=' . $id . '">Redigera</a></p>';
        //}
    }
    ?>
    </section>
    <?php
    $result = mysqli_query($link, "SELECT * FROM tgv_subscription_price") or die(mysqli_error());

    echo '<section class="subscription-price">';
    while ($row = mysqli_fetch_array($result)) {

        $id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];

        echo '<h1 class="subscription-price-main-title">' . $title . '</h1>';
        echo '<p>' . $content . '</p>';

        //if (isset($_SESSION['user'])) {
        echo '<p><a href="subscription_price_edit.php?id=' . $id . '">Redigera</a></p>';
        //}
    }
    ?>
    </section>
</main>

<?php include('includes/footer.inc') ?>
</body>
</html>