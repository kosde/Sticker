<?php
    session_start();
    $datezone=date_default_timezone_get();
    //$txt = $_GET["txt"];
    require __DIR__ . '/vendor/autoload.php';
    use Twilio\Rest\Client;
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
    <?php
    if(isset($_SESSION['id']))
    {
    ?>
    <style>
        .content{
            height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .preloader {
            position: fixed;
            display: flex;
            justify-content: center;
        width: 70px;
        height: 70px;
        border: 10px solid #eee;
        border-top: 10px solid #ffb20f;
        border-radius: 50%;
        animation-name: girar;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        }
        @keyframes girar {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
        }  
    </style>
    <?php include "nav.php"; 
    //?country_id=AF&name=&company=&address1=&address2=&zipcode=&selected-shipping-rate=0&paymentMethod=NEW_CARD&use_shipping=on
    ?>
    <main style="position: relative;width: 100% !important;" >
        <div class="content">
            <div class="preloader container"></div>
            <?php
                include 'php/conexion_be.php';
                require_once "vendor/autoload.php";
                require_once "config_cloud.php";
                require('phpmailer/class.phpmailer.php');
                $taxes     = $_GET["taxes"];
                $shipping  = $_GET["shipping_price"];
                $total     = $_GET["total"];
                $taxes     = str_replace("$","",$taxes);
                $shipping  = str_replace("$","",$shipping);
                $total     = str_replace("$","",$total);
                //die();
                    $id_user        = $_SESSION['id']; 
                    $id_def_bill    = 0;
                    $country_id     = $_GET["country_id"];
                    $name           = $_GET["name"];
                    $company        = $_GET["company"];
                    $locality       = $_GET["locality"];
                    $state          = $_GET["state"];
                    $stateUS        = $_GET["stateUS"];
                    $address1       = $_GET["address1"];
                    $address2       = $_GET["address2"];
                    $zipcode        = $_GET["zipcode"];
                    $email          = $_GET["email"];
                    $delivery_date  = $_GET["deliverytime"];
                    if($email==null)
                        $email = $_SESSION['email'];
                    if(!isset($_SESSION['name']))
                    {
                        $cart  = mysqli_query($conexion,"UPDATE users SET usrname = '$name', email = '$email' WHERE id = '$id_user'");
                    }
                    if(isset($_GET["billing_address"]))
                    {
                        $country_id_billing     = $country_id;
                        $name_billing           = $name;
                        $company_billing        = $company;
                        $locality_billing       = $locality;
                        if($state!=null)
                            $state_billing          = $state;
                        else
                            $state_billing        = $stateUS;
                        $address1_billing       = $address1;
                        $address2_billing       = $address2;
                        $zipcode_billing        = $zipcode;
                        $email_billing          = $email;
                        $query_billing = "INSERT INTO billing_address (  id_user,   country,      full_name,  company,   street_address1 ,street_address2, city,	   zip_code,  statedir)
                                                VALUES    ('$id_user','$country_id_billing','$name_billing',    '$company_billing','$address1_billing',     '$address2_billing',     '$locality_billing','$zipcode_billing', '$state_billing')";
                    }else{
                            $country_id_billing     = $_GET["country_id_billing"];
                            $name_billing           = $_GET["name_billing"];
                            $company_billing        = $_GET["company_billing"];
                            $locality_billing       = $_GET["locality_billing"];
                            $state_billing          = $_GET["state_billing"];
                            $address1_billing       = $_GET["address1_billing"];
                            $address2_billing       = $_GET["address2_billing"];
                            $zipcode_billing        = $_GET["zipcode_billing"];
                            $email_billing          = $_GET["email_billing"];
                            $query_billing = "INSERT INTO billing_address (  id_user,   country,      full_name,  company,   street_address1 ,street_address2, city,	   zip_code,  statedir)
                                                VALUES    ('$id_user','$country_id_billing','$name_billing',    '$company_billing','$address1_billing',     '$address2_billing',     '$locality_billing','$zipcode_billing', '$state_billing')";
                        }
                    
                    if($state!=null)
                    $query_address = "INSERT INTO address_t (  id_user,   country,      full_name,  company,   street_address1 ,street_address2, city,	   zip_code,  statedir)
                                                VALUES    ('$id_user','$country_id','$name',    '$company','$address1',     '$address2',     '$locality','$zipcode', '$state')";
                    if($stateUS!=null)
                    $query_address = "INSERT INTO address_t (  id_user,   country,      full_name,  company,   street_address1 ,street_address2, city,	   zip_code,  statedir)
                                                VALUES    ('$id_user','$country_id','$name',    '$company','$address1',     '$address2',     '$locality','$zipcode', '$stateUS')";
                    if($_GET["shipping_id"]==-10 || !isset($_GET["shipping_id"]))
                    {
                        $address_result = mysqli_query($conexion,$query_address);
                        $id_address = mysqli_insert_id ($conexion);
                    }
                    else
                    {
                        $id_address = $_GET["shipping_id"];
                        $id_user = $_SESSION['id'];
                        
                        /**/
                        
                        $query_B    = "SELECT * FROM billing_address WHERE id_user='$id_user'";
                        $result_B = mysqli_query($conexion,$query_B);
                        if(mysqli_num_rows($result_B)>0)
                        {
                            while ($extraido_B= mysqli_fetch_array($result_B))
                            {
                                $id_b             = $extraido_B['id'];
                                $id_user_b        = $extraido_B['id_user'];
                                $country_b        = $extraido_B['country'];
                                $full_name_b      = $extraido_B['full_name'];
                                $company_b        = $extraido_B['company'];
                                $address1_b       = $extraido_B['street_address1'];
                                $address2_b       = $extraido_B['street_address2'];
                                $city_b           = $extraido_B['city'];
                                $zipcode_b        = $extraido_B['zip_code'];
                                $state_b          = $extraido_B['statedir'];
                                $default_address_b= $extraido_B['default_address'];
                                if($default_address_b==1)
                                {
                                    $id_billing = $id_b;
                                    $id_def_bill = 1;
                                }
                            }
                            if($id_def_bill == 0)
                            {
                                $query    = "SELECT * FROM address_t WHERE id='$id_address'";
                                $result = mysqli_query($conexion,$query);
                                if(mysqli_num_rows($result)>0)
                                {
                                    $extraido= mysqli_fetch_array($result);
                                    $country_id     = $extraido['country'];
                                    $name           = $extraido['full_name'];
                                    $company        = $extraido['company'];
                                    $address1       = $extraido['street_address1'];
                                    $address2       = $extraido['street_address2'];
                                    $locality       = $extraido['city'];
                                    $state          = $extraido['statedir'];
                                    $zipcode       = $extraido['zip_code'];
                                }
                                $query_B    = "SELECT * FROM billing_address WHERE id_user='$id_user'";
                                $result_B = mysqli_query($conexion,$query_B);
                                while ($extraido_B= mysqli_fetch_array($result_B))
                                {
                                    $id_b             = $extraido_B['id'];
                                    $id_user_b        = $extraido_B['id_user'];
                                    $country_b        = $extraido_B['country'];
                                    $full_name_b      = $extraido_B['full_name'];
                                    $company_b        = $extraido_B['company'];
                                    $address1_b       = $extraido_B['street_address1'];
                                    $address2_b       = $extraido_B['street_address2'];
                                    $city_b           = $extraido_B['city'];
                                    $zipcode_b        = $extraido_B['zip_code'];
                                    $state_b          = $extraido_B['statedir'];
                                    $default_address_b= $extraido_B['default_address'];
                                    //echo $country_b."==". $country_id ."\n".$full_name_b."==".$name ."\n".$company_b."==".$company ."\n".$address1_b."==".$address1 ."\n".$address2_b."==".$address2 ."\n".$city_b ."==".$locality ."\n".$zipcode_b."==".$zipcode ."\n".$state_b."==".$state;
                                    if(strcasecmp($country_b,$country_id)===0&& strcasecmp($full_name_b,$name)===0 && strcasecmp($company_b,$company)===0 && strcasecmp($address1_b,$address1)===0 && 
                                    strcasecmp($address2_b,$address2)===0 && strcasecmp($city_b ,$locality)===0 && strcasecmp($zipcode_b,$zipcode)===0 && strcasecmp($state_b,$state)===0)
                                    {
                                        $id_billing = $id_b;
                                        $id_def_bill = 1;
                                    }
                                }
                            }
                        }
                       
                        /**/
                        if($id_def_bill == 0)
                        {
                            $query    = "SELECT * FROM address_t WHERE id='$id_address'";
                            $result = mysqli_query($conexion,$query);
                            if(mysqli_num_rows($result)>0)
                            {
                                while ($extraido= mysqli_fetch_array($result))
                                {
                                    $country_id     = $extraido['country'];
                                    $name           = $extraido['full_name'];
                                    $company        = $extraido['company'];
                                    $address1       = $extraido['street_address1'];
                                    $address2       = $extraido['street_address2'];
                                    $locality       = $extraido['city'];
                                    $state          = $extraido['statedir'];
                                    $zipcode       = $extraido['zip_code'];
                                    $query_billing = "INSERT INTO billing_address (id_user,country,full_name,company,street_address1,street_address2, city,zip_code,statedir)
                                                    VALUES    ('$id_user','$country_id','$name','$company','$address1','$address2','$locality','$zipcode','$state')";
                                }
                            }
                        }
                    }
                    if($id_def_bill == 0)
                    {
                        $address_result = mysqli_query($conexion,$query_billing);
                        $id_billing = mysqli_insert_id ($conexion);
                    }
                
                

                $price = 0;
                $cart  = mysqli_query($conexion,"SELECT * FROM cart WHERE id_user ='$id_user'"); 
                $exitosos=0;
                if(mysqli_num_rows($cart)>0)
                {
                    while ($extraido= mysqli_fetch_array($cart))
                    {
                        $id_cart       = $extraido['id'];
                        $id_user       = $extraido ['id_user'];
                        $width_inches  = $extraido['width_inches'];
                        $height_inches = $extraido ['height_inches'];
                        $price         = $extraido['price'];
                        //$total        += $price; 
                        //$_SESSION['total'] = $total;
                        $tipe          = $extraido ['tipe'];
                        $quantity      = $extraido['quantity'];
                        $id_images     = $extraido ['id_images'];
                        $txt_details   = $extraido['txt_details'];
                        $statusp       = $extraido['statusp'];
                        if( $_SESSION['ghost'] == 1)
                        {
                            $price = 0;
                        }
                        $date = date('Y-m-d H:i');
                        if($statusp == 2)
                        {
                            $query_orders = "INSERT INTO orders (id_user,   width_inches,   height_inches,   price,  tipe,    quantity,   id_images,   txt_details,  dates, delivery_date, id_address, id_billing,statusp,taxes,shipping_price,total)
                                              VALUES('$id_user','$width_inches','$height_inches','$price','$tipe','$quantity','$id_images','$txt_details','$date','$delivery_date','$id_address','$id_billing','6','$taxes','$shipping','$total')";
                        
                            $verificar = mysqli_query($conexion, $query_orders);
                            $id_order = mysqli_insert_id ($conexion);
                            $statusp = 6;
                        }
                        else
                        {
                            
                            $query_orders = "INSERT INTO orders (id_user,   width_inches,   height_inches,   price,  tipe,    quantity,   id_images,   txt_details,  dates, delivery_date, id_address, id_billing,taxes,shipping_price,total)
                                                VALUES('$id_user','$width_inches','$height_inches','$price','$tipe','$quantity','$id_images','$txt_details','$date','$delivery_date','$id_address','$id_billing','$taxes','$shipping','$total')";
                            //$images  = mysqli_query($conexion,"SELECT * FROM images WHERE id ='$id_images'");
                            $width_document = $width_inches*100; //400 -> 324  real 330
                            $height_document = $height_inches*100; //600 -> 525 real 550
                            $verificar = mysqli_query($conexion, $query_orders);
                            $id_order = mysqli_insert_id ($conexion);
                            $comentSi = 1;
                            $comentNO = 0;
                            $coment_usr= "Uploaded artwork:";
                            $coment_usr2= "Created";
                            if($verificar == true)
                            {
                                $images  = mysqli_query($conexion,"SELECT * FROM images WHERE id ='$id_images'");
                                if(mysqli_num_rows($images)>0)
                                {
                                    while ($extraido2= mysqli_fetch_array($images))
                                    {
                                        //https://www.acmestickers.com\processing2.php
                                        //https://www.acmestickers.com\processing2.php  18 de copias
                                        $id_i       = $extraido2['id'];
                                        $name_image = $extraido2['nombre'];
                                        $file       = $extraido2['images'];
                                        $transparent= $extraido2['transparent'];
                                        //id 	id_orders 	coment_usr 	coment_client 	date_coment 	file_coment 	link
                                        //id	id_orders	coment_usr	coment_client	date_coment	file_coment	link	file_name
                                        //id 	id_orders 	coment_usr 	coment_client 	date_coment 	file_coment 	link 	namefile 	put 
                                        //$query_coment ="INSERT INTO coments (id_orders, coment_usr,  ,coment_client,date_coment, namefile, put)
                                        //                            VALUES('$id_order', '$coment_usr','$comentNO', '$date', '$name_image','$comentSi')";
                                        $query_coment = "INSERT INTO coments (id_orders,  coment_usr,  coment_client, 	date_coment,namefile, put)
                                                                    VALUES('$id_order', '$coment_usr','$comentNO',   '$date',    '$name_image','1')";
                                        $verificar_coment = mysqli_query($conexion, $query_coment);
                                        $colors = ["YELLOW","BLUE","RED","ORANGE","PURPLE","PINK","GREEN","BROWN","BLACK","WHITE","GRAY"];
                                        $extension = pathinfo($name_image , PATHINFO_EXTENSION);
                                        $nombre_base = basename($name_image , '.'.$extension);
                                        $nombre_base2 = $nombre_base;
                                        $api = new \Cloudinary\Api();
                                        $folder = 'usr_'.$id_user;
                                        $nombre_base = $folder."/".$nombre_base;
                                        $api->update($nombre_base, ["categorization" => "aws_rek_tagging","auto_tagging" => 0.9]);
                                        if($transparent == 0)
                                        {
                                            $api = new \Cloudinary\Api();
                                            $api->update($nombre_base, ["background_removal" => "cloudinary_ai:fine_edges","notification_url" => ""]);
                                        }
                                        $txt = strtoupper($txt_details);
                                        $date = date('Y-m-d H:i');
                                        $color = null;
                                        foreach ($colors as $col)
                                        {
                                            if (strpos($txt, $col) !== false)
                                            {
                                                $color = $col;
                                                break;
                                            }
                                        }
                                        if (strpos($txt, 'BACKGROUND') !== false)
                                        {
                                            if($color != null)
                                            {
                                                $prof = cl_image_tag($nombre_base, array("background"=>$color));
                                                $html = $prof;
                                                $doc = new DOMDocument();
                                                $doc->loadHTML($html);
                                                $xpath = new DOMXPath($doc);
                                                $src = $xpath->evaluate("string(//img/@src)");
                                                    //
                                                    //id	                              id_orders	coment_usr	coment_client	date_coment	file_coment	link	file_name
                                                $query_coment_acme = "INSERT INTO coments (id_orders,  coment_usr,      coment_client, 	date_coment,link)
                                                                                VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$src')";
                                                $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);
                                                break;
                                            }
                                        }elseif (strpos($txt, 'OUTLINE') !== false || strpos($txt, 'BORDER') !== false)
                                        {
                                            
                                            if($color != null)
                                            {
                                                $prof = cl_image_tag($nombre_base, array("transformation"=>array(
                                                            
                                                            array("effect"=>"outline:15:0", "color"=>$color)
                                                        )));
                                                
                                                $html = $prof;
                                                $doc = new DOMDocument();
                                                $doc->loadHTML($html);
                                                $xpath = new DOMXPath($doc);
                                                $src = $xpath->evaluate("string(//img/@src)");
                                                    //
                                                    //id	                              id_orders	coment_usr	coment_client	date_coment	file_coment	link	file_name
                                                $query_coment_acme = "INSERT INTO coments (id_orders,  coment_usr,      coment_client, 	date_coment,link)
                                                                                VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$src')";
                                                $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);
                                                //echo $prof;
                                                # "/images/image.jpg"
                                                //echo "<img src='".$src."'>";
                                                //echo mysqli_error($conexion);
                                                break;
                                            }
                                        }elseif (strpos($txt, 'FOCUS') !== false || strpos($txt, 'FOCUSING') !== false )
                                        {
                                            if(strpos($txt, 'FACE') !== false)
                                            {
                                                $prof = cl_image_tag($nombre_base, array("transformation"=>array(
                                                        array("width"=>400, "height"=>400, "gravity"=>"face", "radius"=>"max", "crop"=>"crop"),
                                                        array("width"=>200, "crop"=>"scale")
                                                        )));
                                                $html = $prof;
                                                $doc = new DOMDocument();
                                                $doc->loadHTML($html);
                                                $xpath = new DOMXPath($doc);
                                                $src = $xpath->evaluate("string(//img/@src)");
                                                    //
                                                    //id	                              id_orders	coment_usr	coment_client	date_coment	file_coment	link	file_name
                                                $query_coment_acme = "INSERT INTO coments (id_orders,  coment_usr,      coment_client, 	date_coment,link)
                                                                                    VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$src')";
                                                $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);
                                                break;
                                            }
                                        }elseif ($tipe == "Circle stickers")
                                        {
                                            
                                            $prof = cl_image_tag($nombre_base, array("transformation"=>array(
                                                array("aspect_ratio"=>"1.0","crop"=>"fill"),
                                                array("radius"=>"max")//,
                                                //array("effect"=>"outline:20:0", "color"=>"white")
                                            )));
                                            
                                            $html = $prof;
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($html);
                                            $xpath = new DOMXPath($doc);
                                            $src = $xpath->evaluate("string(//img/@src)");
                                            $query_coment_acme = "INSERT INTO coments (id_orders,  coment_usr,      coment_client, 	date_coment,link)
                                                                                    VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$src')";
                                            $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);
                                        }
                                        elseif ($tipe == "Rectangle stickers")
                                        {
                                            
                                            $prof = cl_image_tag($nombre_base, array("transformation"=>array(
                                                            
                                                //array("effect"=>"outline:20:0", "color"=>"white")
                                            )));
                                            
                                            $html = $prof;
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($html);
                                            $xpath = new DOMXPath($doc);
                                            $src = $xpath->evaluate("string(//img/@src)");
                                            $query_coment_acme = "INSERT INTO coments (id_orders,  coment_usr,      coment_client, 	date_coment,link)
                                                                                    VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$src')";
                                            $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);
                                        }elseif ($tipe == "Square stickers")
                                        {
                                            
                                            $prof = cl_image_tag($nombre_base, array("transformation"=>array(
                                                            
                                                //array("effect"=>"outline:20:0", "color"=>"white")
                                            )));
                                            
                                            $html = $prof;
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($html);
                                            $xpath = new DOMXPath($doc);
                                            $src = $xpath->evaluate("string(//img/@src)");
                                            $query_coment_acme = "INSERT INTO coments (id_orders,  coment_usr,      coment_client, 	date_coment,link)
                                                                                    VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$src')";
                                            $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);
                                        }
                                        elseif ($tipe == "Oval stickers")
                                        {
                                            
                                            $prof = cl_image_tag($nombre_base, array("transformation"=>array(
                                                array("radius"=>"max"),           
                                                //array("effect"=>"outline:20:0", "color"=>"white")
                                            )));
                                            
                                            $html = $prof;
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($html);
                                            $xpath = new DOMXPath($doc);
                                            $src = $xpath->evaluate("string(//img/@src)");
                                            $query_coment_acme = "INSERT INTO coments (id_orders,  coment_usr,      coment_client, 	date_coment,link)
                                                                                    VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$src')";
                                            $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);
                                        }elseif ($tipe == "Rounded corner stickers")
                                        {
                                            
                                            $prof = cl_image_tag($nombre_base, array("transformation"=>array(
                                                array("radius"=>20),        
                                                //array("effect"=>"outline:20:0", "color"=>"white")
                                                
                                            )));
                                            
                                            $html = $prof;
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($html);
                                            $xpath = new DOMXPath($doc);
                                            $src = $xpath->evaluate("string(//img/@src)");
                                            $query_coment_acme = "INSERT INTO coments (id_orders,  coment_usr,      coment_client, 	date_coment,link)
                                                                                    VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$src')";
                                            $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);
                                        }
                                        elseif ($tipe == "Bumper stickers")
                                        {
                                            
                                            $prof = cl_image_tag($nombre_base, array("transformation"=>array(
                                                            
                                                //array("effect"=>"outline:20:0", "color"=>"white")
                                            )));
                                            
                                            $html = $prof;
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($html);
                                            $xpath = new DOMXPath($doc);
                                            $src = $xpath->evaluate("string(//img/@src)");
                                            $query_coment_acme = "INSERT INTO coments (id_orders,  coment_usr,      coment_client, 	date_coment,link)
                                                                                    VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$src')";
                                            $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);
                                        }
                                        elseif ($tipe == "Stickers sheets")
                                        {             
                                           
                                            $border = round(90*1.5/16);
                                            $border =  "outline:".$border;
                                            $imagen_test = cl_image_tag($nombre_base, array("transformation"=>array(
                                                array("height"=>90),
                                                array("effect"=>$border,"color"=>"white","border"=>"5px_solid_rgb:00390b00"),
                                                array("effect"=>"outline:2:0", "color"=>"grey")
                                            )));
                                            $html = $imagen_test;
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($html);
                                            $xpath = new DOMXPath($doc);
                                            $src = $xpath->evaluate("string(//img/@src)");
                                            list($width, $height, $type, $attr) = getimagesize($src);
                            
                                            $width_document = $width_document - fmod($width_document, $width);
                                            $height_document = $height_document - fmod($height_document, $height);
                                            $final_file =                 
                                            cl_image_tag("sticker_sheet_template", 
                                                array("transformation"=>
                                                        array(
                                                            array("height"=>$height_document, "width"=>$width_document, "crop"=>"scale"),
                                                            array("effect"=>"trim:60:transparent","flags"=>"tiled","overlay"=>$folder.":".$nombre_base2,"crop"=>"scale","height"=>90,"color"=>"#ffffff","effect"=>$border,"color"=>"white","border"=>"5px_solid_rgb:00390b00" ),
                                                            array("effect"=>"outline:2:0", "color"=>"grey")
                                                        )
                                                        
                                                    )
                                            );
                                            $html = $final_file;
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($html);
                                            $xpath = new DOMXPath($doc);
                                            $src = $xpath->evaluate("string(//img/@src)");
                                            $query_coment_acme = "INSERT INTO coments (id_orders,coment_usr,coment_client,date_coment,link) VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$src')";
                                            $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);
                                        }
                                        else
                                        {
                                            $prof = cl_image_tag($nombre_base, array("transformation"=>array(
                                                            
                                                array("effect"=>"outline:20:0", "color"=>"white")
                                            )));
                                            
                                            $html = $prof;
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($html);
                                            $xpath = new DOMXPath($doc);
                                            $src = $xpath->evaluate("string(//img/@src)");
                                            $query_coment_acme = "INSERT INTO coments (id_orders,  coment_usr,      coment_client, 	date_coment,link)
                                                                                    VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$src')";
                                            $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);
                                        }
                                    }
                                    if($tipe!="Sample")
                                    {
                                        $from = "info@acmestickers.com";
                                        $to = $email;
                                        $cadena2="US";
                                        if(strcmp ($cadena2 , $country_id ) == 0)
                                        {
                                            $country_id='United States';
                                        }
                                        $linkverifica = "https://www.acmestickers.com/proof.php?order=".$id_order;
                                        
                                        $subject = "We received your order, expect a proof soon";
                                        $message = "Hi ". $name .",<br>
                                                    <br>
                                                    We received your order <a href='". $linkverifica ."'>AS$id_order.</a> Here's what happens next:<br>
                                                    <br>
                                                    1. We send you a proof within 4 hours <br>
                                                    2. Review your proof on our website <br>
                                                    3. Approve your proof or request changes <br>
                                                    4. After proof approval, we print and ship your order <br>
                                                    <br>
                                                    Your order is currently estimated to arrive by to: <br>
                                                    <br>
                                                    ".$company." <br>
                                                    ".$name." <br>
                                                    ".$address1." ". $address2.  "<br>
                                                    ".$locality.", " .$state." ". $zipcode."<br>
                                                    ".$country_id. "<br>
                                                    <br>
                                                    
                                                    <br>
                                                    You can view your proof at the link below when it's ready: <br>
                                                    <br>".
                                                    $linkverifica."
                                                    <br>
                                                    Questions? Reply to this email and we'll be happy to assist you. <br>
                                                    <br>
                                                    Thanks,<br>
                                                    Acme Sticker<br>
                                                    <br>
                                                    P.S. if you do not receive a proof within 4 hours please <a href='help@acmestickers.com'>contact us</a> or check your spam filter
                                                    and whitelist <a href='info@acmestickers.com'>info@acmestickers.com</a>
                                                    <br>
                                                    <br>
                                                    <!DOCTYPE html>
                                                    <html lang='es'>
                                                    <head>
                                                        <meta charset='utf-8'>
                                                        <title>Reset your password</title>
                                                    </head>
                                                    <body>
                                                    <table style='max-width: 800px; padding: 10px; margin:0 auto; border-collapse: collapse;'>
                                                        <tr>
                                                            <td>
                                                                <div style='color: #34495e; margin: 4% 4% 2%; text-align: justify;font-family: sans-serif'>                                                                  
                                                                    <table class='x_w220 x_textcenter' cellspacing='0' cellpadding='0' border='0' align='center'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <img style='width: 100%;' data-imagetype='External' src='https://www.acmestickers.com/assets/traking/made.png'> 
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    </body>
                                                    </html>
                                                    ";
                                        /*******************************************************************************************************************************************************/

                                        

                                        $mail = new PHPMailer();
                                        $mail->IsSMTP();
                                        $mail->SMTPDebug = 1;
                                        $mail->Debugoutput = 'html';
                                        $mail->SMTPAuth = TRUE;
                                        $mail->SMTPSecure = "ssl";
                                        $mail->Port     = 465;  
                                        $mail->Username = "info@acmestickers.com";
                                        $mail->Password = "H5s8v7SeftZkK9J";
                                        $mail->Host     = "acmestickers.com";
                                        $mail->Mailer   = "smtp";
                                        $mail->SetFrom("info@acmestickers.com","Acme Stickers");
                                        $mail->AddAddress($to);	
                                        $mail->Subject = $subject;
                                        $mail->Body    = $message;
                                        $mail->WordWrap   = 80;
                                        $mail->IsHTML(true);
                                        if(!$mail->Send()) {
                                            $msg = "<p class='error'>Problem in Sending Mail.</p>";
                                        } else {
                                            $msg = "<p class='success'>Mail Sent Successfully.</p>";
                                        }
                                        /*die();*/
                                        /*Correo Acme*/
                                        //$linkverifica = "https://www.acmestickers.com/proof.php?order=".$id_order;
                                        $to = "orders@acmestickers.com";
                                        $subject = "A new order has arrived AS$id_order";
                                        $message = "New order information:<br>
                                                    <br>
                                                    AS$id_order<br>
                                                    Size:    $width_inches\" x $height_inches \" <br>
                                                    Tipe:    $tipe<br>
                                                    Price:   $price<br>
                                                    Qty:     $quantity<br>
                                                    Details: $txt_details<br>
                                                    Date received: $date<br>
                                                    Approx delivery date: $delivery_date<br>
                                                    <br>
                                                    <br>
                                                    Ship to:
                                                    ".$company." <br>
                                                    ".$name." <br>
                                                    ".$address1." ". $address2.  "<br>
                                                    ".$locality.", " .$state." ". $zipcode."<br>
                                                    ".$country_id. "<br>";
                                        

                                        $mail = new PHPMailer();
                                        $mail->IsSMTP();
                                        $mail->SMTPDebug = 1;
                                        $mail->Debugoutput = 'html';
                                        $mail->SMTPAuth = TRUE;
                                        $mail->SMTPSecure = "ssl";
                                        $mail->Port     = 465;  
                                        $mail->Username = "info@acmestickers.com";
                                        $mail->Password = "H5s8v7SeftZkK9J";
                                        $mail->Host     = "acmestickers.com";
                                        $mail->Mailer   = "smtp";
                                        $mail->SetFrom("orders@acmestickers.com","Acme Stickers");
                                        $mail->AddAddress($to);	
                                        $mail->Subject = $subject;
                                        $mail->Body    = $message;
                                        $mail->WordWrap   = 80;
                                        $mail->IsHTML(true);
                                        if($_SESSION['ghost'] == 0)
                                        {
                                            if(!$mail->Send()) {
                                                $msg = "<p class='error'>Problem in Sending Mail.</p>";
                                            } else {
                                                $msg = "<p class='success'>Mail Sent Successfully.</p>";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $eliminados = mysqli_query($conexion, "DELETE FROM cart WHERE id ='$id_cart'");
                    }
                    if($tipe=="Sample")
                    {
                        if($statusp==0)
                        {
                            $query_update="UPDATE orders SET statusp='2' WHERE id='$id_order'";
                            $result=mysqli_query($conexion,$query_update);
                            
                            $to = "orders@acmestickers.com";
                            $subject = "A new order has arrived AS$id_order";
                            $message = "New order information:<br>
                                        <br>
                                        AS$id_order<br>
                                        Tipe:    Sample<br>
                                        <br>
                                        <br>
                                        Ship to:
                                        ".$company." <br>
                                        ".$name." <br>
                                        ".$address1." ". $address2.  "<br>
                                        ".$locality.", " .$state." ". $zipcode."<br>
                                        ".$country_id. "<br>";
                            
                            $mail = new PHPMailer();
                            $mail->IsSMTP();
                            $mail->SMTPDebug = 1;
                            $mail->Debugoutput = 'html';
                            $mail->SMTPAuth = TRUE;
                            $mail->SMTPSecure = "ssl";
                            $mail->Port     = 465;  
                            $mail->Username = "info@acmestickers.com";
                            $mail->Password = "H5s8v7SeftZkK9J";
                            $mail->Host     = "acmestickers.com";
                            $mail->Mailer   = "smtp";
                            $mail->SetFrom("orders@acmestickers.com","Acme Stickers");
                            $mail->AddAddress($to);	
                            $mail->Subject = $subject;
                            $mail->Body    = $message;
                            $mail->WordWrap   = 80;
                            $mail->IsHTML(true);
                            if($_SESSION['ghost'] == 0)
                            {
                                if(!$mail->Send()) {
                                    $msg = "<p class='error'>Problem in Sending Mail.</p>";
                                } else {
                                    $msg = "<p class='success'>Mail Sent Successfully.</p>";
                                }
                            }
                        }
                    }
                    

                    
                    $userdata      = mysqli_query($conexion,"SELECT * FROM users WHERE id='$id_user'");
                    if(mysqli_num_rows($userdata)>0)
                    {
                        //deals_browser 	deals_sms 	deals_email 	alerts_sms 	alerts_email 	proofing_sms 	proofing_email 
                        $extraido23      =  mysqli_fetch_array($userdata);
                        $usrname         =  $extraido23['usrname'];
                        $phone           =  $extraido23['phone'];
                        $code            =  $extraido23['code'];
                    }
                    
                    $notif      = mysqli_query($conexion,"SELECT * FROM notifications WHERE id_user='$id_user'");
                    if(mysqli_num_rows($notif)>0)
                    {
                        //deals_browser 	deals_sms 	deals_email 	alerts_sms 	alerts_email 	proofing_sms 	proofing_email 
                        $extraido2      = mysqli_fetch_array($notif);
                        $id_n           =  $extraido2['id'];
                        $id_usern       =  $extraido2['id_user'];
                        $deals_browser  =  $extraido2['deals_browser'];
                        $deals_sms      =  $extraido2['deals_sms'];
                        $deals_email    =  $extraido2['deals_email'];
                        $alerts_sms     =  $extraido2['alerts_sms'];
                        $alerts_email   =  $extraido2['alerts_email'];
                        $proofing_sms   =  $extraido2['proofing_sms'];
                        $proofing_email =  $extraido2['proofing_email'];
                    }
                    if($statusp == 0)
                    {
                        $sms_txt = "Hi ". $usrname ."\n\nWe received your order AS$id_order.\nHere's what happens next:\n\n1. We send you a proof within 4 hours\n2. Review your proof on our website\n3. Approve your proof or request changes\n4. After proof approval, we print and ship your order\n\nYou can view your proof at the link below when it's ready:\n\n".$linkverifica."\n\n\nThanks,\nAcme Sticker";
                        if($proofing_sms==1)
                        {
                            $sDestination ="+".$code.$phone;
                            $account_sid = 'ACddfb48d031bf54554a1e68221e105f4f';
                            $auth_token = 'a24a7c2cc899eb2d8d7749ced756ed8d';
                            $twilio_number = "+12052739743";

                            $client = new Client($account_sid, $auth_token);
                            $client->messages->create(
                                $sDestination,
                                array(
                                    'from' => $twilio_number,
                                    'body' => $sms_txt
                                )
                            );
                        }
                    }
                    if($statusp == 6)
                    {
                        $to = "orders@acmestickers.com";
                        $subject = "A new order has arrived AS$id_order";
                        $message = "New order information:<br>
                                    <br>
                                    AS$id_order<br>
                                    Reorder<br>
                                    Size:    $width_inches\" x $height_inches \" <br>
                                    Tipe:    $tipe<br>
                                    Price:   $price<br>
                                    Qty:     $quantity<br>
                                    Details: $txt_details<br>
                                    Date received: $date<br>
                                    Approx delivery date: $delivery_date<br>
                                    <br>
                                    <br>
                                    Ship to:
                                    ".$company." <br>
                                    ".$name." <br>
                                    ".$address1." ". $address2.  "<br>
                                    ".$locality.", " .$state." ". $zipcode."<br>
                                    ".$country_id. "<br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <a href='https://acmestickers.com/admin/order_details.php?order=".$id_order."'>Click here</a><br>";
                        

                        $mail = new PHPMailer();
                        $mail->IsSMTP();
                        $mail->SMTPDebug = 1;
                        $mail->Debugoutput = 'html';
                        $mail->SMTPAuth = TRUE;
                        $mail->SMTPSecure = "ssl";
                        $mail->Port     = 465;  
                        $mail->Username = "info@acmestickers.com";
                        $mail->Password = "H5s8v7SeftZkK9J";
                        $mail->Host     = "acmestickers.com";
                        $mail->Mailer   = "smtp";
                        $mail->SetFrom("orders@acmestickers.com","Acme Stickers");
                        $mail->AddAddress($to);	
                        $mail->Subject = $subject;
                        $mail->Body    = $message;
                        $mail->WordWrap   = 80;
                        if($_SESSION['ghost'] == 0)
                        {
                            if(!$mail->Send()) {
                                $msg = "<p class='error'>Problem in Sending Mail.</p>";
                            } else {
                                $msg = "<p class='success'>Mail Sent Successfully.</p>";
                            }
                        }
                        $sms_txt = "Hi ". $usrname ."\n\nWe received your order AS$id_order.\n\n\nThanks,\nAcme Sticker";
                        if($proofing_sms==1)
                        {
                            $sDestination ="+".$code.$phone;
                            $account_sid = 'ACddfb48d031bf54554a1e68221e105f4f';
                            $auth_token = 'a24a7c2cc899eb2d8d7749ced756ed8d';
                            $twilio_number = "+12052739743";

                            $client = new Client($account_sid, $auth_token);
                            $client->messages->create(
                                $sDestination,
                                array(
                                    'from' => $twilio_number,
                                    'body' => $sms_txt
                                )
                            );
                        }
                    }

                    mysqli_close($conexion); //$delivery_date  = $_GET["deliverytime"];
                    echo'
                    <script>
                        window.location = "../order.php?deliverytime='.$delivery_date.'&address='.$id_address.'&email='.$email.'&name='.$name.'&order='.$id_order.'";
                    </script>
                    ';
                }
                                    
            ?>
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
    <?php
    }
    else{
        echo'
            <script>
                window.location = "../cart.php?msg_error=Your guest session has expired";
            </script>
            ';
    }
    ?>
</body>
</html>