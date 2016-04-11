<?php
$host = "localhost";
$user = "root";
//$dbName = "root";
// $password = "";

$link = mysqli_connect($host, $user);
if (!$link) {
    die("Connection failed: " . mysqli_error($link));
}/*else {
    echo "Kunde connecta";
}*/
