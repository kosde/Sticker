<?php
$from = "correo Origen";
$to = "correo Destinatario";
$subject = "Titulo";
$message = "Correo
";
require('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->Debugoutput = 'html';
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port     = 465;  
$mail->Username = "corre origen";
$mail->Password = "Contraseña origen";
$mail->Host     = "link host";
$mail->Mailer   = "smtp";
$mail->SetFrom("correo origen","Alias");
$mail->AddAddress($to);	
$mail->Subject = $subject;
$mail->Body    = $message;
$mail->WordWrap   = 80;
$mail->IsHTML(true);
if(!$mail->Send()) {
    $msg = "<p class='error'>Problem in Sending Mail.</p>";
} else {
    $msg = "<p class='success'>Mail Sent Successfully.</p>";
}
?>