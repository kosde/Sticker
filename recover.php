<?php
session_start();
if(isset($_GET['email']))
{
    $email    = $_GET['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include "css.php";
    ?>
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <meta name="google-signin-client_id" content="616721949868-7bm0boihng0p9cstchmk00s7u85uuqvm.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <script src="https://apis.google.com/js/api:client.js"></script>
</head>
<body style="background-color: #102542;">
<?php include "nav.php"; ?>
    <div class="main">
        <div class="login-form">
            <form action="php/send_email.php" method="post">	
                <?php
                if(isset($_GET['email']))
                {
                    ?>
                    <style type="text/css">
                        .login-form 
                        {
                            width: 530px;
                        }
                    </style>
                    <?php
                    echo "<div style='display: none;visibility: hidden;'>";
                    $datezone=date_default_timezone_get();
                    $date = date('Y-m-d H:i');
                    $date_hash =  hash('sha512',$date);
                    $email_U=$_SESSION['email'];
                    $from = "info@acmestickers.com";
                    $to = $email_U;
                    $linkverifica = "https://www.acmestickers.com/new_password.php?email=".hash('sha512',$email_U)."token=".$date_hash;
                    $subject = "Reset password instructions";
                    $message = "We heard you lost your password. You can reset it by visiting the link below:<br>
                                <a href='". $linkverifica ."'>Reset your password </a><br>
                                <br>
                                If you did not request a password reset,please ignore this email.<br>
                                <br>
                                <br>
                                Thanks,<br>
                                <br>
                                Acme Sticker";
                    require('php/phpmailer/class.phpmailer.php');
                    include 'php/conexion_be.php';
                    $activar = mysqli_query($conexion,"UPDATE users SET date_token='$date',token='$date_hash' WHERE email = '$to'");

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
                    echo "</div>";
                    echo "
                        <div class='title_cut_small'>
                            <h3 style='text-align: center;width: 100%;'>Check your email</h3>
                            <p style='text-align: center;' class='font-light'>We emailed ".$email ." with a link to reset your password.</p>
                        </div>";
                    if(isset($_SESSION['email']))
                    {
                    echo"
                        <div class='text-center'>
                            <a href='../account.php' class='text-success'>Back</a>
                        </div>
                        ";
                    }
                    else{
                    echo"
                        <div class='text-center'>
                            <a href='../login.php' class='text-success'>Back</a>
                        </div>
                        ";
                    }
                }
                if(!isset($_GET['email'])) // $_SESSION['recover'] = 1;
                {
                    echo "
                            <div class='title_cut_small'>
                                <h3>Reset your password</h3>
                                <p class='font-light'>We’ll email you a link to reset your password.</p>
                            </div>
                            <div class='form-group'>
                                <label class='float-left form-check-label'>Email</label>
                                <div class='input-group'>
                                    <input type='email' class='form-control font-light' name='email' placeholder='Email' required='required'>
                                </div>
                            </div>           
                            <div class='form-group'>
                                <button style='width: 100%;' type='submit' class='button secondary large pr-4'>Send reset link</button>
                            </div>
                            <div class='text-center'>
                                <label class=''>Or </label>
                                <a href='login.php' class='text-success font-light'>back to login</a>
                            </div>
                        ";
                }
                ?> 
            </form>
        </div>
    </div>
   
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

