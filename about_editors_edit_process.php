<?php
include('includes/db_connect.inc');
//require('includes/auth.php');
$id = $_POST['id'];

if (isset($_POST['delete'])) {
    $result = mysqli_query($link, "SELECT * FROM tgv_about_editors WHERE id = '$id'");
    $row = mysqli_fetch_array($result);
    $image = 'uploads/'.$row['image'];
    unlink($image);

    mysqli_query($link, "DELETE FROM tgv_about_editors WHERE id = '$id'");
}
elseif (isset($_POST['save'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $content = $_POST['content'];
    mysqli_query($link, "UPDATE tgv_about_editors SET fname = '$fname', lname = '$lname', content = '$content' WHERE id = '$id'");
}

header("Location: about.php");

?>