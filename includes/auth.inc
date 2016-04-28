<?php
/**
 * Created by PhpStorm.
 * User: Bjorn
 * Date: 2016-04-19
 * Time: 12:23
 */
//Sätter på output buffering för konfliker med skickade headers.
ob_start();
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
} else {

    // OM ADMIN ÄR INAKTIV I 20 MINUTER LOGGA UT HEN, TIMERN STARTAS OM PÅ HANDLINGAR
    function auto_logout($field)
    {
        $t = time();
        $t0 = $_SESSION[$field];
        $diff = $t - $t0;
        if ($diff > 1200 || !isset($t0)) {
            return true;
        } else {
            $_SESSION[$field] = time();
        }
    }

    if (auto_logout('timeout')) {
        session_unset();
        $_SESSION = array();
        session_destroy();
        header('Location: admin.php?logout=1');
        exit;
    }
}
