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
                <div class='title_cut_small'>
                    <?php
                    if(isset($_GET['token']))
                    {
                        ?>
                            <h3 style='text-align: center;width: 100%;'>Check your email</h3>
                            <p style='text-align: center;' class='font-light'>We emailed a new link to activate your account. Please confirm your account.</p>
                        <?php
                    }else if(isset($_GET['expired']))
                    {
                        ?>
                            <p style='text-align: center;' class='font-light'>You may have clicked an expired link or entered an incorrect web address</p>
                        <?php
                    }
                    else
                    {
                        ?>
                           <h3 style='text-align: center;width: 100%;'>Check your email</h3>
                           <p style='text-align: center;' class='font-light'>We emailed <?php echo $email;?> with a link to activate your account. Please confirm your account.</p>
                        <?php
                    }
                    ?>
                   
                </div>
                <!--
                <div class='text-center'>
                    <p style='text-align: center;width: 20px;display: inline-block;' class='font-light'>Or </p>
                    <a href='login.php' class='text-success font-light'>back to login</a>
                </div>-->
            </form>
        </div>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

