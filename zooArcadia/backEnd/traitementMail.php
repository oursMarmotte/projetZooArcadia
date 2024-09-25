<?php
$nom =$_POST['nom'];
$email= $_POST['email'];
$message = $_POST['message'];
$message = "Nom: ".$nom. "\n"."Email:".$email."\n"."message :".$message;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require dirname(__FILE__).'/lib/PHPMailer/src/Exception.php';
require dirname(__FILE__). '/lib/PHPMailer/src/PHPMailer.php';
require dirname(__FILE__).'/lib/PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jeangerald.centaure@gmail.com';                     //SMTP username
    $mail->Password   = 'acly kahd xrnn pnrg';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'zooArcadia');
    $mail->addAddress('jeangerald.centaure@gmail.com');     //Add a recipient
    
    //Attachments
  
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Sujet';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('Location: displayHabitat.php?id='.$idhabitat);
    header('Location:/frontEnd/nousContacter.php?resultat=1');
} catch (Exception $e) {
    header('Location:/frontEnd/nousContacter.php?resultat=2');
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}