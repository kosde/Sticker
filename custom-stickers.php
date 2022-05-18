<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include "css.php";
    ?>
    <style>
        .image{
            height: 220px !important;
            position: relative;
        }
        .tam{
            position: absolute;
            top: 0;
            bottom: 0;
            margin: auto;
            width:100% !important;
            max-height: 170px;
            width: 180px !important;
            height: 180px !important;
        }
        .wrapperproducts a{
            width: 100%;
        }
        .first_text{
            background: url(assets/customstickers.jpg) no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 3in;
        }
    </style>
</head>
<body>
<?php include "nav.php"; ?>
    <main>
        <section class="first_text">
            <!--<img src="assets/customstickers.jpg" alt="" style="filter: brightness(50%);margin-bottom: 0px;padding-top: 0px;width: 100%;">-->
            <div class="mainimage_custom container">
                <div class="wrapper_custom">
                    <h1 class="title" style="padding-left: 45px;">Custom stickers</h1>
                    <span style="display:none;" class="ratings-wrapper">
                        <span class="rating-stars">
                            <i class="fa fa-star stars"></i>
                            <i class="fa fa-star stars"></i>
                            <i class="fa fa-star stars"></i>
                            <i class="fa fa-star stars"></i>
                            <i class="fa fa-star stars"></i>
                        </span>
                        <span class="reviews-count">
                            <a href="#reviews">81,765 reviews</a>
                        </span>
                    </span>
                </div>
            </div>
        </section>
        <section class="products">
            <div class="container">
                <div class="wrapper">
                    <div class="grid3">

                        <div class="wrapperproducts">
                            <a href="/die-cut-stickers.php">
                                <div class="image">
                                    <img  class="tam"  src="/assets/Custom stickers/Die Cut.png" srcset="" width="200" style="width: 160px !important;height: 160px !important;">
                                </div>
                                <p class="regular font-light">Die Cut Stickers</p>
                            </a> 
                        </div>

                        <div class="wrapperproducts">
                            <a href="/circle-stickers.php ">
                                <div class="image">
                                    <img  class="tam" src="/assets/Custom stickers/Round.png" srcset="" width="200">
                                </div>
                                <p class="regular font-light">Circle Stickers</p>
                            </a>
                        </div>

                        <div class="wrapperproducts">
                            <a href="/rectangle-stickers.php ">
                            <div class="image">
                                <img  class="tam" src="/assets/Custom stickers/Rectangle.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Rectangle Stickers</p>
                            </a>
                        </div>

                        <div class="wrapperproducts">
                            <a href="/square-stickers.php ">
                            <div class="image">
                                <img  class="tam"  src="/assets/Custom stickers/Square.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Square Stickers</p>
                            </a>
                        </div>

                        <div class="wrapperproducts">
                            <a href="/oval-stickers.php ">
                            <div class="image">
                                <img  class="tam" src="/assets/Custom stickers/Oval.png" srcset="" width="200">
                            </div>
                                <p class=" regular font-light">Oval Stickers</p>
                            </a>
                        </div>

                        <div class="wrapperproducts">
                            <a href="/bumper-stickers.php ">
                            <div class="image">
                                <img  class="tam" src="/assets/Custom stickers/Bumper Sticker.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Bumper Stickers</p>
                            </a>
                        </div>

                        <div class="wrapperproducts">
                            <a href="/kiss-cut-stickers.php ">
                            <div class="image">
                                <img  class="tam" src="/assets/Custom stickers/KissCut.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Kiss Cut Stickers</p>
                            </a>
                        </div>

                        <div class="wrapperproducts">
                            <a href="/rounded-corner-stickers.php ">
                            <div class="image">
                                <img  class="tam" src="/assets/Custom stickers/Round Corner.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Rounded Corner Stickers</p>
                            </a>
                        </div>

                        <div class="wrapperproducts">
                            <a href="/stickers-sheets.php ">
                            <div class="image">
                                <img  class="tam" src="/assets/Custom stickers/Sticker Sheets.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Sticker Sheets</p>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>    
    </main>
<?php include "footer.php"; ?>
</body>
</html>

