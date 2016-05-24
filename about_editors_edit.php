<?php
require('includes/auth.inc');

if (!isset($_GET['id'])) {
    header("Location: dashboard_about.php");
}

include('includes/db_connect.inc');
$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM tgv_staff WHERE id = '$id'");
$row = mysqli_fetch_array($result);

$content = $row['content'];
$fname = $row['fname'];
$lname = $row['lname'];
$imgName = $row['image'];
$title = $row['title'];

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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,600italic' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
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
                <a href='dashboard_about.php' class='go-back-link'>Ta mig tillbaka till dashboarden!</a>
                <a href="about.php" class="go-back-link" target="_blank">Gå till Om TGV</a>
            </div>
            <div class="main-outer-wrapper">
                <main id="main">
                    <form action="about_editors_edit_process.php" method="post" enctype="multipart/form-data"
                          class="dashboard-form-full">
                        <h2 class="dashboard-sub-title">Redigera redaktör</h2>
                        <ul>
                            <li>
                                <p class="dashboard-first-form-title">Förnamn: </p>
                                <input type="text" name="fname" id="fname" value="<?php echo $fname ?>" title="Förnamn">
                            </li>
                            <li>
                                <p class="dashboard-form-title">Efternamn: </p>
                                <input type="text" name="lname" id="lname" value="<?php echo $lname ?>"
                                       title="Efternamn">
                            </li>
                            <li>
                                <p class="dashboard-form-title">Titel: </p>
                                <input type="text" name="title" id="title" title="Titel" value="<?php echo $title ?>" required>
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
                                <input type="submit" name="delete" value="Radera redaktör" class="revert-changes"
                                       onclick="if(!confirm('Detta kommer radera redaktören. Är du säker på att du vill göra det?')) return false">
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

