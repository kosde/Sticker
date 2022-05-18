<?php
session_start();
//session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acme Stickers | Custom stickers that kick ass</title> 
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <meta name="google-signin-client_id" content="524978229044-o5t0u32i8442mg7du6c3p976h33mu9mk.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <script src="https://apis.google.com/js/api:client.js"></script>
    <link rel="shortcut icon" href="../../assets/Logo_2.png"> 
    <script>
        function Send_emails()
		{
			$.ajax({
                type: 'POST',
                url: 'priv/send_emails.php',
                contentType: false,
                processData: false,
                success:function(response) {
                       //alert("success");
                },
                onFailure: function(response){
                    //alert("fail");
                }
            });
		}
    </script>
</head>
<body>
    <div class="main">
        <div class="login-form">
        <script>
					document.addEventListener("DOMContentLoaded", function(event) { 
						Send_emails();
						});
				</script>
            <form action="priv/login.php" method="post">	
                <?php

                if(isset($_SESSION['error_admi'])==1)
                {
                    echo "<div class='error_account'>
                        The email or password is not correct. <a href='recover.php'>Reset your password</a>.
                    </div>";
                }
                if(isset($_GET['error'])==1)
                {
                    echo "<div class='error_account'>
                        Your account is suspended.
                    </div>";
                }
                ?>
                <div class="text-center social-btn">
                    <img src="../../assets/Logo.png" alt="">
                </div>
                <div class="form-group">
                    <label class="float-left form-check-label" style="width: 100%;">Email</label>
                    <div class="input-group" style="padding: 10px 0 10px 0;">
                        <?php
                            if(isset($_SESSION['email_admi']))
                            {
                                echo "<input  class='form-control' name='email' placeholder='Email' required='required' autofocus tabindex='1' value='".$_SESSION['email_admi']."'>";
                            }else
                            {
                        ?>
                            <input  class="form-control" name="email" placeholder="Email" required="required" autofocus tabindex="1">
                        <?php
                            }
                            ?>
                    </div>
                </div>    
                <div class="form-group">
                <label class="float-left form-check-label">Password </label>
                    <div class="input-group" style="padding: 10px 0 10px 0;">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required" tabindex="2">
                    </div>
                </div>        
                <div class="form-group">
                    <button style="width: 100%;" type="submit" class="button secondary large pr-4" tabindex="3">Log in</button>
                </div> 
            </form>
        </div>
    </div>
   
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>

