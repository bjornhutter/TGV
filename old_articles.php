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
    <title>Tidigare nummer | Tidskrift för genusvetenskap</title>
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

<main class="old-articles-wrapper">
    <section class="old-articles-info">
        <h1 class="old-articles-main-title">Tidigare nummer</h1>
        <p>Tidigare nummer av Tidskrift för genusvetenskap/Kvinnovetenskaplig tidskrift finns samlade i ett arkiv hos Göteborgs Universitetsbibliotek efter ett samarbete med dem och Arbetslivssupport. Där kan du via nätet läsa och ladda hem alla tidigare nummer, från och med 1980, i PDF-format.  </p>
        <a href="http://ojs.ub.gu.se/ojs/index.php/tgv/issue/archive" class="old-articles-link" target="_blank">Till arkivet</a>
    </section>
</main>

<?php include('includes/footer.inc') ?>
</body>
</html>