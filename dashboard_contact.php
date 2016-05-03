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
        <script>tinymce.init({ selector:'textarea' });</script>
    </head>
    <body>
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

    $_SESSION['contactTitle'] = $contactTitle;
    $_SESSION['contactAddress'] = $contactAddress;
    $_SESSION['contactPhone'] = $contactPhone;
    $_SESSION['contactEmail'] = $contactEmail;


    /*
     * Footer
     */
    $footerResult = mysqli_query($link, "SELECT * FROM tgv_footer") or die(mysqli_error($link));

    $footerRow = mysqli_fetch_array($footerResult);

    $footerId = $footerRow['id'];
    $footerTitle = $footerRow['title'];
    $footerContent = $footerRow['content'];

    $_SESSION['footerTitle'] = $footerTitle;
    $_SESSION['footerContent'] = $footerContent;

    ?>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <?php include('includes/dashboard_nav.inc') ?>
    <div class="main-outer-wrapper">
        <main id="main">
            <form action="dashboard_process.php" method="post">
                <h1>Kontakt</h1>
                <h2>Redigera Kontaktuppgifter</h2>
                <ul>
                    <li>
                        <p>Titel: </p>
                        <input type="text" name="contactTitle" title="Kontaktuppgifter Titel"
                               value="<?php echo $contactTitle; ?>">
                    </li>
                    <li>
                        <p>Address: </p>
                        <input type="text" name="contactAddress" title="Kontaktuppgifter Adress"
                               value="<?php echo $contactAddress; ?>">
                    </li>
                    <li>
                        <p>Telefon: </p>
                        <input type="text" name="contactPhone" title="Kontaktuppgifter Telefon"
                               value="<?php echo $contactPhone; ?>">
                    </li>
                    <li>
                        <p>Email: </p>
                        <input type="text" name="contactEmail" title="Kontaktuppgifter Email"
                               value="<?php echo $contactEmail; ?>">
                    </li>
                    <li>
                        <input type="submit" name="contactSubmit" value="Spara Ändringar">
                    </li>
                </ul>
            </form>
            <form action="dashboard_process.php" method="post">
                <h2>Redigera Footer</h2>
                <ul>
                    <li>
                        <p>Titel: </p>
                        <input type="text" name="footerTitle" title="Footer Titel" value="<?php echo $footerTitle; ?>">
                    </li>
                    <li>
                        <p>Beskrivning: </p>
                    <textarea name="footerContent" title="Footer Beskrivning"
                              rows="10"><?php echo $footerContent; ?></textarea>
                    </li>
                    <li>
                        <input type="submit" name="footerSubmit" value="Spara Ändringar">
                    </li>
                </ul>
            </form>
        </main>
    </div>

    <!--todo ta bort om vi inte behöver ajax <script src="js/dashboard_ajax_load_html.js"></script>-->
    </body>
    </html>
<?php ob_end_flush(); ?>