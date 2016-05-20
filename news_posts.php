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
                <a href="index.php" class="go-back-link" target="_blank" title="Öppnas på ny flik">Gå till Hem</a>
            </div>
            <div class="main-outer-wrapper">
                <main id="main">
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
                        echo '<p><a href="news_edit.php?id=' . $id . '">Redigera</a></p>';

                        echo '<hr>';
                        echo '</div>';

                    }
                    echo '</div>';

                    ?>
                </main>
            </div>
        </div>
    </div>
</div>
<script src="js/toggle_nav.js"></script>
<script src="js/add_toggle.js"></script>
</body>
</html>