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
    <main style="position: relative;width: 100% !important;display: inline-block;padding-bottom: 60px;background-color: white;min-height: 1020px;" >
        <div id="cartContainer" class="container cart">
            <section class="section-row">
                <?php
                require_once "vendor/autoload.php";
                require_once "config_cloud.php";
                include 'php/conexion_be.php';
                $id_user = $_SESSION['id']; 
                $price = 0;
                $cart  = mysqli_query($conexion,"SELECT * FROM cart WHERE id_user ='$id_user'");
                if(mysqli_num_rows($cart)>0 && isset($_SESSION['id']))
                {
                ?>
                <div id="cart-app" class="wrapper">
                    <div>
                        <ul class="promotion-notifications"></ul>
                        <h1>Cart</h1>
                        <form action="checkout.php" class="cleaar">
                            <table class="table_car font-light">
                                <tr style="border-bottom: 2px solid rgb(182, 182, 182, 0.733);">
                                    <th style="width: 70%;">Description</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                    <?php
                                        
                                        
                                        //if(mysqli_num_rows($cart)>0)
                                        
                                            while ($extraido= mysqli_fetch_array($cart))
                                            {
                                                $id            = $extraido['id'];
                                                $id_user       = $extraido ['id_user'];
                                                $width_inches  = $extraido['width_inches'];
                                                $height_inches = $extraido ['height_inches'];
                                                $price         = $extraido['price'];
                                                $total        += $price; 
                                                $_SESSION['total'] = $total;
                                                $tipe          = $extraido ['tipe'];
                                                $quantity      = $extraido['quantity'];
                                                $id_images     = $extraido ['id_images'];
                                                $txt_details   = $extraido['txt_details'];
                                                $statusp_cart  = $extraido['statusp'];
                                                if($_SESSION['measurement']==1)
                                                {
                                                    $width_inches  = (round($extraido['width_inches']*25.4))." mm";
                                                    $height_inches = (round($extraido ['height_inches']*25.4))." mm";
                                                }
                                                else{
                                                    $width_inches  =  $extraido['width_inches']."\"";
                                                    $height_inches =  $extraido ['height_inches']."\"";
                                                }
                                                if( $statusp_cart==2)
                                                {
                                                    $imagen  = mysqli_query($conexion,"SELECT * FROM artworks WHERE id ='$id_images'");
                                                    $extraido10= mysqli_fetch_array($imagen);
                                                    $link = $extraido10['link'];
                                                }
                                                $images  = mysqli_query($conexion,"SELECT * FROM images WHERE id ='$id_images'");
                                                if(mysqli_num_rows($images)>0 || $statusp_cart == 2 || $statusp_cart == 3 )
                                                {
                                                    if($statusp_cart == 2 || $statusp_cart == 3)
                                                    {
                                                            echo "<tr style='border-bottom: 2px solid rgb(182, 182, 182, 0.733);'>";
                                                            ?>
                                                                <td>                                       
                                                                    <table>
                                                                        <tr>
                                                                            <?php
                                                                            if($tipe == "Sample" && $statusp_cart==3) 
                                                                            {
                                                                            ?>  <td style="width: 60px;">
                                                                                    <img style="width:60px;" src="/assets/Fondo Sample pack.png">
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            if($tipe == "Die cut stickers" && $statusp_cart==3) 
                                                                            {
                                                                                ?>  <td style="width: 60px;">
                                                                                    <img style="width:60px;" src="/assets/Die cut stickers.png">
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            if($tipe == "Circle stickers" && $statusp_cart==3) 
                                                                            {
                                                                                ?>  <td style="width: 60px;">
                                                                                    <img style="width:60px;" src="/assets/Circle stickers.png">
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            if($tipe == "Rectangle stickers" && $statusp_cart==3) 
                                                                            {
                                                                                ?>  <td style="width: 60px;">
                                                                                    <img style="width:60px;" src="/assets/Rectangle stickers.png">
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            if($tipe == "Square stickers" && $statusp_cart==3) 
                                                                            {
                                                                                ?>  <td style="width: 60px;">
                                                                                    <img style="width:60px;" src="/assets/Square Stickers.png">
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            if($tipe == "Oval stickers" && $statusp_cart==3) 
                                                                            {
                                                                                ?>  <td style="width: 60px;">
                                                                                    <img style="width:60px;" src="/assets/Oval stickers.png">
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            if($tipe == "Bumper stickers" && $statusp_cart==3) 
                                                                            {
                                                                                ?>  <td style="width: 60px;">
                                                                                    <img style="width:60px;" src="/assets/Bumper Stickers.png">
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            if($tipe == "Kiss cut stickers" && $statusp_cart==3) 
                                                                            {
                                                                                ?>  <td style="width: 60px;">
                                                                                    <img style="width:60px;" src="/assets/Kiss cut stickers.png">
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            if($tipe == "Rounded corner stickers" && $statusp_cart==3) 
                                                                            {
                                                                                ?>  <td style="width: 60px;">
                                                                                    <img style="width:60px;" src="/assets/rounded corner stickers.png">
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            if($tipe == "Stickers Sheets" && $statusp_cart==3) 
                                                                            {
                                                                                ?>  <td style="width: 60px;">
                                                                                        <img style="width:60px;" src="/assets/sticker sheets.png">
                                                                                    </td>
                                                                                <?php
                                                                            }
                                                                            else
                                                                            {
                                                                            
                                                                                if($statusp_cart==2)
                                                                                {
                                                                                    ?>
                                                                                    <td style="width:60px;">
                                                                                
                                                                                        <img alt="" style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));width:60px;" class="proof-image" src="<?php echo $link; ?>.png ">
                                                                                
                                                                                    </td>
                                                                                <?php
                                                                                } 
                                                                            }
                                                                            ?>
                                                                            
                                                                            <td style="text-align:left;">
                                                                                <?php   
                                                                                    if($tipe == "Die cut stickers") 
                                                                                    {
                                                                                        echo "<a href='/die-cut-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                    }
                                                                                    if($tipe == "Circle stickers") 
                                                                                    {
                                                                                        echo "<a href='/circle-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                    }
                                                                                    if($tipe == "Rectangle stickers") 
                                                                                    {
                                                                                        echo "<a href='/rectangle-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                    }
                                                                                    if($tipe == "Square stickers") 
                                                                                    {
                                                                                        echo "<a href='/square-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                    }
                                                                                    if($tipe == "Oval stickers") 
                                                                                    {
                                                                                        echo "<a href='/oval-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                    }
                                                                                    if($tipe == "Bumper stickers") 
                                                                                    {
                                                                                        echo "<a href='/bumper-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                    }
                                                                                    if($tipe == "Kiss cut stickers") 
                                                                                    {
                                                                                        echo "<a href='/kiss-cut-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                    }
                                                                                    if($tipe == "Rounded corner stickers") 
                                                                                    {
                                                                                        echo "<a href='/rounded-corner-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                    }
                                                                                    if($tipe == "Stickers Sheets") 
                                                                                    {
                                                                                        echo "<a href='/stickers-sheets.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                    }
                                                                                    if($tipe == "Sample") 
                                                                                    {
                                                                                        echo "<a href='/sample.php'>$tipe</a>";
                                                                                    }
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table> 
                                                                </td>
                                                                        
                                                            <?php
                                                            if($tipe == "Sample") 
                                                            {
                                                                
                                                                echo"
                                                                    <td style='text-align: left;'></td>
                                                                    <td style='text-align: left;'>$$price</td>
                                                                    <td>
                                                                        <a href='php/delete-cart.php?id-image=$id_i&id-cart=$id'><i class='fas fa-times-circle'></i></a> 
                                                                    </td>
                                                                </tr>
                                                                ";
                                                            }
                                                            else{
                                                                echo"
                                                                    <td style='text-align: left;'>$quantity</td>
                                                                    <td style='text-align: left;'>$$price</td>
                                                                    <td>
                                                                        <a href='php/delete-cart.php?id-image=$id_i&id-cart=$id'><i class='fas fa-times-circle'></i></a> 
                                                                    </td>
                                                                </tr>
                                                                ";
                                                            }
                                                    }
                                                    while ($extraido2= mysqli_fetch_array($images))
                                                    {
                                                        $id_i = $extraido2['id'];
                                                        $name_image = $extraido2['nombre'];
                                                        echo "<tr style='border-bottom: 2px solid rgb(182, 182, 182, 0.733);'>";
                                                        ?>
                                                                    <td>                                       
                                                                        <table>
                                                                            <tr>
                                                                                
                                                                                <?php
                                                                                //$info = new SplFileInfo('name_image');
                                                                                //$ext = var_dump($info->getExtension());
                                                                                if($tipe == "Sample") 
                                                                                {
                                                                                ?>  <td style="width: 60px;">
                                                                                        <img style="width:60px;" src="/assets/Fondo Sample pack.png">
                                                                                    </td>
                                                                                <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                    $extension = pathinfo($name_image , PATHINFO_EXTENSION);
                                                                                    $nombre_base = basename($name_image , '.'.$extension);  
                                                                                    $folder = 'usr_'.$id_user;
                                                                                    $imagen = cl_image_tag($folder."/".$nombre_base,array("format" => "png","width"=>60));
                                                                                    //10262 	527 	2 	2 	0 	Circle stickers 	50 	612
                                                                                    // cl_image_tag("768px-Instagram_icon.png", array("width"=>300, "height"=>100, "crop"=>"scale"));
                                                                                    //echo $imagen;
                                                                                    ?>
                                                                                        <td style="width:60px;">
                                                                                            <?php   
                                                                                                    if($statusp_cart==2)
                                                                                                    {
                                                                                                        ?>
                                                                                                            <img alt="" style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));" class="proof-image" src="<?php echo $link; ?>.png ">
                                                                                                        <?php
                                                                                                    } 
                                                                                                    else
                                                                                                    {
                                                                                                        echo $imagen; 
                                                                                                    }
                                                                                            ?>
                                                                                        </td>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                
                                                                                <td style="text-align:left;">
                                                                                    <?php   
                                                                                        if($tipe == "Die cut stickers") 
                                                                                        {
                                                                                            echo "<a href='/die-cut-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                        }
                                                                                        if($tipe == "Circle stickers") 
                                                                                        {
                                                                                            echo "<a href='/circle-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                        }
                                                                                        if($tipe == "Rectangle stickers") 
                                                                                        {
                                                                                            echo "<a href='/rectangle-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                        }
                                                                                        if($tipe == "Square stickers") 
                                                                                        {
                                                                                            echo "<a href='/square-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                        }
                                                                                        if($tipe == "Oval stickers") 
                                                                                        {
                                                                                            echo "<a href='/oval-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                        }
                                                                                        if($tipe == "Bumper stickers") 
                                                                                        {
                                                                                            echo "<a href='/bumper-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                        }
                                                                                        if($tipe == "Kiss cut stickers") 
                                                                                        {
                                                                                            echo "<a href='/kiss-cut-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                        }
                                                                                        if($tipe == "Rounded corner stickers") 
                                                                                        {
                                                                                            echo "<a href='/rounded-corner-stickers.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                        }
                                                                                        if($tipe == "Stickers sheets") 
                                                                                        {
                                                                                            echo "<a href='/stickers-sheets.php'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                        }
                                                                                        if($tipe == "Sample") 
                                                                                        {
                                                                                            echo "<a href='/sample.php'>$tipe</a>";
                                                                                        }
                                                                                    ?>
                                                                                </td>
                                                                            </tr>
                                                                        </table> 
                                                                    </td>
                                                                    
                                                    <?php
                                                        if($tipe == "Sample") 
                                                        {
                                                            
                                                            echo"
                                                                <td style='text-align: left;'></td>
                                                                <td style='text-align: left;'>$$price</td>
                                                                <td>
                                                                    <a href='php/delete-cart.php?id-image=$id_i&id-cart=$id'><i class='fas fa-times-circle'></i></a> 
                                                                </td>
                                                            </tr>
                                                            ";
                                                        }
                                                        else{
                                                            echo"
                                                                <td style='text-align: left;'>$quantity</td>
                                                                <td style='text-align: left;'>$$price</td>
                                                                <td>
                                                                    <a href='php/delete-cart.php?id-image=$id_i&id-cart=$id'><i class='fas fa-times-circle'></i></a> 
                                                                </td>
                                                            </tr>
                                                            ";
                                                        }
                                                    }
                                                }
                                            }
                                            mysqli_close($conexion);
                                        
                                    ?>
                            </table>
                            <div class="content-side sticky-wrapper">
                                <div class="sticky">
                                    <div class="items_summary">
                                        <h2 class="total" style="font-size: 1.4rem;">Subtotal: <span id="subtotal_price">$<?php echo $total;?></span></h2>
                                        <p><button class="button large secondary block" id="checkout-button" type="submit">Checkout  &nbsp;<i class="fa fa-lock"></i></button></p>
                                        <p class="total" id="continue-shopping">or <a class="link" href="/custom-stickers.php">continue shopping</a></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tarjeta">
                    <h4>Add more items to your cart and save</h4>
                    <p class="font-light" style="font-size: 14px;">We provide a discount for ordering multiple items at the same time. The more you order, the more you save.</p>
                    <br>
                    <p class="font-light" style="font-size: 14px;">Use our <a href="custom-stickers.php">quick order</a> feature to easily order more items</p>
                </div>
                <?php
                }else
                {
                ?>
                <div id="cart-empty">
                    <div class="header wrapper center-text">
                        <h1>Your cart is empty</h1>
                        <label for="message" class="labelfiel font-light" style="width: 90%;">You may want to add <a href="../custom-stickers.php">custom stickers</a> or try a <a href="../samples.php">sample pack</a></label>
                    </div>
                </div>
                <?php
                }
                ?>
                <!--
                     <section id="categories">
                        <div class="wrapper">
                            <ul class="category-list block-grid-sm-4 block-grid-2">
                                <li><a href="/products/die-cut-stickers">
                                    <div>
                                        <img alt="Die cut stickers" src="/assets/images/stores/sticker_mule/products/categories/custom-die-cut-stickers-ad78691d0520190122.png" height="170">
                                    </div>Die cut stickers</a> 
                                </li>
                                <li><a href="/products/circle-stickers">
                                    <div>
                                        <img alt="Circle stickers" src="/assets/images/stores/sticker_mule/products/categories/custom-circle-stickers-6e528edeb120190122.png" height="170">
                                    </div> Circle stickers</a>
                                </li>
                                <li><a href="/products/transfer-stickers">
                                    <div>
                                        <img alt="Transfer stickers" src="/assets/images/stores/sticker_mule/products/categories/custom-transfer-stickers-15b053d69a20190122.png" height="170">
                                    </div>Transfer stickers</a>
                                </li>
                                <li><a href="/products/wall-graphics">
                                    <div>
                                        <img alt="Wall graphics" src="/assets/images/stores/sticker_mule/products/categories/custom-wall-graphics-5fb10a8b8d20190122.png" height="170">
                                    </div>Wall graphics</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>-->
            </section>
        </div>
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

