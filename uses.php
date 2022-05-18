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
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
</head>
<body>
<?php include "nav.php"; ?> 
    <main>
        <section class="first" style="height: 150px;">
            <div class="container ">
                <div class="wrapper" style="/*padding-top: 10%;*/">
                        <h1 class="slogantxt" style="width: 100%;
                        height: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: center;">Custom printing for any purpose</h1>
                        <p class="regular2 font-light" style="
                        margin: auto;
                        text-align: center !important;
                        font-size: 1rem !important;">Print stickers, labels, and packaging for your brand or small business.</p>
                    
                </div>
                
            </div>
        </section>
        <section class="products">
            <div class="container">
                <div class="wrapper">
                    <div class="grid3">
                        <div class="wrapperproducts_sin">
                            <div class="image">
                                <img src="/assets/Hard Hat.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Hard Hat Stickers</p>
                        </div>
                        <div class="wrapperproducts_sin">
                            <div class="image">
                                <img src="/assets/laptop.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Custom Laptop Stickers</p>
                        </div>
                        <div class="wrapperproducts_sin">
                            <div class="image">
                                <img src="/assets/waterproof.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Weather Proof Stickers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container_video" style="height: 100% !important;">
            <div class="container" onscroll="myFunction()">
                <div class="videosize" id="instagram" style="height: 100% !important;">
                    
                    <div  class="elfsight-app-638b5be0-4cf0-4f0a-a8aa-92b0af06a19a" style="width: 345px;margin: auto;height: 300px !important;"></div>

                </div>
                
                <style>
                    .eapps-link{
                        visibility: hidden !important;
                    }
                </style>
                <div class="contentVideo">
                    <strong class="videoTitle" style="text-align: left;color:#f87060;">ACME STICKERS OFFERS... <br>• FREE ONLINE PROOFS. <br>• FREE SHIPPING.<br>• FAST TURNAROUND.</strong>
                    <p class="VideoText font-light" style="font-size: .9rem;padding-top: 20px;" >ACME STICKERS is the fastest and easiest way to buy custom printed products. 
                        Order in seconds and we'll turn your designs and illustrations into custom stickers in days. 
                        We offer free online proofs and super fast turnaround.
                    </p>
                </div>
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

