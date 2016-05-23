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

    /*
     * Prislista
     */
    $priceResult = mysqli_query($link, "SELECT * FROM tgv_price") or die(mysqli_error($link));

    $priceRow = mysqli_fetch_array($priceResult);

    $priceId = $priceRow['id'];
    $priceTitle = replace_quotes($priceRow['title']);
    $priceContent = replace_quotes($priceRow['content']);

    $_SESSION['priceTitle'] = replace_quotes($priceTitle);
    $_SESSION['priceContent'] = replace_quotes($priceContent);

    /*
     * Subinfo
     */
    $subInfoResult = mysqli_query($link, "SELECT * FROM tgv_subscription_info") or die(mysqli_error($link));

    $subInfoRow = mysqli_fetch_array($subInfoResult);

    $subInfoId = $subInfoRow['id'];
    $subInfoTitle = replace_quotes($subInfoRow['title']);
    $subInfoContent = replace_quotes($subInfoRow['content']);

    $_SESSION['subInfoTitle'] = replace_quotes($subInfoTitle);
    $_SESSION['subInfoContent'] = replace_quotes($subInfoContent);
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
                    <h1 class="dashboard-title">Prenumerera</h1>
                    <a href="subscription.php" class="go-back-link" target="_blank" title="Öppnas på ny flik">Gå till Prenumerera</a>
                    <div class="helper-links-wrapper">
                        <a href="#1" class="helper-links">Prislista</a>
                        <p class="helper-links-p">/</p>
                        <a href="#2" class="helper-links">Prenumerationsinfo</a>
                    </div>
                </div>
                <div class="main-outer-wrapper">
                    <main id="main">
                        <form action="dashboard_process.php" method="post" class="dashboard-form" id="1">
                            <h2 class="dashboard-sub-title">Prislista</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="priceTitle" title="Prislista Titel"
                                           value="<?php echo $priceTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="priceContent" title="Prislista Beskrivning"
                              rows="10"><?php echo $priceContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="priceSubmit" value="Spara ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form" id="2">
                            <h2 class="dashboard-sub-title">Prenumerationsinfo</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="subInfoTitle" title="Prenumereringsinfo Titel"
                                           value="<?php echo $subInfoTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="subInfoContent" title="Prenumereringsinfo Beskrivning"
                              rows="10"><?php echo $subInfoContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="subInfoSubmit" value="Spara ändringar"
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