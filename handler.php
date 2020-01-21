<?php
require 'script/vendor/phpmailer/class.phpmailer.php';
require 'script/vendor/phpmailer/class.smtp.php';
 $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->Port = 587;
   $mail->SMTPAuth = true;
   $mail->Username = 'sot.fmradio@gmail.com';
   $mail->Password = 'your password'; /*password of admin*/
   $mail->setFrom($_POST['email'], $_POST['name']);
   $mail->addAddress(' sot.fmradio@gmail.com', 'SOT.FM');
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
    }
    else
    {
        echo "success";
    }
   } else {
       $msg = 'Invalid email address, message ignored.';
   }
?>

