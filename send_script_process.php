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

    //$img = Swift_Image::fromPath('http://www.tegeve.se/public_html/newsite/tgv_arvid/img/tgv_email_header.png');

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
            '<table align="center" style="width:600px;height:700px;">' .
            // header img
            '<tr style="color:#fff;background-color:#e07929;">' .
            '<td align="center" style="height:60px;font-size:30px">TIDSKRIFT FÖR GENUSVETENSKAP</td>' .
            //'<td><img src="' . $img . '" alt="image"/></td>' .
            '</tr>' .
            '<tr style="height:50px;"></tr>' . //whitespace

            // title
            '<tr>' .
            '<td><h3 style="">' . $fname . " " . $lname . ' har skickat in manus till TGV</h3></td>' .
            '</tr>' .
            '<tr style="height:50px;"><td></td></tr>' . //whitespace

            // message
            '<tr>' .
            '<td>' . $emailMessage . '</td>' .
            '</tr>' .
            '</table>' .
            '<tr style="height:50px;"></tr>' . //whitespace

            // footer
            '<table align="center" style="width:600px;color:white;background-color:#252525;">' .
            '<tr style="height:20px;">' .
            //'<td></td>'.
            '</tr>' .
            '<tr>' .
            '<td>Kontakt</td>' .
            '</tr>' .
            '<tr>' .
            '<td>054-700 1000</td>' .
            '</tr>' .
            '<tr>' .
            '<td>tegeve@oru.se</td>' .
            '</tr>' .
            '<tr>' .
            '<td>Universitetsgatan 2</td>' .
            '</tr>' .
            '<tr>' .
            '<td>651 88 Karlstad</td>' .
            '</tr>' .
            '<tr>' .
            '<td><a href="http://tegeve.se/">Till TGV</a></td>' .
            '</tr>' .
            '</table>' .
            '</body>' .
            '</html>',
            'text/html');

    $result = $mailer->send($message);
}


header('Location:send_script_complete.php');