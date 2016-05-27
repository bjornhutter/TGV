<?php
require('includes/auth.inc');
include('includes/db_connect.inc');

$id = $_POST['id'];

if (isset($_POST['newsDelete'])) {
    //$id = $_POST['id'];

    mysqli_query($link, "DELETE FROM tgv_news WHERE id = '$id'");
} elseif (isset($_POST['newsSubmit'])) {
    //$id = $_POST['id'];

    $title = $_POST['newsTitle'];
    $content = $_POST['newsContent'];

    mysqli_query($link, "UPDATE tgv_news SET title = '$title', content = '$content' WHERE id = '$id'");
}

header("Location: news_posts.php");

ob_end_flush();