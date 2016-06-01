<?php
//require('includes/auth.php');
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_GET['id'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Tidskrift för genusvetenskap</title>
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
<?php include('includes/db_connect.inc') ?>
<?php include('includes/header_other.inc') ?>
<?php include('includes/navigation.inc') ?>
<?php include('includes/navigation_mobile.inc') ?>
<main>
    <section class="read-more-wrapper">
        <?php
        include('includes/db_connect.inc');
        $id = $_GET['id'];
        $result = mysqli_query($link, "SELECT * FROM tgv_recent_articles WHERE id = '$id'");
        $row = mysqli_fetch_array($result);

        $title = $row['title'];
        $content = $row['content'];
        $featured = $row['featured'];
        $imgName = $row['image'];

        echo '<div class="read-more-info">';
        echo '<img src="uploads/' . $imgName . '" class="read-more-img">';
        echo '<h2 class="read-more-featured-title">I detta nummer</h2>';
        echo '<p class="recent-article-featured">' . $featured . '</p>';
        if (isset($_SESSION['user'])) {
            echo '<p><a href="recent_articles_edit.php?id=' . $id . '" class="edit" target="_blank">Redigera</a></p>';
        }
        echo '</div>';
        echo '<div class="read-more-content">';
        echo '<a class="article-more-back" href="index.php#recent">Tillbaka</a>';
        echo '<h1 class="recent-article-more-title">' . $title . '</h1>';
        echo '<p class="recent-article-content">' . $content . '</p>';
        if (isset($_SESSION['user'])) {
            echo '<p><a href="recent_articles_edit.php?id=' . $id . '" class="edit" target="_blank">Redigera</a></p>';
        }
        echo '</div>';
        ?>
    </section>
</main>


<?php include('includes/footer.inc') ?>
</body>
</html>