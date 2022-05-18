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
            console.log(element.id);
                auth2.attachClickHandler(element, {},
                onSuccess, onFailure);
        }
        function setCookie(key, value) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (2*1000));
            document.cookie = key + '=' + value + '; expires=' + expires.toUTCString() + "; path=/";
        }
        var onSuccess = function(user) {
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
    <?php
        if(isset($_COOKIE['id'])):
            $id                 =  $_COOKIE['id'];
            $name               =  $_COOKIE['name'];
            $avatar             =  $_COOKIE['avatar'];
            $email              =  $_COOKIE['email'];
            $user_name          =  $name ;
            $email_u            =  $email;
            $_SESSION['source'] =  "google";
            /*
                setcookie("id", '');
                setcookie("name", '');
                setcookie("image", '');
                setcookie("email", '');
                echo " <script>"; 
                echo "      setcookie('id','');";
                echo "      setcookie('name','');";
                echo "      setcookie('avatar','');";
                echo "      setcookie('email','');";
                echo " </script>";
            */
            include 'php/conexion_be.php';
            //$conexion =  mysqli_connect("localhost","u4g4jzvgram6g","^(3@uzE24H3C","db8qd64hszcs9u");
            //$pass_u   = hash('sha512',$pass_u);
            $validar  = mysqli_query($conexion,"SELECT * FROM users WHERE email='$email_u' and usrname='$user_name'");
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
                if($_SESSION['active']==0)
                {
                    setcookie("name", $_SESSION['name'], time() + (3600 * 30), "/");
                    setcookie("email",$_SESSION['email'], time() + (3600 * 30), "/");
                    session_destroy();
                    session_start();
                    mysqli_close($conexion);
                    echo'
                    <script>
                        window.location = "../confirm_your_account.php";
                    </script>
                    ';
                }
                echo'
                    <script>
                        window.location = "../index.php?msg=Signed in successfully";
                    </script>
                    ';
                    mysqli_close($conexion);
            }else{
                $_SESSION["error"] = 3;
                echo'
                    <script>
                        window.location = "../login.php";
                    </script>
                    ';
                mysqli_close($conexion);
            }
            echo'
            <script>
                window.location = "../index.php";
            </script>
            ';
            endif;
    ?>
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
    <div class="main">
        <div class="login-form">
            <form action="php/login_usr_be.php" method="post">	
                <?php
                    if(isset($_SESSION['error']))
                    {
                        if($_SESSION['error']==1)
                        {
                            echo "<div class='error_account'>
                            The email or password is not correct. <a href='recover.php'>Reset your password</a>.
                            </div>";
                        }
                        if($_SESSION['error']==2)
                        {
                            echo "<div class='error_account'>
                            Contact the administrator. <a href='recover.php'>Reset your password</a>.
                            </div>";
                        }
                        if($_SESSION['error']==3)
                        {
                            echo "<div class='error_account'>
                            Account does not exist  <a href='signup.php' class='text-success' tabindex='5'>Sign up</a>.
                            </div>";
                        }
                        if($_SESSION['error']==4)
                        {
                            echo "<div class='successful_account'>
                            The password has been changed successfully.
                            </div>";
                        }
                        if($_SESSION['error']==5)
                        {
                            echo "<div class='error_account'>
                            An error has occurred. Please contact your system administrator.
                            </div>";
                        }
                        unset($_SESSION['error']);
                    }
                ?>
                <div class="text-center social-btn">
                    <div id="gSignInWrapper">
                        <div id="customBtn" class="customGPlusSignIn">
                        <span class="icon"><svg height="20" class="icongoogle" version="1" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.9 10c0-.7-.1-1.3-.2-1.9h-8.6v3.6H15c-.2 1.1-.8 2.1-1.8 2.8v2.3h3c1.7-1.6 2.7-4 2.7-6.8z" fill="#547DBE"></path>
                        <path d="M10.1 19c2.5 0 4.6-.8 6.1-2.2l-3-2.3c-.8.6-1.9.9-3.1.9-2.4 0-4.5-1.7-5.2-3.9l-3 .1V14c1.5 2.9 4.6 5 8.2 5z" fill="#34A751"></path>
                        <path d="M4.9 11.5c-.1-.5-.2-1.1-.2-1.7s.1-1.2.2-1.7V5.7l-3 .1c-.6 1.2-1 2.5-1 4s.4 3 1 4.2l3-2.5z" fill="#F8BB15"></path>
                        <path d="M10.1 4.3c1.3 0 2.6.5 3.5 1.4l2.6-2.6C14.6 1.6 12.5.7 10.1.7 6.5.7 3.4 2.8 1.9 5.8l3 2.3c.8-2.2 2.8-3.8 5.2-3.8z" fill="#E94435"></path>
                        </svg></span>
                        <span class="buttonText" style="padding-left: 25% !important;">Log in with Google</span>
                        </div>
                    </div>
                    <div id="name"></div>
                    <script>startApp();</script>
                </div>
                <div class="or-seperator"><i>or</i></div>
                <div class="form-group">
                    <label class="float-left form-check-label" style="width: 100%;">Email</label>
                    <div class="input-group" style="padding: 10px 0 10px 0;">
                        <?php
                            if(isset($_SESSION['email_l']))
                            {
                                echo "<input type='email' class='form-control' name='email' placeholder='Email' required='required' autofocus tabindex='1' value='".$_SESSION['email_l']."'>";
                                unset($_SESSION['email_l']);
                            }else
                            {
                        ?>
                            <input type="email" class="form-control" name="email" placeholder="Email" required="required" autofocus tabindex="1">
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
                    
                    <a href="recover.php" class="text-success" style="float: right;padding: 0 0 10px 0;" tabindex="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forgot password?</a>
                    
                </div>        
                <div class="form-group">
                    <button style="width: 100%;" type="submit" class="button secondary large pr-4" tabindex="3">Log in</button>
                </div>
                <div class="text-center">
                    <label class="">Or </label>
                    <a href="signup.php" class="text-success" tabindex="5">Sign up</a>
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

