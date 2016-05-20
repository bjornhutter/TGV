<?php
include('includes/db_connect.inc');

if (isset($_POST['newsSubmit'])) {
    $newsTitle = $_POST['newsTitle'];
    $newsContent = $_POST['newsContent'];

    mysqli_query($link, "INSERT INTO tgv_news (title, content) VALUES ('$newsTitle', '$newsContent')") or die(mysqli_error($link));
}

header("Location: news_posts.php");