<?php
/**
 * Created by PhpStorm.
 * User: Bjorn
 * Date: 2016-04-13
 * Time: 12:53
 */

function clean_input($input_data)
{
    $input_data = trim($input_data);
    $input_data = stripslashes($input_data);
    $input_data = htmlspecialchars($input_data);
    return $input_data;
}

/*
 * CALL FOR PAPERS
 */
if (isset($_POST['cfpSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['cfpTitle']);
    $content = clean_input($_POST['cfpContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    echo "Mysqli query here! $title $content";

    //header('Location: update_home_complete.php');

    //@todo HUR SKA DENNA FUNGERA?
}

/*
 * NYHETSFLÖDE
 */
if (isset($_POST['newsSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['newsTitle']);
    $content = clean_input($_POST['newsContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    echo "Mysqli query here! $title $content";

    //header('Location: update_home_complete.php');

    //@todo HUR SKA DENNA FUNGERA LIMIT 5, ny sida för alla nyhetsinlägg?

}

/*
 * SENASTE NUMMER
 */
if (isset($_POST['newNumberSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['newNumberTitle']);
    $content = clean_input($_POST['newNumberContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    echo "Mysqli query here! $title $content";

    //header('Location: update_home_complete.php');

    //@todo HUR SKA DENNA FUNGERA?
}

/*
 * INFO OM TGV
 */
if (isset($_POST['aboutSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['aboutTitle']);
    $content = clean_input($_POST['aboutContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_about SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_about_complete.php?update=1');


}
/*
 * ÅNGRA
 * INFO OM TGV
 */
if (isset($_POST['revertAboutSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldAboutTitle']);
    $content = clean_input($_POST['oldAboutContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_about SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_about_complete.php?update=1');
}

/*
 * OM REDAKTIONEN
 */
if (isset($_POST['staffSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['staffTitle']);
    $content = clean_input($_POST['staffContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    //header('Location: update_about_complete.php?update=2');

    //@todo BILD? LÄGGA TILL NYA FÄLT?

}

/*
 * PRISLISTA
 */
if (isset($_POST['priceSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['priceTitle']);
    $content = clean_input($_POST['priceContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_price SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_subscription_complete.php?update=1');


}
/*
 * ÅNGRA
 * PRISLISTA
 */
if (isset($_POST['revertPriceSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldPriceTitle']);
    $content = clean_input($_POST['oldPriceContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_price SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_subscription_complete.php?update=1');

}

/*
 * PRENUMERERINGSINFO
 */
if (isset($_POST['subInfoSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['subInfoTitle']);
    $content = clean_input($_POST['subInfoContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_subscription_info SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_subscription_complete.php?update=2');

}
/*
 * ÅNGRA
 * PRENUMERERINGSINFO
 */
if (isset($_POST['revertSubInfoSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldSubInfoTitle']);
    $content = clean_input($_POST['oldSubInfoContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_subscription_info SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_subscription_complete.php?update=2');

}

/*
 * RIKTLINJER
 */
if (isset($_POST['guidelinesSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['guidelinesTitle']);
    $content = clean_input($_POST['guidelinesContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_guidelines SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=1');
}
/*
 * ÅNGRA
 * RIKTLINJER
 */
if (isset($_POST['revertGuidelinesSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldGuidelinesTitle']);
    $content = clean_input($_POST['oldGuidelinesContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_guidelines SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=1');
}
/*
 * FORM
 */
if (isset($_POST['formSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['formTitle']);
    $content = clean_input($_POST['formContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_form SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=2');


}
/*
 * ÅNGRA
 * FORM
 */
if (isset($_POST['revertFormSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldFormTitle']);
    $content = clean_input($_POST['oldFormContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_form SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=2');


}
/*
 * RUBRIKER
 */
if (isset($_POST['titlesSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['titlesTitle']);
    $content = clean_input($_POST['titlesContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_titles SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=3');


}
/*
 * ÅNGRA
 * RUBRIKER
 */
if (isset($_POST['revertTitlesSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldTitlesTitle']);
    $content = clean_input($_POST['oldTitlesContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_titles SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=3');


}
/*
 * CITAT
 */
if (isset($_POST['quotesSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['quotesTitle']);
    $content = clean_input($_POST['quotesContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_quotes SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=4');

}
/*
 * ÅNGRA
 * CITAT
 */
if (isset($_POST['revertQuotesSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldQuotesTitle']);
    $content = clean_input($_POST['oldQuotesContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_quotes SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=4');

}
/*
 * REFERENSER
 */
if (isset($_POST['refSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['refTitle']);
    $content = clean_input($_POST['refContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_ref SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=5');

}
/*
 * ÅNGRA
 * REFERENSER
 */
if (isset($_POST['revertRefSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldRefTitle']);
    $content = clean_input($_POST['oldRefContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_ref SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=5');

}
/*
 * ANVISNINGAR FÖR RECENSENTER
 */
if (isset($_POST['scriptRevSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['scriptRevTitle']);
    $content = clean_input($_POST['scriptRevContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_script_reviewers SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=6');

}
/*
 * ÅNGRA
 * ANVISNINGAR FÖR RECENSENTER
 */
if (isset($_POST['revertScriptRevSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldScriptRevTitle']);
    $content = clean_input($_POST['oldScriptRevContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_script_reviewers SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=6');

}
/*
 * ANVISNINGAR FÖR GRANSKARE
 */
if (isset($_POST['scriptExaminerSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['scriptExaminerTitle']);
    $content = clean_input($_POST['scriptExaminerContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_script_examiners SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=7');

}
/*
 * ÅNGRA
 * ANVISNINGAR FÖR GRANSKARE
 */
if (isset($_POST['revertScriptExaminerSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldScriptExaminerTitle']);
    $content = clean_input($_POST['oldScriptExaminerContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_script_examiners SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=7');

}

/*
 * KONTAKTUPPGIFTER
 */
if (isset($_POST['contactSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['contactTitle']);
    $address = clean_input($_POST['contactAddress']);
    $phone = clean_input($_POST['contactPhone']);
    $email = clean_input($_POST['contactEmail']);

    $title = mysqli_real_escape_string($link, $title);
    $address = mysqli_real_escape_string($link, $address);
    $phone = mysqli_real_escape_string($link, $phone);
    $email = mysqli_real_escape_string($link, $email);

    mysqli_query($link, "UPDATE tgv_contact SET title = '$title', address = '$address', phone = '$phone', email = '$email' WHERE id = '1'");

    header('Location: update_contact_complete.php?update=1');

}
/*
 * ÅNGRA
 * KONTAKTUPPGIFTER
 */
if (isset($_POST['revertContactSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldContactTitle']);
    $address = clean_input($_POST['oldContactAddress']);
    $phone = clean_input($_POST['oldContactPhone']);
    $email = clean_input($_POST['oldContactEmail']);

    $title = mysqli_real_escape_string($link, $title);
    $address = mysqli_real_escape_string($link, $address);
    $phone = mysqli_real_escape_string($link, $phone);
    $email = mysqli_real_escape_string($link, $email);

    mysqli_query($link, "UPDATE tgv_contact SET title = '$title', address = '$address', phone = '$phone', email = '$email' WHERE id = '1'");

    header('Location: update_contact_complete.php?update=1');

}
/*
 * FOOTER
 */
if (isset($_POST['footerSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['footerTitle']);
    $content = clean_input($_POST['footerContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_footer SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_contact_complete.php?update=2');

}
/*
 * ÅNGRA
 * FOOTER
 */
if (isset($_POST['revertFooterSubmit'])) {

    include('includes/db_connect.inc');

    $title = clean_input($_POST['oldFooterTitle']);
    $content = clean_input($_POST['oldFooterContent']);

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_footer SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_contact_complete.php?update=2');

}
//todo tabort när vi inte behöver debug
echo "<tt><pre>";

var_dump($_POST);

echo "</pre></tt>";