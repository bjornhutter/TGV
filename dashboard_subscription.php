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
    </head>
    <body>
    <?php

    include('includes/db_connect.inc');

    /*
     * Prislista
     */
    $priceResult = mysqli_query($link, "SELECT * FROM tgv_price") or die(mysqli_error($link));

    $priceRow = mysqli_fetch_array($priceResult);

    $priceId = $priceRow['id'];
    $priceTitle = $priceRow['title'];
    $priceContent = $priceRow['content'];

    $_SESSION['priceTitle'] = $priceTitle;
    $_SESSION['priceContent'] = $priceContent;

    /*
     * Subinfo
     */
    $subInfoResult = mysqli_query($link, "SELECT * FROM tgv_subscription_info") or die(mysqli_error($link));

    $subInfoRow = mysqli_fetch_array($subInfoResult);

    $subInfoId = $subInfoRow['id'];
    $subInfoTitle = $subInfoRow['title'];
    $subInfoContent = $subInfoRow['content'];

    $_SESSION['subInfoTitle'] = $subInfoTitle;
    $_SESSION['subInfoContent'] = $subInfoContent;
    ?>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <?php include('includes/dashboard_nav.inc') ?>
    <div class="main-outer-wrapper">
        <main id="main">
            <form action="dashboard_process.php" method="post">
                <h1>Prenumerera</h1>
                <h2>Redigera Prislista</h2>
                <ul>
                    <li>
                        <p>Titel: </p>
                        <input type="text" name="priceTitle" title="Prislista Titel" value="<?php echo $priceTitle; ?>">
                    </li>
                    <li>
                        <p>Beskrivning: </p>
                    <textarea name="priceContent" title="Prislista Beskrivning"
                              rows="10"><?php echo $priceContent; ?></textarea>
                    </li>
                    <li>
                        <input type="submit" name="priceSubmit" value="Spara Ändringar">
                    </li>
                </ul>
            </form>
            <form action="dashboard_process.php" method="post">
                <h2>Redigera Prenumereringsinfo</h2>
                <ul>
                    <li>
                        <p>Titel: </p>
                        <input type="text" name="subInfoTitle" title="Prenumereringsinfo Titel"
                               value="<?php echo $subInfoTitle; ?>">
                    </li>
                    <li>
                        <p>Beskrivning: </p>
                    <textarea name="subInfoContent" title="Prenumereringsinfo Beskrivning"
                              rows="10"><?php echo $subInfoContent; ?></textarea>
                    </li>
                    <li>
                        <input type="submit" name="subInfoSubmit" value="Spara Ändringar">
                    </li>
                </ul>
            </form>
        </main>
    </div>

    <!--todo ta bort om vi inte behöver ajax <script src="js/dashboard_ajax_load_html.js"></script>-->
    </body>
    </html>
<?php ob_end_flush(); ?>