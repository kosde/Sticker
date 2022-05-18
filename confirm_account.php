<?php
    session_start();
    $datezone=date_default_timezone_get();
    $date_Now = date('Y-m-d H:i');
    $dateNow = date_create($date_Now);
    //DateTime::createFromFormat('Y-m-d H:i', $date_Now);
    include 'php/conexion_be.php';
    $email = $_GET["email"];
    $token = $_GET["token"];
    $validar = mysqli_query($conexion,"SELECT * FROM users WHERE hash_email='$email' AND token='$token'"); 
    if(mysqli_num_rows($validar)>0)
    {   
        $extraido= mysqli_fetch_array($validar);
        $dates      = $extraido['date_token'];
        $date       = date_create($dates);
        $email      = $extraido['email'];
        $hash_email = $extraido ['hash_email'];
        $interval = (array) date_diff($dateNow,$date);
        if($interval['y'] == 0 && $interval['m'] == 0 && $interval['d'] == 0 && $interval['h'] <= 8)
        {
            $activar = mysqli_query($conexion,"UPDATE users SET active = '1',date_token=NULL,token='' WHERE hash_email = '$hash_email'");
            if(mysqli_affected_rows($conexion) == 1)
            {
                mysqli_close($conexion);
                if(isset($_COOKIE['registro']))
                {
                    echo'
                    <script>
                        window.location = "../notifications_sms.php?email='.$hash_email.'";
                    </script>
                    ';      
                }else
                {
                    
                    echo'
                    <script>
                        window.location = "../notifications_sms.php?email='.$hash_email.'";
                    </script>
                    ';      
                }
            }
            else
            {
                echo'
                <script>
                    window.location = "../login.php";
                </script>
                ';
            }
        }
        else
        {
            $date      = date('Y-m-d H:i');
            $date_hash =  hash('sha512',$date);
            $nombre_u  = $extraido['usrname'];
            $activar = mysqli_query($conexion,"UPDATE users SET date_token='$date',token='$date_hash' WHERE hash_email = '$hash_email'");
            $from = "info@acmestickers.com";
            $to = $email;
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
            require('php/phpmailer/class.phpmailer.php');

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
            echo'
            <script>
                window.location = "../confirm_your_account.php?token='.$token.'";
            </script>
            ';
        }
        
    }
    else
    {/*
        echo'
        <script>
            window.location = "../index.php";
        </script>
        ';*/
        echo'
            <script>
                window.location = "../confirm_your_account.php?expired='.$token.'";
            </script>
            ';
    }
?> 

