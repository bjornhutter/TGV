<?php
/**
 * Created by PhpStorm.
 * User: Bjorn
 * Date: 2016-04-19
 * Time: 12:23
 */

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
}