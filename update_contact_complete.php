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
    <div><a href='dashboard_contact.php' class='update-success-link'>Ta mig tillbaka till dashboarden!</a></div>
</header>
<?php //include('includes/dashboard_nav.inc') ?>
<div class="main-outer-wrapper-update-success">
    <main class="update-success-main">
        <?php

        include('includes/db_connect.inc');

        /*
         * Kontaktuppgifter
         */
        $contactResult = mysqli_query($link, "SELECT * FROM tgv_contact") or die(mysqli_error($link));

        $contactRow = mysqli_fetch_array($contactResult);

        $contactId = $contactRow['id'];
        $contactTitle = $contactRow['title'];
        $contactAddress = $contactRow['address'];
        $contactPhone = $contactRow['phone'];
        $contactEmail = $contactRow['email'];

        $oldContactTitle = $_SESSION['contactTitle'];
        $oldContactAddress = $_SESSION['contactAddress'];
        $oldContactPhone = $_SESSION['contactPhone'];
        $oldContactEmail = $_SESSION['contactEmail'];


        /*
         * Footer
         */
        $footerResult = mysqli_query($link, "SELECT * FROM tgv_footer") or die(mysqli_error($link));

        $footerRow = mysqli_fetch_array($footerResult);

        $footerId = $footerRow['id'];
        $footerTitle = $footerRow['title'];
        $footerContent = $footerRow['content'];

        $oldFooterTitle = $_SESSION['footerTitle'];
        $oldFooterContent = $_SESSION['footerContent'];


        if (($_GET['update']) == 1) {
            echo "<div class='old-container'><h1>Gammalt</h1><h2>Kontaktuppgifter</h2><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldContactTitle</p><h2 class='old-title'>Adress:</h2><p class='old-content'>$oldContactAddress</p><h2 class='old-title'>Telefon:</h2><p class='old-content'>$oldContactPhone</p><h2 class='old-title'>Email:</h2><p class='old-content'>$oldContactEmail</p></div>";
            echo "<div class='new-container'><h1>Nytt</h1><h2>Kontaktuppgifter</h2><h2 class='new-title'>Titel:</h2><p class='new-content'>$contactTitle</p><h2 class='new-title'>Adress:</h2><p class='new-content'>$contactAddress</p><h2 class='new-title'>Telefon:</h2><p class='new-content'>$contactPhone</p><h2 class='new-title'>Email:</h2><p class='new-content'>$contactEmail</p>";
        } elseif (($_GET['update']) == 2) {
            echo "<div class='old-container'><h1>Gammalt</h1><h2>Footer</h2><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldFooterTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldFooterContent</p></div>";
            echo "<div class='new-container'><h1>Nytt</h1><h2>Footer</h2><h2 class='new-title'>Titel:</h2><p class='new-content'>$footerTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$footerContent</p>";
        }


        //echo "<div class='old-container'><h1>Gammal info om TGV</h1><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldAboutTitle</p><h2 class='old-title'>Innehåll:</h2><p class='old-content'>$oldAboutContent</p></div>";
        //echo "<div class='new-container'><h1>Ny info om TGV</h1><h2 class='new-title'>Titel:</h2><p class='new-content'>$aboutTitle</p><h2 class='new-title'>Innehåll:</h2><p class='new-content'>$aboutContent</p>";


        ?>
        <form action="dashboard_process.php" method="post">
            <input type="hidden" name="oldContactTitle" value="<?php echo $oldContactTitle ?>">
            <input type="hidden" name="oldContactAddress" value="<?php echo $oldContactAddress ?>">
            <input type="hidden" name="oldContactPhone" value="<?php echo $oldContactPhone ?>">
            <input type="hidden" name="oldContactEmail" value="<?php echo $oldContactEmail ?>">
            <input type="hidden" name="oldFooterTitle" value="<?php echo $oldFooterTitle ?>">
            <input type="hidden" name="oldFooterContent" value="<?php echo $oldFooterContent ?>">
            <?php
            if (($_GET['update']) == 1) {

                echo '<input class="revert-changes" type="submit" name="revertContactSubmit" value="Ångra ändringar"
                   onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
            } elseif (($_GET['update']) == 2) {
                echo '<input class="revert-changes" type="submit" name="revertFooterSubmit" value="Ångra ändringar"
                   onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
            } else {
                header('Location: dashboard_contact.php');
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