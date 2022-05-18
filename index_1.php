<?php
session_start();
if(!isset($_SESSION['Leng']))
{
$_SESSION['Leng']="<i class='flagstrap-icon flagstrap-us' style='margin-right: 10px;'></i> English";
$_SESSION['LengCod']="EN";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="text/html, charset=utf-8" http-equiv="Content-Type">
    
    <?php
     include "css.php";
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KE9CHPEGEP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-KE9CHPEGEP');
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-199557863-1"></script> 
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <style>
        .active
        {
            border-bottom:0px;
            border-bottom-color: transparent;
            padding:0px;
            transition: none;
            display: inline-block;
            background-color: transparent;
            margin-right: 0px;
        }
        .sizeimg{
            width: auto !important;
            height: 100%;
            margin: auto;
        }
        .carousel-item{
            width: 100%;
            height: 290px; 
        }
        .carousel{position:relative}
        .carousel-inner{position:relative;width:100%;overflow:hidden}
        .carousel-item{position:relative;display:none;-ms-flex-align:center;align-items:center;width:100%;-webkit-backface-visibility:hidden;backface-visibility:hidden;-webkit-perspective:1000px;perspective:1000px}
        .carousel-item-next,.carousel-item-prev,.carousel-item.active{display:block;transition:-webkit-transform .6s ease;transition:transform .6s ease;transition:transform .6s ease,-webkit-transform .6s ease}
        @media screen and (prefers-reduced-motion:reduce){.carousel-item-next,.carousel-item-prev,.carousel-item.active{transition:none}
        }
        .carousel-item-next,.carousel-item-prev{position:absolute;top:0}
        .carousel-item-next.carousel-item-left,.carousel-item-prev.carousel-item-right{-webkit-transform:translateX(0);transform:translateX(0)}
        @supports ((-webkit-transform-style:preserve-3d) or (transform-style:preserve-3d)){.carousel-item-next.carousel-item-left,.carousel-item-prev.carousel-item-right{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}
        }
        .active.carousel-item-right,.carousel-item-next{-webkit-transform:translateX(100%);transform:translateX(100%)}
        @supports ((-webkit-transform-style:preserve-3d) or (transform-style:preserve-3d)){.active.carousel-item-right,.carousel-item-next{-webkit-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0)}
        }
        .active.carousel-item-left,.carousel-item-prev{-webkit-transform:translateX(-100%);transform:translateX(-100%)}
        @supports ((-webkit-transform-style:preserve-3d) or (transform-style:preserve-3d)){.active.carousel-item-left,.carousel-item-prev{-webkit-transform:translate3d(-100%,0,0);transform:translate3d(-100%,0,0)}
        }
        .carousel-fade .carousel-item{opacity:0;transition-duration:.6s;transition-property:opacity}
        .carousel-fade .carousel-item-next.carousel-item-left,.carousel-fade .carousel-item-prev.carousel-item-right,.carousel-fade .carousel-item.active{opacity:1}
        .carousel-fade .active.carousel-item-left,.carousel-fade .active.carousel-item-right{opacity:0}
        .carousel-fade .active.carousel-item-left,.carousel-fade .active.carousel-item-prev,.carousel-fade .carousel-item-next,.carousel-fade .carousel-item-prev,.carousel-fade .carousel-item.active{-webkit-transform:translateX(0);transform:translateX(0)}
        @supports ((-webkit-transform-style:preserve-3d) or (transform-style:preserve-3d)){.carousel-fade .active.carousel-item-left,.carousel-fade .active.carousel-item-prev,.carousel-fade .carousel-item-next,.carousel-fade .carousel-item-prev,.carousel-fade .carousel-item.active{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}
        }
        .carousel-control-next,.carousel-control-prev{position:absolute;top:0;bottom:0;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-pack:center;justify-content:center;width:15%;color:#fff;text-align:center;opacity:.5}
        .carousel-control-next:focus,.carousel-control-next:hover,.carousel-control-prev:focus,.carousel-control-prev:hover{color:#fff;text-decoration:none;outline:0;opacity:.9}
        .carousel-control-prev{left:0}
        .carousel-control-next{right:0}
        .carousel-control-next-icon,.carousel-control-prev-icon{display:inline-block;width:20px;height:20px;background:transparent no-repeat center center;background-size:100% 100%}
        .carousel-control-prev-icon{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E")}
        .carousel-control-next-icon{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E")}
        .carousel-indicators{position:absolute;right:0;bottom:10px;left:0;z-index:15;display:-ms-flexbox;display:flex;-ms-flex-pack:center;justify-content:center;padding-left:0;margin-right:15%;margin-left:15%;list-style:none}
        .carousel-indicators li{position:relative;-ms-flex:0 1 auto;flex:0 1 auto;width:30px;height:3px;margin-right:3px;margin-left:3px;text-indent:-999px;cursor:pointer;background-color:rgba(255,255,255,.5)}
        .carousel-indicators li::before{position:absolute;top:-10px;left:0;display:inline-block;width:100%;height:10px;content:""}
        .carousel-indicators li::after{position:absolute;bottom:-10px;left:0;display:inline-block;width:100%;height:10px;content:""}
        .carousel-indicators .active{background-color:#fff}
        .carousel-caption{position:absolute;right:15%;bottom:20px;left:15%;z-index:10;padding-top:20px;padding-bottom:20px;color:#fff;text-align:center}
        @media (max-width:790px)
        {
            .layersimg
            {
            padding: 0px !important;
            }
        }
        @media (max-width:600px)
        {
            .col-sm-4{
            padding: 30px 0px;
            }
        }
        .col-xl-12{
            padding: 0px 0px 50px 0px;
        }   
        .layers{
            width: 100% !important;
        }
    </style>
</head>
<body>
<?php include "nav.php"; ?>  
    <main>
        <section class="first mainimage" style="background-image: url('/assets/mainimage.webp');">
            <div class="container move" style="display:table">
                <div style="display: table-cell;vertical-align: middle;">
                    <div class="slogan">
                        <h1 class="slogantxt" translate="yes">CUSTOM STICKERS DELIVERED TO YOUR DOOR</h1>
                    </div>
                    <div class="sub">
                        <p class="regular2 font-light" translate="yes">EASY ONLINE ORDERING, 4 DAY TURNAROUND AND FREE ONLINE PROOFS. FREE SHIPPING.</p>
                    </div>
                    <div class="buttons-2 buttons">
                        <a class="button secondary large" href="custom-stickers.php" style="margin-bottom: 10px;"><div class="content">Order now</div></a>
                        <a class="button primary large pr-4" href="samples.php" style="margin-bottom: 10px;"><div class="content">Samples</div></a>
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
                    <strong class="videoTitle" style="text-align: left;color:#f86624;">ACME STICKERS OFFERS... <br>• FREE ONLINE PROOFS. <br>• FREE SHIPPING.<br>• FAST TURNAROUND.</strong>
                    <p class="VideoText font-light" style="font-size: .9rem;padding-top: 20px;" >ACME STICKERS is the fastest and easiest way to buy custom printed products. 
                        Order in seconds and we'll turn your designs and illustrations into custom stickers in days. 
                        We offer free online proofs and super fast turnaround.
                    </p>
                </div>
            </div>
        </section>
        <section class="container_made" style="height: 100% !important;">
            <div class="container" style="padding-top: 100px;">
            <h2 class="videoTitle" style="text-align: center;color:#f86624;padding-bottom: 100px;">WHAT OUR STICKERS ARE MADE OFF</h2>
                <div class="col-xl-12 col-sm-12 row" style="margin: auto;">
                    <div class="col-xl-7 col-sm-12" style="padding: 0;">
                        <img src="assets/made/layers.webp" alt="layers" class="layers" >
                    </div>
                    <div class="col-xl-5 col-sm-12">
                        <div class="row">
                            <div class="col-xl-3 col-md-4 col-sm-4 " style="text-align: center;margin: auto;">
                                <img src="assets/made/laminata.webp" alt="laminata"  style="width: 100%;" class="layersimg layers">
                            </div>
                            <div class="col-xl-9" style="margin:auto;">
                                <h6 style="text-align: left;color:#f86624;">DOUBLE LAYER  LAMINATE</h6>
                                
                                <p class="VideoText font-light" style="font-size: .9rem;">Every sticker we produce comes with two layers of  matte UV protectant laminate. This  laminates protect your stickers against fading, cracking or peeling. This layers are also scratch resistant.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-4 col-sm-4 " style="text-align: center;margin: auto;">
                                <img src="assets/made/ink.webp" alt="ink" style="width: 100%;" class="layersimg layers">
                            </div>
                            <div class="col-xl-9" style="margin:auto;">
                                <h6 style="text-align: left;color:#f86624;">INK LAYER</h6>
                                
                                <p class="VideoText font-light" style="font-size: .9rem;">We use Eco friendly environmentally safe latex inks.  Our inks are Green Guard Certified which also produce rich vibrant colors.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-3 col-md-4 col-sm-4 " style="text-align: center;margin: auto;">
                                <img src="assets/made/vinyl.webp" alt="adhesive"  style="width: 100%;" class="layersimg layers">
                            </div>
                            <div class="col-xl-9" style="margin:auto;">
                                <h6 style="text-align: left;color:#f86624;">PRINTABLE VINYL</h6>
                                
                                <p class="VideoText font-light" style="font-size: .9rem;">The 5 year durability of our pure white premium vinyl keeps your stickers looking sharp for years. Our vinyl can be stretched slightly, this helps adhere to curves and odd places.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-3 col-md-4 col-sm-4 " style="text-align: center;margin: auto;">
                                <img src="assets/made/adhesive.webp" alt="adhesive"  style="width: 100%;" class="layersimg layers">
                            </div>
                            <div class="col-xl-9" style="margin:auto;">
                                <h6 style="text-align: left;color:#f86624;">WATERPROOF ADHESIVE</h6>
                                
                                <p class="VideoText font-light" style="font-size: .9rem;">Your sticker won’t come off in the rain, snow or the side of a boat! They are dishwasher safe and will last a long time. </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-4 col-sm-4 " style="text-align: center;margin: auto;">
                                <img src="assets/made/removable.webp" alt="removable" style="width: 100%;" class="layersimg layers">
                            </div>
                            <div class="col-xl-9" style="margin:auto;">
                                <h6 style="text-align: left;color:#f86624;">REMOVABLE BACKING PAPER</h6>
                                
                                <p class="VideoText font-light" style="font-size: .9rem;">Easy to peel silicon coated backing paper protects the adhesive side until you’re ready to slap that sticker on your laptop, yeti cup, or anything else your heart desires.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container_video" style="height: 100% !important;padding-bottom: 40px;">
           <img src="assets/Logos.png" alt="bottom" style="width: 100%;">
        </section>
    </main>

<?php include "footer.php"; ?>     
</body>
</html>