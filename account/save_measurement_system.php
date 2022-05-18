<?php
    session_start();
    $measurement     = $_GET["measurement"];
    $id_user = $_SESSION['id']; 
    $value = -1;
    if($measurement=="imperial")
    {
        $value = 0;
        $_SESSION['measurement']=0;
    }
    else{
        $value = 1;
        $_SESSION['measurement']=1;
    }
    include '../php/conexion_be.php';
    $activar = mysqli_query($conexion,"UPDATE users SET measurement = '$value' WHERE id = '$id_user'");
    if(mysqli_affected_rows($conexion) == 1)
    {
        mysqli_close($conexion);
        echo'
        <script>
            window.location = "../account.php";
        </script>
        ';
        
        exit();
    }
    echo'
        <script>
            window.location = "../account.php";
        </script>
        ';
?>