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

    $message = Swift_Message::newInstance()
        ->setFrom(array($from => $fname . " " . $lname))
        ->setTo(array('noreply@tegeve.se', /* ersätt med 'tegeve@oru.se' när arbetet är helt klart*/))
        ->setSubject('Manus från ' . $fname . " " . $lname)
        ->setMaxLineLength(78)
        ->attach($attachment)
        ->setBody(
            '<html>' .
            '<head></head>' .
            '<body>' .
            '<table align="center" style="width:600px;font-family:‘Trebuchet MS’, sans-serif">' .
            '<tr style="color:#fff;background-color:#e07929;">' .
            '<td colspan="2" align="center" style="height:60px;font-family:Franklin Gothic Medium;font-size:30px">TIDSKRIFT FÖR GENUSVETENSKAP</td>' .
            '</tr>' .
            '<tr style="height:50px;"></tr>' . //whitespace

            // title 
            '<tr>' .
            '<td style="width:15px;"></td>' .
            '<td style="font-size: 20px;">' . $fname . " " . $lname . ' har skickat in manus till TGV</td>' .
            '</tr>' .
            '<tr style="height:50px;">' .  //whitespace
            '<td></td>' .
            '</tr>' .

            // message
            '<tr>' .
            '<td></td>' .
            '<td>' . $emailMessage . '</td> ' .
            '</tr>' .
            '</table>' .
            '<p style="height:200px"></p>' . //whitespace

            // footer
            '<table align="center" style="font-family:Verdana, Geneva, sans-serif;width:600px;color:white;background-color:#252525;">' .
            '<tr style="height:20px;">' .
            '<td style="width: 40px;"></td>' .
            '<td></td>' .
            '</tr>' .
            '<tr style="font-size:20px;">' .
            '<td></td>' .
            '<td>Kontakt</td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td style="height:20px;"></td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td>054-700 1000</td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td>tegeve@oru.se</td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td>Universitetsgatan 2</td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td>651 88 Karlstad</td>' .
            '</tr>' .
            '<tr style="height:20px;">' .
            '<td></td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td><a href="http://tegeve.se/">Till tegeve.se</a></td>' .
            '</tr>' .
            '<tr style="height: 20px;">' .
            '<td></td>' .
            '</tr>' .
            '</table>' .
            '</body>' .
            '</html>',
            'text/html')
        ->addPart($emailMessage, 'text/plain');

    $message2 = Swift_Message::newInstance()
        ->setFrom(array('noreply@tegeve.se' => "Tidskrift för genusvetenskap"))
        ->setTo(array($from))
        ->setSubject('Bekräftelse - manus till Tidskrift för genusvetenskap')
        ->setMaxLineLength(78)
        ->setBody(
            '<html>' .
            '<head>' .
            '</head>' .
            '<body>' .
            '<table border="0" align="center" style="width:600px;font-family:‘Trebuchet MS’, sans-serif">' .
            '<tr style="color:#fff;background-color:#e07929;">' .
            '<td colspan="2" align="center" style="height:60px;font-family:Franklin Gothic Medium;font-size:30px">TIDSKRIFT FÖR GENUSVETENSKAP' .
            '</td>' .
            '</tr>' .
            '<tr style="height:50px;"></tr>' . //whitespace

            // title
            '<tr>' .
            '<td style="width:15px;"></td>' .
            '<td style="font-size: 20px;">Tack för att du skickade in manus till TGV</td>' .
            '</tr>' .
            '<tr style="height:50px;">' .  //whitespace
            '<td></td>' .
            '</tr>' .
            '</table>' .
            '<p style="height:200px"></p>' . //whitespace

            // footer
            '<table border="0" align="center" style="font-family:Verdana, Geneva, sans-serif;width:600px;color:white;background-color:#252525;">' .
            '<tr style="height:20px;">' .
            '<td style="width: 40px;"></td>' .
            '<td></td>' .
            '</tr>' .
            '<tr style="font-size:20px;">' .
            '<td></td>' .
            '<td>Kontakt</td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td style="height:20px;"></td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td>054-700 1000</td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td>tegeve@oru.se</td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td>Universitetsgatan 2</td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td>651 88 Karlstad</td>' .
            '</tr>' .
            '<tr style="height:20px;">' .
            '<td></td>' .
            '</tr>' .
            '<tr>' .
            '<td></td>' .
            '<td><a href="http://tegeve.se/">Till tegeve.se</a></td>' .
            '</tr>' .
            '<tr style="height: 20px;">' .
            '<td></td>' .
            '</tr>' .
            '</table>' .
            '</body>' .
            '</html>',
            'text/html')
        ->addPart('Tack för att du skickade in manus till TGV', 'text / plain'
        );

    $result = $mailer->send($message);
    $result = $mailer->send($message2);
}



//header('Location:send_script_complete . php');