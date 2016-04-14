<?php
include('includes/db_connect.inc');
//require('includes/auth.php');
$id = $_POST['id'];

if (isset($_POST['save'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $content = $_POST['content'];
    mysqli_query($link, "UPDATE tgv_about_editors SET fname = '$fname', lname = '$lname', content = '$content' WHERE id = '$id'");
}

header("Location: about.php");

?>