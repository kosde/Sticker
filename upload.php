<?php
    session_start();
    $_SESSION['variant'] = $_GET["variant_id"];
    $_SESSION['quantity'] = $_GET["quantity"];
    $_SESSION['filename'] = $_GET["filename"];
    if($_SESSION['variant']==78)
    {
        $_SESSION['width_inches'] = 2;
        $_SESSION['height_inches'] = 2;
    }
    if($_SESSION['variant']==79)
    {
        $_SESSION['width_inches'] = 3;
        $_SESSION['height_inches'] = 3;
    }
    if($_SESSION['variant']==80)
    {
        $_SESSION['width_inches'] = 4;
        $_SESSION['height_inches'] = 4;
    }
    if($_SESSION['variant']==81)
    {
        $_SESSION['width_inches'] = 5;
        $_SESSION['height_inches'] = 5;
    }
    if(isset($_GET["price"]) && !empty($_GET["price"]))
    {
        $_SESSION['price'] = $_GET["price"];
    }
    if($_SESSION['filename'] == "Rectangle stickers")
    {
        if($_SESSION['variant']==78)
        {
            $_SESSION['width_inches'] = 2;
            $_SESSION['height_inches'] = 1;
        }
        if($_SESSION['variant']==79)
        {
            $_SESSION['width_inches'] = 3;
            $_SESSION['height_inches'] = 2;
        }
        if($_SESSION['variant']==80)
        {
            $_SESSION['width_inches'] = 4;
            $_SESSION['height_inches'] = 2;
        }
        if($_SESSION['variant']==81)
        {
            $_SESSION['width_inches'] = 5;
            $_SESSION['height_inches'] = 3;
        }
    }
    if($_SESSION['filename'] == "Oval stickers")
    {
        if($_SESSION['variant']==78)
        {
            $_SESSION['width_inches'] = 3;
            $_SESSION['height_inches'] = 2;
        }
        if($_SESSION['variant']==79)
        {
            $_SESSION['width_inches'] = 4;
            $_SESSION['height_inches'] = 2;
        }
        if($_SESSION['variant']==80)
        {
            $_SESSION['width_inches'] = 5;
            $_SESSION['height_inches'] = 3;
        }
        if($_SESSION['variant']==81)
        {
            $_SESSION['width_inches'] = 6;
            $_SESSION['height_inches'] = 4;
        }
    }
    if($_SESSION['filename'] == "Bumper stickers")
    {
        if($_SESSION['variant']==78)
        {
            $_SESSION['width_inches'] = 7.5;
            $_SESSION['height_inches'] = 3.75;
        }
        if($_SESSION['variant']==79)
        {
            $_SESSION['width_inches'] = 11.5;
            $_SESSION['height_inches'] = 3;
        }
        if($_SESSION['variant']==80)
        {
            $_SESSION['width_inches'] = 15;
            $_SESSION['height_inches'] = 3.75;
        }
    }
    if($_SESSION['filename'] == "Stickers sheets")
    {
        if($_SESSION['variant']==78)
        {
            $_SESSION['width_inches'] = 4;
            $_SESSION['height_inches'] = 6;
        }
        if($_SESSION['variant']==79)
        {
            $_SESSION['width_inches'] = 8.5;
            $_SESSION['height_inches'] = 11;
        }
    }
    if(isset($_GET["width"]) && isset($_GET["height"]))
    {
        $_SESSION['width_inches'] = $_GET["width"];
        $_SESSION['height_inches'] = $_GET["height"];
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="text/html, charset=utf-8" http-equiv="Content-Type">
    <?php
     include "css.php";
    ?>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="assets/Logo_2.png"> 
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <!-- Custom styles -->
    <link href="upload/dist/css/jquery.dm-uploader.min.css" rel="stylesheet">
    <link href="upload/upload_file/styles.css" rel="stylesheet">
  </head>

  <body>
    <?php include "nav.php"; 
        if(!isset($_SESSION['id']))
        {
        ?>
        <?php
            include 'php/conexion_be.php';
            $date = date('Y-m-d H:i');
            $query = "INSERT INTO users (temporal,date_create)VALUES('1','$date')";            
            $ejecutar = mysqli_query($conexion,$query);
            $_SESSION['id'] = mysqli_insert_id ($conexion);
            mysqli_close($conexion);
        ?>
        <?php
        }
        if(isset($_SESSION['variant']))
        {
    ?>
    <main role="main" class="container">
      <div class="row" style="height: 70vh;padding-top: 50px; padding-bottom: 50px;">
        <div class="col-md-12 col-sm-12">
          <h1 style="text-align: center;font-size: 3.0rem;padding-bottom: 50px;">Upload your artwork</h1>
          <div id="drag-and-drop-zone" class="dm-uploader p-5">
            
             <!-- <h3 class="mb-5 mt-5 text-muted" >Drag &amp; drop files here</h3>-->

            <div class="btn btn-primary btn-block mb-5" style="visibility: hidden;display:none;">
                <span>Choose file... </span>
                <input type="file" title='Click to add Files' />
            </div>
            <p style="font-family:'Gotham-Light'; font-size: 25px; display: inline-block;visibility: hidden;display:none;text-align: center;" id="droptxt" class="oculto">Drop file here to attach</p>
            <form id="formdrop" action="php/uploadFile.php" method="post" enctype="multipart/form-data" class="dropform" style="width: 100% !important;text-align: center !important;">
                <div class="form-group">
                    <div class="input-group" style="margin: auto;width: 60%;height: 100px;" id="inputfiles">
                        <label class="input-group-btn" style="border-left=10px;padding-right: 10px;padding-bottom: 10px;display: inline-block;">
                            <input id="fileimage" type="hidden" name="size" value="1000000">
                            <span class="btn btn-primary btn-file">
                                Choose file... <input accept="image/jpeg,image/png,application/pdf,image/tiff,application/postscript,image/svg+xml,image/vnd.adobe.photoshop,
                                application/x-photoshop,application/photoshop,application/psd,image/psd" class="inputfile" type="file" 
                                name="Imagen" id="Imagen" onchange="document.getElementById('file-name').value = this.files[0].name">
                            </span>
                        </label>
                        <input class="form-control fileforminput" placeholder="No file chosen" name="file-name" id="file-name" style="padding-bottom: 10px;display: inline-block;">
                       
                        <div id="comments" style="width: 100%;padding-top: 30px;visibility: hidden;display:none;">
                            <h6>Instructions (optional):<br></h6>
                            <textarea placeholder="Let us know if you have any instructions to prepare your proof." name="image_text" id="image_text" style="font-family:'Gotham-Light';width: 100%;"></textarea>
                        </div> 
                        <!--
                            <div id="gallery"></div>                       
                        <p id="skip-step" style="display:block;font-size: 1rem;text-align: center;width: 100%;" class="font-light">or,
                          <a class="link purchase-button" >skip this step &amp; email artwork later.</a>
                        </p>
                     
                        <div class="submit-wrapper center-block" id="button_upload" style="visibility: hidden;display:none;padding-top:30px">
                            <button name="submit" type="submit" style="width: 100%;" class="button large wide secondary">Continue</button>
                        </div> -->
                            <div class="submit-wrapper center-block" id="button_upload2" style="visibility: hidden;display:none;padding-top:30px">
                                <input style="width: 100%;" type="button" class="button large wide secondary" onclick="sendfile()" value="Continue">
                            </div>
                      
                        
                    </div>
                    <div class="progress" id="pbar" style="visibility:hidden;">
                        <div id="progress-bar"class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                    </div>
                    
                </div>
            </form>
            
          </div>
          <p id="skip-step" style="display:block;font-size: 1rem;text-align: center;width: 100%;padding-top: 150px;" class="font-light">
          or,
          <a href="php/arkwork_later.php" class="link purchase-button" >
              skip this step &amp; email artwork later.</a>
          </p>
        </div>
        
        <div class="col-md-6 col-sm-12" style="visibility: hidden;display:none;">
          <div class="card h-100">
            <div class="card-header">
              
            </div>
          </div>
        </div>
      </div><!-- /file list -->

      <div class="row" style="visibility: hidden;display:none;">
        <div class="col-12">
           <div class="card h-100">
            <div class="card-header">
              Debug Messages
            </div>

            <ul class="list-group list-group-flush" id="debug">
              <li class="list-group-item text-muted empty">Loading plugin....</li>
            </ul>
          </div>
        </div>
      </div> <!-- /debug -->

    </main> <!-- /container -->
    <?php
        }
        ?>
    <?php include "footer.php"; ?>
    <script>
      let fileobj = null;
      let uploadProgress = [];
      initializeProgress(1);
      function initializeProgress(numFiles) 
      {
          $('#progress-bar').width(0 + "%").attr('aria-valuenow', 0);
          uploadProgress = []

          for(let i = numFiles; i > 0; i--) {
          uploadProgress.push(0)
          }
      }
      function sendfile()
      {
          ajax_file_upload(fileobj);
      }
      function ajax_file_upload(file_obj) 
      {
          document.getElementById('comments').style.visibility = "hidden";
          document.getElementById('comments').style.display = "none";
          document.getElementById('button_upload2').style.visibility = "hidden";
          document.getElementById('button_upload2').style.display = "none";
          document.getElementById('pbar').style.visibility = "visible";
          var texto = document.getElementById('image_text').value;
          if(file_obj != undefined) 
          {
              var form_data = new FormData();                  
              form_data.append('file', file_obj);//
              form_data.append('image_text', texto);//
              $.ajax({
                  xhr: function() {
                      var xhr = new window.XMLHttpRequest();
                      xhr.upload.addEventListener("progress", function(evt){
                          if (evt.lengthComputable) {
                              var percentComplete = evt.loaded / evt.total;
                              updateProgress(1,percentComplete*100*2);
                              console.log(percentComplete);
                          }
                  }, false);                        
                  return xhr;
                  },
                  type: 'POST',
                  url: 'php/upload_file_drop.php',
                  contentType: false,
                  processData: false,
                  data: form_data,
                  success:function(response) {
                      stateChange(-1);
                  },
                  onFailure: function(response){
                  }
              });
          }
      }
      function stateChange(newState) 
      {
            setTimeout(function(){
                if(newState == -1)
                {
                    window.location = "../cart.php";
                }
            }, 500);
      }
      function updateProgress(fileNumber, percent) 
      {
          uploadProgress[fileNumber] = percent
          let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
          let fileobj = null
          //console.debug('update', fileNumber, percent, total)
          //progressBar.value = total
          //$('#progress-bar').attr('aria-valuenow', total).css('width', total);
          //$('#progress-bar').attr("style","width:"+total); 
          $('#progress-bar').width(total + "%").attr('aria-valuenow', total);
      }
    </script>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/bootsnav/bootsnav.js"></script>
    <script src="js/script.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

    <script src="upload/dist/js/jquery.dm-uploader.min.js"></script>
    <script src="upload/upload_file/demo-ui.js"></script>
    <script src="upload/upload_file/demo-config.js"></script>

    <!-- File item template -->
    <script type="text/html" id="files-template">
      <li class="media">
        <div class="media-body mb-1">
          <p class="mb-2">
            <strong>%%filename%%</strong> - Status: <span class="text-muted">Waiting</span>
          </p>
          <div class="progress mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
              role="progressbar"
              style="width: 0%" 
              aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
          <hr class="mt-1 mb-1" />
        </div>
      </li>
    </script>

    <!-- Debug item template -->
    <script type="text/html" id="debug-template">
      <li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
    </script>
  </body>
</html>
