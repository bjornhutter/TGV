<?php
//require('includes/auth.php');

if (!isset($_GET['id'])) {
    header("Location: index.php");
}

include('includes/db_connect.inc');
$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM tgv_recent_articles WHERE id = '$id'");
$row = mysqli_fetch_array($result);

$title = $row['title'];
$content = $row['content'];
$imgName = $row['image'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/stickynav.js"></script>
    <script src="js/active_nav.js"></script>
</head>
<body>

<!--<header class="header-homepage">
    <div class="header-logo">
        <h1 class="header-logo-main-title">Tidsskrift för genusvetenskap</h1>
    </div>
    <div class="header-welcome">
        <h2 class="header-welcome-text">Någon liten fin välkomstext eller info om TGV</h2>
    </div>
</header>-->
<?php include('includes/db_connect.inc') ?>
<?php include('includes/navigation.inc') ?>
<main>
    <ul class="recent-article-wrapper">
        <?php
        include('includes/db_connect.inc');

        echo '<li class="recent-article">';
        echo '<img src="uploads/' . $imgName . '" class="recent-article-img">';
        echo '</li>';
        echo '<li class="recent-article-more">';
        echo '<a class="article-more-back" href="index.php#recent">Tillbaka</a>';
        echo '<h1 class="recent-article-more-title">' . $title . '</h1>';
        echo '<p class="recent-article-content">' . $content . '</p>';
        //if (isset($_SESSION['user'])) {
        echo '<p><a href="recent_articles_edit.php?id=' . $id . '">Redigera</a></p>';
        //}
        echo '</li>';
        ?>
    </ul>
</main>


<?php include('includes/footer.inc') ?>
</body>
</html>