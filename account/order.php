<?php
session_start();
if(isset($_SESSION['id']))
{
    $id_user = $_SESSION['id'];
    $id_order= $_GET["order"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="text/html, charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include "../css_ext.php";
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
                    <a class="a-subnav-menu" href="../account.php"><li class=" li-subnav">Summary</li></a>
                    <a class="a-subnav-menu" style="color: #202020;" href="../orders.php">        <li class="li-subnav active">Orders</li></a>
                    <a class="a-subnav-menu" href="../reorder.php">       <li class="li-subnav">Reorder</li></a>
                    <a class="a-subnav-menu" href="../artworks.php">      <li class="li-subnav">Artworks</li></a>       
                    <a class="a-subnav-menu" href="../notifications.php"> <li class="li-subnav">Notifications</li></a>
                </ul>
            </div>
        </div>
    </div>
    <main class="container" style="height: 1200px;">
        <div class="wrapper" style="padding-left: 60px;padding-top: 50px;">
            <?php
            include "../php/conexion_be.php";
            $query    = "SELECT * FROM orders WHERE id='$id_order'";
            $result = mysqli_query($conexion,$query);
            if(mysqli_num_rows($result)>0)
            {
                while ($extraido= mysqli_fetch_array($result))
                {
                    $id            = $extraido['id'];
                    $id_user       = $extraido ['id_user'];
                    $width_inches  = $extraido['width_inches'];
                    $height_inches = $extraido ['height_inches'];
                    $price         = $extraido['price'];
                    $tipe          = $extraido ['tipe'];
                    $quantity      = $extraido['quantity'];
                    $id_images     = $extraido ['id_images'];
                    $txt_details   = $extraido['txt_details'];
                    $date          = $extraido['dates'];
                    $statusp       = $extraido['statusp'];
                    $id_address    = $extraido['id_address'];
                    $delivery_date = $extraido['delivery_date'];
                    $shipping      = $extraido['shipping'];
                    $id_billing    = $extraido['id_billing'];
                    $taxes         = $extraido['taxes'];
                    $shipping_price= $extraido['shipping_price'];
                    $total         = $extraido['total'];
                    //statusp,taxes,shipping_price,total
                    if($_SESSION['measurement']==1)
                    {
                        $width_inches  = (round($extraido['width_inches']*25.4))." mm";
                        $height_inches = (round($extraido ['height_inches']*25.4))." mm";
                    }
                    else{
                        $width_inches  =  $extraido['width_inches']."\"";
                        $height_inches =  $extraido['height_inches']."\"";
                    }
                }
            }       
            $dateN = explode(" ", $delivery_date);
            $delivery_date = $dateN[0]." ".$dateN[1];
            ?>
            <div style="display: inline-block;width: 100%;">
                <h1 style="width: 60%;display: inline-block;font-size: 2.4rem;">Order AS<?php echo $id;?></h1>
                <a href="../PDF.php?order=<?php echo $id;?>" class="button flat green small" style="">Download invoice</a>
                <div class="font-light articleContent" style="padding-top: 20px;">Expected to arrive by <strong><?php echo $delivery_date;?> <?php $date=date_create($date);?></strong></div>             
                <div id="reorder-order-app"></div>
            </div>

            <div id="line-items" style="padding-top: 50px;">
                <div class=" figure" style="width: 100%;border-bottom: 1px solid #ddd;">
                    <div class=" figure" style="width: 50%;" role="columnheader">Description</div>
                    <div class="grid  figure" style="width: 50%;">
                        <div class=" figure" style="width: 40%;text-align: left;"role="columnheader">Status</div>
                        <div class="text-ar  figure"style="width: 40%;text-align: right;" role="columnheader">Total</div>
                    </div>
                </div>

                <div class=" figure" style="width: 100%;">
                    <div class="figure"  style="width: 49%;">
                        <a href="">
                            <img src="">
                        </a>
                        <div class="font-light"><strong><?php echo $tipe;?></strong><br>
                        <?php
                        if($tipe!="Sample")
                        {
                        ?>
                        Size: <?php echo $width_inches;?> x <?php echo $height_inches;?><br>Quantity: <?php echo $quantity;?><br>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                    <div class="figure"  style="width: 49%;">
                        <div class="figure font-light" style="width: 40%;text-align: left;">
                            <strong>
                            <?php
                            if($tipe!="Sample")
                            {
                                if($statusp==0)
                                {
                                ?>
                                    <td data-label="Status" class="fontlight">Pending Proof</td>
                                <?php
                                }
                                ?>
                                <?php
                                if($statusp==1)
                                {
                                ?>
                                    <td data-label="Status" class="fontlight">Pending Approval</td>
                                <?php
                                }
                                ?>
                                <?php
                                if($statusp==2)
                                {
                                ?>
                                    <td data-label="Status" class="fontlight">Approved</td>
                                    <br>
                                    <a href="https://acmestickers.com/proof.php?order=<?php echo $id;?>">View artwork</a>
                                <?php
                                }
                                ?>
                                <?php
                                if($statusp==4)
                                {
                                ?>
                                    <td data-label="Status" class="fontlight">Canceled</td>
                                <?php
                                }
                                ?>
                                <?php
                                if($statusp==9)
                                {
                                ?>
                                    <td data-label="Status" class="fontlight">Delivered</td>
                                    <br>
                                    <a href="https://acmestickers.com/proof.php?order=<?php echo $id;?>">View artwork</a>
                                <?php
                                }
                            }else{
                                if($statusp==0)
                                {
                                ?>
                                    <td data-label="Status" class="fontlight">In Production</td>
                                <?php
                                }
                                ?>
                                <?php
                                if($statusp==1)
                                {
                                ?>
                                    <td data-label="Status" class="fontlight">In Production</td>
                                <?php
                                }
                                ?>
                                <?php
                                if($statusp==2)
                                {
                                ?>
                                    <td data-label="Status" class="fontlight">In Production</td>
                                <?php
                                }
                                ?>
                                <?php
                                if($statusp==4)
                                {
                                ?>
                                    <td data-label="Status" class="fontlight">Canceled</td>
                                <?php
                                }
                                ?>
                                <?php
                                if($statusp==9)
                                {
                                ?>
                                    <td data-label="Status" class="fontlight">Delivered</td>
                                <?php
                                }
                            }
                            ?>
                            </strong>
                        </div>
                        <div class="figure font-light" style="width: 50%;text-align: right;padding-right: 10%;">
                            <span class="">$<?php echo $price;?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="totals" style="text-align: right;padding-right: 10%;padding-top: 40px;">
                <strong>Subtotal: </strong><span class="font-light" style="display: inline-block;width: 5em;">$<?php echo $price;?></span><br>
                <strong>Shipping: </strong><span class="font-light" style="display: inline-block;width: 5em;">$<?php echo $shipping_price;?></span><br>
                <strong>Sales tax: </strong><span class="font-light" style="display: inline-block;width: 5em;">$<?php echo $taxes;?></span><br>
                <strong>Order total: </strong><span class="font-light" style="display: inline-block;width: 5em;">$<?php echo $total;?></span>
            </div>

            <div class="grid3" style="padding-top: 100px;">
                <div>
                    <?php
                    $validar  = mysqli_query($conexion,"SELECT * FROM address_t  WHERE id='$id_address'");
                    if(mysqli_num_rows($validar)>0)
                    {
                        $extraido2= mysqli_fetch_array($validar);
                        $id              = $extraido2['id'];
                        $id_user         = $extraido2['id_user'];
                        $country         = $extraido2['country'];
                        $full_name       = $extraido2['full_name'];
                        $company         = $extraido2['company'];
                        $street_address1 = $extraido2['street_address1'];
                        $street_address2 = $extraido2['street_address2'];
                        $city            = $extraido2['city'];
                        $zip_code        = $extraido2['zip_code'];
                        $statedir        = $extraido2['statedir'];
                    }
                    ?>
                    <h4 class="d-inline-block mr-5">Shipping info</h4>
                    <div class="font-light"><?php echo $company. " ";?><br><?php echo $full_name;?><br>
                        <?php echo $street_address1." ".$street_address2;?><br><?php echo $city.", ".$statedir." ".$zip_code;?><br>
                        <?php
                        if($country=="US" || $country=="MX")
                        {
                            if($country=="US")
                            {
                            ?>
                                United States
                            <?php
                            }
                            if($country=="MX")
                            {
                            ?>
                                Mexico
                            <?php
                            }
                        
                        }else{
                            echo $country;
                        }
                        ?>
                    </div>
                </div>
                <div>
                    <h4 class="d-inline-block mr-5">Expected delivery</h4>
                    <div class="font-light"><?php echo $delivery_date;?></div>
                </div>
                <div id="billing-info-summary">
                    <h4 class="d-inline-block mr-5">Billing info</h4>
                    <?php
                    $validar  = mysqli_query($conexion,"SELECT * FROM billing_address  WHERE id='$id_billing'");
                    if(mysqli_num_rows($validar)>0)
                    {
                        $extraido2= mysqli_fetch_array($validar);
                        $id_b              = $extraido2['id'];
                        $id_user_b         = $extraido2['id_user'];
                        $country_b         = $extraido2['country'];
                        $full_name_b       = $extraido2['full_name'];
                        $company_b         = $extraido2['company'];
                        $street_address1_b = $extraido2['street_address1'];
                        $street_address2_b = $extraido2['street_address2'];
                        $city_b            = $extraido2['city'];
                        $zip_code_b        = $extraido2['zip_code'];
                        $statedir_b        = $extraido2['statedir'];
                        mysqli_close($conexion);
                    }
                    ?>
                    <div class="payment-info font-light"><?php echo $company_b. " ";?><br><?php echo $full_name_b;?><br><?php echo $street_address1_b." ".$street_address2_b;?>
                    <br><?php echo $city_b.", ".$statedir_b." ".$zip_code_b;?><br>
                    <?php
                        if($country=="US" || $country=="MX")
                        {
                            if($country=="US")
                            {
                            ?>
                                United States
                            <?php
                            }
                            if($country=="MX")
                            {
                            ?>
                                Mexico
                            <?php
                            }
                        
                        }else{
                            echo $country_b;
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
<?php include "footer.php"; ?>  
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../js/bootsnav/bootsnav.js"></script>
    <script src="../js/script.js"></script>
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