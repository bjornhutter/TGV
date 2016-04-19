<?php
include('includes/db_connect.inc');
//require('includes/auth.php');
$id = $_POST['id'];

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($link, "UPDATE tgv_script_reviewers SET title = '$title', content = '$content' WHERE id = '$id'");
}

header("Location: send_script.php");

?>
