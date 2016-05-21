<?php
//require('includes/auth.php');
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
}

include('includes/db_connect.inc');
$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM tgv_news WHERE id = '$id'");
$row = mysqli_fetch_array($result);

$newsTitle = $row['title'];
$newsContent = $row['content'];

?>
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
            toolbar: 'undo redo | bold italic | bullist numlist | link code',
            menubar: 'file edit view insert tools',
            plugins: 'link code'
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
                <a href='dashboard.php' class='go-back-link'>Ta mig tillbaka till dashboarden!</a>
                <a href="index.php" class="go-back-link" target="_blank" title="Öppnas på ny flik">Gå till Hem</a>
            </div>
            <div class="main-outer-wrapper">
                <main id="main">

                    <form action="news_edit_process.php" method="post" class="dashboard-form-full">
                        <h2 class="dashboard-sub-title">Nyhetsflöde</h2>
                        <ul style="background:none">
                            <li>
                                <p class="dashboard-first-form-title">Titel: </p>
                                <input type="text" name="newsTitle" title="Nyhetsflöde Titel"
                                       value="<?php echo $newsTitle ?>">
                            </li>
                            <li>
                                <p class="dashboard-form-title">Beskrivning: </p>
                <textarea name="newsContent" title="Nyhetsflöde Beskrivning"
                          rows="10"><?php echo $newsContent ?></textarea>
                            </li>
                            <li>
                                <input type="submit" name="newsSubmit" value="Spara ändringar"
                                       class="form-input-submit">
                            </li>
                            <li>
                                <input type="submit" name="newsDelete" value="Radera inlägg"
                                       class="revert-changes"
                                       onclick="if(!confirm('Detta kommer radera inlägget. Är du säker på att du vill göra det?')) return false">
                            </li>
                        </ul>
                        <input type="hidden" value="<?php echo $id ?>" name="id">
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
<script src="js/toggle_nav.js"></script>
<script src="js/add_toggle.js"></script>
</body>
</html>