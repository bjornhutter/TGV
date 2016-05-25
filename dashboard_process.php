<?php
/**
 * Created by PhpStorm.
 * User: Bjorn
 * Date: 2016-04-13
 * Time: 12:53
 */

/*function clean_input($input_data)
{
    $input_data = trim($input_data);
    $input_data = stripslashes($input_data);
    $input_data = htmlspecialchars($input_data);
    return $input_data;
}*/
require('includes/auth.inc');



/*
 * CALL FOR PAPERS
 */
if (isset($_POST['cfpSubmit'])) {

    include('includes/db_connect.inc');

    $title = $_POST['cfpTitle'];
    $content = $_POST['cfpContent'];

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_cfp SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_home_complete.php?update=1');

}

/*
 * ÅNGRA
 * CALL FOR PAPERS
 */
if (isset($_POST['revertCfpSubmit'])) {

    include('includes/db_connect.inc');

    $title = $_POST['oldCfpTitle'];
    $content = $_POST['oldCfpContent'];

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_cfp SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_home_complete.php?update=1');

}

/*
 * NYHETSFLÖDE
 */
if (isset($_POST['newsSubmit'])) {

    include('includes/db_connect.inc');

    $title = $_POST['newsTitle'];
    $content = $_POST['newsContent'];

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

    $title = $_POST['newNumberTitle'];
    $content = $_POST['newNumberContent'];

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

    $title = $_POST['aboutTitle'];
    $content = $_POST['aboutContent'];

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

    $title = $_POST['oldAboutTitle'];
    $content = $_POST['oldAboutContent'];

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

    $title = $_POST['staffTitle'];
    $content = $_POST['staffContent'];

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

    $title = $_POST['priceTitle'];
    $content = $_POST['priceContent'];

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

    $title = $_POST['oldPriceTitle'];
    $content = $_POST['oldPriceContent'];

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

    $title = $_POST['subInfoTitle'];
    $content = $_POST['subInfoContent'];

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

    $title = $_POST['oldSubInfoTitle'];
    $content = $_POST['oldSubInfoContent'];

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

    $title = $_POST['guidelinesTitle'];
    $content = $_POST['guidelinesContent'];

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

    $title = $_POST['oldGuidelinesTitle'];
    $content = $_POST['oldGuidelinesContent'];

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

    $title = $_POST['formTitle'];
    $content = $_POST['formContent'];

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

    $title = $_POST['oldFormTitle'];
    $content = $_POST['oldFormContent'];

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

    $title = $_POST['titlesTitle'];
    $content = $_POST['titlesContent'];

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

    $title = $_POST['oldTitlesTitle'];
    $content = $_POST['oldTitlesContent'];

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

    $title = $_POST['quotesTitle'];
    $content = $_POST['quotesContent'];

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

    $title = $_POST['oldQuotesTitle'];
    $content = $_POST['oldQuotesContent'];

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

    $title = $_POST['refTitle'];
    $content = $_POST['refContent'];

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

    $title = $_POST['oldRefTitle'];
    $content = $_POST['oldRefContent'];

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

    $title = $_POST['scriptRevTitle'];
    $content = $_POST['scriptRevContent'];

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

    $title = $_POST['oldScriptRevTitle'];
    $content = $_POST['oldScriptRevContent'];

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

    $title = $_POST['scriptExaminerTitle'];
    $content = $_POST['scriptExaminerContent'];

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

    $title = $_POST['oldScriptExaminerTitle'];
    $content = $_POST['oldScriptExaminerContent'];

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_script_examiners SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=7');

}

/*
 * ANVISNINGAR FÖR ARTIKELSKRIBENTER
 */
if (isset($_POST['writerGuidelinesSubmit'])) {

    include('includes/db_connect.inc');

    $title = $_POST['writerGuidelinesTitle'];
    $content = $_POST['writerGuidelinesContent'];

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_writer_guidelines SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=8');

}
/*
 * ÅNGRA
 * ANVISNINGAR FÖR ARTIKELSKRIBENTER
 */
if (isset($_POST['revertWriterGuidelinesSubmit'])) {

    include('includes/db_connect.inc');

    $title = $_POST['oldWriterGuidelinesTitle'];
    $content = $_POST['oldWriterGuidelinesContent'];

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_writer_guidelines SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_send_script_complete.php?update=8');

}

/*
 * KONTAKTUPPGIFTER
 */
if (isset($_POST['contactSubmit'])) {

    include('includes/db_connect.inc');

    $title = $_POST['contactTitle'];
    $address = $_POST['contactAddress'];
    $phone = $_POST['contactPhone'];
    $email = $_POST['contactEmail'];

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

    $title = $_POST['oldContactTitle'];
    $address = $_POST['oldContactAddress'];
    $phone = $_POST['oldContactPhone'];
    $email = $_POST['oldContactEmail'];

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

    $title = $_POST['footerTitle'];
    $content = $_POST['footerContent'];

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

    $title = $_POST['oldFooterTitle'];
    $content = $_POST['oldFooterContent'];

    $title = mysqli_real_escape_string($link, $title);
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_footer SET title = '$title', content = '$content' WHERE id = '1'");

    header('Location: update_contact_complete.php?update=2');

}

/*
 * KONTAKTINFORMATION
 */
if (isset($_POST['contactInfoSubmit'])) {

    include('includes/db_connect.inc');

    /*$title = $_POST['contactInfoTitle'];*/
    $content = $_POST['contactInfoContent'];

    /*$title = mysqli_real_escape_string($link, $title);*/
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_contact_info SET  content = '$content' WHERE id = '1'");

    header('Location: update_contact_complete.php?update=3');

}
/*
 * ÅNGRA
 * KONTAKTINFORMATION
 */
if (isset($_POST['revertContactInfoSubmit'])) {

    include('includes/db_connect.inc');

    /*$title = $_POST['oldContactInfoTitle'];*/
    $content = $_POST['oldContactInfoContent'];

    /*$title = mysqli_real_escape_string($link, $title);*/
    $content = mysqli_real_escape_string($link, $content);

    mysqli_query($link, "UPDATE tgv_contact_info SET content = '$content' WHERE id = '1'");

    header('Location: update_contact_complete.php?update=3');

}

//todo tabort när vi inte behöver debug
//echo "<tt><pre>";

//var_dump($_POST);

//echo "</pre></tt>";
ob_end_flush();