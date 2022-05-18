<?php
    session_start();
    $datezone=date_default_timezone_get();
    include 'conexion_be.php';
    $nombre_u = $_POST['username'];
    $email_u  = $_POST['email'];
    $pass_u   = $_POST['password'];
    $pass_u = hash('sha512',$pass_u);
    $hash_email = hash('sha512',$email_u);
    $date = date('Y-m-d H:i');
    $date_hash =  hash('sha512',$date);
    $query = "INSERT INTO users (usrname,email,pass,hash_email,date_create,date_token,token)VALUES('$nombre_u','$email_u','$pass_u','$hash_email','$date','$date','$date_hash')";
    $verificar = mysqli_query($conexion, "SELECT * FROM users WHERE email='$email_u' AND temporal='0'");
    if(mysqli_num_rows($verificar)>0)
    {
        $_SESSION["error"] = 1;
        //alert("This account already exists. Please use another email address or log in.");
        echo'
            <script>
                window.location = "../signup.php";
            </script>
            ';
        mysqli_close($conexion);
        exit();
    }
    //https://www.acmestickers.com/confirm_account.php?email=3277a1cf413885c74f55db294166e483be01481b221a4f495dd70f3dc99fa3fd549d0b055f578a8538a4dc71399a38426e51204d78d098f1e982b13052e31fad&
    //token=148f7c0cf18928e70b0b01cc0103fac3f28e2ff58bfe92285da6e44d17e0decb51774a403424d3c86db5280b48fea12be6db5d94e69441756b5c6ef0d18583d8
    $ejecutar = mysqli_query($conexion,$query);
    $_SESSION['id'] = mysqli_insert_id ($conexion);
    $id_last = $_SESSION['id'];
    $query = "INSERT INTO notifications (id_user)VALUES('$id_last')";
    $verificar = mysqli_query($conexion,$query);
    
    if($ejecutar){
        
        $_SESSION["error"] = 0;
        $_SESSION["active"] = 0;
        $from = "info@acmestickers.com";
        $to = $_POST['email'];
        $linkverifica = "https://www.acmestickers.com/confirm_account.php?email=".$hash_email."&token=".$date_hash;
        $subject = "Confirm your email address";
        $message = "Hi ". $nombre_u .",<br>
                    <br>
                    To complete the signup process, confirm your email address by clicking the link below:<br>

                    <a href='". $linkverifica ."'>Confirm your email address</a><br>
                    <br>
                    <br>
                    <br>
                    Thanks,<br>
                    <br>
                    Acme Sticker";
        require('phpmailer/class.phpmailer.php');

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->Debugoutput = 'html';
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "ssl";
        $mail->Port     = 465;  
        $mail->Username = "info@acmestickers.com";
        $mail->Password = "H5s8v7SeftZkK9J";
        $mail->Host     = "acmestickers.com";
        $mail->Mailer   = "smtp";
        $mail->SetFrom("info@acmestickers.com","Acme Stickers");
        $mail->AddAddress($to);	
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->WordWrap   = 80;
        $mail->IsHTML(true);
        if(!$mail->Send())
        {
            $msg = "<p class='error'>Problem in Sending Mail.</p>";
        }
        else 
        {
            $msg = "<p class='success'>Mail Sent Successfully.</p>";
        }
        /*$headers = "From: Acme Stickers <info@acmestickers.com>"  . "\r\n". "Reply-To: info@acmestickers.com" . "\r\n" . "X-Mailer: PHP/" . phpversion() . "\r\n" .
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        mail($to,$subject,$message, $headers);*/
        //session_start();
        /*$_SESSION['name'] = $nombre_u;
        $_SESSION['email'] = $email_u;*/
        setcookie("name", $nombre_u, time() + (3600 * 30), "/");
        setcookie("email", $email_u, time() + (3600 * 30), "/");
        setcookie("registro","1", time() + (3600 * 30), "/");
        echo'
            <script>
                window.location = "../confirm_your_account.php";
            </script>
            ';
    }
    mysqli_close($conexion);
?>