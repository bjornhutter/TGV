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
        ->setEncryption('ssl');

    $mailer = Swift_Mailer::newInstance($transport);

    $attachment = Swift_Attachment::fromPath($_FILES['attachFile']['tmp_name'])->setFilename($_FILES['attachFile']['name']);

    $img = Swift_Image::fromPath('img/tgv_email_header.png');

    $message = Swift_Message::newInstance()
        ->setFrom(array($from => $fname . " " . $lname))
        ->setTo(array('noreply@tegeve.se', 'arvid.f.johansson@gmail.com'))//ändra till tegeve@oru.se
        ->setSubject('Manus från ' . $fname . " " . $lname)
        ->setMaxLineLength(78)
        ->attach($attachment)
        ->setBody($emailMessage, 'text/plain')
        ->addPart(
            '<html>' .
            '<head></head>' .
            '<body>' .
            '<img src="' . $img . '" alt="image"/>' .
            '<h1 style="color:blue;">här är en titel</h1>' .
            '<p>här är meddelandet <b>' . $emailMessage . '</b></p>' .
            '</body>' .
            '</html>',
            'text/html');

    $result = $mailer->send($message);
}


header('Location:send_script_complete.php');