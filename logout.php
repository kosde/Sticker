<?php
session_start();
session_destroy();
header("Location:http://localhost/Sticker/index.php");
?>
