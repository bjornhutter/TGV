<?php
/**
 * Created by PhpStorm.
 * User: Bjorn
 * Date: 2016-04-19
 * Time: 12:44
 */

session_start();
session_unset();
$_SESSION = array();
session_destroy();
header('Location: admin.php?logout=2');