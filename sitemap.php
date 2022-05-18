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
    <main class="  siteMap container" style="padding-left: 60px;height: 1000px;">
        <section class=" " style="padding-top: 30px;border-bottom: 1px solid rgba(0,0,0,0.1);">
            <div class="  sectionHeader" style="margin-bottom: 45px;margin-top: 40px;">
                <h1 style="font-size: 3.4rem;">Site map</h1>
            </div>
        </section>
        <section class=" ">
            <div class="sectionHeader" style="margin-bottom: 45px;margin-top: 40px;">
                <h2 style="font-size: 1.6rem;">Products</h2>
            </div>
            <div class="grid2" style="margin: 0;">
                <div class="linksSubSection">
                    <div class="linksGroup">
                        <h3 style="font-size: 1.4rem;">Stickers</h3>
                        <ul class="help_left">
                            <li>
                                <a class="font-light link  " href="/custom-stickers.php">All stickers</a>
                            </li>
                            <li>
                                <a class="font-light link  " href="/die-cut-stickers.php">Die cut stickers</a>
                            </li>
                            <li>
                                <a class="font-light link  " href="/circle-stickers.php">Circle stickers</a>
                            </li>
                            <li>
                                <a class="font-light link  " href="/rectangle-stickers.php">Rectangle stickers</a>
                            </li>
                            <li>
                                <a class="font-light link  " href="/square-stickers.php">Square stickers</a>
                            </li>
                            <li>
                                <a class="font-light link  " href="/oval-stickers.php">Oval stickers</a>
                            </li>
                            <li>
                                <a class="font-light link  " href="/bumper-stickers.php">Bumper stickers</a>
                            </li>
                            <li>
                                <a class="font-light link  " href="/stickers-sheets.php"">Sticker sheets</a>
                            </li>
                            <li>
                                <a class="font-light link  " href="/kiss-cut-stickers.php">Kiss cut stickers</a>
                            </li>
                            <li>
                                <a class="font-light link  " href="/rounded-corner-stickers.php">Rounded corner stickers</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="linksSubSection ">
                    <div class="linksGroup">
                        <h3 style="font-size: 1.4rem;">Samples</h3>
                        <ul class="help_left">
                            <li>
                                <a class="font-light link  " href="/samples.php">All samples</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class=" " style="padding-bottom: 200px;">
            <div class="sectionHeader" style="margin-bottom: 45px;margin-top: 40px;">
                <h2 class="  ">Company</h2>
            </div>
            <div class="grid3" style="margin: 0;">
                <div class="linksSubSection">
                    <div class="linksGroup">
                        <h3 style="font-size: 1.4rem;">Info</h3>
                        <ul class="help_left">
                            <li>
                                <a class="font-light link  " href="/legal/privacy.php">Privacy</a>
                            </li>
                            <li>
                                <a class="font-light link  " href="/legal/terms.php">Terms</a>
                            </li>
                        </ul>
                    </div>
                    <div class="linksGroup">
                        <h3 style="font-size: 1.4rem;">Account</h3>
                        <ul class="help_left">
                            <li>
                                <a class="font-light link  " href="/login.php">Log in</a>
                            </li>
                            <li>
                                <a class="font-light link  " href="/signup.php">Sign up</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sectionHeader">
                    <h2 class="  ">Uses</h2>
                        <div class="linksSubSection">
                            <div class="linksGroup">
                                <ul class="help_left">
                                    <li>
                                        <a class="font-light link  " href="/uses.php">All product uses</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <div class="sectionHeader">
                    <h2 class="  ">Support</h2>
                        <div class="linksSubSection">
                            <div class="linksGroup">
                                <ul class="help_left">
                                    <li>
                                        <a class="font-light link  " href="/help/support.php">All topics</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="linksSubSection">
                            <div class="linksGroup">
                                <ul class="help_left">
                                    <li>
                                        <a class="font-light link  " href="/returns.php">Returns</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
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