<?php
session_start();
if(isset($_SESSION['id']))
{
    $id_user = $_SESSION['id'];
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
                    <a class="a-subnav-menu" href="artworks.php" style="color: #202020;">      <li class="li-subnav active">Artworks</li></a>
                    <a class="a-subnav-menu" href="notifications.php"> <li class="li-subnav">Notifications</li></a>
                </ul>
            </div>
        </div>
    </div>
    <main>
            
        <?php
            include "php/conexion_be.php";
            $validar  = mysqli_query($conexion,"SELECT * FROM artworks  WHERE id_user ='$id_user'");
            if(mysqli_num_rows($validar)==0)
            {
        ?>
            <section style="padding-bottom: 80px;padding-top: 80px;height:1000px">
                <div class="container"  style="height: 310px;">
                    <h1 style="font-size: 2.5rem;margin-bottom: 0;">Artworks</h1>
                    <label for="message" class="labelfiel font-light" style="width: 90%;">No artworks yet</label>
                </div>
            </section>
        <?php
            }
            if(mysqli_num_rows($validar)>0)
            {
        ?>
            <section>
                <div class="grid3" style="padding-top: 100px;">
                    <?php
                    //id 	id_user 	name_image 	width_inches 	height_inches 	dates 	tipe 	link 
                    while($extraido= mysqli_fetch_array($validar))
                    {
                        $id            = $extraido['id'];
                        $id_user       = $extraido ['id_user'];
                        $name_image    = $extraido['name_image'];
                        $width_inches  = $extraido['width_inches'];
                        $height_inches = $extraido ['height_inches'];
                        $date          = $extraido['dates'];
                        $tipe          = $extraido ['tipe'];
                        $link          = $extraido['link'];
                        if($_SESSION['measurement']==1)
                        {
                            $width_inches  = (round($extraido['width_inches']*25.4))." mm";
                            $height_inches = (round($extraido ['height_inches']*25.4))." mm";
                        }
                        else{
                            $width_inches  =  $extraido['width_inches']."\"";
                            $height_inches =  $extraido ['height_inches']."\"";
                        }
                        ?>
                        <div class="wrapperproducts_sin">
                            <div class="image" style="padding-bottom: 15px;">
                                <img style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));" src="<?php echo $link; ?>.png" width="200">
                            </div>
                            <p class="regular font-light" style="margin: 0;"><?php echo $name_image;?></p>
                            <p class="regular font-light" style="margin: 0;"><?php echo $width_inches." x ".$height_inches." ";?></p>
                            <p class="regular font-light" style="margin: 0;"><?php echo $tipe;?></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </section>
        <?php
            }
        ?>
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
<?php
}
else{
    echo'
    <script>
        window.location = "../login.php";
    </script>
    ';
}
?>
