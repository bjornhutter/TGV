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
</head>
<body>

<header>

</header>
<?php include('includes/navigation.inc') ?>
<main class="contact-wrapper">
    <?php
    include('includes/db_connect.inc');
    $contactResult = mysqli_query($link, "SELECT * FROM tgv_contact") or die(mysqli_error($link));

    echo '<section class="contact-info">';
    echo '<ul class="contact-info-ul">';
    $contactRow = mysqli_fetch_array($contactResult);

    $contactId = $contactRow['id'];
    $contactTitle = $contactRow['title'];
    $contactAddress = $contactRow['address'];
    $contactPhone = $contactRow['phone'];
    $contactEmail = $contactRow['email'];

    echo '<p>' . $contactTitle . '</p>';
    echo '<li class="contact-info-li">' . $contactAddress . '</li>';
    echo '<li class="contact-info-li">' . $contactPhone . '</li>';
    echo '<li class="contact-info-li">' . $contactEmail . '</li>';

    //if (isset($_SESSION['user'])) {

    //Behöver inte GET ID
    //echo '<p><a href="contact_edit.php?id=' . $contactId . '">Redigera</a></p>';

    echo '<p><a href="dashboard_contact.php">Redigera</a></p>';

    //}
    echo '</ul>';
    echo '</section>';

    ?>
    <section class="contact-map">
        <div class="map">

        </div>
    </section>
</main>

<?php include('includes/footer.inc') ?>
</body>
</html>