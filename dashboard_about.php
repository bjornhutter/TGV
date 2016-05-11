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
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
        <script src="js/active_dashnav.js"></script>
    </head>
    <body>
    <?php

    include('includes/db_connect.inc');

    /*
     * Info om TGV
     */
    $aboutResult = mysqli_query($link, "SELECT * FROM tgv_about") or die(mysqli_error($link));

    $aboutRow = mysqli_fetch_array($aboutResult);

    $aboutId = $aboutRow['id'];
    $aboutTitle = $aboutRow['title'];
    $aboutContent = $aboutRow['content'];

    $_SESSION['aboutTitle'] = $aboutTitle;
    $_SESSION['aboutContent'] = $aboutContent;
    ?>
    <header class="admin-header">
        <h1 class="header-title">Admin Dashboard</h1>
        <img src="img/icons/menu_white_revorked.svg" alt="Meny" class="toggle-nav" title="Meny">
    </header>
    <div id="site-wrapper">
        <div id="site-canvas">
            <div class="nav-main-wrapper">
                <?php include('includes/dashboard_nav.inc') ?>
                <div class="overview-wrapper">
                    <h1 class="dashboard-title">Om oss</h1>
                    <a href="about.php" class="go-back-link" target="_blank">Gå till Om oss</a>
                </div>
                <div class="main-outer-wrapper">
                    <main id="main">
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Info om TGV</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="aboutTitle" title="Om oss Titel"
                                           value="<?php echo $aboutTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="aboutContent" title="Om oss Beskrivning"
                              rows="10"><?php echo $aboutContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="aboutSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Om redaktionen</h2>
                            <ul>
                                <!--todo göra så man kan lägga till eller ta bort personal, generera fälten från en databas? t.ex. namn, bild etc.-->
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="staffTitle" title="Redaktion Titel">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                                    <textarea name="staffContent" title="Redaktion Beskrivning" rows="10"></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="staffSubmit" value="Spara Ändringar"
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