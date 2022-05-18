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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>
<style>
    #frmEnquiry div {
        margin-bottom: 20px;
    }

    #frmEnquiry div label {
        margin-left: 5px
    }

    .demoInputBox {
        padding: 10px;
        border: #F0F0F0 1px solid;
        border-radius: 4px;
        background-color: #FFF;
        width: 100%;
    }

    .demoInputBox:focus {
        outline:none;
    }

    .error {
        background-color: #FF6600;
        border: #AA4502 1px solid;
        padding: 5px 10px;
        color: #FFFFFF;
        border-radius: 4px;
    }

    .success {
        background-color: #9fd2a1;
        border: #91bf93 1px solid;
        padding: 5px 10px;
        color: #3d503d;
        cursor: pointer;
        font-size: 0.9em;
    }

    .info {
        font-size: .8em;
        color: #FF6600;
        letter-spacing: 2px;
        padding-left: 5px;
    }
    
    .invalid {
        background: #fbf2f2;
        border: #e8e0e0 1px solid;
    }
</style>
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function (e){
    $("#frmEnquiry").on('submit',(function(e){
        e.preventDefault();
        $('#loader-icon').show();
        var valid;	
        valid = validateContact();
        if(valid) {
            $.ajax({
            url: "php/returns.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
            $("#mail-status").html(data);
            $('#loader-icon').hide();
            $("#userName").val('');
            $("#content").val('');
            $("#file-name").val('');
            },
            error: function(){} 	        
            
            });
        }else
        {
            $('#loader-icon').hide();
        }
    }));

    function validateContact() {
        var valid = true;	
        $(".demoInputBox").css('background-color','');
        $(".info").html('');
        $("#userName").removeClass("invalid");
        $("#userEmail").removeClass("invalid");
        $("#subject").removeClass("invalid");
        $("#content").removeClass("invalid");
        
        if(!$("#userName").val()) {
            $("#userName").addClass("invalid");
            $("#userName").attr("title","Required");
            valid = false;
        }
        if(!$("#userEmail").val()) {
            $("#userEmail").addClass("invalid");
            $("#userEmail").attr("title","Required");
            valid = false;
        }
        if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
            $("#userEmail").addClass("invalid");
            $("#userEmail").attr("title","Invalid Email");
            valid = false;
        }
        if(!$("#subject").val()) {
            $("#subject").addClass("invalid");
            $("#subject").attr("title","Required");
            valid = false;
        }
        if(!$("#content").val()) {
            $("#content").addClass("invalid");
            $("#content").attr("title","Required");
            valid = false;
        }
        
        return valid;
    }

    });
</script>
<body>
<?php include "nav.php"; ?>
    <main>
        <section class="first" style="height: 322px;">
                <div class="container"  style="display:table">
                    <div class="wrapper" style="display: table-cell;vertical-align: middle;">
                            <h2 class="slogantxt" style="width: 100%;
                            height: 100%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 3.0rem;">Returns made easy</h2>
                            <p class="regular2 font-light" style="width: 50%;
                            margin: auto;
                            text-align: center !important;
                            font-size: 1.0rem !important;">Have a problem with your order? Send us a photo and we'll address it. Physical returns are not required.</p>
                        
                    </div>
                    
                </div>
        </section>
        <section>
            <div class="container">
                <div style="padding: 100px 20% 0 20%;">
                    <form id="frmEnquiry" action="" method="post" enctype='multipart/form-data'>
                        <div class="">
                            <div class="  labels">
                                <span class="fontlight" style="display: inline-block;">
                                    <label for="orderNumber" class="labelfiel font-light" style="font-weight: bold;">Order number</label>
                                </span>
                                <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                            </div>
                        </div>
                        <div class="  input">
                            <div class="  tooltipWrapper">
                                <div>
                                    <input type="text" name="userName" id="userName"
                                        class="demoInputBox" placeholder="Order number" style="border: 1px solid #c8c8c8;">
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="text" name="userEmail" id="userEmail"
                                class="demoInputBox" placeholder="Email" value="<?php echo $_SESSION['email'] ?>" style="display: none;">
                        </div>
                        <div>
                            <input type="text" name="subject" id="subject"
                                class="demoInputBox" placeholder="Subject" value="Return" style="display: none;">
                        </div>
                        <div class="">
                            <div class="  labels">
                                <span class="  label" style="display: inline-block;">
                                    <label for="message" class="labelfiel font-light" style="font-weight: bold;">Comments</label>
                                </span>
                                <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                            </div>
                        </div>
                        <div class="  input">
                            <div class="  tooltipWrapper">
                                <textarea name="content" id="content" class="demoInputBox"
                                    cols="60" rows="6" placeholder="Let us know about any problems with your order."
                                    style="border: 1px solid #c8c8c8;font-family: 'Gotham-Light';"></textarea>
                            </div>
                        </div>
                        <div>
                            <div class="">
                                <div class="  labels">
                                    <span class="  label" style="display: inline-block;">
                                        <label for="attachment" class="labelfiel font-light" style="font-weight: bold;">File attachment</label>
                                    </span>
                                    <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                </div>
                            </div>
                            <div class="  input">
                                <div class=" ">
                                    <div class="  tooltipWrapper">
                                        <div class="  field">
                                            <label class="input-group-btn" style="padding-right: 20px;">
                                                <input type="hidden" name="size" value="1000000" class="fontlight   ">
                                                <span class="btn btn-primary btn-file">
                                                    Choose photo <input accept="image/*" class="inputfile" type="file" multiple="multiple"
                                                    name="attachment[]" id="Imagen" onchange="document.getElementById('file-name').value = this.files[0].name">
                                                </span>
                                            </label>
                                            <input class="form-control" placeholder="No photo chosen" name="file-name" id="file-name" style="display: inline-block;
                                                    position: inherit;
                                                    font-family: 'Gotham-Light';
                                                    width: 68%;">
                                            <!--<input type="file" name="attachment[]" class="demoInputBox" multiple="multiple">-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width:130px  !important;">
                            <input type="submit" value="Send" style="width: 100% !important;" class="button large wide secondary" />
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <div id="loader-icon" style="display: none;padding: 0 0 20px 45%;">
            <img src="LoaderIcon.gif" />
        </div>
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
