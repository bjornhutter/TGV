<?php require('includes/auth.inc'); ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/css-reset.css">
        <!--<link rel="stylesheet" type="text/css" href="css/master.css">-->
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
        <title>Dashboard | Tidskrift för genusvetenskap</title>
        <link rel="icon" href="img/tgv_favicon.ico">
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
                plugins: 'link code',
                content_css : 'css/tinymce.css'
            });
        </script>
        <script src="js/active_dashnav.js"></script>
    </head>
    <body>
    <?php

    include('includes/db_connect.inc');

    /*
     * Funktion för att byta ut dubbelcitat mot enkelcitat
     */
    function replace_quotes($text)
    {
        $text = str_replace('"', "'", $text);
        return $text;
    }

    ?>
    <header class="admin-header" id="top">
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
                        <div class="dashboard-form-full">
                            <h2 class="dashboard-sub-title" style="padding-bottom: 20px">Alla nyhetsinlägg</h2>
                            <ul class="news-posts-wrapper">

                                <?php

                                include('includes/db_connect.inc');

                                $result = mysqli_query($link, "SELECT * FROM tgv_news ORDER BY DATE DESC") or die (mysqli_error($link));

                                while ($row = mysqli_fetch_array($result)) {
                                    $title = $row['title'];
                                    $content = $row ['content'];
                                    $date = $row ['date'];
                                    $id = $row ['id'];

                                    /*echo '<div class="news-post">';
                                    echo '<h2 class="news-title">' . $title . '</h2>';
                                    echo '<p class="news-date">' . $date . '</p>';
                                    echo '<p class="news-content">' . nl2br($content) . '</p>';
                                    echo '<p><a href="news_edit.php?id=' . $id . '">Redigera</a></p>';

                                    echo '<hr>';
                                    echo '</div>';


                                    echo '</div>';*/

                                    echo '<li class="news-post">';
                                    echo '<h1 class="news-title">' . $title . '</h1>';
                                    echo $content;
                                    echo '<p class="news-date">' . $date . '</p>';
                                    echo '<div class="recent-article-button-wrapper">';
                                    echo '<a href="news_edit.php?id=' . $id . '" class="edit">Redigera</a>';
                                    echo '<a href="#top" class="back-to-top-btn">Tillbaka till toppen</a>';
                                    echo '</div>';
                                    //echo $recentArticlesContent;
                                    //echo $recentArticlesFeatured;
                                    //if (isset($_SESSION['user'])) {
                                    //echo '<p><a href="recent_articles_edit.php?id=' . $recentArticlesId . '" class="edit">Redigera</a></p>';
                                    //}
                                    echo '</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script src="js/toggle_nav.js"></script>
    <script src="js/add_toggle.js"></script>
    </body>
    </html>
<?php ob_end_flush(); ?>