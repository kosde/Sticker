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
     include "../css_ext.php";
    ?>
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
    $("#formUp").on('submit',(function(e){
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
            alert("success");
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
        <section>
            <div class="container">
                <div style="padding: 30px 0 100px 0;">
                    <h2 class=" articleContent " style="padding-left: 40px;" >
                        Email us 
                    </h2>
                    <form id="formUp" action="contact_us_email.php" method="post" class="content-left" enctype="multipart/form-data" style="padding: 0 100px 0 40px;">
                        <div data-testid="Dropzone" class="  dropzone">
                            <div class="  children">
                                <div class="  field">
                                    <div class="  above">
                                        <div class="  labels">
                                            <span class="fontlight" style="display: inline-block;">
                                                <label for="orderNumber" class="labelfiel font-light" style="font-weight: bold;">Name</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                        </div>
                                    </div>
                                    <div class="  input">
                                        <div class="  tooltipWrapper">
                                            <input class="fill_content  input" id="orderNumber" name="name" required="" type="text" style="border: 1px solid #c8c8c8;height: 35px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="  field">
                                    <div class="  above">
                                        <div class="  labels">
                                            <span class="fontlight" style="display: inline-block;">
                                                <label for="orderNumber" class="labelfiel font-light" style="font-weight: bold;">Email</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                        </div>
                                    </div>
                                    <div class="  input">
                                        <div class="  tooltipWrapper">
                                            <input class="fill_content  input" id="orderNumber" name="email" required="" type="text" style="border: 1px solid #c8c8c8;height: 35px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="  field">
                                    <div class="  above">
                                        <div class="  labels">
                                            <span class="fontlight" style="display: inline-block;">
                                                <label for="orderNumber" class="labelfiel font-light" style="font-weight: bold;">Subject</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                        </div>
                                    </div>
                                    <div class="  input">
                                        <div class="  tooltipWrapper">
                                            <input class="fill_content  input" id="orderNumber" name="subject" required="" type="text" style="border: 1px solid #c8c8c8;height: 35px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="  field">
                                    <div class="  above">
                                        <div class="  labels">
                                            <span class="  label" style="display: inline-block;">
                                                <label for="message" class="labelfiel font-light" style="font-weight: bold;">Message</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                        </div>
                                    </div>
                                    <div class="  input">
                                        <div class="  tooltipWrapper">
                                            <textarea   style="border: 1px solid #c8c8c8;font-family: 'Gotham-Light';" name="message" required="" rows="5" id="message" class="fill_content fontlight input"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div style="padding-bottom: 10px;">
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
                                                    <label class="input-group-btn" style="padding-right: 20px;padding-bottom: 0px;">
                                                        <input type="hidden" name="size" value="1000000" class="fontlight">
                                                        <span class="btn btn-primary btn-file">
                                                            Choose file <input accept="image/*" class="inputfile" type="file" multiple="multiple"
                                                            name="attachment[]" id="Imagen" onchange="document.getElementById('file-name').value = this.files[0].name">
                                                        </span>
                                                    </label>
                                                    <input class="form-control-file-choose" placeholder=" No file chosen" name="file-name" id="file-name" style="display: inline-block;
                                                            position: inherit;
                                                            font-family: 'Gotham-Light';height: 38px;border: 1px solid #c8c8c8;">
                                                    <!--<input type="file" name="attachment[]" class="demoInputBox" multiple="multiple">-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="center-block" id="button_upload">
                                    <button name="submit" type="submit" style="width: 100% !important;padding: 10px 30px;" class="button wide secondary">Send message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                                if(isset($_POST['submit'])){
                                    $name=$_POST['name'];
                                    echo $name;
                                   /* echo'
                                        <script>
                                            window.location = "../account/order.php?order='.$id_order.'";
                                        </script>
                                        ';    */                           
                                    exit;
                                    
                                }
                            ?>
                </div>
            </div>
        </section>
    </main>
<?php include "footer.php"; ?>  
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../js/bootsnav/bootsnav.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>

