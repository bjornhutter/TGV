<?php
//require('includes/auth.php');

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
}

include('includes/db_connect.inc');
$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM tgv_recent_articles WHERE id = '$id'");
$row = mysqli_fetch_array($result);

$title = $row['title'];
$content = $row['content'];
$featured = $row['featured'];
$imgName = $row['image'];

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <!--<link rel="stylesheet" type="text/css" href="css/master.css">-->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <title>Redigera redaktörer | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
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

<p>Redigera senaste nummer</p>
<form action="recent_articles_edit_process.php" method="post"  enctype="multipart/form-data">
    <ul>
        <li>
            <input type="text" name="title" id="title" value="<?php echo $title ?>">
        </li>
        <li>
            <textarea name="content" id="content"><?php echo $content ?></textarea>
        </li>
        <li>
            <textarea name="featured" id="featured"><?php echo $featured ?></textarea>
        </li>
        <li>
            <p>Ladda upp en ny bild (välj ingen fil, om du önskar ha kvar samma): </p>
            <input type="file" name="newfileToUpload" id="newfileToUpload">
        </li>
        <li>
            <input type="submit" name="save" value="Spara ändringar">
        </li>
        <li>
            <input type="submit" name="delete" value="Radera inlägget" onClick="return confirm('Radera. Är du säker?')">
        </li>
    </ul>
    <input type="hidden" value="<?php echo $id ?>" name="id">
</form>

<header class="admin-header">
    <h1 class="header-title">Admin Dashboard</h1>
    <img src="img/icons/menu_white_revorked.svg" alt="Meny" class="toggle-nav" title="Meny">
</header>
<div id="site-wrapper">
    <div id="site-canvas">
        <div class="nav-main-wrapper">
            <?php include('includes/dashboard_nav.inc') ?>
            <div class="overview-wrapper">
                <h1 class="dashboard-title">Senaste nummer</h1>
                <a href='dashboard.php' class='go-back-link'>Ta mig tillbaka till dashboarden!</a>
                <a href="index.php" class="go-back-link" target="_blank">Gå till Hem</a>
            </div>
            <div class="main-outer-wrapper">
                <main id="main">
                    <form action="recent_articles_edit_process.php" method="post" enctype="multipart/form-data"
                          class="dashboard-form">
                        <ul>
                            <li>
                                <p class="dashboard-first-form-title">Titel: </p>
                                <input type="text" name="title" id="title" value="<?php echo $title ?>" title="Titel">
                            </li>
                            <li>
                                <p class="dashboard-form-title">Beskrivning: </p>
                                <textarea name="content" id="content"
                                          title="Beskrivning"><?php echo $content ?></textarea>
                            </li>
                            <li>
                                <p class="dashboard-form-title">Ladda upp en ny bild (välj ingen fil, om du önskar ha
                                    kvar samma): </p>
                                <input type="file" name="newfileToUpload" id="newfileToUpload">
                            </li>
                            <li>
                                <input type="submit" name="save" value="Spara ändringar" class="form-input-submit">
                            </li>
                            <li>
                                <input type="submit" name="delete" value="Radera nummer"
                                       class="revert-changes"
                                       onclick="if(!confirm('Detta kommer radera numret. Är du säker på att du vill göra det?')) return false">
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
</body>
</html>
<?php ob_end_flush(); ?>

