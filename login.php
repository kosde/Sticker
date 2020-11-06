<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticker Mule | Custom stickers that kick ass</title> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
</head>
<body style="background-color: #f97805;">
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
    <div class="main">
        <div class="login-form">
            <form action="php/login.php" method="post">	
                <div class="text-center social-btn">
                    <a  class="btn btn-primary btn-block">
                    <div class="googlecuadro">
                    <svg height="20" class="icongoogle" version="1" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.9 10c0-.7-.1-1.3-.2-1.9h-8.6v3.6H15c-.2 1.1-.8 2.1-1.8 2.8v2.3h3c1.7-1.6 2.7-4 2.7-6.8z" fill="#547DBE"></path>
                        <path d="M10.1 19c2.5 0 4.6-.8 6.1-2.2l-3-2.3c-.8.6-1.9.9-3.1.9-2.4 0-4.5-1.7-5.2-3.9l-3 .1V14c1.5 2.9 4.6 5 8.2 5z" fill="#34A751"></path>
                        <path d="M4.9 11.5c-.1-.5-.2-1.1-.2-1.7s.1-1.2.2-1.7V5.7l-3 .1c-.6 1.2-1 2.5-1 4s.4 3 1 4.2l3-2.5z" fill="#F8BB15"></path>
                        <path d="M10.1 4.3c1.3 0 2.6.5 3.5 1.4l2.6-2.6C14.6 1.6 12.5.7 10.1.7 6.5.7 3.4 2.8 1.9 5.8l3 2.3c.8-2.2 2.8-3.8 5.2-3.8z" fill="#E94435"></path>
                    </svg></div>         Log in with Google</a>
                </div>
                <script>
                <div class="or-seperator"><i>or</i></div>
                <div class="form-group">
                </div>
                <div class="form-group">
                    <label class="float-left form-check-label">Email</label>
                    <div class="input-group">
                        
                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                </div>    
                <div class="form-group">
                    <label class="float-left form-check-label">Password</label>
                    <div class="input-group">
                        
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                </div>        
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block login-btn">Log in</button>
                </div>
                <div class="text-center">
                    <label class="">Or </label>
                    <a href="#" class="text-success">log in</a>
                </div>  
            </form>
        </div>
    </div>
   
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

