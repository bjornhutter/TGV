<?php
/*include('includes/db_connect.inc');

if (isset($_POST['submit'])) {
    $to = "test@tegeve.se";
    $from = $_POST['from'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $topic = $_POST['topic'];
    if (!filter_var($from, FILTER_VALIDATE_EMAIL) === false) { //validerar avsändarens email
        $message = $fname . " " . $lname . " skrev ett meddelande:" . "\n\n" . $_POST['message'];
        $message2 = "Det här en kopia av ditt meddelande som du skickade till TGV, " . $fname . "\n\n" . $_POST['message'];

        $headers = "From:" . $from;
        $headers2 = "From:" . $to;

        mail($to, $topic, $message, $headers);
        mail($from, $topic, $message2, $headers2);
        header('Location: send_script_complete.php');
    } else {
        $emailErr = "Invalid email format";
    }
}*/
/*require_once 'libs/phpmailer/PHP MailerAutoload.php';
require_once 'libs/phpmailer/class.phpmailer.php';
$m = new PHPMailer();

$m->isSMTP();
$m->SMTPAuth = true;
$m->SMTPDebug = 2;

$m->Host = 'smpt.tegeve.se';
$m->Username = 'test@tegeve.se';
$m->Password = 'password123';
$m->SMPTSecure = 'ssl';
$m->Port = 587;

$m->From = 'arvid.f.johansson@gmail.com';
$m->FromName = 'tegeve';
//$m->addReplyTo('test@tegeve.se', 'Reply address');

$m->Subject = $_POST['topic'];
$m->Body = $_POST['message'];
$m->AltBody = $_POST['message']; 
//$m->AddAttachment($_FILES['attachFile']['tmp_name'], $_FILES['attachFile']['tmp_name']);
var_dump($m->send());*/

