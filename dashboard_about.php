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
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea',
                toolbar: 'undo redo | bold italic | bullist numlist | link code',
                menubar: 'file edit view insert tools',
                plugins: 'link code',
                content_css : 'css/tinymce.css'
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
     * Info om TGV
     */
    $aboutResult = mysqli_query($link, "SELECT * FROM tgv_about") or die(mysqli_error($link));

    $aboutRow = mysqli_fetch_array($aboutResult);

    $aboutId = $aboutRow['id'];
    $aboutTitle = replace_quotes($aboutRow['title']);
    $aboutContent = replace_quotes($aboutRow['content']);

    $_SESSION['aboutTitle'] = replace_quotes($aboutTitle);
    $_SESSION['aboutContent'] = replace_quotes($aboutContent);
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
                    <h1 class="dashboard-title">Om TGV</h1>
                    <a href="about.php" class="go-back-link" target="_blank" title="Öppnas på ny flik">Gå till Om TGV</a>
                    <div class="helper-links-wrapper">
                        <a href="#1" class="helper-links">Info om TGV</a>
                        <p class="helper-links-p">/</p>
                        <a href="#2" class="helper-links">Om redaktionen</a>
                    </div>
                </div>
                <div class="main-outer-wrapper">
                    <main id="main">
                        <form action="dashboard_process.php" method="post" class="dashboard-form" id="1">
                            <h2 class="dashboard-sub-title">Info om TGV</h2>
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
                                    <input type="submit" name="aboutSubmit" value="Spara ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <!--<form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Om redaktionen</h2>
                            <ul>
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
                        </form>-->
                        <div class="dashboard-form" id="2">
                            <h2 class="dashboard-sub-title">Om redaktionen</h2>
                            <ul class="staff-wrapper">
                                <?php
                                include('includes/db_connect.inc');
                                $staffResult = mysqli_query($link, "SELECT * FROM tgv_staff ORDER BY DATE DESC LIMIT 1") or die(mysqli_error($link));
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
                                    echo '<a href="about_editors.php" class="show-all">Visa alla redaktörer</a>';
                                    echo '</div>';
                                    //if (isset($_SESSION['user'])) {
                                    //}
                                    echo '</li>';
                                }
                                ?>
                            </ul>
                            <h2 id="add-toggle" class="add-toggle-icon-plus">Lägg till redaktör</h2>
                            <form action="about_editors_process.php" method="post" enctype="multipart/form-data" id="add-staff">
                                <ul>
                                    <li>
                                        <p class="dashboard-first-form-title">Förnamn: </p>
                                        <input type="text" name="fname" id="fname" title="Förnamn" required>
                                    </li>
                                    <li>
                                        <p class="dashboard-form-title">Efternamn: </p>
                                        <input type="text" name="lname" id="lname" title="Efternamn" required>
                                    </li>
                                    <li>
                                        <p class="dashboard-form-title">Titel: </p>
                                        <input type="text" name="title" id="title" title="Titel" required>
                                    </li>
                                    <li>
                                        <p class="dashboard-form-title">Beskrivning: </p>
                                        <textarea name="content" id="content"
                                                  title="Beskrivning"></textarea>
                                    </li>
                                    <li>
                                        <p class="dashboard-form-title">Bild: </p>
                                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                                    </li>
                                    <li>
                                        <input type="submit" value="Lägg till redaktör" name="addStaffSubmit"
                                               class="form-input-submit">
                                    </li>
                                </ul>
                            </form>
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