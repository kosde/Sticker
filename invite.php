<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="text/html, charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include "css.php";
    ?>
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include "nav.php"; ?>
    <div id="subnav" class="subnav-tabs">
        <div class="subnav-menu-wrapper" style="--subnav-scroll-left-width:0px; --subnav-scroll-right-width:0px;">
            <div class="subnav-menu">
                <ul class="subnav-menu-tabs">
                    <a class="a-subnav-menu" href="account.php"><li class=" li-subnav ">Summary</li></a>
                    <a class="a-subnav-menu" href="orders.php">        <li class="li-subnav">Orders</li></a>
                    <a class="a-subnav-menu" href="reorder.php">       <li class="li-subnav">Reorder</li></a>                  
                    <a class="a-subnav-menu" href="artworks.php">      <li class="li-subnav">Artworks</li></a>
                    <a class="a-subnav-menu" href="invite.php" style="color: #202020;" >        <li class="li-subnav active">Get $10 credit</li></a>
                    <a class="a-subnav-menu" href="notifications.php"> <li class="li-subnav">Notifications</li></a>
                    <a class="a-subnav-menu" href="tax-exempt.php">            <li class="li-subnav">Tax Exemptions</li></a>
                </ul>
            </div>
        </div>
    </div>
    <main>
        <section style="padding-bottom: 80px;padding-top: 80px;">
            <div class="container"  style="height: 310px;">
                <h1 style="font-size: 2.5rem;margin-bottom: 0;text-align: center;padding-bottom: 10px;">3 easy ways to invite friends!</h1>
                <p style="text-align: center;">Give your friends a $10 store credit and get $10 added to your account when they spend $10 or more.</p>
            </div>
        </section>
    </main>
    <?php include "footer.php"; ?>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/bootsnav/bootsnav.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

