<?php
session_start();
$msg="";
if(isset($_POST['email']) && isset($_POST['password']))
{
	extract($_POST); //se crea $txtUsuario y $passwordword
	if($email!="" && $password!="")
	{
		//se hace la verificacion de los datos en la BD
        //conectarnos al servidor
        $conn = mysqli_connect("localhost","root","","usr");
        $qry = "select nombre,correo,pass from usuarios where 
                correo='$email' and pass='$password'"; 
        //$qry = "select id_usuario, nombre from usuario where 
        //	    nombre='$txtUsuario' and contraseña='$password'";
        
		$rs = mysqli_query($conn,$qry);
		if(mysqli_num_rows($rs)>0) //si encontro conicindencia
		{
            $usr = mysqli_fetch_array($rs);
            $_SESSION['nombre'] = $usr["nombre"];
            header("Location:http://localhost/Sticker/index.php");
		}
		else  //el usuario y el password no existen
		{
			$msg = "El usuario y la password no coinciden";
		}
	}
}
?>