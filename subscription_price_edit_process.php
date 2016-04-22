<?php
include('includes/db_connect.inc');
//require('includes/auth.php');
$id = $_POST['id'];

if (isset($_POST['delete'])) {
    mysqli_query($link, "DELETE FROM tgv_subscription_price WHERE id = '$id'");
} elseif (isset($_POST['save'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($link, "UPDATE tgv_subscription_price SET title = '$title', content = '$content' WHERE id = '$id'");
}

header("Location: subscription.php");

?>
