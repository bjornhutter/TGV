<?php
include('includes/db_connect.inc');
//require('includes/auth.php');
$id = $_POST['id'];

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $adress = $_POST['adress'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    mysqli_query($link, "UPDATE contact SET title = '$title', adress = '$adress', phone = '$phone', email = '$email' WHERE id = '$id'");
}

header("Location: contact.php");

?>
