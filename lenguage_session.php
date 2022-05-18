<?php
session_start();
$_SESSION['Leng'] 	= $_POST['leng'];
$_SESSION['LengCod']= strtoupper($_POST['code']);
setcookie("TestCookie", $_POST['leng']);

?>