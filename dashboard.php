<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <!--<link rel="stylesheet" type="text/css" href="css/master.css">-->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <title>Dashboard | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body>
<?php // include('includes/db_connect.inc') ?>
<header>
    <h1>Admin Dashboard</h1>
</header>
<nav>
    <ul>
        <!--todo ändra från anchors till buttons? -->
        <li>
            <a href="#" id="home-btn">Hem</a>
        </li>
        <li>
            <a href="#" id="about-btn">Om oss</a>
        </li>
        <li>
            <a href="#" id="subscription-btn">Prenumerera</a>
        </li>
        <li>
            <a href="#" id="send-script-btn">Skicka manus</a>
        </li>
        <li>
            <a href="#" id="contact-btn">Kontakt</a>
        </li>
    </ul>
</nav>
<div class="main-outer-wrapper">
    <main id="main">
        <!--todo ändra från ajax till vanliga .php sidor? -->

    </main>
</div>

<script src="js/dashboard_ajax_load_html.js"></script>
</body>
</html>