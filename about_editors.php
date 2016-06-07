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
        <!--<script src="js/stickynav.js"></script>-->
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea',
                toolbar: 'undo redo paste | bold italic | bullist numlist | link code',
                menubar: 'file edit view insert tools',
                plugins: 'link code paste',
                content_css: 'css/tinymce.css',
                paste_as_text: true
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
                    <h1 class="dashboard-title">Om TGV</h1>
                    <a href='dashboard_about.php' class='go-back-link'>Ta mig tillbaka till dashboarden!</a>
                    <a href="about.php" class="go-back-link" target="_blank" title="Öppnas på ny flik">Gå till Om TGV</a>
                </div>
                <div class="main-outer-wrapper">
                    <main id="main">
                        <div class="dashboard-form-full">
                            <h2 class="dashboard-sub-title">Alla redaktörer</h2>
                            <ul class="staff-wrapper">
                                <?php
                                include('includes/db_connect.inc');
                                $staffResult = mysqli_query($link, "SELECT * FROM tgv_staff ORDER BY DATE DESC") or die(mysqli_error($link));
                                while ($staffRow = mysqli_fetch_array($staffResult)) {
                                    $staffId = $staffRow['id'];
                                    $staffContent = replace_quotes($staffRow['content']);
                                    $staffFname = replace_quotes($staffRow['fname']);
                                    $staffLname = replace_quotes($staffRow['lname']);
                                    $staffTitle = replace_quotes($staffRow['title']);
                                    $staffImgName = $staffRow['image'];

                                    echo '<li class="staff">';
                                    echo '<img src="uploads/' . $staffImgName . '" class="staff-img">';
                                    echo '<h1 class="staff-title">' . $staffFname . ' ' . $staffLname . '</h1>';
                                    echo '<p class="staff-title-2">' . $staffTitle . '</p>';
                                    echo $staffContent;
                                    echo '<div class="recent-article-button-wrapper">';
                                    echo '<a href="about_editors_edit.php?id=' . $staffId . '" class="edit">Redigera</a>';
                                    echo '<a href="#top" class="back-to-top-btn">Tillbaka till toppen</a>';
                                    echo '</div>';
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