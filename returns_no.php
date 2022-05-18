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
                <div style="padding: 100px 20% 100px 20%;">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div data-testid="Dropzone" class="  dropzone">
                            <div class="  children">
                                <div class="  tooltipWrapper">
                                    <input class="  input"  style="border: 1px solid #c8c8c8;" id="email" name="email" type="hidden" value="<?php echo $_SESSION['email'];?>">
                                </div>
                                <div class="  field">
                                    <div class="  above">
                                        <div class="  labels">
                                            <span class="fontlight" style="display: inline-block;">
                                                <label for="orderNumber" class="labelfiel font-light" style="font-weight: bold;">Order number</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                        </div>
                                    </div>
                                    <div class="  input">
                                        <div class="  tooltipWrapper">
                                            <input class="fill_content  input" id="orderNumber" name="orderNumber" required="" type="text" style="border: 1px solid #c8c8c8;">
                                        </div>
                                    </div>
                                </div>
                                <div class="  field">
                                    <div class="  above">
                                        <div class="  labels">
                                            <span class="  label" style="display: inline-block;">
                                                <label for="message" class="labelfiel font-light" style="font-weight: bold;">Comments</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                        </div>
                                    </div>
                                    <div class="  input">
                                        <div class="  tooltipWrapper">
                                            <textarea   style="border: 1px solid #c8c8c8;font-family: 'Gotham-Light';" name="message" required="" rows="10" id="message" placeholder="Let us know about any problems with your order." class="fill_content fontlight input"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="  field">
                                    <div class="  above" style="padding-bottom: 10px;">
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
                                                            Choose photo <input accept="image/*" class="inputfile" type="file" 
                                                            name="attachment" id="Imagen" onchange="document.getElementById('file-name').value = this.files[0].name">
                                                        </span>
                                                    </label>
                                                    <input class="form-control" placeholder="No photo chosen" name="file-name" id="file-name" style="display: inline-block;
                                                    position: inherit;
                                                    font-family: 'Gotham-Light';
                                                    width: 68%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="center-block" id="button_upload" style="width:130px  !important;">
                                    <input type="submit" name="submit" style="width: 100% !important;"  class="button large wide secondary" value="Send">
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        $postData = $uploadedFile = $statusMsg = '';
                        $msgClass = 'errordiv';
                        if(isset($_POST['submit'])){
                            // Get the submitted form data
                            $postData   = $_POST;
                            $email      = $_POST['email'];//orderNumber
                            $orderNumber= $_POST['orderNumber']; 
                            $subject    = "Return";
                            $message    = $_POST['message'];

                            // Check whether submitted data is not empty
                            if(!empty($email) && !empty($subject) && !empty($message)){
                                
                                // Validate email
                                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                                    $statusMsg = 'Please enter your valid email.';
                                }else{
                                    $uploadStatus = 1;
                                    
                                    // Upload attachment file
                                    if(!empty($_FILES["attachment"]["name"])){
                                        
                                        // File path config
                                        $targetDir = "uploadimages/";
                                        $fileName = basename($_FILES["attachment"]["name"]);
                                        $targetFilePath = $targetDir . $fileName;
                                        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                                        
                                        // Allow certain file formats
                                        $allowTypes = array('jpg', 'png', 'jpeg');
                                        if(in_array($fileType, $allowTypes)){
                                            // Upload file to the server
                                            if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath)){
                                                $uploadedFile = $targetFilePath;
                                            }else{
                                                $uploadStatus = 0;
                                                $statusMsg = "Sorry, there was an error uploading your file.";
                                            }
                                        }else{
                                            $uploadStatus = 0;
                                            $statusMsg = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.';
                                        }
                                    }
                                    
                                    if($uploadStatus == 1){
                                        
                                        // Recipient
                                        $toEmail = 'angel_0_6@live.com.mx';

                                        // Sender
                                        $from = $email;
                                        $fromName = 'CodexWorld';
                                        
                                        // Subject
                                        $emailSubject = 'Contact Request Submitted by ';
                                        
                                        // Message 
                                        $htmlContent = '<h2>Contact Request Submitted</h2>
                                            <p><b>Email:</b> '.$email.'</p>
                                            <p><b>Subject:</b> '.$subject.'</p>
                                            <p><b>Message:</b><br/>'.$message.'</p>';
                                        
                                        // Header for sender info
                                        $headers = "From: $fromName"." <".$from.">";

                                        if(!empty($uploadedFile) && file_exists($uploadedFile)){
                                            
                                            // Boundary 
                                            $semi_rand = md5(time()); 
                                            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
                                            
                                            // Headers for attachment 
                                            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
                                            
                                            // Multipart boundary 
                                            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                                            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 
                                            
                                            // Preparing attachment
                                            if(is_file($uploadedFile)){
                                                $message .= "--{$mime_boundary}\n";
                                                $fp =    @fopen($uploadedFile,"rb");
                                                $data =  @fread($fp,filesize($uploadedFile));
                                                @fclose($fp);
                                                $data = chunk_split(base64_encode($data));
                                                $message .= "Content-Type: application/octet-stream; name=\"".basename($uploadedFile)."\"\n" . 
                                                "Content-Description: ".basename($uploadedFile)."\n" .
                                                "Content-Disposition: attachment;\n" . " filename=\"".basename($uploadedFile)."\"; size=".filesize($uploadedFile).";\n" . 
                                                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                                            }
                                            
                                            $message .= "--{$mime_boundary}--";
                                            $returnpath = "-f" . $email;
                                            
                                            // Send email
                                            $mail = mail($toEmail, $emailSubject, $message, $headers, $returnpath);
                                            
                                            // Delete attachment file from the server
                                            @unlink($uploadedFile);
                                        }else{
                                            // Set content-type header for sending HTML email
                                            $headers .= "\r\n". "MIME-Version: 1.0";
                                            $headers .= "\r\n". "Content-type:text/html;charset=UTF-8";
                                            
                                            // Send email
                                            $mail = mail($toEmail, $emailSubject, $htmlContent, $headers); 
                                        }
                                        
                                        // If mail sent
                                        if($mail){
                                            $statusMsg = 'Your contact request has been submitted successfully !';
                                            $msgClass = 'succdiv';
                                            
                                            $postData = '';
                                        }else{
                                            $statusMsg = 'Your contact request submission failed, please try again.';
                                        }
                                    }
                                }
                            }else{
                                $statusMsg = 'Please fill all the fields.';
                            }
                            echo $statusMsg;
                        }
                    ?>
                    <script type="text/javascript">
                        var input = document.getElementById("Imagen");
                        var lastinputValue = input.value;
                        setInterval(function() {
                            var newValue = input.value;
                            if (lastinputValue != newValue) {
                                lastinputValue = newValue;
                                handleValueChange();
                            }
                        }, 50); // 20 times/second
                        function handleValueChange() {
                            document.getElementById('comments').style.visibility = 'visible';
                            document.getElementById('button_upload').style.visibility = 'visible';
                        }
                        // Trigger a change
                        setTimeout(function() {
                            input.value = "new value";
                        }, 800);
                       
                    </script>
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

