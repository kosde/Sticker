<?php
session_start();
if(isset($_GET["msg"]))
{
    ?>
    <aside data-testid="Notifications" class="jsx-1917816737 info" style="height: 42px;background: rgb(91, 164, 230) none repeat scroll 0% 0%;
color: white;"><div class="jsx-1917816737 container"><div class="jsx-1917816737 content" style="padding: 1% 0;"><?php echo $_GET["msg"]; ?></div></div></aside>
    <?php
}
if(isset($_GET["msg_error"]))
{
    ?>
    <aside data-testid="Notifications" class="jsx-1917816737 info" style="height: 42px;background: #f87060;
color: white;"><div class="jsx-1917816737 container"><div class="jsx-1917816737 content" style="padding: 1% 0;"><?php echo $_GET["msg_error"]; ?></div></div></aside>
    <?php
}
?>
<nav class="navbar navbar-expand-lg">
        <div class="container">      
            <div class="navbar-header" style="z-index: 9999;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="text-muted fa fa-bars"></i>
                </button>
            </div>
            <a href="../index.php" class="navbar-brand d-flex" style="padding-top: 5px;padding-left: 45px;" translate="no">
                <img src="/assets/Logo_2.png" width="80" height="70" style="position: absolute;z-index: 9999;display: inline-block;transform: translate(-70px,0);-webkit-transform: translate(-70px,0);-o-transform: translate(-70px,0);-moz-transform: translate(-70px,0);">
                <!--<img src="/assets/acme1.png" width="200" height="41">-->
                <h4 style="color: #fff;" class="dt1">Acme</h4>
                <h4 style="color: #f9c80e;" class="dt2">Stickers</h4>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto d-none d-sm-none d-md-block">
                                    <li style="padding-top: 2%;"><a class="nav-link"style="color: #fff;" href="custom-stickers.php" translate="no">Stickers</a></li>
                </ul>
                <ul class="navbar-nav mr-auto d-block d-sm-block d-md-none">
                                    <li style="padding-top: 2%;padding-left: 26px;"><a class="nav-link"style="color: #fff;" href="custom-stickers.php" translate="no">Stickers</a></li>
                    <?php
                    //echo $_SESSION['email'];
                        if(isset($_SESSION['email']))
                        {
                            if($_SESSION['source'] == "google")
                            {
                        ?>
                                    <li style="padding-top: 2%;"><a class="nav-link" href="/account.php"><img alt="" src="<?php echo ($_SESSION['avatar']);?>" width="100" height="100" srcset="" class="avatar small"></a></li>
                        <?php
                            }
                            if(isset($_SESSION['avatar']) && $_SESSION['avatar'] != null && !isset($_SESSION['source']))
                            {
                        ?>
                                    <li style="padding-top: 2%;padding-left: 28px;"><a class="nav-link" href="/account.php"><img alt="" data-testid="AccountMenuAvatar"  src="data:image/png;base64,<?php echo base64_encode($_SESSION['avatar']);?>" srcset="" class="avatar small"></a></li>
                        <?php
                            }
                            if(!isset($_SESSION['avatar']) || $_SESSION['avatar'] == null )
                            {
                        ?>
                                    <li style="padding-top: 2%;padding-left: 28px;"><a class="nav-link" href="/account.php"><img alt="" data-testid="AccountMenuAvatar"  src="/assets/avatar.png" srcset="" class="avatar small"></a></li>
                        <?php
                            }
                            ?>
                                    <li style="padding-top: 2%;padding-left: 26px;"><a class="nav-link" href='/logout.php' translate="no"><span class=''>Log out</span></a></li>
                        <?php
                        }
                    ?>
                </ul>
                <?php
                if(!isset($_SESSION['email']))
                {
                ?>
                <ul class="navbar-nav mr-auto d-block d-sm-block d-md-none">
                     <li style="width: 100px;padding-left: 2px;" >
                        <a class="nav-link  pl-4" style="padding-right: 1.0rem; color: #ff;" href="/login.php" translate="no">Log in</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto d-block d-sm-block d-md-none">
                    <li style="width: 100px;" translate="no">
                        <a class=" nav-link  pl-4" style="padding-right: 0;float: right; color: #ff;display: inline-block;" href="../signup.php" translate="no">
                            <img src="../assets/bomba.png" class="bomb" width="32" height="32" translate="no">Sign up
                        </a>
                    </li>
                </ul>
                <?php
                }
                ?>
            </div>
            <div class="collapse navbar-collapse" style="flex:0.5;">
                <ul class="navbar-nav mr-auto">
                    <li style="padding-top: 2%;"><a href="/cart.php"><img src="/assets/carrito.png" width="32" height="32"></a></li>
                    
                    <?php
                        if(!isset($_SESSION['email']))
                        {
                        ?>
                            <li style="width: 100px;" >
                                <a class="nav-link  pl-4" style="padding-right: 1.0rem; color: #fff;" href="/login.php" translate="no">Log in</a>
                            </li>
                            <li style="width: 130px;padding-left: 12px;">
                                <a class=" nav-link  pl-4" style="padding-right: 1.0rem; color: #fff;display: inline-block;" href="../signup.php" translate="no">
                                    <img src="../assets/bomba.png" class="bomb" width="32" height="32" translate="no">Sign up
                                </a>
                            </li>
                        <?php
                        }else
                        {
                                echo "<li class='nav-item dropdown'>
                                        <div class='AccountLinks'>
                                            <div class='wrapper' style='padding:0px;' >
                                            <a class='nav-link dropdown-toggle toggle HeaderNavItem' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> 
                                            ";
                                            ?>
                                            <?php
                                                if($_SESSION['source'] == "google")
                                                {
                                            ?>
                                                        <img alt=""  src="<?php echo ($_SESSION['avatar']);?>" width="100" height="100" srcset="" class="avatar small">
                                            <?php
                                                }
                                                if(isset($_SESSION['avatar']) && $_SESSION['avatar'] != null && !isset($_SESSION['source']))
                                                {
                                            ?>
                                                        <img alt="" data-testid="AccountMenuAvatar"  src="data:image/png;base64,<?php echo base64_encode($_SESSION['avatar']);?>" srcset="" class="avatar small">
                                            <?php
                                                }
                                                if(!isset($_SESSION['avatar']) || $_SESSION['avatar'] == null )
                                                {
                                            ?>
                                                    <img alt="" data-testid="AccountMenuAvatar"  src="/assets/avatar.png" srcset="" class="avatar small">
                                            <?php
                                                }
                                echo             
                                            "</a>
                                            <div class='dropdown-menu flyout' aria-labelledby='navbarDropdown'>
                                                <a class='dropdown-item userItem account' href='/account.php'>
                                                    <span class='userAvatar'>
                                            ";
                                                    ?>
                                                    <?php
                                                        if($_SESSION['source'] == "google")
                                                        {
                                                    ?>
                                                                <img alt="" data-testid="MenuAvatar"  src="<?php echo ($_SESSION['avatar']);?>" srcset="" class="avatarB medium">
                                                    <?php
                                                        }
                                                        if(isset($_SESSION['avatar']) && $_SESSION['avatar'] != null && !isset($_SESSION['source']))
                                                        {
                                                    ?>
                                                                <img alt="" data-testid="MenuAvatar" src="data:image/png;base64,<?php echo base64_encode($_SESSION['avatar']);?>" srcset="" class="avatarB medium">
                                                    <?php
                                                        }
                                                        if(!isset($_SESSION['avatar']) || $_SESSION['avatar'] == null )
                                                        {
                                                    ?>
                                                                <img alt="" data-testid="AccountMenuAvatar"  src="/assets/avatar.png" srcset="" class="avatarB medium">
                                                    <?php
                                                        }
                                                        
                                echo              
                                                   "</span>
                                                    <span class='userDetails' style='position: absolute;'>
                                                        <p class='itemText'>
                                                            <strong id='username' >";?><?php echo $_SESSION['name'];?> <?php echo"</strong>
                                                        </p>
                                                        <p class='itemText userEmail font-light' id='useremail' >";?><?php echo $_SESSION['email'];?> <?php echo"</p>
                                                        <p class='itemText highlight' ' translate='yes'>Account</p>
                                                    </span>
                                                </a>
                                                <div class='dropdown-divider' ></div>
                                                    <a href='/orders.php' class='dropdown-item'>
                                                        <span class='font-light' translate='yes'>Orders</span>
                                                    </a>
                                                    <a href='/reorder.php' class='dropdown-item'>
                                                        <span class='font-light' translate='yes'>Reorder</span>
                                                    </a>
                                                    <a href='/account/invite' class='dropdown-item' style='display:none;'>
                                                        <span class='' translate='yes'>Get $10 credit</span>
                                                    </a>
                                                    <a href='/logout.php' class='dropdown-item'>
                                                        <span class='font-light' translate='no'>Log out</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>     ";              
                        }
                    ?>
                </ul>
            </div>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <ul class="navbar-nav mr-auto">
                        <li style="padding-top: 2%;padding-left: 14px;"><a href="/cart.php"><img src="/assets/carrito.png" width="32" height="32"></a></li>
                    </ul>
                </button>
            </div>
        </div>   
    </nav>