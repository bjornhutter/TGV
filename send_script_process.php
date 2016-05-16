<?php
require_once 'libs/swiftmailer-5.x/lib/swift_required.php';
if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $emailMessage = $_POST['emailMessage'];

    $transport = Swift_SmtpTransport::newInstance()
        ->setHost('smtp.tegeve.se')
        ->setPort(587)
        //->setEncryption('ssl')
    ;  //varför ssl inte funkar/ om det behövs

    $mailer = Swift_Mailer::newInstance($transport);

    $attachment = Swift_Attachment::fromPath($_FILES['attachFile']['tmp_name'])->setFilename($_FILES['attachFile']['name']);

    $message = Swift_Message::newInstance()
        ->setFrom(array($from => $fname . " " . $lname))
        ->setTo(array('test@tegeve.se'))  //lägg till fler adresser
        ->setSubject('Manus från ' . $fname . " " . $lname)
        ->setBody($emailMessage, 'text/html')
        ->setMaxLineLength(78)
        //->attach(Swift_Attachment::fromPath('emailTest.txt'))  lokal fil
        ->attach($attachment)
    ;

    $result = $mailer->send($message);
}


header('Location:send_script_complete.php');