<?php
include('includes/db_connect.inc');
//require('includes/auth.php');
$id = $_POST['id'];

if (isset($_POST['delete'])) {
    $result = mysqli_query($link, "SELECT * FROM tgv_recent_articles WHERE id = '$id'");
    $row = mysqli_fetch_array($result);
    $image = 'uploads/'.$row['image'];
    unlink($image);

    mysqli_query($link, "DELETE FROM tgv_recent_articles WHERE id = '$id'");
}
elseif (isset($_POST['save'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    mysqli_query($link, "UPDATE tgv_recent_articles SET title = '$title', content = '$content' WHERE id = '$id'");
}

header("Location: index.php");

?>