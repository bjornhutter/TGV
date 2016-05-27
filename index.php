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
    <meta name="description" content="Senaste nummer av Tidskrift för genusvetenskap inklusive senaste nyheterna och call for papers.">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Tidskrift för genusvetenskap</title>
    <link rel="icon" href="img/tgv_favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,600italic' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/stickynav.js"></script>
    <script src="js/active_nav.js"></script>
    <script src="js/nav_mobile_toggle.js"></script>
</head>
<body>
<?php include('includes/navigation_mobile.inc') ?>

<header class="header-homepage">
    <div class="header-logo">
        <img src="img/tgv_logo.png" class="logo">
    </div>
    <div class="header-welcome">
        <h2 class="header-welcome-text">Välkommen till Nordens största referee-granskade tidskrift för aktuell
            tvärvetenskaplig genusforskning!</h2>
    </div>
</header>
<?php include('includes/navigation.inc') ?>

<main class="index-main">
    <ul class="recent-article-wrapper">

        <!--        Fixa något med diven under, nu finns den för att man ska kunna länka tillbaka från läsmer-->
        <div id="recent"></div>
        <h1 class="recent-article-main-title">Senaste nummer</h1>
        <?php
        include('includes/db_connect.inc');
        $result = mysqli_query($link, "SELECT * FROM tgv_recent_articles ORDER BY date DESC LIMIT 3") or die(mysqli_error($link));

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $content = $row['content'];
            $imgName = $row['image'];

            echo '<li class="recent-article">';
            echo '<img src="uploads/' . $imgName . '" class="recent-article-img">';
            echo '<h1 class="recent-article-title">' . $title . '</h1>';

            if (strlen($content) < 220) {
                echo '<p class="recent-article-content">' . $content . ' </p>';
            } elseif (strlen($content) > 220) {
                $content = substr($content, 3, 220);
                echo '<p class="recent-article-content">' . $content . '';
                echo '...';
            } else {
                echo '<p class="recent-article-content">' . $content . ' </p>';
            }
            
            echo '<p class="recent-article-content"><a class="recent-article-btn" href="articles_read_more.php?id=' . $id . '">Läs mer</a></p>';
            
            if (isset($_SESSION['user'])) {
                echo '<p><a href="recent_articles_edit.php?id=' . $id . '" class="edit" target="_blank">Redigera</a></p>';
            }
            echo '</li>';
        }
        ?>
    </ul>
</main>
<aside class="index-aside">
    <?php
    include('includes/db_connect.inc');
    $cfpResult = mysqli_query($link, "SELECT * FROM tgv_cfp") or die(mysqli_error($link));

    echo ' <section class="cfp">';
    $cfpRow = mysqli_fetch_array($cfpResult);

    $cfpId = $cfpRow['id'];
    $cfpTitle = $cfpRow['title'];
    $cfpContent = $cfpRow['content'];

    echo '<h1 class="cfp-main-title">' . $cfpTitle . '</h1>';
    echo '<p>' . $cfpContent . '</p>';

    if (isset($_SESSION['user'])) {
        echo '<p><a href="dashboard.php" class="edit" target="_blank">Redigera</a></p>';
    }
    echo '</section>';

    ?>
    <section class="news-feed">
        <h1 class="news-main-title">Nyheter</h1>
        <div class="news-post-container">

            <?php

            include('includes/db_connect.inc');
            
            $result = mysqli_query($link, "SELECT * FROM tgv_news ORDER BY date DESC LIMIT 5") or die (mysqli_error($link));
            
            while ($row = mysqli_fetch_array($result)) {
                $title = $row['title'];
                $content = $row ['content'];
                $date = $row ['date'];
                $id = $row ['id'];

                echo '<div class="news-post">';
                echo '<h2 class="news-title">' . $title . '</h2>';
                echo '<p class="news-date">' . $date . '</p>';
                echo '<p class="news-content">' . nl2br($content) . '</p>';

                if (isset($_SESSION['user'])) {
                    echo '<p><a href="news_edit.php?id=' . $id . '" class="edit" target="_blank">Redigera</a></p>';
                }

                echo '<hr class="hr-news">';
                echo '</div>';

            }
            ?>
        </div>
    </section>
</aside>
<?php include('includes/footer.inc') ?>
</body>
<script src="js/menu_toggle.js"></script>
</html>