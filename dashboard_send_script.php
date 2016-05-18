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
        </script>
        <script src="js/active_dashnav.js"></script>
    </head>
    <body>
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

    $_SESSION['writerGuidelinesTitle'] = $writerGuidelinesTitle;

    $_SESSION['writerGuidelinesContent'] = $writerGuidelinesContent;

    /*
     * GENERELLA RIKTLINJER
     */
    $guidelinesResult = mysqli_query($link, "SELECT * FROM tgv_guidelines") or die(mysqli_error($link));

    $guidelinesRow = mysqli_fetch_array($guidelinesResult);

    $guidelinesId = $guidelinesRow['id'];
    $guidelinesTitle = $guidelinesRow['title'];
    $guidelinesContent = $guidelinesRow['content'];

    $_SESSION['guidelinesTitle'] = $guidelinesTitle;
    $_SESSION['guidelinesContent'] = $guidelinesContent;

    /*
     * FORM
     */
    $formResult = mysqli_query($link, "SELECT * FROM tgv_form") or die(mysqli_error($link));

    $formRow = mysqli_fetch_array($formResult);

    $formId = $formRow['id'];
    $formTitle = $formRow['title'];
    $formContent = $formRow['content'];

    $_SESSION['formTitle'] = $formTitle;
    $_SESSION['formContent'] = $formContent;

    /*
     * Rubriker
     */
    $titlesResult = mysqli_query($link, "SELECT * FROM tgv_titles") or die(mysqli_error($link));

    $titlesRow = mysqli_fetch_array($titlesResult);

    $titlesId = $titlesRow['id'];
    $titlesTitle = $titlesRow['title'];
    $titlesContent = $titlesRow['content'];

    $_SESSION['titlesTitle'] = $titlesTitle;
    $_SESSION['titlesContent'] = $titlesContent;

    /*
     * Citat
     */
    $quotesResult = mysqli_query($link, "SELECT * FROM tgv_quotes") or die(mysqli_error($link));

    $quotesRow = mysqli_fetch_array($quotesResult);

    $quotesId = $quotesRow['id'];
    $quotesTitle = $quotesRow['title'];
    $quotesContent = $quotesRow['content'];

    $_SESSION['quotesTitle'] = $quotesTitle;
    $_SESSION['quotesContent'] = $quotesContent;

    /*
     * Referenser
     */
    $refResult = mysqli_query($link, "SELECT * FROM tgv_ref") or die(mysqli_error($link));

    $refRow = mysqli_fetch_array($refResult);

    $refId = $refRow['id'];
    $refTitle = $refRow['title'];
    $refContent = $refRow['content'];

    $_SESSION['refTitle'] = $refTitle;
    $_SESSION['refContent'] = $refContent;

    /*
     * Anvisningar för recensenter
     */
    $scriptRevResult = mysqli_query($link, "SELECT * FROM tgv_script_reviewers") or die(mysqli_error($link));

    $scriptRevRow = mysqli_fetch_array($scriptRevResult);

    $scriptRevId = $scriptRevRow['id'];
    $scriptRevTitle = $scriptRevRow['title'];
    $scriptRevContent = $scriptRevRow['content'];

    $_SESSION['scriptRevTitle'] = $scriptRevTitle;
    $_SESSION['scriptRevContent'] = $scriptRevContent;

    /*
     * Anvisningar för granskare
     */

    $scriptExaminerResult = mysqli_query($link, "SELECT * FROM tgv_script_examiners") or die(mysqli_error($link));

    $scriptExaminerRow = mysqli_fetch_array($scriptExaminerResult);

    $scriptExaminerId = $scriptExaminerRow['id'];
    $scriptExaminerTitle = $scriptExaminerRow['title'];
    $scriptExaminerContent = $scriptExaminerRow['content'];

    $_SESSION['scriptExaminerTitle'] = $scriptExaminerTitle;
    $_SESSION['scriptExaminerContent'] = $scriptExaminerContent;
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
                    <h1 class="dashboard-title">Skicka manus</h1>
                    <a href="send_script.php" class="go-back-link" target="_blank" title="Öppnas på ny flik">Gå till
                        Skicka manus</a>
                </div>
                <div class="main-outer-wrapper">
                    <main id="main">
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Anvisningar för artikelskribenter</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="writerGuidelinesTitle" title="Anvisningar för artikelskribenter Titel"
                                           value="<?php echo $writerGuidelinesTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="writerGuidelinesContent" title="Anvisningar för artikelskribenter Beskrivning"
                              rows="10"><?php echo $writerGuidelinesContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="writerGuidelinesSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Riktlinjer</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="guidelinesTitle" title="Riktlinjer Titel"
                                           value="<?php echo $guidelinesTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="guidelinesContent" title="Riktlinjer Beskrivning"
                              rows="10"><?php echo $guidelinesContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="guidelinesSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Form</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="formTitle" title="Form Titel"
                                           value="<?php echo $formTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="formContent" title="Form Beskrivning"
                              rows="10"><?php echo $formContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="formSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Rubriker</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="titlesTitle" title="Rubriker Titel"
                                           value="<?php echo $titlesTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="titlesContent" title="Rubriker Beskrivning"
                              rows="10"><?php echo $titlesContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="titlesSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Citat</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="quotesTitle" title="Citat Titel"
                                           value="<?php echo $quotesTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="quotesContent" title="Citat Beskrivning"
                              rows="10"><?php echo $quotesContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="quotesSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Referenser</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="refTitle" title="Referenser Titel"
                                           value="<?php echo $refTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="refContent" title="Referenser Beskrivning"
                              rows="10"><?php echo $refContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="refSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Anvisningar för recensenter</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="scriptRevTitle" title="Referenser Titel"
                                           value="<?php echo $scriptRevTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="scriptRevContent" title="Referenser Beskrivning"
                              rows="10"><?php echo $scriptRevContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="scriptRevSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Anvisningar för granskare</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="scriptExaminerTitle" title="Referenser Titel"
                                           value="<?php echo $scriptExaminerTitle; ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                    <textarea name="scriptExaminerContent" title="Referenser Beskrivning"
                              rows="10"><?php echo $scriptExaminerContent; ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="scriptExaminerSubmit" value="Spara Ändringar"
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