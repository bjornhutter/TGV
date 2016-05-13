<?php

require_once 'libs/swiftmailer-5.x/lib/swift_required.php';
$transport = Swift_SmtpTransport::newInstance()
    ->setHost('smtp.tegeve.se')
    ->setPort(587)
    /*->setEncryption('ssl')*/;  //varför ssl inte funkar/ om det behövs

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance($_POST['message'])
    ->setFrom(array($_POST['from']))
    ->setTo(array('test@tegeve.se'))
    ->setBody($_POST['message'])
    ->attach(Swift_Attachment::fromPath('emailTest.txt'));

$result = $mailer->send($message);
    
    

//header('Location:send_script_complete.php');