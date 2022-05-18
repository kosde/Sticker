<?php
    session_start();
    $datezone=date_default_timezone_get();
    include '../php/conexion_be.php';
    
    $id_user = $_SESSION['id']; 
    $activar = mysqli_query($conexion,"UPDATE users SET code  = 'null ',phone='0' WHERE id = '$id_user'");
    mysqli_query($conexion,"UPDATE notifications SET deals_sms='0',alerts_sms='0',proofing_sms ='0' WHERE id_user='$id_user'");
    if(mysqli_affected_rows($conexion) == 1)
    {
        mysqli_close($conexion);
        echo'
        <script>
            window.location = "../notifications.php";
        </script>
        ';
    }
?>