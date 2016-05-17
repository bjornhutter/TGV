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
    <script src="js/active_nav.js"></script>
</head>
<body>

<header class="header-homepage">
    <div class="header-logo">
        <h1 class="header-logo-main-title">Tidsskrift för genusvetenskap</h1>
    </div>
    <div class="header-welcome">
        <h2 class="header-welcome-text">Någon liten fin välkomstext eller info om TGV</h2>
    </div>
</header>
<?php include('includes/navigation.inc') ?>
<main>
    <ul class="recent-article-wrapper">
<!--        Fixa något med diven under, nu finns den för att man ska kunna länka tillbaka från läsmer-->
        <div id="recent"></div> 
        <h1 class="recent-article-main-title">Senaste nummer</h1>
       <!-- <?php
/*       include('includes/db_connect.inc');
        $result = mysqli_query($link, "SELECT * FROM tgv_recent_articles ORDER BY date DESC") or die(mysqli_error());
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $content = substr($row['content'], 3, 220);
            $imgName = $row['image'];

            echo '<li class="recent-article">';
            echo '<img src="uploads/' . $imgName . '" class="recent-article-img">';
            echo '<h1 class="recent-article-title">' . $title . '</h1>';
            echo '<p class="recent-article-content">' . $content . '... <a class="recent-article-btn" href="articles_read_more.php?id='.$id.'">[Läs mer]</a></p>';
            //if (isset($_SESSION['user'])) {
            echo '<p><a href="recent_articles_edit.php?id=' . $id . '">Redigera</a></p>';
            //}
            echo '</li>';
        }
        */?>
    </ul>-->
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
            echo '<h2 class="news-title">' . $title . '</h2>';
            echo '<p class="news-date">' . $date . '</p>';
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
<!--@todo Footer funkar inte pga det som finns i asiden-->
<?php include('includes/footer.inc') ?>
</body>
</html>