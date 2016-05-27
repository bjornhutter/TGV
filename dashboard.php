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
                content_css: 'css/tinymce.css'
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

    /*
     * Info om TGV
     */
    $cfpResult = mysqli_query($link, "SELECT * FROM tgv_cfp") or die(mysqli_error($link));

    $cfpRow = mysqli_fetch_array($cfpResult);

    $cfpId = $cfpRow['id'];
    $cfpTitle = replace_quotes($cfpRow['title']);
    $cfpContent = replace_quotes($cfpRow['content']);

    $_SESSION['cfpTitle'] = replace_quotes($cfpTitle);
    $_SESSION['cfpContent'] = replace_quotes($cfpContent);
    ?>
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
                    <div class="helper-links-wrapper">
                        <a href="#1" class="helper-links">Call for papers</a>
                        <p class="helper-links-p">/</p>
                        <a href="#2" class="helper-links">Nyhetsflöde</a>
                        <p class="helper-links-p">/</p>
                        <a href="#3" class="helper-links">Senaste nummer</a>
                    </div>
                </div>
                <div class="main-outer-wrapper">
                    <main id="main">
                        <form action="dashboard_process.php" method="post" class="dashboard-form" id="1">
                            <h2 class="dashboard-sub-title">Call for papers</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="cfpTitle" title="Call For Papers Titel"
                                           value="<?php echo $cfpTitle ?>">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                                    <textarea name="cfpContent" title="Call For Papers Beskrivning"
                                              rows="10"><?php echo $cfpContent ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="cfpSubmit" value="Spara ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <form action="news_create.php" method="post" class="dashboard-form float-fix" id="2">
                            <h2 class="dashboard-sub-title">Nyhetsflöde</h2>

                            <!--<h2 class="dashboard-sub-title" style="padding: 20px 0 20px 0">Senaste inlägget</h2>-->
                            <ul class="news-posts-wrapper">

                                <?php

                                include('includes/db_connect.inc');

                                $result = mysqli_query($link, "SELECT * FROM tgv_news ORDER BY DATE DESC LIMIT 1") or die (mysqli_error($link));

                                while ($row = mysqli_fetch_array($result)) {
                                    $title = $row['title'];
                                    $content = $row ['content'];
                                    $date = $row ['date'];
                                    $id = $row ['id'];


                                    echo '<li class="news-post">';
                                    echo '<h1 class="news-title">' . $title . '</h1>';


                                    if (strlen($content) < 220) {
                                        echo "$content";
                                    } elseif (strlen($content) > 220) {
                                        $content = substr($content, 0, 220);
                                        echo $content;
                                        echo '...';
                                    } else {
                                        echo "$content";
                                    }


                                    echo '<p class="news-date">' . $date . '</p>';
                                    echo '<div class="recent-article-button-wrapper">';
                                    echo '<a href="news_edit.php?id=' . $id . '" class="edit">Redigera</a>';
                                    echo '<a href="news_posts.php" class="show-all">Visa alla inlägg</a>';
                                    echo '</div>';
                                    echo '</li>';
                                }
                                ?>
                            </ul>
                            <h2 id="add-news-toggle" class="add-toggle-icon-plus">Skapa ett nytt inlägg</h2>
                            <ul id="add-news-post">
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="newsTitle" title="Nyhetsflöde Titel">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                                    <textarea name="newsContent" title="Nyhetsflöde Beskrivning" rows="10"></textarea>
                                </li>
                                <!--<li>
                                    <a href="news_posts.php" class="form-link-textdec-fix"><p
                                            class="form-input-submit form-link-center-fix">Visa alla nyheter
                                        </p></a>
                                </li>-->
                                <li>
                                    <input type="submit" name="newsSubmit" value="Publicera inlägg"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>
                        <!--<form action="dashboard_process.php" method="post" class="dashboard-form">
                            <h2 class="dashboard-sub-title">Redigera Senaste nummer</h2>
                            <ul>
                                <li>
                                    <p class="dashboard-first-form-title">Titel: </p>
                                    <input type="text" name="newNumberTitle" title="Senaste Nummer Titel">
                                </li>
                                <li>
                                    <p class="dashboard-form-title">Beskrivning: </p>
                                <textarea name="newNumberContent" title="Senaste Nummer Beskrivning"
                                          rows="10"></textarea>
                                </li>
                                <li>
                                    <input type="submit" name="newNumberSubmit" value="Spara Ändringar"
                                           class="form-input-submit">
                                </li>
                            </ul>
                        </form>-->
                        <div class="dashboard-form" id="3">
                            <h2 class="dashboard-sub-title-no-padding-top">Senaste nummer</h2>
                            <ul class="recent-article-wrapper">
                                <!--<h1 class="recent-article-main-title">Senaste nummer</h1>-->
                                <?php
                                include('includes/db_connect.inc');
                                $recentArticlesResult = mysqli_query($link, "SELECT * FROM tgv_recent_articles ORDER BY DATE DESC LIMIT 1") or die(mysqli_error($link));
                                while ($recentArticlesRow = mysqli_fetch_array($recentArticlesResult)) {
                                    $recentArticlesId = $recentArticlesRow['id'];
                                    $recentArticlesTitle = replace_quotes($recentArticlesRow['title']);
                                    $recentArticlesContent = replace_quotes($recentArticlesRow['content']);
                                    $recentArticlesFeatured = replace_quotes($recentArticlesRow['featured']);
                                    $recentArticlesImgName = $recentArticlesRow['image'];

                                    //todo buggar flera strong tags
                                    //$recentArticlesContent = substr($recentArticlesContent, 0, 220);
                                    //$recentArticlesFeatured = substr($recentArticlesFeatured, 0, 220);

                                    echo '<li class="recent-article">';
                                    echo '<img src="uploads/' . $recentArticlesImgName . '" class="recent-article-img">';
                                    echo '<h1 class="recent-article-title">' . $recentArticlesTitle . '</h1>';


                                    if (strlen($recentArticlesContent) < 220) {
                                        echo "$recentArticlesContent";
                                    } elseif (strlen($recentArticlesContent) > 220) {
                                        $recentArticlesContent = substr($recentArticlesContent, 0, 220);
                                        echo $recentArticlesContent;
                                        echo '...';
                                    } else {
                                        echo "$recentArticlesContent";
                                    }

                                    if (strlen($recentArticlesFeatured) < 220) {
                                        echo "$recentArticlesFeatured";
                                    } elseif (strlen($recentArticlesFeatured) > 220) {
                                        $recentArticlesFeatured = substr($recentArticlesFeatured, 0, 220);
                                        echo $recentArticlesFeatured;
                                        echo '...';
                                    } else {
                                        echo "$recentArticlesFeatured";
                                    }


                                    //echo $recentArticlesContent;
                                    //echo '...';
                                    //echo $recentArticlesFeatured;
                                    //echo '...';
                                    echo '<div class="recent-article-button-wrapper">';
                                    echo '<a href="recent_articles_edit.php?id=' . $recentArticlesId . '" class="edit">Redigera</a>';
                                    echo '<a href="recent_articles.php" class="show-all">Visa alla nummer</a>';
                                    echo '</div>';
                                    //if (isset($_SESSION['user'])) {
                                    //echo '<p><a href="recent_articles_edit.php?id=' . $recentArticlesId . '">Redigera</a></p>';


                                    //}
                                    echo '</li>';
                                }
                                ?>
                            </ul>
                            <h2 id="add-toggle" class="add-toggle-icon-plus">Lägg till nummer</h2>
                            <form action="recent_articles_process.php" method="post" enctype="multipart/form-data"
                                  id="add-article">
                                <ul>
                                    <li>
                                        <p class="dashboard-first-form-title">Titel: </p>
                                        <input type="text" name="title" id="title" title="Senaste nummer titel"
                                               required>
                                    </li>
                                    <li>
                                        <p class="dashboard-form-title">Beskrivning: </p>
                                    <textarea name="content" id="content"
                                              title="Senaste nummer beskrivning"></textarea>
                                    </li>
                                    <li>
                                        <p class="dashboard-form-title">I detta nummer: </p>
                                <textarea name="featured" id="featured"
                                          title="I detta nummer"></textarea>
                                    </li>
                                    <li>
                                        <p class="dashboard-form-title">Bild: </p>
                                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                                    </li>
                                    <li>
                                        <input type="submit" value="Publicera nummer" name="submit"
                                               class="form-input-submit">
                                    </li>
                                </ul>
                            </form>
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