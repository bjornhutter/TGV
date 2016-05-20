<?php
//require('includes/auth.inc');
include('includes/db_connect.inc');

$id = $_POST['id'];


if (isset($_POST['newsDelete'])) {
    mysqli_query($link, "DELETE FROM tgv_news WHERE id = '$id'");
} elseif (isset($_POST['newsSubmit'])) {

    $newsTitle = $_POST['newsTitle'];
    $newsContent = $_POST['newsContent'];

    mysqli_query($link, "UPDATE tgv_news SET title = '$newsTitle', content = '$newsContent' WHERE id = '$id'");
}

//header("Location: news_posts.php"); 