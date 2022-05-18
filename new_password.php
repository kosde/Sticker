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
    <style>
        input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        }
        input[type=submit] {
        background-color: #04AA6D;
        color: white;
        }
        #message {
        display:none;
        /*background: #f1f1f1;*/
        color: #000;
        position: relative;
        padding-bottom: 20px;
       /* margin-top: 10px;*/
        border-radius: 12px;    
        }
        #message p {
        padding: 0px 35px;
        text-align: left;
        /*font-size: 18px;*/
        }
        .valid {
        color: green;
        }
        .valid:before {
        position: relative;
        left: -25px;
        content: "✔";
        }
        .invalid {
        color: red;
        }
        .invalid:before {
        position: relative;
        left: -25px;
        content: "✘";
        }
    </style>
</head>
<body class="back1">
<?php include "nav.php"; ?>
    <div class="main">
        <div class="login-form">
            <?php
                include 'php/conexion_be.php';
                $email = $_GET["email"];
                $token = $_GET["token"];
                $datezone=date_default_timezone_get();
                $date_Now = date('Y-m-d H:i');
                $dateNow = date_create($date_Now);
                $validar = mysqli_query($conexion,"SELECT * FROM users WHERE hash_email='$email' AND token='$token'"); 
                if(mysqli_num_rows($validar)>0)
                {   
                    $extraido= mysqli_fetch_array($validar);
                    $dates      = $extraido['date_token'];
                    $date       = date_create($dates);
                    $email      = $extraido['email'];
                    $hash_email = $extraido['hash_email'];
                    $interval = (array) date_diff($dateNow,$date);
                    if($interval['y'] == 0 && $interval['m'] == 0 && $interval['d'] == 0 && $interval['h'] <= 8)
                    {
                        $activar = mysqli_query($conexion,"UPDATE users SET active = '1',date_token=NULL,token='' WHERE hash_email = '$hash_email'");
                        ?>
                            <form action="php/new_password_update.php?email=<?php echo $_GET["email"];?>" method="post">	
                                <div class="title_cut" >
                                    <h1 style="font-size: 1.8rem !important;">Enter a new password</h1>
                                </div>
                                <div class="form-group">
                                    <label class="float-left form-check-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                                            id="psw" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                    </div>
                                </div>      
                                <div class="float-left form-check-label" id="message">
                                    <h6 style="font-family: 'proxima-nova';">Password must contain the following:</h6>
                                    <p id="letter" class="invalid regular font-light" style="font-family: 'Gotham-Light';margin: 0;">Lowercase letter</p>
                                    <p id="capital" class="invalid regular font-light" style="font-family: 'Gotham-Light';margin: 0;">Capital letter</p>
                                    <p id="number" class="invalid regular font-light" style="font-family: 'Gotham-Light';margin: 0;">Number</p>
                                    <p id="length" class="invalid regular font-light" style="font-family: 'Gotham-Light';margin: 0;">Minimum 8 characters</p>
                                </div>     
                                <div class="form-group">
                                    <button style="width: 100%;" type="submit" class="button primary large pr-4">Submit</button>
                                </div>
                            </form>
                        <?php
                    }
                    else
                    {
                        echo'
                            <script>
                                window.location = "../confirm_your_account.php?expired='.$token.'";
                            </script>
                            ';
                    }
                }
                else
                {
                    echo'
                        <script>
                            window.location = "../confirm_your_account.php?expired='.$token.'";
                        </script>
                        ';
                }
            ?>
            
        </div>
    </div>
    <script>
        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
        }/*
        myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
        }*/
        myInput.onkeyup = function() {
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
        }
    </script>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

