<?php
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
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="text-muted fa fa-bars"></i>
                </button>
            </div>
            <a href="index.php" class="navbar-brand d-flex" style="padding-top: 5px;">
                <img src="/assets/Logo_2.png" width="30" height="25">
                <h4 style="color: #582707;" class="dt">Acme</h4>
                <h4 style="color: #f26922;" class="dt">Stickers</h4>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link"style="color: #582707;" href="custom-stickers.php">Stickers</a></li> 
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex:0.5;">
                <ul class="navbar-nav mr-auto">
                    <li><a href="/cart.php"><i  class="nav-link fas fa-shopping-cart" style="color: #582707;"></i></a></li>
                    <!--<li class="nav-item dropdown">
                        <div class="AccountLinks">
                            <div class="wrapper">
                            <a class="nav-link dropdown-toggle toggle HeaderNavItem" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <img alt="" data-testid="AccountMenuAvatar" src="" srcset="" class="avatar small">
                            </a>
                            <div class="dropdown-menu flyout" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item userItem account" href="#">
                                        <span class="userAvatar">
                                            <img alt="" data-testid="MenuAvatar" src="" srcset="" class="avatarB medium">
                                        </span>
                                        <span class="userDetails">
                                            <p class="itemText">
                                                <strong id="username"></strong>
                                            </p>
                                            <p class="itemText userEmail" id=useremail></p>
                                            <p class="itemText highlight">Account</p>
                                        </span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                        <a href="/account/orders" class="dropdown-item">
                                            <span class="">Orders</span>
                                        </a>
                                        <a href="/account/reorder" class="dropdown-item">
                                            <span class="">Reorder</span>
                                        </a>
                                        <a href="/account/invite" class="dropdown-item">
                                            <span class="">Get $10 credit</span>
                                        </a>
                                        <a href="/logout" class="dropdown-item">
                                            <span class="">Log out</span>
                                        </a>
                                </div>
                            </div>
                        </div>
                    </li>-->
                    <?php
                        if(!isset($_SESSION['id']))
                        {
                        ?>
                            <li><a class="nav-link  pl-4" style="padding-right: 1.0rem; color: #582707;" href="/login.php">Log in</a></li>
                            <li><a class=" nav-link  pl-4" style="padding-right: 1.0rem; color: #582707;" href="/signup.php">Sign up</a></li>
                        <?php
                        }else
                        {
                            /*
                            <li> <a class='nav-link text-muted pl-4' style='padding-right: 1.0rem;'>" . $_SESSION['Fullname'] . "</a> </li>
                                      <li> <a class='nav-link pl-4' style='padding-right: 1.0rem;' href='logout.php'>Log out</a></li>" 
                            */ 
                                echo "<li class='nav-item dropdown'>
                                        <div class='AccountLinks'>
                                            <div class='wrapper' style='padding:0px;' >
                                            <a class='nav-link dropdown-toggle toggle HeaderNavItem' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> 
                                                <img alt='' data-testid='AccountMenuAvatar' src='". $_SESSION['image'] ."' srcset='' class='avatar small'>
                                            </a>
                                            <div class='dropdown-menu flyout' aria-labelledby='navbarDropdown'>
                                                <a class='dropdown-item userItem account' href='#'>
                                                    <span class='userAvatar'>
                                                        <img alt='' data-testid='MenuAvatar' src='". $_SESSION['image'] ."' srcset='' class='avatarB medium'>
                                                    </span>
                                                    <span class='userDetails'>
                                                        <p class='itemText'>
                                                            <strong id='username'>". $_SESSION['name'] ."</strong>
                                                        </p>
                                                        <p class='itemText userEmail' id=useremail>". $_SESSION['email'] ."</p>
                                                        <p class='itemText highlight'>Account</p>
                                                    </span>
                                                </a>
                                                <div class='dropdown-divider'></div>
                                                    <a href='/account/orders' class='dropdown-item'>
                                                        <span class=''>Orders</span>
                                                    </a>
                                                    <a href='/account/reorder' class='dropdown-item'>
                                                        <span class=''>Reorder</span>
                                                    </a>
                                                    <a href='/account/invite' class='dropdown-item'>
                                                        <span class=''>Get $10 credit</span>
                                                    </a>
                                                    <a href='/logout' class='dropdown-item'>
                                                        <span class=''>Log out</span>
                                                    </a>;
                                                </div>
                                            </div>
                                        </div>
                                    </li>     ";              
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
        <section class="first">
            <div class="mainimage container">
                <div class="wrapper">
                    <div class="slogan">
                        <h1 class="slogantxt">Custom Stickers Delivered to your Doorsteps</h1>
                    </div>
                    <div class="sub">
                        <p class="regular2">Easy online ordering, 4 day turnaround and free online proofs. Free shipping.</p>
                    </div>
                    <div class="buttons-2 buttons">
                        <a class="button secondary large" href="custom-stickers.php"><div class="content">Order now</div></a>
                        <a class="button primary large pr-4" href="samples.php"><div class="content">Samples</div></a>
                    </div>
                </div>
                
            </div>
        </section>
        <section class="products">
            <div class="container">
                <div class="wrapper">
                    <div class="grid3">
                        <div class="wrapperproducts">
                            <a href="/custom-stickers.php">
                            <div class="image">
                                <img src="/assets/Die cut stickers.png" srcset="" width="200">
                            </div>
                                <p class="regular">DIE CUT STICKERS</p>
                            </a>
                        </div>
                        <div class="wrapperproducts">
                            <a href="/custom-stickers.php">
                            <div class="image">
                                <img src="/assets/Circle stickers.png" srcset="" width="200">
                            </div>
                                <p class="regular">CIRCLE STICKERS</p>
                            </a>
                        </div>
                        <div class="wrapperproducts">
                            <a href="/custom-stickers.php">
                            <div class="image">
                                <img src="/assets/Rectangle stickers.png" srcset="" width="200">
                            </div>
                                <p class="regular">RECTANGLE STICKERS</p>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <section class="container_video">
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
               <p class="VideoText">Sticker Mule is the fastest and easiest way to buy custom 
                    printed products. Order in 60 seconds and we'll turn your designs and illustrations into custom stickers, 
                    magnets, buttons, labels and packaging in days. We offer free online proofs, free worldwide shipping and super fast turnaround.
                </p>
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/bootsnav/bootsnav.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

