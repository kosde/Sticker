<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticker Mule | Custom stickers that kick ass</title> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">      
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="text-muted fa fa-bars"></i>
                </button>
            </div>
            <a href="index.php" class="navbar-brand d-flex" style="padding-top: 5px;">
                <img src="/assets/silueta1.png" width="30" height="25">
                <h4 style="color: #582707;" class="dt">Acme</h4>
                <h4 style="color: #f26922;" class="dt">Stickers</h4>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link"style="color: #582707;" href="#">Stickers</a></li> 
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex:0.5;">
                <ul class="navbar-nav mr-auto">
                    <li><a href="/cart.php"><i  class="nav-link fas fa-shopping-cart" style="color: #582707;"></i></a></li>
                    <?php
                        if(!isset($_SESSION['Fullname']))
                        {
                        ?>
                            <li><a class="nav-link  pl-4" style="padding-right: 1.0rem; color: #582707;" href="/login.php">Log in</a></li>
                            <li><a class=" nav-link  pl-4" style="padding-right: 1.0rem; color: #582707;" href="/signup.php">Sign up</a></li>
                        <?php
                        }else
                        {
                                echo "<li> <a class='nav-link text-muted pl-4' style='padding-right: 1.0rem;'>" . $_SESSION['Fullname'] . "</a> </li>
                                      <li> <a class='nav-link pl-4' style='padding-right: 1.0rem;' href='logout.php'>Log out</a></li>";                        
                        }
                    ?>
                </ul>
            </div>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="text-muted fas fa-shopping-cart"></i>
                </button>
            </div>
        </div>   
    </nav>
    <main>
        <section class="paper">
            <div class="wrapper_cut bg-image-container">
                <div class="text-dark">
                    <figure class="bg-image">
                        <img src="/assets/cut.jpg">
                    </figure>
                    <div class="front">
                        <div class="title_cut">
                            <h1>Die cut stickers</h1>
                            <span class="ratings-wrapper">
                                <span class="rating-stars">
                                    <i class="fa fa-star stars_14"></i>
                                    <i class="fa fa-star stars_14"></i>
                                    <i class="fa fa-star stars_14"></i>
                                    <i class="fa fa-star stars_14"></i>
                                    <i class="fa fa-star stars_14"></i>
                                </span>
                                <span class="reviews-count">
                                    <a href="#reviews" style="color:#2b71b8;">81,765 reviews</a>
                                </span>
                            </span>
                        </div>
                        <p>Custom die cut stickers are a fast and easy way to promote your business, brand or event.  Thick, durable vinyl protects your stickers from scratches, water &amp; sunlight.</p>
                    <button class="tiny light" data-reveal-id="order-samples-modal" name="button" type="submit">Order samples</button>
                    </div>
                    <div class="product">
                        <form action="#" class="product-options">
                            <div style="margin: 0px; padding: 0px; display: inline;">
                                <input name="utf8" type="hidden" value="✓">
                            </div>
                            <input id="measurement_system" name="measurement_system" type="hidden" value="imperial">
                            <input id="width_inches" name="width_inches" type="hidden" value="2">
                            <input id="height_inches" name="height_inches" type="hidden" value="2">
                            <input id="units_per_roll" name="units_per_roll" type="hidden" value="0">
                            <div class="product-option-group" id="variants">
                                <legend>Select a size
                                    <a class="action-info" data-reveal-id="size-help-modal" href="#need-help" id="size-help-open">
                                        <i class="fa fa-info-circle-simple"></i>
                                    </a>
                                </legend>
                                <ul class="options" id="variant-options">
                                    <li>
                                        <input id="variant_79" name="variant_id" readonly="" type="radio" value="79" checked="">
                                        <label for="variant_79"> 2" x 2"</label>
                                    </li>
                                    <li>
                                        <input id="variant_78" name="variant_id" readonly="" type="radio" value="78">
                                        <label for="variant_78"> 3" x 3"</label>
                                    </li>
                                    <li>
                                        <input id="variant_80" name="variant_id" readonly="" type="radio" value="80">
                                        <label for="variant_80"> 4" x 4"</label>
                                    </li>
                                    <li>
                                        <input id="variant_81" name="variant_id" readonly="" type="radio" value="81">
                                        <label for="variant_81"> 5" x 5"</label>
                                    </li>
                                    <li>
                                        <input id="variant_77" name="variant_id" readonly="" type="radio" value="77">
                                        <label for="variant_77"> Custom size</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-option-group" id="quantities">
                                <legend>Select a quantity</legend>
                                <ul class=" options radio" id="variant-quantities">
                                    <li class="checked quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_50" name="quantity" readonly="" type="radio" value="50" checked="">
                                            <label class="checked quantity" for="quantity_50"> 50</label>
                                        </span>
                                        <span class="table-cell price" id="price_50_id">$57</span>
                                        <span class="table-cell savings"></span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_100" name="quantity" readonly="" type="radio" value="100">
                                            <label class=" quantity" for="quantity_100"> 100</label>
                                        </span>
                                        <span class="table-cell price" id="price_100_id">$70</span>
                                        <span class="table-cell savings">Save 39%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_200" name="quantity" readonly="" type="radio" value="200">
                                            <label class=" quantity" for="quantity_200"> 200</label>
                                        </span><span class="table-cell price" id="price_200_id">$92</span>
                                        <span class="table-cell savings">Save 60%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_300" name="quantity" readonly="" type="radio" value="300">
                                            <label class=" quantity" for="quantity_300"> 300</label>
                                        </span>
                                        <span class="table-cell price" id="price_300_id">$111</span>
                                        <span class="table-cell savings">Save 68%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_500" name="quantity" readonly="" type="radio" value="500">
                                            <label class=" quantity" for="quantity_500"> 500</label>
                                        </span>
                                        <span class="table-cell price" id="price_500_id">$147</span>
                                        <span class="table-cell savings">Save 74%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_1000" name="quantity" readonly="" type="radio" value="1000">
                                            <label class=" quantity" for="quantity_1000"> 1,000</label>
                                        </span>
                                        <span class="table-cell price" id="price_1000_id">$225</span>
                                        <span class="table-cell savings">Save 80%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_2000" name="quantity" readonly="" type="radio" value="2000">
                                            <label class=" quantity" for="quantity_2000"> 2,000</label>
                                        </span>
                                        <span class="table-cell price" id="price_2000_id">$360</span>
                                        <span class="table-cell savings">Save 84%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_3000" name="quantity" readonly="" type="radio" value="3000">
                                            <label class=" quantity" for="quantity_3000"> 3,000</label>
                                        </span>
                                        <span class="table-cell price" id="price_3000_id">$481</span>
                                        <span class="table-cell savings">Save 86%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_5000" name="quantity" readonly="" type="radio" value="5000">
                                            <label class=" quantity" for="quantity_5000"> 5,000</label>
                                        </span>
                                        <span class="table-cell price" id="price_5000_id">$703</span>
                                        <span class="table-cell savings">Save 88%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_10000" name="quantity" readonly="" type="radio" value="10000">
                                            <label class=" quantity" for="quantity_10000"> 10,000</label>
                                        </span>
                                        <span class="table-cell price" id="price_10000_id">$1,191</span>
                                        <span class="table-cell savings">Save 90%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_custom" name="quantity" readonly="" type="radio" value="0">
                                            <label class=" quantity" for="quantity_custom">
                                                <span class="custom-quantity-wrapper">Custom quantity</span>
                                            </label>
                                        </span>
                                        <span class="table-cell"></span>
                                        <span class="table-cell"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="continue">
                                <button class="button large primary block" id="continue">Continue</button>
                                <p>Next: upload artwork →</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="products" style="background-color: #ffffff;">
            <div class="container">
                <div class="wrapper">
                    <div class="grid3">
                        <div class="wrapperproducts text-dark">
                            <div class="image_car">
                                <img src="/assets/4.svg" srcset="" height="80">
                            </div>
                                <h3>Free shipping in 4 days</h3>
                                <p style="text-align: center;">Get your die cut stickers fast with 4 day turnaround and free shipping.</p>
                                <a href="#">Get a delivery estimate</a>
                        </div>
                        <div class="wrapperproducts text-dark">
                            <div class="image_car">
                                <img src="/assets/online.svg" srcset="" height="80">
                            </div>
                                <h3>Get an online proof</h3>
                                <p style="text-align: center;">Review your proof shortly after checkout and request changes until you're happy.</p>
                                <a href="#">Watch our process</a>
                        </div>
                        <div class="wrapperproducts text-dark">
                            <div class="image_car">
                                <img src="/assets/clima.svg" srcset="" height="80">
                            </div>
                                <h3>Durable & weatherproof</h3>
                                <p style="text-align: center;">Thick, durable vinyl protects your die cut stickers from scratching, rain & sunlight.</p>
                                <a href="#">See how durable</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <section class="video_cut">
            <div class="vid">
            <div class="container">
                <div class="video">
                    <div class="jsx-1954592401 ">
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
                                                                        <img class="w-css-reset" srcset="https://embed-fastly.wistia.com/deliveries/af50cd8a07c816570cde6718f114f3f0.webp?image_crop_resized=640x360 320w" 
                                                                        src="https://embed-fastly.wistia.com/deliveries/af50cd8a07c816570cde6718f114f3f0.webp?image_crop_resized=640x360" 
                                                                        style="height: 270px; left: 0px; position: absolute; top: 0px; width: 480px; clip: auto; display: block; border-color: rgb(0, 0, 0); border-style: solid; border-width: 0px; box-sizing: content-box;"
                                                                         alt="Video Thumbnail">
                                                                        
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
                    </div>
                </div>
           <div class="contentVideo">
               <h2 class="videoTitle ">Free shipping, free online proofs, fast turnaround.</h2>
               <p class="VideoText">Sticker Mule is the fastest and easiest way to buy custom 
                    printed products. Order in 60 seconds and we'll turn your designs and illustrations into custom stickers, 
                    magnets, buttons, labels and packaging in days. We offer free online proofs, free worldwide shipping and super fast turnaround.
                </p>
            </div>
            </div>
            </div>
        </section>
    </main>
    <footer class="Footer">
        <div class="container">
            <div class="links">
                <nav>
                    <span>
                        <a class="link" href="/uses">Uses</a>
                    </span>
                    <span>
                        <a class="link" href="/templates">Templates</a>
                    </span>
                    <span>
                        <a class="link" href="/support">Help</a>
                    </span>
                </nav>
            </div>
            <div class="interactive">
                <div>
                    <a aria-label="Instagram" href="#" rel="noopener noreferrer" target="_blank">
                        <svg fill="currentColor" height="20" viewBox="0 0 857.1 1000" width="20">
                            <path d="M571 500q0-59-41-101t-101-42-101 42-42 101 42 101 101 42 101-42 41-101zm77 0q0 91-64 156t-155 64-156-64-64-156 64-156 156-64 155 64 64 156zm61-229q0 21-15 36t-37 15-36-15-15-36 15-36 36-15 37 15 15 36zM429 148H327q-20 0-54 2t-57 5-40 11q-28 11-49 32t-33 49q-6 16-10 40t-6 58-1 53 0 59 0 43 0 43 0 59 1 53 6 58 10 40q12 28 33 49t49 32q16 6 40 11t57 5 54 2 59 0 43 0 42 0 59 0 54-2 58-5 39-11q28-11 50-32t32-49q6-16 10-40t6-58 1-53 0-59 0-43 0-43 0-59-1-53-6-58-10-40q-11-28-32-49t-50-32q-16-6-39-11t-58-5-54-2-59 0-42 0zm428 352q0 128-3 177-5 116-69 180t-179 69q-50 3-177 3t-177-3q-116-6-180-69T3 677q-3-49-3-177t3-177q5-116 69-180t180-69q49-3 177-3t177 3q116 6 179 69t69 180q3 49 3 177z"></path>
                        </svg>
                    </a>
                    <a aria-label="Facebook" href="#" rel="noopener noreferrer" target="_blank">
                        <svg fill="currentColor" height="20" viewBox="0 0 571.4 1000" width="20">
                            <path d="M535 7v147h-87q-48 0-65 20t-17 60v106h164l-22 165H366v424H195V505H53V340h142V218q0-104 58-161T408 0q82 0 127 7z"></path>
                        </svg>
                    </a>
                    <a aria-label="Youtube" href="#" rel="noopener noreferrer" target="_blank">
                        <svg fill="currentColor" height="20" viewBox="0 0 1000 1000" width="20">
                            <path d="M397 629l270-139-270-141v280zm103-481q94 0 181 3t128 5l41 2 9 1q9 1 13 2t13 2 16 5 16 7 17 11 16 15q4 3 9 10t16 33 15 56q4 36 7 76t3 64v98q1 81-10 162-4 30-14 55t-18 35l-8 9q-7 8-16 15t-17 10-16 7-16 5-13 2-13 2-9 1q-140 11-350 11-115-2-201-4t-111-4l-28-3-20-2q-20-3-30-5t-29-12-31-23q-4-3-9-10t-16-33-15-56q-4-36-7-76t-3-64v-98q-1-81 10-162 4-31 14-55t18-35l8-9q8-9 16-15t17-11 16-7 16-5 13-2 13-2 9-1q140-10 350-10z"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="legal">
                <div class="footer-legal">
                    <small class="jsx-4078830720">© 2020<!-- --> <!-- -->AcmeStickers</small>
                    <a class="link" href="/legal/privacy">Privacy</a>
                    &nbsp;&amp;&nbsp;
                    <a class="link" href="/legal/terms">Terms</a>
                    <span class="siteMapFooter">
                        <a class="link" href="/sitemap">Site map</a>
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

