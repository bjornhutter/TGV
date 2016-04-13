<?php
$host = "localhost";
$user = "julnih132";
$dbName = "julnih132";
$password = "3boNzjyM9";

$link = mysqli_connect($host, $user, $password, $dbName);
mysqli_query($link, "SET NAMES utf8");
mysqli_query($link, "SET CHARACTER SET utf8");
?>