<?php
session_start();
$datezone=date_default_timezone_get();
$name           = $_GET["name"];
$email          = $_GET["email"];
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
    <script>
        var googleUser = {};
        var startApp = function() {
            gapi.load('auth2', function(){
                auth2 = gapi.auth2.init({
                client_id: '524978229044-o5t0u32i8442mg7du6c3p976h33mu9mk.apps.googleusercontent.com',
                cookiepolicy: 'single_host_origin',
            });
            auth2.attachClickHandler('gSignInWrapper', {}, onSuccess, onFailure);

            attachSignin(document.getElementById('customBtn'));
            });
        };
        function attachSignin(element) {
            //alert("si");
            console.log(element.id);
                auth2.attachClickHandler(element, {},
                onSuccess, onFailure);
        }
        function setCookie(key, value) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (6000));
            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
        }
        var onSuccess = function(user) {
            //alert("si");
            setCookie('name', user.getBasicProfile().getName());
            setCookie('avatar', user.getBasicProfile().getImageUrl());
            setCookie('email', user.getBasicProfile().getEmail());
            setCookie('id', user.getBasicProfile().getId());
            location.reload();
            };
        var onFailure = function(error) {
            console.log(error);
        };
    </script>
    
    <style type="text/css">
        #customBtn {
        display: inline-block;
        background: #3e82f8;
        color: white;
        width: 100%;
        border-radius: 5px;
        border: thin solid blue;
        box-shadow: 1px 1px 1px grey;
        white-space: nowrap;
        text-align: left;
        }
        #customBtn:hover {
        cursor: pointer;
        }
        span.label {
        font-family: serif;
        font-weight: normal;
        }
        span.icon {
        background-color: white;
        display: inline-block;
        vertical-align: middle;
        width: 42px;
        height: 35px;
        border-radius: 5px;
        }
        span.buttonText {
        display: inline-block;
        vertical-align: middle;
        padding-left: 42px;
        padding-right: 42px;
        font-size: 14px;
        font-weight: bold;
        /* Use the Roboto font that is loaded in the <head> */
        font-family: 'Roboto', sans-serif;
        }
    </style>

</head>
<body style="background-color: #102542;">
<?php include "nav.php"; ?>
    <?php
        if(isset($_COOKIE['id']))
        {
            include 'php/conexion_be.php';
            $nombre_u = $_COOKIE['name'];
            $email_u  = $_COOKIE['email'];
            $imagen_u   = $_COOKIE['avatar'];
            $date = date('Y-m-d H:i');
            $hash_email = hash('sha512',$email_u);
            $id_user = $_SESSION['id']; 
            $query = "UPDATE users SET usrname='$nombre_u',email='$email_u', hash_email='$hash_email',date_create='$date' WHERE id = '$id_user'";
            $ejecutar = mysqli_query($conexion,$query);
            
            echo'
                <script>
                    window.location = "confirm_your_account.php?email='.$email_u.'";
                </script>
                ';
        }
        
    ?>
    <div class="main">
        <div class="login-form">
            <form action="php/update_usr_be.php" method="get">	
                <?php
                 if(isset($_SESSION['error']))
                 {
                    if($_SESSION['error']==1)
                    {
                    echo "<div class='error_account'>
                            This account already exists. Please use another email address or <a href='login.php'>log in</a>.
                            </div>";
                    }
                }
                ?>
                <div class="text-center social-btn">
                    <div id="gSignInWrapper">
                        <div id="customBtn" class="customGPlusSignIn">
                        
                        <span class="icon">
                            <svg height="20" class="icongoogle" version="1" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.9 10c0-.7-.1-1.3-.2-1.9h-8.6v3.6H15c-.2 1.1-.8 2.1-1.8 2.8v2.3h3c1.7-1.6 2.7-4 2.7-6.8z" fill="#547DBE"></path>
                                <path d="M10.1 19c2.5 0 4.6-.8 6.1-2.2l-3-2.3c-.8.6-1.9.9-3.1.9-2.4 0-4.5-1.7-5.2-3.9l-3 .1V14c1.5 2.9 4.6 5 8.2 5z" fill="#34A751"></path>
                                <path d="M4.9 11.5c-.1-.5-.2-1.1-.2-1.7s.1-1.2.2-1.7V5.7l-3 .1c-.6 1.2-1 2.5-1 4s.4 3 1 4.2l3-2.5z" fill="#F8BB15"></path>
                                <path d="M10.1 4.3c1.3 0 2.6.5 3.5 1.4l2.6-2.6C14.6 1.6 12.5.7 10.1.7 6.5.7 3.4 2.8 1.9 5.8l3 2.3c.8-2.2 2.8-3.8 5.2-3.8z" fill="#E94435"></path>
                            </svg>
                        </span>
                        <span class="buttonText" style="padding-left: 25% !important;">Sign in with Google</span>
                        </div>
                    </div>
                    <div id="name"></div>
                    <script>startApp();</script>
                </div>
                <div class="or-seperator"><i>or</i></div>
                <div class="form-group">
                    <label class="float-left form-check-label">Name</label>
                    <div class="input-group" style="padding: 10px 0 10px 0;">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Name" required="required" autofocus value="<?php echo $name?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="float-left form-check-label">Email</label>
                    <div class="input-group" style="padding: 10px 0 10px 0;">
                        <input type="email" class="form-control" name="email"  id="email" placeholder="Email" required="required" value="<?php echo $email?>">
                    </div>
                </div>    
                <div class="form-group">
                    <label class="float-left form-check-label">Password</label>
                    <div class="input-group" style="padding: 10px 0 10px 0;">
                        
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                    </div>
                </div>        
                <div class="form-group">
                    <button style="width: 100%;"type="submit" class="button secondary large pr-4">Sign up</button>
                </div>
                <div class="text-center">
                    <label class="">Or </label>
                    <a href="login.php" class="text-success">log in</a>
                </div>  
            </form>
        </div>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

</body>
</html>

