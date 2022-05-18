<?php
session_start();
$email = $_GET['email'];
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
    <meta name="google-signin-client_id" content="524978229044-o5t0u32i8442mg7du6c3p976h33mu9mk.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <script src="https://apis.google.com/js/api:client.js"></script>
</head>
<body style="background-color: #102542;">
<?php include "nav.php"; ?>
    <div class="main">
        <div class="login-form">
            <form action="2-step.php" method="get">	
                <h2 style="text-align: center;">2-Step Verification</h2>
                <div class="form-group">
                    <label class="float-left form-check-label" style="width: 100%;">Enter your verification code</label>
                    <div class="input-group" style="padding: 10px 0 10px 0;">
                        <input type="hidden" name="email" value="<?php echo $email;?>">
                        <input type="number" class="form-control" name="token" placeholder="Enter the 6-digit code" required="required" autofocus tabindex="1">
                    </div>
                </div>            
                <div class="form-group">
                    <button style="width: 100%;" type="submit" class="button secondary large pr-4" tabindex="3">Continue</button>
                </div>
            </form>
        </div>
    </div>
   
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

