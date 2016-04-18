<?php
include('includes/db_connect.inc');
//require('includes/auth.php');
$id = $_POST['id'];

if (isset($_POST['delete'])) {
    mysqli_query($link, "DELETE FROM tgv_subscription_price WHERE id = '$id'");
} elseif (isset($_POST['save'])) {
    $item = $_POST['item'];
    $price = $_POST['price'];

    mysqli_query($link, "UPDATE tgv_subscription_price SET item = '$item', price = '$price' WHERE id = '$id'");
}

header("Location: subscription.php");

?>
