<?php
    include 'conexion_be.php';
    $nombre_u = $_POST['username'];
    $email_u  = $_POST['email'];
    $pass_u   = $_POST['password'];

    $query = "INSERT INTO usuarios(nombre,correo,pass)
                       VALUES('$nombre_u','$email_u','$pass_u')";
    $ejecutar = mysqli_query($conexion,$query);
    if($ejecutar){
        echo'
        <script>
        alert("Usuario registrado exitosamente");
        window.location = "../index.php";
        </script>
        ';
    }
    mysqli_close($conexion);
?>