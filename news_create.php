<?php
include('includes/db_connect.inc');

if (isset($_POST['newsSubmit'])) {
    $title = $_POST['newsTitle'];
    $content = $_POST['newsContent'];

    mysqli_query($link, "INSERT INTO tgv_news (title, content) VALUES ('$title', '$content')") or die(mysqli_error($link));
}

header("Location: news_posts.php");