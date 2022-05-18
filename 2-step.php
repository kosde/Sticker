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
        $_SESSION['id']         = $extraido['id'];
        $_SESSION['active']     = $extraido ['active'];
        $_SESSION['temporal']   = $extraido ['temporal'];
        $_SESSION['name']       = $extraido['usrname'];
        $_SESSION['pass']       = $extraido ['pass'];
        $_SESSION['email']      = $extraido['email'];
        $_SESSION['hash_email'] = $extraido ['hash_email'];
        $_SESSION['code']       = $extraido['code'];
        $_SESSION['phone']      = $extraido ['phone'];
        $_SESSION['avatar']     = $extraido['avatar'];
        $_SESSION['admi']       = $extraido['admi'];
        $_SESSION['measurement']= $extraido['measurement'];
        $_SESSION['ghost']      = $extraido['ghost'];
        $interval = (array) date_diff($dateNow,$date);
        if($interval['y'] == 0 && $interval['m'] == 0 && $interval['d'] == 0 && $interval['h'] <= 8)
        {
            $activar = mysqli_query($conexion,"UPDATE users SET date_token=NULL,token='' WHERE hash_email = '$hash_email'");
            if(mysqli_affected_rows($conexion) == 1)
            {
                mysqli_close($conexion);
                if(isset($_COOKIE['registro']))
                {
                    echo'
                    <script>
                        window.location = "../index.php?msg=Signed in successfully";
                    </script>
                    ';      
                }else
                {
                    
                    echo'
                    <script>
                        window.location = "../index.php?msg=Signed in successfully";
                    </script>
                    ';      
                }
            }
            else
            {
                session_destroy();
                echo'
                <script>
                    window.location = "../login.php";
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
    }
    else{
        echo'
                <script>
                    window.location = "../confirm_your_account.php?expired='.$token.'";
                </script>
                ';
    }
?> 

