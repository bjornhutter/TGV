<?php
include('includes/db_connect.inc');
require('includes/auth.inc');
$id = $_POST['id'];

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($link, "UPDATE tgv_about_staff SET title = '$title', content = '$content' WHERE id = '$id'");
}

header("Location: about.php");

ob_end_flush();