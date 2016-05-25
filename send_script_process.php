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
            '<table style="width:400px;height:600px;">'.
            // header img
            '<tr>'. 
            '<td style="color:#fff;background-color:#e07929;"></td>'.
            //'<td><img src="' . $img . '" alt="image"/></td>' .
            '</tr>'.
            // title
            '<tr>'. 
            '<td><h1 style="color:blue;">här är en titel</h1></td>'.
            '</tr>'.
            // message
            '<tr>'.   
            '<td><p>här är meddelandet <b>' . $emailMessage . '</b></p></td>' .
            '</tr>'.
            '</table>'.
            // footer
            '<table style="height:100px;width:400px;color:white;background-color:#252525;">'.
            '<tr>'.
            '<td>Tel: 1823819723</td>'.
            '</tr>'.
            '<tr>'.
            '<td><a href="http://tegeve.se/">Till TGV</a></td>'.
            '</tr>'.
            '</table>'.
            '</body>' .
            '</html>',
            'text/html');
    
    $result = $mailer->send($message);
}


header('Location:send_script_complete.php');