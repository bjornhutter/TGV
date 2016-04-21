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
            <a href="dashboard.php" id="home-btn">Hem</a>
        </li>
        <li>
            <a href="dashboard_about.php" id="about-btn">Om oss</a>
        </li>
        <li>
            <a href="dashboard_subscription.php" id="subscription-btn">Prenumerera</a>
        </li>
        <li>
            <a href="dashboard_send_script.php" id="send-script-btn">Skicka manus</a>
        </li>
        <li>
            <a href="dashboard_contact.php" id="contact-btn">Kontakt</a>
        </li>
    </ul>
</nav>
<div class="main-outer-wrapper">
    <main id="main">
        <form action="dashboard_process.php" method="post">
            <h1>Prenumerera</h1>
            <h2>Redigera Prislista</h2>
            <ul>
                <li>
                    <p>Titel: </p>
                    <input type="text" name="priceTitle" title="Prislista Titel">
                </li>
                <li>
                    <p>Beskrivning: </p>
                    <textarea name="priceContent" title="Prislista Beskrivning" rows="10"></textarea>
                </li>
                <li>
                    <input type="submit" name="priceSubmit" value="Spara Ändringar">
                </li>
            </ul>
        </form>
        <form action="dashboard_process.php" method="post">
            <h2>Redigera Prenumereringsinfo</h2>
            <ul>
                <li>
                    <p>Titel: </p>
                    <input type="text" name="subscriptionInfoTitle" title="Prenumereringsinfo Titel">
                </li>
                <li>
                    <p>Beskrivning: </p>
                    <textarea name="subscriptionInfoContent" title="Prenumereringsinfo Beskrivning"
                              rows="10"></textarea>
                </li>
                <li>
                    <input type="submit" name="subscriptionInfoSubmit" value="Spara Ändringar">
                </li>
            </ul>
        </form>
    </main>
</div>

<!--todo ta bort om vi inte behöver ajax <script src="js/dashboard_ajax_load_html.js"></script>-->
</body>
</html>