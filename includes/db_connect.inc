<?php
$host = "localhost";
$user = "arvjoh131";
$dbName = "arvjoh131";
$password = "7dPph0niY";

$link = mysqli_connect($host, $user, $password, $dbName);
mysqli_query($link, "SET NAMES utf8");
mysqli_query($link, "SET CHARACTER SET utf8");