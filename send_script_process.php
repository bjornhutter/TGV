<?php
require_once 'libs/swiftmailer-5.x/lib/swift_required.php';
if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $emailMessage = $_POST['emailMessage'];

    $transport = Swift_SmtpTransport::newInstance()
        ->setHost('smtp01.binero.se')
        ->setPort(465)
        ->setEncryption('ssl')
    ; 

    $mailer = Swift_Mailer::newInstance($transport);

    $attachment = Swift_Attachment::fromPath($_FILES['attachFile']['tmp_name'])->setFilename($_FILES['attachFile']['name']);

    $message = Swift_Message::newInstance()
        ->setFrom(array($from => $fname . " " . $lname))
        ->setTo(array('kontakt@tegeve.se'))  //lägg till fler adresser
        ->setSubject('Manus från ' . $fname . " " . $lname)
        ->setBody($emailMessage, 'text/html')
        ->setMaxLineLength(78)
        ->attach($attachment)
    ;

    $result = $mailer->send($message);
}


//header('Location:send_script_complete.php');