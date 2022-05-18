<?php
require('../phpmailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port     = 465;  
$mail->Username = "help@acmestickers.com";
$mail->Password = "4gd)be5|1$77";
$mail->Host     = "acmestickers.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("help@acmestickers.com", $_POST["email"]. " Order ". $_POST["name"]);
$mail->AddReplyTo("help@acmestickers.com", "help@acmestickers.com");
$mail->AddAddress("help@acmestickers.com");	
$mail->Subject = $_POST["subject"];
$mail->WordWrap   = 80;
$mail->MsgHTML("From: ".$_POST["email"]."<br> Message: ".$_POST["message"]);

foreach ($_FILES["attachment"]["name"] as $k => $v) {
    $mail->AddAttachment( $_FILES["attachment"]["tmp_name"][$k], $_FILES["attachment"]["name"][$k] );
}

$mail->IsHTML(true);
$mail->Send();
 echo'
        <script>
            window.location = "contact_us.php"
        </script>
        ';
?>