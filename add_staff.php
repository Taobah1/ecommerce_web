<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once('vendor/autoload.php');

if(isset($_POST['submitStaffBtn'])){

  $newMail = $_POST['email'];


  $mail = new PHPMailer;

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'adiomusa77@gmail.com';                     //SMTP username
$mail->Password   = 'ltnszaxhvbsuhutu';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom('adiomusa77@gmail.com', 'Taobah');
// $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
$mail->addAddress($newMail);               //Name is optional
$mail->addReplyTo('adiomusa77@gmail.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// //Attachments
// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Here is the subject';
$mail->Body    = '<h4>Kindly click localhost\website\staff_register.php to register and log in</h4>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()){
  echo "Message could not be sent";
}
else{
  echo "Message succesfully sent";
}

}

?>