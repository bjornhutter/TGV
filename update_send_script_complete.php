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
                    <h1 class="dashboard-title">Skicka manus</h1>
                    <a href='dashboard_send_script.php' class='go-back-link'>Ta mig tillbaka till dashboarden!</a>
                    <a href="send_script.php" class="go-back-link" target="_blank">Gå till Skicka manus</a>
                </div>
                <div class="main-outer-wrapper-update-success">
                    <main class="update-success-main">
                        <?php

                        include('includes/db_connect.inc');

                        /*
                         * ANVISNINGAR FÖR ARTIKELSKRIBENTER
                         */

                        $writerGuidelinesResult = mysqli_query($link, "SELECT * FROM tgv_writer_guidelines") or die(mysqli_error($link));

                        $writerGuidelinesRow = mysqli_fetch_array($writerGuidelinesResult);

                        $writerGuidelinesId = $writerGuidelinesRow['id'];
                        $writerGuidelinesTitle = $writerGuidelinesRow['title'];
                        $writerGuidelinesContent = $writerGuidelinesRow['content'];

                        $oldWriterGuidelinesTitle = $_SESSION['writerGuidelinesTitle'];
                        $oldWriterGuidelinesContent = $_SESSION['writerGuidelinesContent'];


                        /*
                         * GENERELLA RIKTLINJER
                         */
                        $guidelinesResult = mysqli_query($link, "SELECT * FROM tgv_guidelines") or die(mysqli_error($link));

                        $guidelinesRow = mysqli_fetch_array($guidelinesResult);

                        $guidelinesId = $guidelinesRow['id'];
                        $guidelinesTitle = $guidelinesRow['title'];
                        $guidelinesContent = $guidelinesRow['content'];

                        $oldGuidelinesTitle = $_SESSION['guidelinesTitle'];
                        $oldGuidelinesContent = $_SESSION['guidelinesContent'];

                        /*
                         * FORM
                         */
                        $formResult = mysqli_query($link, "SELECT * FROM tgv_form") or die(mysqli_error($link));

                        $formRow = mysqli_fetch_array($formResult);

                        $formId = $formRow['id'];
                        $formTitle = $formRow['title'];
                        $formContent = $formRow['content'];

                        $oldFormTitle = $_SESSION['formTitle'];
                        $oldFormContent = $_SESSION['formContent'];

                        /*
                         * Rubriker
                         */
                        $titlesResult = mysqli_query($link, "SELECT * FROM tgv_titles") or die(mysqli_error($link));

                        $titlesRow = mysqli_fetch_array($titlesResult);

                        $titlesId = $titlesRow['id'];
                        $titlesTitle = $titlesRow['title'];
                        $titlesContent = $titlesRow['content'];

                        $oldTitlesTitle = $_SESSION['titlesTitle'];
                        $oldTitlesContent = $_SESSION['titlesContent'];

                        /*
                         * Citat
                         */
                        $quotesResult = mysqli_query($link, "SELECT * FROM tgv_quotes") or die(mysqli_error($link));

                        $quotesRow = mysqli_fetch_array($quotesResult);

                        $quotesId = $quotesRow['id'];
                        $quotesTitle = $quotesRow['title'];
                        $quotesContent = $quotesRow['content'];

                        $oldQuotesTitle = $_SESSION['quotesTitle'];
                        $oldQuotesContent = $_SESSION['quotesContent'];

                        /*
                         * Referenser
                         */
                        $refResult = mysqli_query($link, "SELECT * FROM tgv_ref") or die(mysqli_error($link));

                        $refRow = mysqli_fetch_array($refResult);

                        $refId = $refRow['id'];
                        $refTitle = $refRow['title'];
                        $refContent = $refRow['content'];

                        $oldRefTitle = $_SESSION['refTitle'];
                        $oldRefContent = $_SESSION['refContent'];

                        /*
                         * Anvisningar för recensenter
                         */
                        $scriptRevResult = mysqli_query($link, "SELECT * FROM tgv_script_reviewers") or die(mysqli_error($link));

                        $scriptRevRow = mysqli_fetch_array($scriptRevResult);

                        $scriptRevId = $scriptRevRow['id'];
                        $scriptRevTitle = $scriptRevRow['title'];
                        $scriptRevContent = $scriptRevRow['content'];

                        $oldScriptRevTitle = $_SESSION['scriptRevTitle'];
                        $oldScriptRevContent = $_SESSION['scriptRevContent'];

                        /*
                         * Anvisningar för granskare
                         */

                        $scriptExaminerResult = mysqli_query($link, "SELECT * FROM tgv_script_examiners") or die(mysqli_error($link));

                        $scriptExaminerRow = mysqli_fetch_array($scriptExaminerResult);

                        $scriptExaminerId = $scriptExaminerRow['id'];
                        $scriptExaminerTitle = $scriptExaminerRow['title'];
                        $scriptExaminerContent = $scriptExaminerRow['content'];

                        $oldScriptExaminerTitle = $_SESSION['scriptExaminerTitle'];
                        $oldScriptExaminerContent = $_SESSION['scriptExaminerContent'];

                        if (($_GET['update']) == 1) {
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Riktlinjer</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldGuidelinesTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldGuidelinesContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Riktlinjer</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$guidelinesTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$guidelinesContent</p>";
                        } elseif (($_GET['update']) == 2) {
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Form</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldFormTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldFormContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Form</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$formTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$formContent</p>";
                        } elseif (($_GET['update']) == 3) {
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Rubriker</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldTitlesTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldTitlesContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Rubriker</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$titlesTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$titlesContent</p>";
                        } elseif (($_GET['update']) == 4) {
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Citat</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldQuotesTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldQuotesContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Citat</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$quotesTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$quotesContent</p>";
                        } elseif (($_GET['update']) == 5) {
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Referenser</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldRefTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldRefContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Referenser</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$refTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$refContent</p>";
                        } elseif (($_GET['update']) == 6) {
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Anvisningar för recensenter</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldScriptRevTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldScriptRevContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Anvisningar för recensenter</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$scriptRevTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$scriptRevContent</p>";
                        } elseif (($_GET['update']) == 7) {
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Anvisningar för granskare</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldScriptExaminerTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldScriptExaminerContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Anvisningar för granskare</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$scriptExaminerTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$scriptExaminerContent</p>";
                        } elseif (($_GET['update']) == 8) {
                            echo "<div class='old-container'><div class='old-container-header'><h1>Gammalt</h1><h2>Anvisningar för artikelskribenter</h2></div><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldWriterGuidelinesTitle</p><h2 class='old-title'>Beskrivning:</h2><p class='old-content'>$oldWriterGuidelinesContent</p></div>";
                            echo "<div class='new-container'><div class='new-container-header'><h1>Nytt</h1><h2>Anvisningar för artikelskribenter</h2></div><h2 class='new-title'>Titel:</h2><p class='new-content'>$writerGuidelinesTitle</p><h2 class='new-title'>Beskrivning:</h2><p class='new-content'>$writerGuidelinesContent</p>";
                        }


                        //echo "<div class='old-container'><h1>Gammal info om TGV</h1><h2 class='old-title'>Titel:</h2><p class='old-content'>$oldAboutTitle</p><h2 class='old-title'>Innehåll:</h2><p class='old-content'>$oldAboutContent</p></div>";
                        //echo "<div class='new-container'><h1>Ny info om TGV</h1><h2 class='new-title'>Titel:</h2><p class='new-content'>$aboutTitle</p><h2 class='new-title'>Innehåll:</h2><p class='new-content'>$aboutContent</p>";


                        ?>
                        <form action="dashboard_process.php" method="post">
                            <input type="hidden" name="oldGuidelinesTitle" value="<?php echo $oldGuidelinesTitle ?>">
                            <input type="hidden" name="oldGuidelinesContent"
                                   value="<?php echo $oldGuidelinesContent ?>">
                            <input type="hidden" name="oldFormTitle" value="<?php echo $oldFormTitle ?>">
                            <input type="hidden" name="oldFormContent" value="<?php echo $oldFormContent ?>">
                            <input type="hidden" name="oldTitlesTitle " value="<?php echo $oldTitlesTitle ?>">
                            <input type="hidden" name="oldTitlesContent" value="<?php echo $oldTitlesContent ?>">
                            <input type="hidden" name="oldQuotesTitle" value="<?php echo $oldQuotesTitle ?>">
                            <input type="hidden" name="oldQuotesContent" value="<?php echo $oldQuotesContent ?>">
                            <input type="hidden" name="oldRefTitle" value="<?php echo $oldRefTitle ?>">
                            <input type="hidden" name="oldRefContent" value="<?php echo $oldRefContent ?>">
                            <input type="hidden" name="oldScriptRevTitle" value="<?php echo $oldScriptRevTitle ?>">
                            <input type="hidden" name="oldScriptRevContent" value="<?php echo $oldScriptRevContent ?>">
                            <input type="hidden" name="oldScriptExaminerTitle"
                                   value="<?php echo $oldScriptExaminerTitle ?>">
                            <input type="hidden" name="oldScriptExaminerContent"
                                   value="<?php echo $oldScriptExaminerContent ?>">
                            <input type="hidden" name="oldWriterGuidelinesTitle"
                                   value="<?php echo $oldWriterGuidelinesTitle ?>">
                            <input type="hidden" name="oldWriterGuidelinesContent"
                                   value="<?php echo $oldWriterGuidelinesContent ?>">
                            <?php
                            if (($_GET['update']) == 1) {
                                echo '<input class="revert-changes" type="submit" name="revertGuidelinesSubmit" value="Ångra ändringar"
                   onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
                            } elseif (($_GET['update']) == 2) {
                                echo '<input class="revert-changes" type="submit" name="revertFormSubmit" value="Ångra ändringar"
                   onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
                            } elseif (($_GET['update']) == 3) {
                                echo '<input class="revert-changes" type="submit" name="revertTitlesSubmit" value="Ångra ändringar"
                   onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
                            } elseif (($_GET['update']) == 4) {
                                echo '<input class="revert-changes" type="submit" name="revertQuotesSubmit" value="Ångra ändringar"
                   onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
                            } elseif (($_GET['update']) == 5) {
                                echo '<input class="revert-changes" type="submit" name="revertRefSubmit" value="Ångra ändringar"
                   onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
                            } elseif (($_GET['update']) == 6) {
                                echo '<input class="revert-changes" type="submit" name="revertScriptRevSubmit" value="Ångra ändringar"
                   onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
                            } elseif (($_GET['update']) == 7) {
                                echo '<input class="revert-changes" type="submit" name="revertScriptExaminerSubmit" value="Ångra ändringar"
                   onclick="if(!confirm(\'Detta återställer dina nya ändringar till de gamla igen. Är du säker på att du vill ångra dina nya ändringar?\')) return false">';
                            } elseif (($_GET['update']) == 8) {
                                echo '<input class="revert-changes" type="submit" name="revertWriterGuidelinesSubmit" value="Ångra ändringar"
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
            </div>
        </div>
    </div>
    <script src="js/toggle_nav.js"></script>
    </body>
    </html>
<?php ob_end_flush(); ?>