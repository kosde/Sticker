
<?php
    session_start();
?>
<div class="modal-container" id="address" style="display: none;padding: 50px 25% 100%;"> 
    <div class="modal-content" style="display: inline-table;height: 100%;">
        <span>
            <div id="address-list" class="fade-appear fade-appear-active">
                <h2>Edit shipping address</h2>
                <?php
                    include 'php/conexion_be.php';
                    $id_user = $_SESSION['id'];
                    $query    = "SELECT * FROM address_t WHERE id_user='$id_user'";
                    $result = mysqli_query($conexion,$query);
                    
                    if(mysqli_num_rows($result)>0)
                    {
                        while ($extraido= mysqli_fetch_array($result))
                        {
                            //id	id_user	country	full_name	company	street_address1	street_address2	city	zip_code	statedir
                            $id             = $extraido['id'];
                            $id_user        = $extraido['id_user'];
                            $country        = $extraido['country'];
                            $full_name      = $extraido['full_name'];
                            $company        = $extraido['company'];
                            $street_address1= $extraido['street_address1'];
                            $street_address2= $extraido['street_address2'];
                            $city           = $extraido['city'];
                            $statedir       = $extraido['statedir'];
                            $zip_code       = $extraido['zip_code'];
                            $default_address= $extraido['default_address'];
                            ?>
                                <form action="upload.php?price=57" class="product-options" method="get" id="form_id"
                                 style="display: table;margin-bottom: 10px;height: 110px;border: 1px solid rgba(0,0,0,.15);">
                                    <div style="float: left;width: 85%;">
                                        <label style="width: 90%;padding-left: 20px;padding-top: 6px;">
                                        <span class="push-left font-medium" style="width: 100%;"><?php echo $full_name;?></span>
                                        <span class="push-left price"><?php echo $street_address1." ".$street_address2;?></span>
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $country;?>"         id="ups_ul_country<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $full_name;?>"       id="ups_ul_name<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $company;?>"         id="ups_ul_company<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $street_address1;?>" id="ups_ul_add1<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $street_address2;?>" id="ups_ul_add2<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $city;?>"            id="ups_ul_city<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $zip_code;?>"        id="ups_ul_postal<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $statedir;?>"        id="ups_ul_state<?php echo $id;?>">
                                        
                                        <?php
                                            if($country=="US")
                                            {
                                            
                                                $country = "United States";
                                            }
                                            if($country=="MX")
                                            {
                                                $country = "Mexico";
                                            }
                                        ?>
                                        <span class="push-left price" style="width: 100%;"><?php echo $city.", ".$statedir." ".$zip_code.", ".$country;?></span>
                                        
                                        </label>
                                    </div>
                                    <div style="display: table-cell;vertical-align: middle;width: 40%;">
                                        <div class="buttons-2 buttons" style="display: inline-block;">
                                            <?php
                                            if($default_address==1)
                                                $d_add = $default_address;
                                            if($default_address==1)
                                            {
                                                ?>
                                                    <span class="push-left price" style="width: 130px;">Default</span>
                                                <?php
                                            }
                                            else
                                            {
                                            ?>
                                                <a href="../account/make_default.php?id_dir=<?php echo $id;?>" class="button tiny pr-4 secondary" type="button" 
                                                    style="width: 126px;text-align: center;display: inline-flex;">
                                                    Make default
                                                </a>
                                            <?php
                                            }
                                            ?>
                                            <!--<a href="account/edit_address.php?id_dir=<?php // echo $id;?>" class="button primary pr-4" type="button" 
                                                    style="width: 60px;text-align: center;margin: 0px 0px -5px 0px;padding-left: 15px;">
                                                    Edit
                                                </a>-->
                                            <button class="button tiny primary pr-4" type="button" onclick="EditAddress(<?php echo $id;?>)">Edit</button>
                                            <?php
                                                if(isset($_SESSION['NA']))
                                                {
                                                    unset($_SESSION['NA']);
                                                    ?>
                                                    <div id='errorNA' class='tooltiperror error'>
                                                        <span class='text'>You can't delete or modify the address because a order is in progress</span>
                                                    </div>
                                                    <?php
                                                }
                                            ?>
                                            <a href="../account/delete_address.php?id=<?php echo $id;?>"><i style="color:red;" class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                </form>
                            <?php
                        }
                    }
                    mysqli_close($conexion);
                ?>
                <span id="shipping-address-book-app" style="width: 100%;display: inline-block;text-align: center;">&nbsp;
                    <button class="button link edit" type="button" onclick="NewAddress()">Add a new shipping address</button>
                </span>
            </div>
        </span>
        <button class="modal-close-x" onclick="CloseAddress()" type="button">×</button>
    </div>
</div>