<?php
require 'PHPMailer5/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.google.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'gruppe11pj2100@gmail.com';                 // SMTP username
$mail->Password = '&%{I952T/1~=9@e';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'gruppe11pj2100@gmail.com';
$mail->FromName = 'Westerdals';
$mail->addAddress('gruppe11pj2100@gmail.com', 'Test User');     // Add a recipient
$mail->addAddress('gruppe11pj2100@gmail.com');               // Name is optional
$mail->addReplyTo('gruppe11pj2100@gmail.com', 'Information');
$mail->addCC('gruppe11pj2100@gmail.com');
$mail->addBCC('gruppe11pj2100@gmail.com');


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Melding fra Westerdals om din rom reservasjon' . $hello;
$mail->Body    = 'TO-DO fill in stuff here' . $day;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}