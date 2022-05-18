<?php
    session_start();
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
<body style="background-color: #972d07;">
<?php include "nav.php"; ?>
    <div class="main">
        <div class="login-form">
            <form action="" method="post">	
                <?php
                    echo "
                            <div class='title_cut' style='width: 570px;'>
                                
                                <h1>Check your email</h1>
                                <p>We emailed".$_COOKIE['email']." with a link to reset your password.</p>
                            </div>
                            
                            <div class='text-center'>
                                <label class=''>Or </label>
                                <a href='login.php' class='text-success'>back to login</a>
                            </div>
                            ";
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

