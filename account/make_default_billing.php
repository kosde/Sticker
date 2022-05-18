<?php
    session_start();
    $id_user = $_SESSION['id'];
    $id_dir = $_GET['id_dir'];
    $_SESSION['billing']=1;
    include '../php/conexion_be.php';
   
    $activar = mysqli_query($conexion,"UPDATE billing_address SET default_address = '0' WHERE id_user = '$id_user'");
   
        $activar = mysqli_query($conexion,"UPDATE billing_address SET default_address = '1' WHERE id = '$id_dir'");

    mysqli_close($conexion);
    echo'
    <script>
        window.location = "../account.php";
    </script>
    ';
    
?>