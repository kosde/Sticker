<?php
//uso del arreglo $_SESSION
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="text/html, charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acme Sticker | Custom stickers that kick ass</title> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">      
            <!-- Start Atribute Navigation -->
                  
            <!-- End Atribute Navigation -->
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="text-muted fa fa-bars"></i>
                </button>
            </div>
            <!-- End Header Navigation -->
            <a href="index.php" class="navbar-brand d-flex" style="padding-top: 5px;">
                <img src="/assets/silueta1.png" width="30" height="25">
                <!--<i class="fab fa-sticker-mule fa-sm"
                    
                    <nav data-testid="Navigation" role="navigation" class="jsx-4236489376 ">
                        <ul class="jsx-4236489376">
                            <li class="jsx-4236489376">
                                <a href="/custom-stickers" class="jsx-1693562597 HeaderNavItem">Stickers</a>
                            </li>
                            <li class="jsx-4236489376">
                                <a href="/custom-labels" class="jsx-1693562597 HeaderNavItem">Labels</a>
                            </li>
                            <li class="jsx-4236489376">
                                <a href="/products/custom-magnets" class="jsx-1693562597 HeaderNavItem">Magnets</a>
                            </li>
                            <li class="jsx-4236489376">
                                <a href="/custom-buttons" class="jsx-1693562597 HeaderNavItem">Buttons</a>
                            </li>
                            <li class="jsx-4236489376">
                                <a href="/custom-packaging" class="jsx-1693562597 HeaderNavItem">Packaging</a>
                            </li>
                            <li class="jsx-4236489376">
                                <a href="/more" class="jsx-1693562597 HeaderNavItem">More</a>
                            </li>
                        </ul>
                    </nav>
                    
                    style="padding-top: 5px;"></i>-->
                <h4 style="color: #582707;" class="dt">Acme</h4>
                <h4 style="color: #f26922;" class="dt">Stickers</h4>
            </a>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link"style="color: #582707;" href="#">Stickers</a></li> 
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Tutorials</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">jQuery</a></li>
                            <li><a href="#">jQuery UI</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Bootstrap</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Forms</a></li>
                                    <li><a href="#">Carousel</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Carousel Types</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Multi-item</a></li>
                                            <li><a href="#">Product Carousel</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Tables</a></li>
                                </ul>
                            </li>
                            <li><a href="#">JavaScript</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex:0.5;">
                <ul class="navbar-nav mr-auto">
                    <li><i class="nav-link fas fa-shopping-cart" style="color: #582707;"></i></li>
                    <?php
                        if(!isset($_SESSION['Fullname']))  //no esta autenticado
                        {
                        ?>
                            <li><a class="nav-link  pl-4" style="padding-right: 1.0rem; color: #582707;" href="/login.php">Log in</a></li>
                            <li><a class=" nav-link  pl-4" style="padding-right: 1.0rem; color: #582707;" href="/signup.php">Sign up</a></li>
                        <?php
                        }else   //si esta autenticado
                        {
                                echo "<li> <a class='nav-link text-muted pl-4' style='padding-right: 1.0rem;'>" . $_SESSION['Fullname'] . "</a> </li>
                                      <li> <a class='nav-link pl-4' style='padding-right: 1.0rem;' href='logout.php'>Log out</a></li>";                        
                        }
                    ?>
                    
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Tutorials</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">jQuery</a></li>
                            <li><a href="#">jQuery UI</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Bootstrap</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Forms</a></li>
                                    <li><a href="#">Carousel</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Carousel Types</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Multi-item</a></li>
                                            <li><a href="#">Product Carousel</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Tables</a></li>
                                </ul>
                            </li>
                            <li><a href="#">JavaScript</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <!--<div class="attr-nav">
                    <ul class="navbar-nav mr-auto">
                        <i class="fas fa-shopping-cart fa-sm collapse navbar-collapse"></i>
                        <li><a class="text-muted pl-4" href="#">Log in</a></li>
                        <li><a class="text-muted pl-4" href="/signup.html">Sign up</a></li>
                    </ul>
            </div> -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="text-muted fas fa-shopping-cart"></i>
                </button>
            </div>
        </div>   
    </nav>
    <main>
        <div id="cartContainer" class="container cart">
            <section class="section-row">
                <div id="cart-app" class="wrapper">
                    <div>
                        <ul class="promotion-notifications"></ul>
                        <h1>Cart</h1>
                        <form action="#" class="clear">
                            <div class="content-main">
                                <div id="line-items" role="grid">
                                    <div class="line-items-columns grid vert-center collapse-left">
                                        <div class="col-8" id="label_description" role="columnheader">Description</div>
                                        <div class="col-md-10 grid vert-center">
                                            <div class="col-2 only-md-up"></div>
                                            <div class="col-6 " id="label_quantity" role="columnheader">Quantity</div>
                                            <div class="col-4 " id="label_total" role="columnheader">Total</div>
                                        </div>
                                    </div>
                                    <!--<div>
                                        <div class="line-item grid vert-center collapse-left">
                                            <div class="preview col-4 col-md-2 grid vert-center collapse-left">
                                                <div class="thumbnail col-11 col-md-12">
                                                    <span class="image-zoom-target">
                                                        <img alt="Die cut stickers" src="https://res.cloudinary.com/print-bear/image/fetch/c_lfill,f_auto,fl_lossy,q_auto:best,w_300/https://artisan-production.s3.amazonaws.com/artworks/8ebaccfc-d7e9-4d3a-b5e1-221e28fffcfe/1604640896872-113607_fef7f672219f4f5bb7bf575f7e4076e4.png%3FAWSAccessKeyId%3DAKIAZEOLM73RQOWFHDPM%26Expires%3D1604644498%26Signature%3Dd4sySf5WeQINTvOtIcgL9CGWkJY%253D" 
                                                            srcset="https://res.cloudinary.com/print-bear/image/fetch/c_lfill,f_auto,fl_lossy,q_auto:best,w_600/https://artisan-production.s3.amazonaws.com/artworks/8ebaccfc-d7e9-4d3a-b5e1-221e28fffcfe/1604640896872-113607_fef7f672219f4f5bb7bf575f7e4076e4.png%3FAWSAccessKeyId%3DAKIAZEOLM73RQOWFHDPM%26Expires%3D1604644498%26Signature%3Dd4sySf5WeQINTvOtIcgL9CGWkJY%253D 2x">
                                                    </span>
                                                    <div class="image-zoom align-left">
                                                        <img alt="Die cut stickers" src="https://res.cloudinary.com/print-bear/image/fetch/c_lfill,f_auto,fl_lossy,q_auto:best,w_300/https://artisan-production.s3.amazonaws.com/artworks/8ebaccfc-d7e9-4d3a-b5e1-221e28fffcfe/1604640896872-113607_fef7f672219f4f5bb7bf575f7e4076e4.png%3FAWSAccessKeyId%3DAKIAZEOLM73RQOWFHDPM%26Expires%3D1604644498%26Signature%3Dd4sySf5WeQINTvOtIcgL9CGWkJY%253D" 
                                                        srcset="https://res.cloudinary.com/print-bear/image/fetch/c_lfill,f_auto,fl_lossy,q_auto:best,w_600/https://artisan-production.s3.amazonaws.com/artworks/8ebaccfc-d7e9-4d3a-b5e1-221e28fffcfe/1604640896872-113607_fef7f672219f4f5bb7bf575f7e4076e4.png%3FAWSAccessKeyId%3DAKIAZEOLM73RQOWFHDPM%26Expires%3D1604644498%26Signature%3Dd4sySf5WeQINTvOtIcgL9CGWkJY%253D 2x">
                                                        <span class="image-zoom-close">
                                                            <i class="icon fa fa-cancel-circled "></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info col-8 col-md-10 grid vert-center">
                                                <div aria-labelledby="label_description" class="col-12 col-md-6" id="item_3e40d610-b0a3-4165-b11b-03bf64137ef5_description">
                                                    <div class="description">
                                                        <div class="title">
                                                            <a class="link" href="/products/die-cut-stickers">Die cut stickers</a>
                                                        </div>
                                                        <div class="dimensions">2" x 2"</div>
                                                        <div class="artwork">113607_fef7f672219f4f5bb7bf575f7e4076e4.png</div>
                                                    </div>
                                                </div>
                                                <input name="id" type="hidden" value="3e40d610-b0a3-4165-b11b-03bf64137ef5">
                                                <div class="inputWrapper quantity col-7 col-md-3"><div>
                                                    <div aria-live="assertive" role="alert"></div>
                                                    <input aria-controls="item_3e40d610-b0a3-4165-b11b-03bf64137ef5_price" aria-invalid="false" aria-label="Quantity" aria-labelledby="label_quantity" autocomplete="off" class="quantity custom" id="order_line_items_attributes_3e40d610-b0a3-4165-b11b-03bf64137ef5_quantity" max="200000" min="0" name="quantity" step="10" type="number" value="50"></div>
                                                </div>
                                                <div aria-labelledby="label_total" aria-live="polite" class="total col-4 col-md-2">
                                                    <span id="item_3e40d610-b0a3-4165-b11b-03bf64137ef5_price">$57</span>
                                                </div>
                                                <div class="actions col-1">
                                                    <button aria-label="remove this item from the cart" class="plain remove-item" type="button">
                                                        <i class="fa fa-cancel-circled"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div>

                                    </div>
                                </div>
                                <div class="callout only-sm-up">
                                    <h4>Add more items to your cart and save</h4>
                                    <p>We provide a discount for ordering multiple items at the same time. The more you order, the more you save.</p>
                                    <p class="mb-0">Use our <a href="/quick-order">quick order</a> feature to easily order more items.</p>
                                </div>
                            </div>
                            <div class="content-side sticky-wrapper">
                                <div class="sticky">
                                    <div class="items_summary">
                                        <h2 class="total">Subtotal: <span id="subtotal_price">$</span></h2>
                                        <p><button class="button large primary block" id="checkout-button" type="submit">Checkout  &nbsp;<i class="fa fa-lock"></i></button></p>
                                        <p id="continue-shopping">or <a class="link" href="/custom-stickers">continue shopping</a></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--<div id="cart-empty" style="display: none;">
                    <div class="header wrapper center-text">
                        <h1>Your cart is empty</h1>
                        <p class="subtitle">You may want to add <a href="/custom-stickers">custom stickers</a> or try a <a href="/samples">sample pack</a>.</p>
                    </div>
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/bootsnav/bootsnav.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

