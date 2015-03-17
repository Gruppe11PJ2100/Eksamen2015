<?php
require '../PHPMailer5/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'aspmx.l.google.com;smtp.live.com';  // Specify main and backup SMTP servers
                       
$mail->Port = 25;                                  

$mail->From = 'edvin.klaebo@gmail.com';
$mail->FromName = 'Edvin';
$mail->addAddress('edvin.klaebo@gmail.com', 'Joe User');     // Add a recipient
$mail->addAddress('sivert.klaebo@gmail.com', 'hello');               // Name is optional
$mail->addReplyTo('edvin.klaebo@gmail.com', 'Information');
$mail->addCC('edvin.klaebo@gmail.com');
$mail->addBCC('edvin.klaebo@gmail.com');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'This message i can spam ur inbox, i can make robot to send it 1000 times a sec';
$mail->Body    = 'You must obey my command or <b>DIE!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}