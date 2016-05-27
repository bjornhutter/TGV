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
        <link rel="icon" href="img/tgv_favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,600italic' rel='stylesheet'
              type='text/css'>
        <link rel="stylesheet"
              href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="js/active_dashnav.js"></script>
    </head>
    <body>
    <header class="update-success-header">
        <h1 class="update-success-header-title">Uppdatering lyckades!</h1>
        <img src="img/icons/menu_white_revorked.svg" alt="Meny" class="toggle-nav" title="Meny">
    </header>
    <div id="site-wrapper">
        <div id="site-canvas">
            <div class="nav-main-wrapper">
                <?php include('includes/dashboard_nav.inc') ?>
                <div class="overview-wrapper">
                    <h1 class="dashboard-title">Kontakt</h1>
                    <a href='dashboard_contact.php' class='go-back-link'>Ta mig tillbaka till dashboarden!</a>
                    <a href="contact.php" class="go-back-link" target="_blank">Gå till Kontakt</a>
                </div>
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
                         * Kontaktinformation
                         */

                        $contactInfoResult = mysqli_query($link, "SELECT * FROM tgv_contact_info") or die(mysqli_error($link));

                        $contactInfoRow = mysqli_fetch_array($contactInfoResult);

                        $contactInfoId = $contactInfoRow['id'];
                        $contactInfoContent = $contactInfoRow['content'];

                        $oldContactInfoContent = $_SESSION['contactInfoContent'];

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
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Kontaktuppgifter</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldContactTitle</p><h2 class='old-title'>Adress:</h2><p class='old-content'>$oldContactAddress</p><h2 class='old-title'>Telefon:</h2><p class='old-content'>$oldContactPhone</p><h2 class='old-title'>Email:</h2><p class='old-content'>$oldContactEmail</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Kontaktuppgifter</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$contactTitle</p><h2 class='new-title'>Adress:</h2><p class='new-content'>$contactAddress</p><h2 class='new-title'>Telefon:</h2><p class='new-content'>$contactPhone</p><h2 class='new-title'>Email:</h2><p class='new-content'>$contactEmail</p>";
                        } elseif (($_GET['update']) == 2) {
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Footer</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldFooterTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldFooterContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Footer</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$footerTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$footerContent</p>";
                        } elseif (($_GET['update']) == 3) {
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Kontaktinformation</h2></div><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldContactInfoContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Kontaktinformation</h2></div><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$contactInfoContent</p>";
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
                            <input type="hidden" name="oldContactInfoContent"
                                   value="<?php echo $oldContactInfoContent ?>">
                            <?php
                            if (($_GET['update']) == 1) {

                                echo '<input class="revert-changes" type="submit" name="revertContactSubmit" value="Ångra ändringar"
                   onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
                            } elseif (($_GET['update']) == 2) {
                                echo '<input class="revert-changes" type="submit" name="revertFooterSubmit" value="Ångra ändringar"
                   onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
                            } elseif (($_GET['update']) == 3) {
                                echo '<input class="revert-changes" type="submit" name="revertContactInfoSubmit" value="Ångra ändringar"
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
            </div>
        </div>
    </div>
    <script src="js/toggle_nav.js"></script>
    </body>
    </html>
<?php ob_end_flush(); ?>