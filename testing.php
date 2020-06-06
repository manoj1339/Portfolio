<?php
use PHPMailer\PHPMailer\PHPMailer;

include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/Exception.php";
include_once "PHPMailer/SMTP.php";


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings

    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.manojavhale.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'support@manojavhale.com';                 // SMTP username
    $mail->Password = 'hkttzkcgx2lo';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;   	// TCP port to connect to

    //Recipients
      // Add a recipient
	 $mail->setFrom('support@manojavhale.com', 'Mailer');
    $mail->addAddress('manojavhale@gmail.com');               // Name is optional
   

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>