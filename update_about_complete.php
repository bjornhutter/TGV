<?php require('includes/auth.inc'); ?>
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
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="plugins/craftpip-jquery-confirm-4a6f866/dist/jquery-confirm.min.css">
    <script src="plugins/craftpip-jquery-confirm-4a6f866/dist/jquery-confirm.min.js"></script>
    <link rel="stylesheet" type="text/css" href="plugins/craftpip-jquery-confirm-4a6f866/css/jquery-confirm.css">
    <script src="plugins/craftpip-jquery-confirm-4a6f866/js/jquery-confirm.js"></script>-->
</head>
<body>
<header class="update-success-header">
    <h1>Uppdatering lyckades!</h1>
    <div><a href='dashboard_about.php' class='update-success-link'>Ta mig tillbaka till dashboarden!</a></div>
</header>
<?php //include('includes/dashboard_nav.inc') ?>
<div class="main-outer-wrapper-update-success">
    <main class="update-success-main">
        <?php

        include('includes/db_connect.inc');

        $aboutResult = mysqli_query($link, "SELECT * FROM tgv_about") or die(mysqli_error($link));

        $aboutRow = mysqli_fetch_array($aboutResult);

        // Nytt
        $aboutId = $aboutRow['id'];
        $aboutTitle = $aboutRow['title'];
        $aboutContent = $aboutRow['content'];

        //Gammalt
        $oldAboutTitle = $_SESSION['aboutTitle'];
        $oldAboutContent = $_SESSION['aboutContent'];

        if (($_GET['update']) == 1) {
            echo "<div class='old-container'><h1>Gammalt</h1><h2>Info om TGV</h2><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldAboutTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldAboutContent</p></div>";
            echo "<div class='new-container'><h1>Nytt</h1><h2>Info om TGV</h2><h2 class='new-title'>Titel:</h2><p class='new-content'>$aboutTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$aboutContent</p>";
        } //todo ändra och lägg till variabler för Om Redaktionen
        elseif (($_GET['update']) == 2) {
            echo "<div class='old-container'><h1>Gammalt</h1><h2>Om redaktionen</h2><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldAboutTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldAboutContent</p></div>";
            echo "<div class='new-container'><h1>Nytt</h1><h2>Om redaktionen</h2><h2 class='new-title'>Titel:</h2><p class='new-content'>$aboutTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$aboutContent</p>";
        }


        //echo "<div class='old-container'><h1>Gammal info om TGV</h1><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldAboutTitle</p><h2 class='old-title'>Innehåll:</h2><p class='old-content'>$oldAboutContent</p></div>";
        //echo "<div class='new-container'><h1>Ny info om TGV</h1><h2 class='new-title'>Titel:</h2><p class='new-content'>$aboutTitle</p><h2 class='new-title'>Innehåll:</h2><p class='new-content'>$aboutContent</p>";


        ?>
        <form action="dashboard_process.php" method="post">
            <input type="hidden" name="oldAboutTitle" value="<?php echo $oldAboutTitle ?>">
            <input type="hidden" name="oldAboutContent" value="<?php echo $oldAboutContent ?>">
            <?php
            if (($_GET['update']) == 1) {

            echo '<input class="revert-changes" type="submit" name="revertAboutSubmit" value="Ångra ändringar"
                         onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
            } else {
                header('Location: dashboard_send_script.php');
            }
            ?>

        </form>
        <?php
        echo '</div>';
        ?>
    </main>
</div>
<!--<script src="js/jquery_confirm.js"></script>-->
</body>
</html>