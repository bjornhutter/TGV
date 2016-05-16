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
                toolbar: 'undo redo | bold italic | bullist numlist',
                menubar: 'file edit view'
            });
        </script>
        <script src="js/active_dashnav.js"></script>
    </head>
    <body>
    <header class="admin-header">
        <h1 class="header-title">Admin Dashboard</h1>
        <img src="img/icons/menu_white_revorked.svg" alt="Meny" class="toggle-nav" title="Meny">
    </header>
    <div id="site-wrapper">
        <div id="site-canvas">
            <div class="nav-main-wrapper">
                <?php include('includes/dashboard_nav.inc') ?>
                <div class="overview-wrapper">
                    <h1 class="dashboard-title">Hem</h1>
                    <a href="index.php" class="go-back-link" target="_blank">Gå till Hem</a>
                </div>
                <div class="main-outer-wrapper">
                    <main id="main">
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Call for papers</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="cfpTitle" title="Call For Papers Titel">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                                    <textarea name="cfpContent" title="Call For Papers Beskrivning"
                                              rows="10"></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="cfpSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Nyhetsflöde</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="newsTitle" title="Nyhetsflöde Titel">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                                    <textarea name="newsContent" title="Nyhetsflöde Beskrivning" rows="10"></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="newsSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Senaste nummer</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="newNumberTitle" title="Senaste Nummer Titel">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                                <textarea name="newNumberContent" title="Senaste Nummer Beskrivning"
                                          rows="10"></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="newNumberSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script src="js/toggle_nav.js"></script>
    </body>
    </html>
<?php ob_end_flush(); ?>