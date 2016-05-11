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
                    <h1 class="dashboard-title">Om oss</h1>
                    <a href='dashboard_about.php' class='go-back-link'>Ta mig tillbaks till dashboarden!</a>
                    <a href="about.php" class="go-back-link" target="_blank">Gå till Om oss</a>
                </div>
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
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Info om TGV</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldAboutTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldAboutContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Info om TGV</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$aboutTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$aboutContent</p>";
                        } //todo ändra och lägg till variabler för Om Redaktionen
                        elseif (($_GET['update']) == 2) {
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Om redaktionen</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldAboutTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldAboutContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Om redaktionen</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$aboutTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$aboutContent</p>";
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
                                header('Location: dashboard_about.php');
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