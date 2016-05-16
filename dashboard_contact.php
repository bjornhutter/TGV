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
                toolbar: 'undo redo | bold italic | bullist numlist',
                menubar: 'file edit view'
            });
        </script>        <script src="js/active_dashnav.js"></script>
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
    <header class="admin-header">
        <h1 class="header-title">Admin Dashboard</h1>
        <img src="img/icons/menu_white_revorked.svg" alt="Meny" class="toggle-nav" title="Meny">
    </header>
    <div id="site-wrapper">
        <div id="site-canvas">
            <div class="nav-main-wrapper">
                <?php include('includes/dashboard_nav.inc') ?>
                <div class="overview-wrapper">
                    <h1 class="dashboard-title">Kontakt</h1>
                    <a href="contact.php" class="go-back-link" target="_blank">Gå till Kontakt</a>
                </div>
                <div class="main-outer-wrapper">
                    <main id="main">
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Kontaktuppgifter</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="contactTitle" title="Kontaktuppgifter Titel"
                                           value="<?php echo $contactTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Address: </p>
                                    <input type="text" name="contactAddress" title="Kontaktuppgifter Adress"
                                           value="<?php echo $contactAddress; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Telefon: </p>
                                    <input type="text" name="contactPhone" title="Kontaktuppgifter Telefon"
                                           value="<?php echo $contactPhone; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Email: </p>
                                    <input type="text" name="contactEmail" title="Kontaktuppgifter Email"
                                           value="<?php echo $contactEmail; ?>">
                                </li>
                                <li>
                                    <input type="submit" name="contactSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Footer</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="footerTitle" title="Footer Titel"
                                           value="<?php echo $footerTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="footerContent" title="Footer Beskrivning"
                              rows="10"><?php echo $footerContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="footerSubmit" value="Spara Ändringar"
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