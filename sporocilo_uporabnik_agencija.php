<?php
require 'PHPMailer/PHPMailerAutoload.php';
include_once 'session.php'; 

$za=$_POST['email'];
$zadeva=$_POST['zadeva'];
$sporocilo=$_POST['sporocilo'];
$ime=$_SESSION['first_name'];
$priimek=$_SESSION['last_name'];
$email=$_SESSION['email'];
$id=$_POST['destination_id'];

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'turistika.projekt@gmail.com';          // SMTP username
$mail->Password = 'turistika1234'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;  
$mail->CharSet = 'utf-8';// TCP port to connect to

$mail->setFrom('turistika.projekt@gmail.com', "$ime "."$priimek");
$mail->addReplyTo("$email", "$ime "."$priimek");
$mail->addAddress("$za");   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = "<p>$sporocilo</p>";

$mail->Subject = "$zadeva";
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    header( "refresh:2;url=destination.php?id=$id" );
} else {
    echo 'Message has been sent';
    header( "refresh:2;url=destination.php?id=$id" );
}
?>
