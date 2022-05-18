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
                    <a class="a-subnav-menu" href="account.php"><li class=" li-subnav">Summary</li></a>
                    <a class="a-subnav-menu" style="color: #202020;" href="orders.php">        <li class="li-subnav active">Orders</li></a>
                    <a class="a-subnav-menu" href="reorder.php">       <li class="li-subnav">Reorder</li></a>
                    <a class="a-subnav-menu" href="artworks.php">      <li class="li-subnav">Artworks</li></a>    
                    <a class="a-subnav-menu" href="notifications.php"> <li class="li-subnav">Notifications</li></a>
                </ul>
            </div>
        </div>
    </div>
    <main>
        <?php
        include 'php/conexion_be.php';
        $query = "SELECT * FROM orders WHERE id_user='$id_user' ORDER BY id DESC";
        $result = mysqli_query($conexion,$query);
        if(mysqli_num_rows($result)==0)
        {
        ?>
        <section style="padding-bottom: 80px;padding-top: 80px;">
            <div class="container"  style="height: 310px;">
                <h1 style="font-size: 2.5rem;margin-bottom:0;">Orders</h1>
                <label class="font-light">No orders yet, <a href="custom-stickers.php" style="color:#2b71b8;">start your first order.</a></label>
               
            </div>
        </section>
        <?php
        }
        if(mysqli_num_rows($result)>0)
        {
        ?>
        <section>
            <div class="container"  style="height: 100%;padding-bottom: 80px;padding-top: 80px;">
                <div id="main" class="wrapper">
                <h1 style="font-size: 2.5rem;margin-bottom:0;">Orders</h1>
                    <table class="responsive">
                        <thead>
                        <tr>
                            <th class="font-medium">Order number</th>
                            <th class="font-medium">Order date</th>
                            <th class="font-medium">Status</th>
                            <th class="currency font-medium" style="width: 20%;">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            
                                while ($extraido= mysqli_fetch_array($result))
                                {
                                    $id             = $extraido['id'];
                                    $width_inches   = $extraido['width_inches'];
                                    $height_inches  = $extraido['height_inches'];
                                    $price          = $extraido['price'];
                                    $tipe           = $extraido['tipe'];
                                    $quantity       = $extraido['quantity'];
                                    $id_images      = $extraido['id_images'];
                                    $txt_details    = $extraido['txt_details'];
                                    $dates          = $extraido['dates'];
                                    $statusp        = $extraido['statusp'];
                                    $id_address     = $extraido['id_address'];
                                    $date = date_create($dates);
                                    $date = date_format($date,"F j, Y");
                                    ?>
                                    <tr class="bigger-row even">
                                        <td data-label="Order number" class="fontlight"><a href="https://acmestickers.com/account/order.php?order=<?php echo $id;?>">AS<?php echo $id;?></a></td>
                                        <td data-label="Order date" class="fontlight"><?php echo $date;?></td>
                                        <?php
                                        if($tipe!="Sample")
                                        {
                                            if($statusp==6)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>"> In Production</a></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($statusp==0)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="proof.php?order=<?php echo $id;?>">Pending Proof</a></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($statusp==1)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="proof.php?order=<?php echo $id;?>">Pending Approval</a></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($statusp==2)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>">Approved</a></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($statusp==4)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>">Canceled</a></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($statusp==5)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>">Delivered</a></td>
                                            <?php
                                            }
                                            if($statusp==7)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>">Printing</a></td>
                                            <?php
                                            }
                                            if($statusp==8)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>">In route</a></td>
                                            <?php
                                            }
                                            if($statusp==9)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>">Delivered</a></td>
                                            <?php
                                            }
                                        }
                                        else
                                        {
                                            if($statusp==0)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>">In Production</a></td>
                                            <?php
                                            }
                                            if($statusp==5)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>">Delivered</a></td>
                                            <?php
                                            }
                                            if($statusp==7)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>">Printing</a></td>
                                            <?php
                                            }
                                            if($statusp==8)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>">In route</a></td>
                                            <?php
                                            }
                                            if($statusp==9)
                                            {
                                            ?>
                                                <td data-label="Status" class="fontlight"><a href="traking.php?order=<?php echo $id;?>">Delivered</a></td>
                                            <?php
                                            }
                                        }
                                        ?>
                                            <td data-label="Total" class="fontlight currency">$ <?php echo $price;?></td>
                                        </tr>
                                        <?php
                                }
                            ?>
                        
                        </tbody>
                    </table>
                </div>
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