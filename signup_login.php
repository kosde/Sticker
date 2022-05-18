<?php
    session_start();
    include 'php/conexion_be.php';
    $nombre_u = $_COOKIE['name'];
    $email_u  = $_COOKIE['email'];
    $imagen_u   = $_COOKIE['avatar'];

    $validar  = mysqli_query($conexion,"SELECT * FROM users WHERE email='$email_u' and usrname='$nombre_u'");
    if(mysqli_num_rows($validar)>0)
    {
        $extraido= mysqli_fetch_array($validar);
        $_SESSION['id']         = $extraido['id'];
        $_SESSION['active']     = $extraido ['active'];
        $_SESSION['name']       = $extraido['usrname'];
        $_SESSION['pass']       = $extraido ['pass'];
        $_SESSION['email']      = $extraido['email'];
        $_SESSION['hash_email'] = $extraido ['hash_email'];
        $_SESSION['code']       = $extraido['code'];
        $_SESSION['phone']      = $extraido ['phone'];
        $_SESSION['avatar']     = $extraido['avatar'];
    }
    $_SESSION["error"] = 0;
    $_SESSION["active"] = 0;
    $from = "info@acmestickers.com";
    $to = $email_u;
    $linkverifica = "https://www.acmestickers.com/confirm_account.php?email=".$hash_email;
    $subject = "Confirm your email address";
    $message = "Hi ". $nombre_u .",<br>

                To complete the signup process, confirm your email address by clicking the link below:<br>

                <a href='". $linkverifica ."'>Confirm your email address</a><br>

                Thanks,<br>
                Acme Sticker";
    
    $headers = "From: info@acmestickers.com"  . "\r\n". "Reply-To: info@acmestickers.com" . "\r\n" . "X-Mailer: PHP/" . phpversion() . "\r\n" .
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    mail($to,$subject,$message, $headers);
    mysqli_close($conexion);
    echo'
        <script>
            window.location = "../index.php?msg=Signed in successfully"; 
        </script>
        ';//?msg=Signed in successfully
?>