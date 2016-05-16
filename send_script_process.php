<?php
require_once 'libs/swiftmailer-5.x/lib/swift_required.php';
if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $transport = Swift_SmtpTransport::newInstance()
        ->setHost('smtp.tegeve.se')
        ->setPort(587)
        /*->setEncryption('ssl')*/
    ;  //varför ssl inte funkar/ om det behövs

    $mailer = Swift_Mailer::newInstance($transport);

    $message = Swift_Message::newInstance()
        ->setFrom(array($from => $fname . " " . $lname))
        ->setTo(array('test@tegeve.se'))
        ->setSubject('Manus från ' . $fname . " " . $lname)
        ->setBody($_POST['message'])
        ->attach(Swift_Attachment::fromPath('emailTest.txt'))
        //->attach(Swift_Attachment::fromPath($_FILES['attachFile']['tmp_name']))  temporär fil från bifoga
        //->setFilename($_FILES['attachFile']['name'])
    ;

    $result = $mailer->send($message);
}


//header('Location:send_script_complete.php');