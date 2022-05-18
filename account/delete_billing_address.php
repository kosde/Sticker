<?php
session_start();
$_SESSION['billing']=1;
$id     = $_GET["id"];
$id_user = $_SESSION['id'];
include '../php/conexion_be.php';

$query = "SELECT * FROM orders WHERE id_user='$id_user' AND id_billing='$id'";
$result = mysqli_query($conexion,$query);
if(mysqli_num_rows($result)>0)
{
    $extraido       = mysqli_fetch_array($result);
    $statusp        = $extraido['statusp'];
    if($statusp==9 || $statusp==4)
    {
        $address_result = mysqli_query($conexion,"DELETE FROM billing_address WHERE id ='$id'");
    }
    else{
        $_SESSION['NAB']=1;
    }
}
else{
    $address_result = mysqli_query($conexion,"DELETE FROM billing_address WHERE id ='$id'");
}

mysqli_close($conexion);
echo'
<script>
    window.location = "../account.php";
</script>
';
?>