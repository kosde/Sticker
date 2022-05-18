<?php
    session_start();

    $id_user = $_SESSION['id'];
    $_SESSION['Address'] = 1;
    $id_dir = $_GET['id_dir'];
    include '../php/conexion_be.php';
   
    $activar = mysqli_query($conexion,"UPDATE address_t SET default_address = '0' WHERE id_user = '$id_user'");
   
        $activar = mysqli_query($conexion,"UPDATE address_t SET default_address = '1' WHERE id = '$id_dir'");

    mysqli_close($conexion);
    echo'
    <script>
        window.location = "../account.php";
    </script>
    ';
    
?>