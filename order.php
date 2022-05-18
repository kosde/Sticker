<?php
    session_start();
    $delivery_date  = $_GET["deliverytime"];
    $address        = $_GET["address"];
    $name           = $_GET["name"];
    $email          = $_GET["email"];
    /*$_SESSION["delivery_date"]  = $delivery_date;
    $_SESSION["address"]        = $address;
    $_SESSION["nameA"]           = $name;
    $_SESSION["email"]          = $email;*/
   
    
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
    <link rel="stylesheet" href="build/css/intlTelInput.css">
    <script>
        function add_account()
        {
            var modal = document.getElementById("new_account");
            modal.style.display = "flex";
        }
        function Close_add_account()
        {
            var modal = document.getElementById("new_account");
            modal.style.display = "none";
            Phone_number();
        }
        function Phone_number()
        {
            var modal = document.getElementById("Phone_number");
            modal.style.display = "flex";
        }
        function ClosePhone_number()
        {
            var modal = document.getElementById("Phone_number");
            modal.style.display = "none";
        }
         var input = document.querySelector("#telephone");
        window.intlTelInput(input,({   }));
        $("#telephone").intlTelInput({   });
    </script>
</head>
<body>
<?php include "nav.php"; 
    if(isset($_GET["deliverytime"]))
    {
        $_SESSION["delivery_date"]  = $delivery_date;
        $_SESSION["address"]        = $address;
        $_SESSION["nameA"]           = $name;
        $_SESSION["emailA"]          = $email;       
    }
    else
    {
        $delivery_date  = $_SESSION["delivery_date"];
        $address        = $_SESSION["address"];
        $name           = $_SESSION["nameA"];      
        $email          = $_SESSION["emailA"];          
    }?>
    <main style="width: 100% !important;">
        <section class="container">
            <div style="height: 300px;" class="py-5">
                <div class="content-left" style="text-align: center;">
                    <h1>Thanks</h1>
                    <?php
                    if(isset($_GET['order']))
                    {
                    ?>
                    <h4>Expect your proof within the next 4 hours.</h4> 
                    <?php
                    }
                    ?>
                    <span class="price push-left fill_content">Your order is scheduled to arrive by <?php echo $delivery_date;?></span>   
                </div>
                <div class="content-right py-5" style="border: 2px solid #e5e5e5;position: relative;">
                    <div style="padding: 20px;">
                        <?php
                        include 'php/conexion_be.php';
                        $validar  = mysqli_query($conexion,"SELECT * FROM address_t  WHERE id='$address'");
                        if(mysqli_num_rows($validar)>0)
                        {
                            $extraido= mysqli_fetch_array($validar);
                            $id              = $extraido['id'];
                            $id_user         = $extraido ['id_user'];
                            $country         = $extraido['country'];
                            $full_name       = $extraido ['full_name'];
                            $company         = $extraido['company'];
                            $street_address1 = $extraido ['street_address1'];
                            $street_address2 = $extraido['street_address2'];
                            $city            = $extraido ['city'];
                            $zip_code        = $extraido['zip_code'];
                            $statedir        = $extraido['statedir'];
                            mysqli_close($conexion);
                        }
                        ?>
                        <h3 class="fill_content">Ship to:</h3>
                        <span class="price push-left fill_content"><?php echo $company;?></span>
                        <span class="price push-left fill_content"><?php echo $full_name;?></span>
                        <span class="price push-left fill_content"><?php echo $street_address1." ".$street_address2;?></span>
                        <span class="price push-left fill_content"><?php echo $city." ".$statedir." ".$zip_code;?></span>
                        <span class="price push-left fill_content"><?php echo $country;?></span>
                    </div>
                </div>
            </div>
        </section>
        <section class="products" style="background-color: #ffffff;">
            <div class="container" style="display: flex;">
                <div class="wrapper" style="width: 100%; ">
                    <div class="grid3 grid_product">
                        <div class="wrapperproducts_sin text-dark" style="padding: 10px 0 10px 0;width: 90%;">
                            <div class="image_car" style="height: 89px;">
                                <img src="/assets/iconos 2_Mesa de trabajo 1.png" srcset="" height="80" style="margin: auto;display: flex;">
                            </div>
                                <h3 style="text-align: center;">Quickly reorder items</h3>
                                <p style="text-align: center;font-size: 1rem;">Enjoy faster turnaround when reordering</p>
                        </div>
                        <div class="wrapperproducts_sin text-dark" style="padding: 10px 0 10px 0;width: 90%;">
                            <div class="image_car" style="height: 89px;">
                                <img src="/assets/iconos 2-02.png" srcset="" height="80" style="margin: auto;display: flex;">
                            </div>
                                <h3 style="text-align: center;">Save with automatic discounts</h3>
                                <p style="text-align: center;font-size: 1rem;">Select an aproximate size when ordering. We'll figure out your exact size and adjust</p>
                        </div>
                        <div class="wrapperproducts_sin text-dark" style="padding: 10px 0 10px 0;width: 90%;">
                            <div class="image_car" style="height: 89px;">
                                <img src="/assets/iconos 2-03.png" srcset="" height="80" style="margin: auto;display: flex;">
                            </div>
                                <h3 style="text-align: center;">Get custom samples of a new desing</h3>
                                <p style="text-align: center;font-size: 1rem;">trying a new look? Order custom samples of your next desing</p>
                        </div>
                    </div>
                    <div class="grid2">
                        <div class="wrapperproducts_sin text-dark" style="width: 90%;">
                            <div class="image_car" style="height: 89px;">
                                <img src="/assets/iconos 2-04.png" srcset="" height="80" style="margin: auto;display: flex;">
                            </div>
                                <h3 style="text-align: center;">Go borderless with custom tranfer stickers.</h3>
                                <p style="text-align: center;font-size: 1rem;">Apply the most intricate desings to any surface with custom transfer stickers. Highly durale and weaterproof</p>
                        </div>
                        <div class="wrapperproducts_sin text-dark">
                            <div class="image_car" style="height: 89px;">
                                <img src="/assets/iconos 2-05.png" srcset="" height="80" style="margin: auto;display: flex;">
                            </div>
                                <h3 style="text-align: center;">Promote your brand with custom stickers.</h3>
                                <p style="text-align: center;font-size: 1rem;">Advertise your brand on cars, refrigerators, robots and more by ordering custom stickers</p>
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
        <?php
        include "account/sms_notifications.php";
        ?>
        <div class="modal-container" id="new_account" style="display: none;padding: 50px 25% 35% 25%;"> 
            <div class="modal-content" style="display: inline-table;height: 100px !important;">
                <label for="message" class="labelfiel font-light" style="text-align: center;width: 100%;display: block;padding-bottom: 20px;">Would you like to make an account?</label>
                <div class="field text ">
                    <div aria-live="assertive" class="" role="alert">
                        <?php
                        if(!isset($_SESSION["name"]) && isset($_GET["deliverytime"]))
                        {
                            $_SESSION["dir"] = 1;
                            
                        ?>
                            <input id="id" name="id" type="text" style="visibility: hidden;display: none;" value="<?php echo $_SESSION["id"];?>">

                        <?php
                        }
                        else{
                        ?>
                            <input id="id" name="id" type="text" style="visibility: hidden;display: none;" value="no">
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <p style="text-align: center;">
                    <a href="create_account.php?email=<?php echo $email."&name=".$name;?>">
                        <button class="bcreateA button large  secondary " >Yes</button>
                    </a>
                    <button onclick="Close_add_account()" class="bcreateA button large primary ">Not at this time</button>
                </p>
                <button class="modal-close-x" onclick="Close_add_account()" type="button">×</button>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) { 
                var idaccount = document.getElementById("id").value;
                if(idaccount != "no")
                {
                    add_account();
                }
                });
        </script>
         <script src="build/js/intlTelInput.js"></script>
        <script>
            var input = document.querySelector("#phone");
            var iti = window.intlTelInput(input, 
            {
                preferredCountries: ['us','mx'],
                // separateDialCode: true,
                utilsScript: "build/js/utils.js",
            });
            //
            // listen to the address dropdown for changes
            input.addEventListener('change', function() {
            //iti.setCountry(this.value);
            var countryData = iti.getSelectedCountryData();
            document.getElementById("code").value=countryData['dialCode'];
            });
        </script>
    </main>
<?php include "footer.php"; ?>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/bootsnav/bootsnav.js"></script>
    <script src="js/script.js"></script>
	<script src="build/js/intlTelInput.min.js"></script>
	<script src="https://code.jquery.com/jquery-latest.min.js"></script>
	<script src="build/js/intlTelInput-jquery.min.js"></script>
</body>
</html>