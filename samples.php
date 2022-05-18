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
    <style>
        .image{
            height: 180px !important;
            position: relative;
        }
        main {
            min-height: 780px;
        }
        @media screen and (max-width: 992px) 
        {
            /*.mainimage
            {
                width: 100% !important;
            }*/
            .products{
                position: relative !important;
            }
        }
    </style>
</head>
<body>
<?php include "nav.php"; ?>
    <main>
        <section class="first back1">
            <div class="container move" style="    background-image: url('');">
                <div class="wrapper" style="z-index: 999;position: absolute;display: inline-block;font-size: .9rem !important;">
                    <form id="formUp" action="php/add_sample.php" method="post" enctype="multipart/form-data">
                        <div class="slogan">
                            <h1 class="slogantxt" style="color: #404040;">Sample pack for $1</h1>
                        </div>
                        <div class="sub">
                            <p class="regular2 font-light" style="color: #404040;">Each pack contains Die Cut Stickers, Circle Stickers, Rectangle Stickers, Square Stickers, Oval Stickers and Bumper Stickers. Free shipping.</p>
                        </div>
                        <div class="buttons-2 buttons">
                            <button class="button large secondary" id="sample" name="sample" value="Sample">Add to cart</button>
                        </div>
                    </form>
                </div>
                <img class="mainimage" src="/assets/mainimage.webp" alt="Samples" style="position: relative;z-index: 99;width: 800px;float: right;background-image: none;">
            </div>
            
        </section>
        <section class="products"  style="margin-bottom: 0px;padding-top: 0px;z-index: -99;position: absolute;">
            <img src="assets/customstickers.jpg" alt="" style="filter: brightness(50%);margin-bottom: 0px;padding-top: 0px;width: 100%;">
            <div class="container" style="display: none;">
                <div class="wrapper">
                    <!--<h2 style="text-align: center; padding-bottom: 30px;">Or, get custom samples using your artwork.</h2>--> 
                    <div class="grid3">

                        <div class="wrapperproducts_sin">
                                <div class="image">
                                    <img src="/assets/Custom stickers/Bumper Sticker.png" srcset="" width="200">
                                </div>
                                <p class="regular font-light">Bumper Stickers Samples</p>
                        </div>

                        <div class="wrapperproducts_sin">
                                <div class="image">
                                    <img src="/assets/Custom stickers/KissCut.png" srcset="" width="200">
                                </div>
                                <p class="regular font-light">Kiss Cut Stickers Samples</p>
                        </div>

                        <div class="wrapperproducts_sin">
                            <div class="image">
                                <img src="/assets/Custom stickers/Oval.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Oval Stickers Samples</p>
                        </div>

                        <div class="wrapperproducts_sin">
                            <div class="image">
                                <img src="/assets/Custom stickers/Round Corner.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Rounded Corner Stickers Samples</p>
                        </div>

                        <div class="wrapperproducts_sin">
                            <div class="image">
                                <img src="/assets/Custom stickers/Sticker Sheets.png" srcset="" width="200">
                            </div>
                                <p class=" regular font-light">Sticker Sheets Samples</p>
                        </div>

                        <div class="wrapperproducts_sin">
                            <div class="image">
                                <img src="/assets/Custom stickers/Round.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Circle Stickers Samples</p>
                        </div>

                        <div class="wrapperproducts_sin">
                            <div class="image">
                                <img src="/assets/Custom Sticker samples.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Custom Sticker Samples</p>
                        </div>

                        <div class="wrapperproducts_sin">
                            <div class="image">
                                <img src="/assets/Custom stickers/Rectangle.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Rectangle Stickers Samples</p>
                        </div>

                        <div class="wrapperproducts_sin">
                            <div class="image">
                                <img src="/assets/Custom stickers/Square.png" srcset="" width="200">
                            </div>
                                <p class="regular font-light">Square Stickers Samples</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <section class="container_video" style="display: none;">
            <div class="container">
                <div class="videosize">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img class="embed-responsive-item" src="/assets/poster.jpg" alt="">
                        <iframe class="embed-responsive-item" poster="/assets/poster.jpg" src="" allowfullscreen></iframe>
                      </div>
                   <!-- <div class="jsx-1954592401 ">
                        <div class="jsx-1954592401 wistia_responsive_padding">
                            <div class="jsx-1954592401 wistia_responsive_wrapper">
                                <div id="wistia_chrome_24" class="w-chrome" style="display: inline-block; height: 270px; line-height: normal; margin: 0px; padding: 0px; position: relative; vertical-align: top; width: 480px; outline: currentcolor none medium; overflow: hidden; box-sizing: content-box;" tabindex="-1">
                                    <div id="wistia_grid_30_wrapper" style="display: block; width: 480px; height: 270px;">
                                        <div id="wistia_grid_30_main" style="width: 480px; left: 0px; height: 270px; margin-top: 0px;">
                                            <div id="wistia_grid_30_center" style="width: 100%; height: 100%;">
                                                <div class="w-ui-container" style="height: 100%; left: 0px; position: absolute; top: 0px; width: 100%; opacity: 1;">
                                                    <div class="w-vulcan-v2 w-css-reset" id="w-vulcan-v2-29" style="box-sizing: border-box; cursor: default; height: 100%; left: 0px; position: absolute; visibility: visible; top: 0px; width: 100%;">
                                                        <div class="w-vulcan--background w-css-reset" style="height: 100%; left: 0px; position: absolute; top: 0px; width: 100%;">
                                                            <div class="w-css-reset" data-handle="thumbnail">
                                                                <div>
                                                                    <div style="height: 100%; left: 0px; opacity: 1; position: absolute; top: 0px; width: 100%; display: block;" class="w-css-reset">
                                                                        <img class="w-css-reset" srcset="https://embedwistia-a.akamaihd.net/deliveries/c070d424987be2245e9ddb5f8aefd13f4a2d8e44.webp?image_crop_resized=600x338 320w"
                                                                        src="https://embedwistia-a.akamaihd.net/deliveries/c070d424987be2245e9ddb5f8aefd13f4a2d8e44.webp?image_crop_resized=600x338"
                                                                            style="height: 270px; left: 0px; position: absolute; top: 0px; width: 480px; clip: auto; display: block; border-color: rgb(0, 0, 0); 
                                                                            border-style: solid; border-width: 0px; box-sizing: content-box;" alt="Video Thumbnail">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
           <div class="contentVideo">
               <h2 class="videoTitle">Free shipping, free online proofs, fast turnaround.</h2>
               <p class="VideoText">Acme Stickers is the fastest and easiest way to buy custom 
                    printed products. Order in 60 seconds and we'll turn your designs and illustrations into custom stickers, 
                    magnets, buttons, labels and packaging in days. We offer free online proofs, free worldwide shipping and super fast turnaround.
                </p>
            </div>
        </div>
        </section>
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

