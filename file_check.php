<?php
    session_start();
    $datezone=date_default_timezone_get();
    require_once "vendor/autoload.php";
    require_once "config_cloud.php";
    $id_uplad_image = $_GET['id'];

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
    <link rel="shortcut icon" href="assets/Logo_2.png"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.js"                                          type="text/javascript"></script>
    <script src="node_modules/blueimp-file-upload/js/vendor/jquery.ui.widget.js"              type="text/javascript"></script>
    <script src="node_modules/blueimp-file-upload/js/jquery.iframe-transport.js"              type="text/javascript"></script>
    <script src="node_modules/blueimp-file-upload/js/jquery.fileupload.js"                    type="text/javascript"></script>
    <script src="node_modules/cloudinary-jquery-file-upload/cloudinary-jquery-file-upload.js" type="text/javascript"></script>
    <meta name="cloudinary_cloud_name" content="dgnrey9it">
</head>
<body style="background-color: red;">
<?php include "nav.php";?>
    <main>
    <?php
       include 'php/conexion_be.php';
       $images  = mysqli_query($conexion,"SELECT * FROM images WHERE id ='$id_uplad_image'");
       if(mysqli_num_rows($images)>0)
        {
            while ($extraido2= mysqli_fetch_array($images))
            {
                $id_i = $extraido2['id'];
                $name_image = $extraido2['nombre'];
                $file = base64_encode($extraido2['images']);
                //$file = 'data:image/png;base64,'.base64_encode($extraido2['images']);
                ?>
                <!--
                <div  id="mycontent">
                    https://res.cloudinary.com/dgnrey9it/image/upload/c_scale,h_590,w_354/bo_5px_solid_rgb:00390b00,c_scale,co_white,e_outline:8,fl_tiled,h_90,l_usr_527:fondo-lettering-usted-habla-ingles_23-2147866059/co_grey,e_outline:2:0/sticker_sheet_template.png
                    https://res.cloudinary.com/dgnrey9it/image/upload/c_scale,h_525,w_324/bo_5px_solid_rgb:00390b00,c_scale,co_white,e_outline:8,fl_tiled,h_90,l_usr_527:fondo-lettering-usted-habla-ingles_23-2147866059/co_grey,e_outline:2:0/sticker_sheet_template.png
                    <img style="width:60px;" src="data:image/png;base64,<?php// echo base64_encode($extraido2['images']); ?> ">
                </div>-->
                <?php
                $extension = pathinfo($name_image, PATHINFO_EXTENSION);
                $nombre_base = basename($name_image, '.'.$extension);
                $nombre_base2 = basename($name_image, '.'.$extension);
                echo $nombre_base2;
                $folder = 'usr_527';
                $nombre_base = $folder."/".$nombre_base;
                //echo cl_image_tag("usr_605/FA182829-A1C8-45CC-8913-D9C8A3E0B3C.png", array("effect"=>"outline:90","color"=>"white"));
                
                /*$img = $file;
                if ($img) 
                {
                    $data = base64_decode($img);
                    $im = imagecreatefromstring($data);
                    $width_file = imagesx($im);
                    $height_file = imagesy($im);               
                } */           
                $width_document = 400;
                $height_document = 600;
                $border = round(90*1.5/16);
                $border =  "outline:".$border;
                echo $border . "<br>";
                 $imagen_test = cl_image_tag($nombre_base, array("transformation"=>array(
                    array("height"=>90),
                    array("effect"=>$border,"color"=>"white","border"=>"5px_solid_rgb:00390b00"),
                    array("effect"=>"outline:2:0", "color"=>"grey")
                )));
                echo $imagen_test;
                $html            = $imagen_test;
                $doc             = new DOMDocument();
                $doc->loadHTML($html);
                $xpath           = new DOMXPath($doc);
                $src             = $xpath->evaluate("string(//img/@src)");
                list($width, $height, $type, $attr) = getimagesize($src);                
                $width_document  = $width_document - fmod($width_document, $width);
                $height_document = $height_document - fmod($height_document, $height);
                echo $nombre_base;
                $final_file =                 
                cl_image_tag("sticker_sheet_template.png", 
                    array("transformation"=>
                            array(
                                array("height"=>$height_document, "width"=>$width_document, "crop"=>"scale"),
                                array("effect"=>"trim:60:transparent","flags"=>"tiled","overlay"=>$folder.":".$nombre_base2,"crop"=>"scale","height"=>90,"color"=>"#ffffff","effect"=>$border,"color"=>"white","border"=>"5px_solid_rgb:00390b00" ),
                                array("effect"=>"outline:2:0", "color"=>"grey")
                            )
                            
                        )
                );
                echo $final_file;
                
                //FA182829-A1C8-45CC-8913-D9C8A3E0B3CE
               /* echo cl_image_tag($final_file, array("transformation"=>array(
                                                            
                    array("effect"=>"outline:1:0", "color"=>"black")
                ))
                );*/
                /*cl_image_tag("sticker_sheet_template.jpg", array("transformation"=>array(
                    array("height"=>1100, "width"=>850, "crop"=>"scale"),
                    array("border"=>"10px_solid_rgb:ffffff", "color"=>"#ffffff", "effect"=>"outline:1", "flags"=>"tiled", "height"=>100, "overlay"=>"88F7E5ED-799B-4767-920C-501CBE85C759", "radius"=>0, "width"=>190, "crop"=>"scale"),
                    array("effect"=>"outline:2")
                    )))
                echo cl_image_tag($nombre_base, array("transformation"=>array(
                    array( "height"=>45, "crop"=>"fill"),
                    array("overlay"=>$nombre_base, "height"=>45, "x"=>220, "crop"=>"fill"),
                    array("overlay"=>$nombre_base, "height"=>45, "y"=>140, "x"=>-110, "crop"=>"fill"),
                    array("overlay"=>$nombre_base, "height"=>45, "y"=>70, "x"=>110, "crop"=>"fill")
                )));*/
                //88F7E5ED-799B-4767-920C-501CBE85C759
                //02E1A667-9F40-4238-924E-4F74D7B5B2C6

                //echo cl_image_tag($nombre_base, array("transformation"=>array(array("effect"=>"outline:64:0", "color"=>"white"))));
                //$api = new \Cloudinary\Api();
                //$api->resource($nombre_base = ['tags']);
                //$api->resource($nombre_base);
                //$datos = $api->resource($nombre_base);
                //print_r($datos["tags"]);
                //console.log(http://res.cloudinary.com/dgnrey9it/image/list/<tag>.json)
                //https://res.cloudinary.com/dgnrey9it/image/upload/v1629327901/88F7E5ED-799B-4767-920C-501CBE85C759.png
                //--------------------------
                //$api = new \Cloudinary\Api();
                //$api->update($nombre_base, ["categorization" => "aws_rek_tagging","auto_tagging" => 0.9]);
                //--------------------------
                //$api = new \Cloudinary\Api();
                //$api->update($nombre_base, ["background_removal" => "cloudinary_ai","notification_url" => ""]);
                //--------------------------               
            }
        }
        mysqli_close($conexion);
    ?>
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