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
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,600italic' rel='stylesheet'
              type='text/css'>
        <link rel="stylesheet"
              href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <!--<script src="js/stickynav.js"></script>-->
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea',
                toolbar: 'undo redo | bold italic | bullist numlist | link code',
                menubar: 'file edit view insert tools',
                plugins: 'link code'
            });
        </script>
        <script src="js/active_dashnav.js"></script>
    </head>
    <body>
    <?php

    include('includes/db_connect.inc');

    /*
     * Funktion för att byta ut dubbelcitat mot enkelcitat
     */
    function replace_quotes($text)
    {
        $text = str_replace('"', "'", $text);
        return $text;
    }

    ?>
    <header class="admin-header" id="top">
        <h1 class="header-title">Admin Dashboard</h1>
        <img src="img/icons/menu_white_revorked.svg" alt="Meny" class="toggle-nav" title="Meny">
    </header>
    <div id="site-wrapper">
        <div id="site-canvas">
            <div class="nav-main-wrapper">
                <?php include('includes/dashboard_nav.inc') ?>
                <div class="overview-wrapper">
                    <h1 class="dashboard-title">Om oss</h1>
                    <a href='dashboard_about.php' class='go-back-link'>Ta mig tillbaka till dashboarden!</a>
                    <a href="about.php" class="go-back-link" target="_blank" title="Öppnas på ny flik">Gå till Om oss</a>
                </div>
                <div class="main-outer-wrapper">
                    <main id="main">
                        <div class="dashboard-form-full">
                            <!--todo gör responsive så att bilderna inte blir jättesmå (om vi väljer att ha det såhär) -->
                            <h2 class="dashboard-sub-title">Om redaktionen</h2>
                            <ul class="staff-wrapper">
                                <?php
                                include('includes/db_connect.inc');
                                $staffResult = mysqli_query($link, "SELECT * FROM tgv_staff") or die(mysqli_error($link));
                                while ($staffRow = mysqli_fetch_array($staffResult)) {
                                    $staffId = $staffRow['id'];
                                    $staffContent = replace_quotes($staffRow['content']);
                                    $staffFname = replace_quotes($staffRow['fname']);
                                    $staffLname = replace_quotes($staffRow['lname']);
                                    $staffImgName = $staffRow['image'];

                                    echo '<li class="staff">';
                                    echo '<img src="uploads/' . $staffImgName . '" class="staff-img">';
                                    echo '<div class="recent-article-button-wrapper">';
                                    echo '<a href="about_editors_edit.php?id=' . $staffId . '" class="edit">Redigera</a>';
                                    echo '<a href="#top" class="back-to-top-btn">Tillbaks till toppen</a>';
                                    echo '</div>';
                                    echo '<h1 class="staff-title">' . $staffFname . ' ' . $staffLname . '</h1>';
                                    echo '<p class="staff-content">' . $staffContent . '</p>';
                                    //if (isset($_SESSION['user'])) {
                                    //}
                                    echo '</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script src="js/toggle_nav.js"></script>
    <script src="js/add_toggle.js"></script>
    </body>
    </html>
<?php ob_end_flush(); ?>