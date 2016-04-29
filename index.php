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
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/stickynav.js"></script>
</head>
<body>

<header>

</header>
<?php include('includes/navigation.inc') ?>

<main class="index-main">
    <h1 class="recent-article-main-title">Senaste nummer</h1>
    <ul class="recent-article-wrapper">
        <li class="recent-article">
            <img src="http://tegeve.se/wp-content/uploads/2012/06/tgv_miljo_stor.jpg" class="recent-article-img">
            <h1 class="recent-article-title">Här ligger en title</h1>
            <p class="recent-article-content">Här ligger en hund begravd</p>
        </li>
        <li class="recent-article">
            <img src="http://tegeve.se/wp-content/uploads/2012/06/tgv_miljo_stor.jpg" class="recent-article-img">
            <h1 class="recent-article-title">Här ligger en title</h1>
            <p class="recent-article-content">Här ligger en hund begravd</p>
        </li>
        <li class="recent-article">
            <img src="http://tegeve.se/wp-content/uploads/2012/06/tgv_miljo_stor.jpg" class="recent-article-img">
            <h1 class="recent-article-title">Här ligger en title</h1>
            <p class="recent-article-content">Här ligger en hund begravd</p>
        </li>
        <li class="recent-article">
            <img src="http://tegeve.se/wp-content/uploads/2012/06/tgv_miljo_stor.jpg" class="recent-article-img">
            <h1 class="recent-article-title">Här ligger en title</h1>
            <p class="recent-article-content">Här ligger en hund begravd</p>
        </li>
    </ul>
</main>
<aside class="index-aside">
    <section class="cfp">
        <div>
            <ul>
                <li>
                    <p>Tema 1</p>
                </li>
                <li>
                    <p>Tema 2</p>
                </li>
                <li>
                    <p>Tema 3</p>
                </li>
            </ul>
        </div>
        <a href="send_script.php" class="send-script-button">Skicka in ditt manus!</a>
    </section>
    <section class="news-feed">
        <h1 class="news-main-title">Nyheter</h1>

        <?php

        include('includes/db_connect.inc');


        $result = mysqli_query($link, "SELECT * FROM tgv_news ORDER BY date DESC") or die (mysqli_error($link));

        echo '<div class="news-post-container>';
        while ($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $content = $row ['content'];
            $date = $row ['date'];
            $id = $row ['id'];

            echo '<div class="news-post">';
            echo '<p class="news-date">' . $date . '</p>';
            echo '<h2 class="news-title">' . $title . '</h2>';
            echo '<p class="news-content">' . nl2br($content) . '</p>';
            if (isset($_SESSION['user'])) {
                echo '<p><a href="dashboard.php">Redigera</a></p>';
            }

            echo '<hr>';
            echo '</div>';

        }
        echo '</div>';

        ?>
    </section>
</aside>

<?php include('includes/footer.inc') ?>
</body>
</html>