<?php
//require 'script/vendor/phpmailer/class.phpmailer.php';
//require 'script/vendor/phpmailer/class.smtp.php';

require 'script/phpmailer/PHPMailer.php';
require 'script/phpmailer/SMTP.php';
require 'script/phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer;

/*
//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
//$mail->Host = 'smtp.gmail.com';
$mail->Host = gethostbyname('smtp.gmail.com');
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

$mail->Username = 'sot.fmradio@gmail.com';
$mail->Password = 'Myjesuslord123$';
*/
$mail->isSMTP();
$mail->Host = 'localhost';
$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false; 
$mail->Port = 25; 

$mail->setFrom($_POST['email'], $_POST['name']);
$mail->addAddress('sot.fmradio@gmail.com', 'SOT.FM');
if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
    $mail->Subject = 'SOT.FM Contact Form';
    $mail->isHTML(false);
    $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['message']}
EOT;
    if (!$mail->send()) {
        echo "Please Try Again";
        error_log($mail->ErrorInfo);       
    }
    else
    {
        echo "success";
    }
} else {
       $msg = 'Invalid email address, message ignored.';
}
?>