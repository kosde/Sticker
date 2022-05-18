<?php
session_start();
session_destroy();/*
$_COOKIE["id"]="";
$_COOKIE["name"]="";
$_COOKIE["avatar"]="";
$_COOKIE["email"]="";*/
header("Location: index.php?msg=Signed out successfully");
/*
session_destroy();
echo'
            <script>
                window.location = "../index.php";
            </script>
            ';*/
?>
