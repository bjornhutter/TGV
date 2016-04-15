<?php
/**
 * Created by PhpStorm.
 * User: Bjorn
 * Date: 2016-04-13
 * Time: 12:53
 */

/*$cfpTitle = $_POST['cfpTitle'];
$cfpContent = $_POST['cfpContent'];

echo "$cfpTitle . $cfpContent";
*/


/*
 * CALL FOR PAPERS
 */
if (isset($_POST['cfpSubmit'])) {

    // Funkar inte att connecta behöver rätt uppgifter
    include('includes/db_connect.inc');

    $title = $_POST['cfpTitle'];
    $content = $_POST['cfpContent'];

    //$title = htmlspecialchars($title); mysqli_real_escape_string($link, $title);
    //UPDATE istället för INSERT?
    //mysqli_query($link, "INSERT INTO table_table (title, content) VALUES ('$title', '$content')") or die(mysqli_error($link));

    echo "Mysqli query here! $title $content";
}

/*
 * NYHETSFLÖDE
 */
if (isset($_POST['newsSubmit'])) {

    $title = $_POST['newsTitle'];
    $content = $_POST['newsContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * SENASTE NUMMER
 */
if (isset($_POST['newNumberSubmit'])) {

    $title = $_POST['newNumberTitle'];
    $content = $_POST['newNumberContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * INFO OM TGV
 */
if (isset($_POST['aboutSubmit'])) {

    $title = $_POST['aboutTitle'];
    $content = $_POST['aboutContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * OM REDAKTIONEN
 */
if (isset($_POST['staffSubmit'])) {

    $title = $_POST['staffTitle'];
    $content = $_POST['staffContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * PRISLISTA
 */
if (isset($_POST['priceSubmit'])) {

    $title = $_POST['priceTitle'];
    $content = $_POST['priceContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * PRENUMERERINGSINFO
 */
if (isset($_POST['subscriptionInfoSubmit'])) {

    $title = $_POST['subscriptionInfoTitle'];
    $content = $_POST['subscriptionInfoContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * RIKTLINJER
 */
if (isset($_POST['guidelinesSubmit'])) {

    $title = $_POST['guidelinesTitle'];
    $content = $_POST['guidelinesContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * FORM
 */
if (isset($_POST['formSubmit'])) {

    $title = $_POST['formTitle'];
    $content = $_POST['formContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * RUBRIKER
 */
if (isset($_POST['titlesSubmit'])) {

    $title = $_POST['titlesTitle'];
    $content = $_POST['titlesContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * CITAT
 */
if (isset($_POST['quoteSubmit'])) {

    $title = $_POST['quoteTitle'];
    $content = $_POST['quoteContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * REFERENSER
 */
if (isset($_POST['refSubmit'])) {

    $title = $_POST['refTitle'];
    $content = $_POST['refContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * KONTAKTUPPGIFTER
 */
if (isset($_POST['contactSubmit'])) {

    $title = $_POST['contactTitle'];
    $content = $_POST['contactContent'];

    echo "Mysqli query here! $title $content";


}

/*
 * FOOTER
 */
if (isset($_POST['footerSubmit'])) {

    $title = $_POST['footerTitle'];
    $content = $_POST['footerContent'];

    echo "Mysqli query here! $title $content";


}

echo "<tt><pre>";

var_dump($_POST);

echo "</pre></tt>";