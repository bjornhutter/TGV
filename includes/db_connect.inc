<?php
//$host = "localhost";
//$user = "root";
//$dbName = "root";
// $password = "";

//$link = mysqli_connect($host, $user);
//if (!$link) {
//    die("Connection failed: " . mysqli_error($link));
//}/*else {
//    echo "Kunde connecta";
//}*/


//$host = "tegeve-206503.mysql.binero.se";
//$host = "localhost";
//$user = "206503_qs52454";
//$dbName = "206503-tegeve";
//$password = "73SO5wcmd6";

$host = "localhost";
$user = "206503_qs52454";
//$dbName = "206503-tegeve";
$password = "73SO5wcmd6";

$link = mysqli_connect($host, $user, $password);

if (!$link) {
    die("Connection failed: " . mysqli_error($link));
} else {
    echo "Connection Successful";
}
