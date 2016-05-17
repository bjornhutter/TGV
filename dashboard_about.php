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
                                    <input type="submit" name="aboutSubmit" value="Spara Ändringar"
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
                        <div class="dashboard-form">
                            <!--todo gör responsive så att bilderna inte blir jättesmå (om vi väljer att ha det såhär) -->
                            <h2 class="dashboard-sub-title">Om redaktionen</h2>
                            <ul class="staff-wrapper">
                                <?php
                                include('includes/db_connect.inc');
                                $staffResult = mysqli_query($link, "SELECT * FROM tgv_staff") or die(mysqli_error($link));
                                while ($staffRow = mysqli_fetch_array($staffResult)) {
                                    $staffId = $staffRow['id'];
                                    $staffContent = $staffRow['content'];
                                    $staffFname = $staffRow['fname'];
                                    $staffLname = $staffRow['lname'];
                                    $staffImgName = $staffRow['image'];

                                    echo '<li class="staff">';
                                    echo '<img src="uploads/' . $staffImgName . '" class="staff-img">';
                                    echo '<h1 class="staff-title">' . $staffFname . ' ' . $staffLname . '</h1>';
                                    echo '<p class="staff-content">' . $staffContent . '</p>';
                                    //if (isset($_SESSION['user'])) {
                                    echo '<p><a href="about_editors_edit.php?id=' . $staffId . '">Redigera</a></p>';
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