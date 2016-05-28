<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Anvisningar för artikelskribenter, recensenter och granskare. Skicka in ditt manus till TGV via formuläret!">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Skicka manus | Tidskrift för genusvetenskap</title>
    <link rel="icon" href="img/tgv_favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,600italic' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/active_nav.js"></script>
    <script src="js/stickynav.js"></script>
    <script src="js/nav_mobile_toggle.js"></script>
</head>
<body>

<?php include('includes/header_other.inc') ?>
<?php include('includes/db_connect.inc') ?>
<?php include('includes/navigation_mobile.inc') ?>
<?php include('includes/navigation.inc') ?>

<!--OM vi använder breadcrumbs, lägg till styling i css och id:n på avsnitten-->
<!--
<div class="helper-links-wrapper">
    <ul>
        <li>
            <a href="#1" class="helper-links">Anvisningar för artikelskribenter</a>
        </li>
        <li>
            <a href="#2" class="helper-links">Anvisningar för recensenter</a>
        </li>
        <li>
            <a href="#3" class="helper-links">Anvisningar för granskare</a>
        </li>
        <li>
            <a href="#4" class="helper-links">Skicka in manus</a>
        </li>
    </ul>
</div>-->

<main class="script-wrapper">
    <?php include('includes/db_connect.inc'); ?>
    <?php
    $writerGuidelinesResult = mysqli_query($link, "SELECT * FROM tgv_writer_guidelines") or die(mysqli_error($link));
    echo '<section class="script-info">';
    while ($writerGuidelinesRow = mysqli_fetch_array($writerGuidelinesResult)) {
        $writerGuidelinesId = $writerGuidelinesRow['id'];
        $writerGuidelinesTitle = $writerGuidelinesRow['title'];
        $writerGuidelinesContent = $writerGuidelinesRow['content'];
        echo '<h1 class="script-info-main-title">' . $writerGuidelinesTitle . '</h1>';
        echo '<p>' . $writerGuidelinesContent . '</p>';
        if (isset($_SESSION['user'])) {
            echo '<p><a href="dashboard_send_script.php#1" class="edit" target="_blank">Redigera</a></p>';
        }
        echo '</section>';
    }
    ?>
    <?php

    /*
     * GENERELLA RIKTLINJER
     */
    $guidelinesResult = mysqli_query($link, "SELECT * FROM tgv_guidelines") or die(mysqli_error($link));

    $guidelinesRow = mysqli_fetch_array($guidelinesResult);

    $guidelinesId = $guidelinesRow['id'];
    $guidelinesTitle = $guidelinesRow['title'];
    $guidelinesContent = $guidelinesRow['content'];

    /*
     * FORM
     */
    $formResult = mysqli_query($link, "SELECT * FROM tgv_form") or die(mysqli_error($link));

    $formRow = mysqli_fetch_array($formResult);

    $formId = $formRow['id'];
    $formTitle = $formRow['title'];
    $formContent = $formRow['content'];

    /*
     * Rubriker
     */
    $titlesResult = mysqli_query($link, "SELECT * FROM tgv_titles") or die(mysqli_error($link));

    $titlesRow = mysqli_fetch_array($titlesResult);

    $titlesId = $titlesRow['id'];
    $titlesTitle = $titlesRow['title'];
    $titlesContent = $titlesRow['content'];

    /*
     * Citat
     */
    $quotesResult = mysqli_query($link, "SELECT * FROM tgv_quotes") or die(mysqli_error($link));

    $quotesRow = mysqli_fetch_array($quotesResult);

    $quotesId = $quotesRow['id'];
    $quotesTitle = $quotesRow['title'];
    $quotesContent = $quotesRow['content'];

    /*
     * Referenser
     */
    $refResult = mysqli_query($link, "SELECT * FROM tgv_ref") or die(mysqli_error($link));

    $refRow = mysqli_fetch_array($refResult);

    $refId = $refRow['id'];
    $refTitle = $refRow['title'];
    $refContent = $refRow['content'];


    ?>
    <section id="tabs">
        <ul>
            <li>
                <a href="#tabs-1"><?php echo $guidelinesTitle; ?></a>
            </li>
            <li>
                <a href="#tabs-2"><?php echo $formTitle; ?></a>
            </li>
            <li>
                <a href="#tabs-3"><?php echo $titlesTitle; ?></a>
            </li>
            <li>
                <a href="#tabs-4"><?php echo $quotesTitle; ?></a>
            </li>
            <li>
                <a href="#tabs-5"><?php echo $refTitle; ?></a>
            </li>
        </ul>
        <div id="tabs-1">
            <?php
            echo $guidelinesContent;
            if (isset($_SESSION['user'])) {
                echo '<p><a href="dashboard_send_script.php#2" class="edit" target="_blank">Redigera</a></p>';
            }
            ?>
        </div>
        <div id="tabs-2">

            <?php

            echo $formContent;
            if (isset($_SESSION['user'])) {
                echo '<p><a href="dashboard_send_script.php#3" class="edit" target="_blank">Redigera</a></p>';
            }
            ?>

        </div>
        <div id="tabs-3">

            <?php

            echo $titlesContent;
            if (isset($_SESSION['user'])) {
                echo '<p><a href="dashboard_send_script.php#4" class="edit" target="_blank">Redigera</a></p>';
            }
            ?>
        </div>
        <div id="tabs-4">


            <?php

            echo $quotesContent;
            if (isset($_SESSION['user'])) {
                echo '<p><a href="dashboard_send_script.php#5" class="edit" target="_blank">Redigera</a></p>';
            }
            ?>
        </div>
        <div id="tabs-5">
            <?php

            echo $refContent;
            if (isset($_SESSION['user'])) {
                echo '<p><a href="dashboard_send_script.php#6" class="edit" target="_blank">Redigera</a></p>';
            }
            ?>
        </div>
    </section>
    <?php
    $scriptRevResult = mysqli_query($link, "SELECT * FROM tgv_script_reviewers") or die(mysqli_error($link));

    echo '<section class="script-reviewers">';
    while ($scriptRevRow = mysqli_fetch_array($scriptRevResult)) {

        $scriptRevId = $scriptRevRow['id'];
        $scriptRevTitle = $scriptRevRow['title'];
        $scriptRevContent = $scriptRevRow['content'];

        echo '<h1 class="script-reviewers-main-title">' . $scriptRevTitle . '</h1>';
        echo '<p>' . $scriptRevContent . '</p>';

        if (isset($_SESSION['user'])) {

            echo '<p><a href="dashboard_send_script.php#7" class="edit" target="_blank">Redigera</a></p>';

        }
        echo '</section>';
    }
    ?>
    <?php
    $scriptExaminerResult = mysqli_query($link, "SELECT * FROM tgv_script_examiners") or die(mysqli_error($link));

    echo '<section class="script-examiner">';
    while ($scriptExaminerRow = mysqli_fetch_array($scriptExaminerResult)) {

        $scriptExaminerId = $scriptExaminerRow['id'];
        $scriptExaminerTitle = $scriptExaminerRow['title'];
        $scriptExaminerContent = $scriptExaminerRow['content'];

        echo '<h1 class="script-examiner-main-title">' . $scriptExaminerTitle . '</h1>';
        echo '<p>' . nl2br($scriptExaminerContent) . '</p>';

        if (isset($_SESSION['user'])) {
            echo '<p><a href="dashboard_send_script.php#8" class="edit" target="_blank">Redigera</a></p>';
        }

        echo '</section>';
    }
    ?>
</main>

<section class="script-form-wrapper">
    <div id="script-form-inner-wrapper">
        <h1 class="send-script-main-title">Skicka in manus</h1>
        <p class="send-script-info">Ditt manus kan du enkelt skicka in via formuläret nedan. Du kan även skicka in det
            till <a href="mailto:tegeve@oru.se">tegeve@oru.se</a>.</p>
        <form enctype="multipart/form-data" action="send_script_process.php" method="post" class="script-form">
            <ul class="script-form-ul">
                <li class="script-form-li">
                    <p>Förnamn: </p>
                    <input type="text" name="fname" class="script-form-input" title="Förnamn" required>
                </li>
                <li class="script-form-li">
                    <p>Efternamn: </p>
                    <input type="text" name="lname" class="script-form-input" title="Efternamn" required>
                </li>
                <li class="script-form-li">
                    <p>E-mail: </p>
                    <input type="email" name="from" title="Emailaddress" placeholder="exempel@adress.com"
                           class="script-form-input"
                           required>
                </li>
                <li class="script-form-li">
                    <p>Ämne: </p>
                    <input type="text" name="topic" title="Ämne" class="script-form-input" required>
                </li>
                <li class="script-form-li">
                    <input type="file" name="attachFile" class="scripts-form-input-attach">
                </li>
                <li class="script-form-li">
                    <p>Meddelande: </p>
                    <textarea name="emailMessage" title="Meddelande" rows="7" cols="50"
                              class="script-form-input"></textarea>
                </li>
                <li class="script-form-li">
                    <input type="submit" name="submit" value="Skicka manus" class="script-form-input-submit">
                </li>
            </ul>
        </form>
    </div>
</section>

<?php include('includes/footer.inc') ?>
<script src="js/send_script_tabs.js"></script>
</body>
</html>