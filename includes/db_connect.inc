<?php
//Todo rensa bort onödig data
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

//$host = "localhost";
//$user = "206503_qs52454";
//$dbName = "206503_qs52454";
//$password = "73SO5wcmd6";


/**
 * Ny databas
 * PW: xYGP7t6SUF~m22s
 * USER: 206503_wt85915
 * DBNAME: 206503-tgv
 */

// FUNKAR INTE FÖR ATT VI HAR SIDAN PÅ OFCOURSE??
$host = "tgv-206503.mysql.binero.se";
$user = "206503_wt85915";
$password = "xYGP7t6SUF~m22s";
$dbName = "206503-tgv";


// SNUBBEN I NEPALS GAMLA DATABAS
//$host = "tegeve-206503.mysql.binero.se";
//$user = "206503_yb37596";
//$password = "59q8T1L96f9u6Bq";
//$dbName = "206503-tegeve";




$link = mysqli_connect($host, $user, $password, $dbName);
/*
if (!$link) {
    die("Connection failed: " . mysqli_error($link));
} else {
    echo "Connection Successful";
}*/
