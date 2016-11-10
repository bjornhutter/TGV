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
        <a href="/"><img src="img/tgv_logo.png" class="logo" alt="Headerbild för Tidsskrift för genusvetenskap"></a>
        <h1 class="site-main-title">Tidskrift för genusvetenskap</h1>
    </div>
    <div class="header-welcome">
        <h2 class="header-welcome-text">Välkommen till TGV, en av nordens största  tidskrifter för tvärvetenskaplig genusforskning.</h2>
    </div>
</header>
<?php include('includes/navigation.inc') ?>

<main class="index-main">
    <ul class="recent-article-wrapper">
        <div id="recent"></div>
        <h2 class="recent-article-main-title">Senaste nummer</h2>
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
            echo '<h3 class="recent-article-title">' . $title . '</h3>';

            if (strlen($content) < 220) {
                echo '<p class="recent-article-content">' . $content . ' </p>';
            } elseif (strlen($content) > 220) {
                $content = substr($content, 3, 220);
                echo '<p class="recent-article-content">' . $content . '';
                echo '...';
            } else {
                echo '<p class="recent-article-content">' . $content . ' </p>';
            }
            
            echo '<p class="recent-article-content"><a class="recent-article-btn" href="articles_read_more.php?id=' . $id . '">Läs mer om detta nummer</a></p>';
            
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

    echo '<h2 class="cfp-main-title">' . $cfpTitle . '</h2>';
    echo '<p>' . $cfpContent . '</p>';

    if (isset($_SESSION['user'])) {
        echo '<p><a href="dashboard.php" class="edit" target="_blank">Redigera</a></p>';
    }
    echo '</section>';

    ?>
    <section class="news-feed">
        <h2 class="news-main-title">Nyheter</h2>
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
                echo '<h3 class="news-title">' . $title . '</h3>';
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
</html>