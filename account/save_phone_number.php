<?php
    session_start();
    $code     = $_GET["code"];
    $phone    = $_GET["phone"];
    include '../php/conexion_be.php';
    $id_user = $_SESSION['id'];
    unset($_SESSION['id']);
    if(isset($_GET["email"]) && !empty($_GET["email"]))
    {
        $email = $_GET["email"];
        $query ="UPDATE users SET code  = '$code ',phone='$phone' WHERE hash_email = '$email'";
    }
    else
    {
        $query ="UPDATE users SET code  = '$code ',phone='$phone' WHERE id = '$id_user'";
    }
    $activar = mysqli_query($conexion,$query);
    if(mysqli_affected_rows($conexion) == 1)
    {
        if(isset($_GET["email"]) && !empty($_GET["email"]))
        {
            $email = $_GET["email"];
            $query ="SELECT * FROM users WHERE hash_email ='$email'";
            $result = mysqli_query($conexion,$query);
            $extraido= mysqli_fetch_array($result);
            $id_user = $extraido['id'];
        }
        else{
            $query ="SELECT * FROM users WHERE id ='$id_user'";
            $result = mysqli_query($conexion,$query);
            $extraido= mysqli_fetch_array($result);
            $temporal = $extraido['temporal'];
        }
        if($temporal == 1)
        {
            if(isset($_GET["subscribeToDeals"]))
            {
                $query = "INSERT INTO notifications (proofing_sms,id_user)VALUES('1','$id_user')";
                mysqli_query($conexion, $query);
                echo'
                <script>
                    window.location = "../order.php";
                </script>
                ';
                //mysqli_query($conexion,"UPDATE notifications SET deals_sms='1',alerts_sms='1',proofing_sms = '1' WHERE id_user='$id_user'");
            }
        }
        if(isset($_GET["subscribeToDeals"]))
        {
            mysqli_query($conexion,"UPDATE notifications SET proofing_sms = '1' WHERE id_user='$id_user'");

            //mysqli_query($conexion,"UPDATE notifications SET deals_sms='1',alerts_sms='1',proofing_sms = '1' WHERE id_user='$id_user'");
        }//$_SESSION['proof']

        if(isset($_SESSION['proof']))
        {
            echo'
                    <script>
                        window.location = "../proof.php?order='.$_SESSION['proof'].'";
                    </script>
                    ';
        }
        if(isset($_SESSION['id']))
        {
            if(isset($_SESSION["dir"]))
            {
                mysqli_query($conexion,"UPDATE users SET usrname=''WHERE id_user='$id_user'");
                mysqli_close($conexion);
                /*echo'
                <script>
                    window.location = "../index.php";
                </script>
                ';*/
                 echo'
                    <script>
                        window.location = "../notifications.php";
                    </script>
                    ';
            }
            mysqli_close($conexion);
            echo'
            <script>
                window.location = "../notifications.php";
            </script>
            ';
        }else{
            session_destroy();
            echo'
            <script>
                window.location = "../login.php";
            </script>
            ';
        }
    }else{
        echo'
        <script>
            window.location = "../index.php";
        </script>
        ';
    }
?>