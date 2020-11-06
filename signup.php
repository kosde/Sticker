<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticker Mule | Custom stickers that kick ass</title> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <meta name="google-signin-client_id" content="616721949868-7bm0boihng0p9cstchmk00s7u85uuqvm.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <script src="https://apis.google.com/js/api:client.js"></script>
    <script>
        var googleUser = {};
        var startApp = function() {
            gapi.load('auth2', function(){
                auth2 = gapi.auth2.init({
                client_id: '616721949868-7bm0boihng0p9cstchmk00s7u85uuqvm.apps.googleusercontent.com',
                cookiepolicy: 'single_host_origin',
            });
            auth2.attachClickHandler('signin-button', {}, onSuccess, onFailure);

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
            expires.setTime(expires.getTime() + (60 * 1000));
            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
        }
        var onSuccess = function(user) {
            var myvar = user.getBasicProfile().getName();
            setCookie('cookie_session', myvar);
            //$_SESSION['Fullname'] = user.getBasicProfile().getName();
            //$_SESSION['ImageURL']= user.getBasicProfile().getImageUrl();
            //$_SESSION['Email'] = user.getBasicProfile().getEmail();
            console.log('Signed in as ' + user.getBasicProfile().getEmail());    
            console.log('Signed in as ' + user.getBasicProfile().getName());
            };
        var onFailure = function(error) {
            console.log(error);
        };
    </script>
    <?php
        if(isset($_COOKIE['cookie_session'])):
            $_SESSION['Fullname'] =  $_COOKIE['cookie_session'];
            setcookie("cookie_session", '');
            header("Location:index.php");
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
<body style="background-color: #f97805;">
    <nav class="navbar navbar-expand-lg">
        <div class="container">      
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="text-muted fa fa-bars"></i>
                </button>
            </div>
            <a href="index.php" class="navbar-brand d-flex" style="padding-top: 5px;">
                <img src="/assets/silueta1.png" width="30" height="25">
                <h4 style="color: #582707;" class="dt">Acme</h4>
                <h4 style="color: #f26922;" class="dt">Stickers</h4>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link"style="color: #582707;" href="#">Stickers</a></li> 
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex:0.5;">
                <ul class="navbar-nav mr-auto">
                    <li><a href="/cart.php"><i  class="nav-link fas fa-shopping-cart" style="color: #582707;"></i></a></li>
                    <?php
                        if(!isset($_SESSION['Fullname']))
                        {
                        ?>
                            <li><a class="nav-link  pl-4" style="padding-right: 1.0rem; color: #582707;" href="/login.php">Log in</a></li>
                            <li><a class=" nav-link  pl-4" style="padding-right: 1.0rem; color: #582707;" href="/signup.php">Sign up</a></li>
                        <?php
                        }else
                        {
                                echo "<li> <a class='nav-link text-muted pl-4' style='padding-right: 1.0rem;'>" . $_SESSION['Fullname'] . "</a> </li>
                                      <li> <a class='nav-link pl-4' style='padding-right: 1.0rem;' href='logout.php'>Log out</a></li>";                        
                        }
                    ?>
                </ul>
            </div>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="text-muted fas fa-shopping-cart"></i>
                </button>
            </div>
        </div>   
    </nav>
    <div class="main">
        <div class="login-form">
            <form action="php/registro_usr_be.php" method="post">	
                <div class="text-center social-btn">
                    <div id="gSignInWrapper">
                        <div id="customBtn" class="customGPlusSignIn">
                        
                        <span class="icon"><svg height="20" class="icongoogle" version="1" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.9 10c0-.7-.1-1.3-.2-1.9h-8.6v3.6H15c-.2 1.1-.8 2.1-1.8 2.8v2.3h3c1.7-1.6 2.7-4 2.7-6.8z" fill="#547DBE"></path>
                        <path d="M10.1 19c2.5 0 4.6-.8 6.1-2.2l-3-2.3c-.8.6-1.9.9-3.1.9-2.4 0-4.5-1.7-5.2-3.9l-3 .1V14c1.5 2.9 4.6 5 8.2 5z" fill="#34A751"></path>
                        <path d="M4.9 11.5c-.1-.5-.2-1.1-.2-1.7s.1-1.2.2-1.7V5.7l-3 .1c-.6 1.2-1 2.5-1 4s.4 3 1 4.2l3-2.5z" fill="#F8BB15"></path>
                        <path d="M10.1 4.3c1.3 0 2.6.5 3.5 1.4l2.6-2.6C14.6 1.6 12.5.7 10.1.7 6.5.7 3.4 2.8 1.9 5.8l3 2.3c.8-2.2 2.8-3.8 5.2-3.8z" fill="#E94435"></path>
                    </svg></span>
                        <span class="buttonText">Sign in with Google</span>
                        </div>
                    </div>
                    <div id="name"></div>
                    <script>startApp();</script>


                    <!--<div id="g-signin2">
                        <div class="googlecuadro">
                            <svg height="20" class="icongoogle" version="1" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.9 10c0-.7-.1-1.3-.2-1.9h-8.6v3.6H15c-.2 1.1-.8 2.1-1.8 2.8v2.3h3c1.7-1.6 2.7-4 2.7-6.8z" fill="#547DBE"></path>
                                <path d="M10.1 19c2.5 0 4.6-.8 6.1-2.2l-3-2.3c-.8.6-1.9.9-3.1.9-2.4 0-4.5-1.7-5.2-3.9l-3 .1V14c1.5 2.9 4.6 5 8.2 5z" fill="#34A751"></path>
                                <path d="M4.9 11.5c-.1-.5-.2-1.1-.2-1.7s.1-1.2.2-1.7V5.7l-3 .1c-.6 1.2-1 2.5-1 4s.4 3 1 4.2l3-2.5z" fill="#F8BB15"></path>
                                <path d="M10.1 4.3c1.3 0 2.6.5 3.5 1.4l2.6-2.6C14.6 1.6 12.5.7 10.1.7 6.5.7 3.4 2.8 1.9 5.8l3 2.3c.8-2.2 2.8-3.8 5.2-3.8z" fill="#E94435"></path>
                            </svg>
                        </div>
                        Sign in with Google
                    </div>-->
                </div>
                <div class="or-seperator"><i>or</i></div>
                <div class="form-group">
                    <label class="float-left form-check-label">Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Name" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="float-left form-check-label">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" name="email"  id="email" placeholder="Email" required="required">
                    </div>
                </div>    
                <div class="form-group">
                    <label class="float-left form-check-label">Password</label>
                    <div class="input-group">
                        
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                    </div>
                </div>        
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block login-btn">Sign up</button>
                </div>
                <div class="text-center">
                    <label class="">Or </label>
                    <a href="#" class="text-success">log in</a>
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

