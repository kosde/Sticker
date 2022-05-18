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
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <meta name="google-signin-client_id" content="616721949868-7bm0boihng0p9cstchmk00s7u85uuqvm.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <script src="https://apis.google.com/js/api:client.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="css/strengthify.css">
    <script src="js/jquery.strengthify.js"></script>
    <style type="text/css">
	.strengthify-wrapper {
        display: inline-block;
        width: 100%;
	}.strengthify-bg{
        opacity: 1;
    }
    .strongpass{
        padding-top: 20px;
        font-family: 'Gotham-Light';
    }
	</style>
</head>
<body class="back1">
<?php include "nav.php"; ?>
    <div class="main">
        <div class="login-form">
            <form action="php/new_password_update.php?email=<?php echo $_GET["email"];?>" method="post">	
                <div class="title_cut" >
                    <h1 style="font-size: 1.8rem !important;">Enter a new password</h1>
                </div>
                <div class="form-group">
                   
                    <div class="input-group  password-group">
                        <label class="float-left form-check-label" for="p1">Password</label>
                        <input type="password" class="password-field form-control" name="password" placeholder="Password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                        id="p1" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                        <!--<p style="font-family: 'Gotham-Light';">Password strength</p>-->
                    </div>
                </div>        
                <div>
                    <p style="color: gray;font-family: 'Gotham-Light';">A strong password has more than 8 characters, containing uppercase and lowercase letters as well as symbols. Never reuse old passwords as this may compromise your account</p>
                </div>      
                <div class="form-group">
                    <button style="width: 100%;" type="submit" class="button primary large pr-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
		$('.password-field').strengthify({
			zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js'
		})
		$('.password-field-all').strengthify({
			zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
			drawTitles: true,
			drawMessage: true
		})
		$('.password-field-minus-titles').strengthify({
			zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
			drawTitles: false,
			drawMessage: true
		})
		$('.password-field-minus-message').strengthify({
			zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
			drawTitles: true,
			drawMessage: false
		})
		$('.password-field-minus-bars').strengthify({
			zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
			drawTitles: true,
			drawMessage: true,
			drawBars: false
		})
		$('.password-field-only-message').strengthify({
			zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
			drawTitles: false,
			drawMessage: true,
			drawBars: false
		})
		$('.password-field-only-title').strengthify({
			zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
			drawTitles: true,
			drawMessage: false,
			drawBars: false
		})
		$('.password-field-title-without-tooltip').strengthify({
			zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
			tilesOptions:{
				tooltip: false,
				element: true
			},
			drawTitles: true,
			drawMessage: false,
			drawBars: true
		})
		$('.password-field-title-tooltip-element').strengthify({
			zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
			tilesOptions:{
				tooltip: true,
				element: true
			},
			drawTitles: true,
			drawMessage: false,
			drawBars: false
		})


	</script>
     <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var h = document.getElementById("p1").insertAdjacentHTML("afterend", "<p class='strongpass'>Password strength</p>"); 
            });
    </script>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

