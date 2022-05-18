<?php
    session_start();
    $traking = $_GET["traking"];
    $order = $_GET["order"];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="text/html, charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include "css.php";
    ?>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <style>
        body 
        {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-repeat: no-repeat
        }

        .card 
        {
            z-index: 0;
            background-color: #f9f9f9;
            padding-bottom: 20px;
            margin-top: 90px;
            margin-bottom: 90px;
            border-radius: 10px
        }

        .top 
        {
            padding-top: 40px;
            padding-left: 6% !important;
            padding-right: 10% !important;
        }

        #progressbar_tracking 
        {
            margin-bottom: 30px;
            overflow: hidden;
            color: #455A64;
            padding-left: 0px;
            margin-top: 30px
        }
        .d-flex 
        {
            padding-left: 0px !important;
        }
        li:hover 
        {
            background-color: transparent;
        }

        #progressbar_tracking li 
        {
            list-style-type: none;
            font-size: 13px;
            width: 14%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar_tracking .step0:before 
        {
            font-family: FontAwesome;
            content: "\f10c";
            color: #fff
        }

        #progressbar_tracking li:before 
        {
            width: 40px;
            height: 40px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            background: #C5CAE9;
            border-radius: 50%;
            margin: auto;
            padding: 0px
        }

        #progressbar_tracking li:after 
        {
            content: '';
            width: 100%;
            height: 12px;
            background: #C5CAE9;
            position: absolute;
            left: 0;
            top: 16px;
            z-index: -1
        }

        #progressbar_tracking li:last-child:after 
        {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            left: -50%
        }


        #progressbar_tracking li:first-child:after
        {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            left: 50%
        }

        #progressbar_tracking li:last-child:after 
        {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px
        }

        #progressbar_tracking li:first-child:after 
        {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px
        }

        #progressbar_tracking li.active_t:before,
        #progressbar_tracking li.active_t:after 
        {
            background: #f87060
        }

        #progressbar_tracking li.active_t:before 
        {
            font-family: FontAwesome;
            content: "\f00c"
        }

        .icon 
        {
            width: 60px;
            height: 60px;
            margin: auto;
        }

        .icon-content 
        {
            padding-bottom: 20px
        }

        @media screen and (max-width: 992px) 
        {
            .icon-content 
            {
                width: 15%
            }
            .font-weight-bold
            {
                font-size: .6rem !important;
            }
            .eventclass
            {
                font-size: .7rem !important;
            }
        }
    </style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
</head>
<?php include "nav.php";?>
    <main>
        <body oncontextmenu='return false' class='snippet-body'>
            <div class="container px-1 px-md-4 py-5 mx-auto">
                <div class="card" style="margin-top: 30px;">
                    <div class="row justify-content-between px-3 top">
                        <div class="">
                            <h6 style='display: inline-block;font-weight: 550;' class='font-mediums'>Order</h6>
                            <a class='link' href="https://acmestickers.com/account/order.php?order=<?php echo $order;?>" style="color: #2b71b8;">&nbsp;AS<?php echo $order;?></a>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <ul id="progressbar_tracking" class="text-center">
                            <?php
                            include 'php/conexion_be.php';
                            $query = "SELECT * FROM orders WHERE id='$order'";
                            $result = mysqli_query($conexion,$query);
                            if(mysqli_num_rows($result)>0)
                            {
                                $extraido       = mysqli_fetch_array($result);
                                $id             = $extraido['id'];
                                $statusp        = $extraido['statusp'];
                                $dates          = $extraido['dates'];
                                $tipe           = $extraido['tipe'];
                                if(!isset($_GET["traking"]))
                                {
                                    $traking    = $extraido['guie'];
                                }
                                $date = date_create($dates);
                                $date = date_format($date,"D M d Y H:i:s");
                                if($tipe != "Sample")
                                {
                                    ?>
                                    <style>
                                        #progressbar_tracking li:nth-child(1):after,
                                        #progressbar_tracking li:nth-child(2):after,
                                        #progressbar_tracking li:nth-child(3):after,
                                        #progressbar_tracking li:nth-child(4):after,
                                        #progressbar_tracking li:nth-child(5):after,
                                        #progressbar_tracking li:nth-child(6):after,
                                        #progressbar_tracking li:nth-child(7):after 
                                        {
                                            left: 50%
                                        }
                                    </style>
                                    <?php
                                    if($statusp==0)
                                    {
                                    ?>
                                        <li class="step0 active_t"></li>
                                        <li class="step0"></li>
                                        <li class="step0"></li>
                                        <li class="step0"></li>
                                        <li id="shipped" class="step0"></li>
                                        <li id="route" class="step0"></li>
                                        <li id="arrived" class="step0"></li>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if($statusp==1)
                                    {
                                    ?>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li class="step0"></li>
                                        <li class="step0"></li>
                                        <li id="shipped" class="step0"></li>
                                        <li id="route" class="step0"></li>
                                        <li id="arrived" class="step0"></li>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if($statusp==2)
                                    {
                                    ?>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li class="step0"></li>
                                        <li id="shipped" class="step0"></li>
                                        <li id="route" class="step0"></li>
                                        <li id="arrived" class="step0"></li>
                                    <?php
                                    }
                                    if($statusp==7)
                                    {
                                    ?>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li id="shipped" class="step0"></li>
                                        <li id="route" class="step0"></li>
                                        <li id="arrived" class="step0"></li>
                                    <?php
                                    }
                                    if($statusp==8)
                                    {
                                    ?>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li id="shipped" class="step0"></li>
                                        <li id="route" class="step0"></li>
                                        <li id="arrived" class="step0"></li>
                                    <?php
                                    }
                                    if($statusp==9)
                                    {
                                    ?>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li class="step0 active_t"></li>
                                        <li id="shipped" class="step0"></li>
                                        <li id="route" class="step0"></li>
                                        <li id="arrived" class="step0"></li>
                                    <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <style>
                                        #progressbar_tracking li {
                                            width: 24%;
                                        }
                                        .top {
                                            padding-left: 12% !important;
                                            padding-right: 15% !important;
                                        }
                                        #progressbar_tracking li:nth-child(1):after,
                                        #progressbar_tracking li:nth-child(2):after,
                                        #progressbar_tracking li:nth-child(3):after,
                                        #progressbar_tracking li:nth-child(4):after
                                        {
                                            left: 50%
                                        }
                                    </style>
                                    <?php
                                    if($statusp==0)
                                    {
                                    ?>
                                        <li class="step0 active_t tracking1"></li>
                                        <li id="shipped" class="step0"></li>
                                        <li id="route" class="step0"></li>
                                        <li id="arrived" class="step0"></li>
                                    <?php
                                    }
                                    if($statusp==8)
                                    {
                                    ?>
                                        <li class="step0 active_t tracking1"></li>
                                        <li id="shipped" class="step0"></li>
                                        <li id="route" class="step0"></li>
                                        <li id="arrived" class="step0"></li>
                                    <?php
                                    }
                                    if($statusp==9)
                                    {
                                    ?>
                                        <li class="step0 active_t tracking1"></li>
                                        <li id="shipped" class="step0"></li>
                                        <li id="route" class="step0"></li>
                                        <li id="arrived" class="step0"></li>
                                    <?php
                                    }
                                }
                            ?>
                                
                            </ul>
                            <?php
                             }
                            ?>
                        </div>
                    </div>
                    <input style="display:none;" type="text" name="traking" id="traking" value="<?php echo $traking;?>">
                    <input style="display:none;" type="text" name="order" id="id_order" value="<?php echo $order;?>">
                    <div class="row justify-content-between top">
                    <?php
                        if($tipe == "Sample")
                        {
                        ?>
                            <div class="row icon-content" style="display: inline;text-align: center;"> <img class="icon" src="assets/made.png">
                                <div class="  flex-column">
                                    <p class="font-weight-bold" style="text-align: center;font-family: 'Gotham-Light' !important;font-weight: lighter;font-size: 1.0rem;font-weight: 500 !important;">Order<br>Made</p>
                                </div>
                            </div>
                            <div class="row icon-content" style="display: inline;text-align: center;"> <img class="icon" src="assets/shipped.png">
                                <div class="flex-column">
                                    <p class="font-weight-bold" style="text-align: center;font-family: 'Gotham-Light' !important;font-weight: lighter;font-size: 1.0rem;font-weight: 500 !important;">Order<br>Shipped</p>
                                </div>
                            </div>
                            <div class="row icon-content" style="display: inline;text-align: center;"> <img class="icon" src="assets/route.png">
                                <div class="flex-column">
                                    <p class="font-weight-bold" style="text-align: center;font-family: 'Gotham-Light' !important;font-weight: lighter;font-size: 1.0rem;font-weight: 500 !important;">Order<br>In Route</p>
                                </div>
                            </div>
                            <div class="row icon-content" style="display: inline;text-align: center;"> <img class="icon" src="assets/arrived.png">
                                <div class="flex-column">
                                    <p class="font-weight-bold" style="text-align: center;font-family: 'Gotham-Light' !important;font-weight: lighter;font-size: 1.0rem;font-weight: 500 !important;">Order<br>Arrived</p>
                                </div>
                            </div>
                        <?php
                        }
                        else{
                            ?>
                            <div class="row icon-content" style="display: inline;text-align: center;"> <img class="icon" src="assets/made.png">
                                <div class="  flex-column">
                                    <p class="font-weight-bold" style="text-align: center;font-family: 'Gotham-Light' !important;font-weight: lighter;font-size: 1.0rem;font-weight: 500 !important;">Order<br>Made</p>
                                </div>
                            </div>
                            <div class="row icon-content" style="display: inline;text-align: center;"> <img class="icon" src="assets/process.png">
                                <div class="flex-column">
                                    <p class="font-weight-bold" style="text-align: center;font-family: 'Gotham-Light' !important;font-weight: lighter;font-size: 1.0rem;font-weight: 500 !important;">Waiting<br>On proof<br>approval</p>
                                </div>
                            </div>
                            <div class="row icon-content" style="display: inline;text-align: center;"> <img class="icon" src="assets/approve.png">
                                <div class="flex-column">
                                    <p class="font-weight-bold" style="text-align: center;font-family: 'Gotham-Light' !important;font-weight: lighter;font-size: 1.0rem;font-weight: 500 !important;">Proof<br>Approved</p>
                                </div>
                            </div>
                            <div class="row  icon-content" style="display: inline;text-align: center;"> <img class="icon" src="assets/print.png">
                                <div class="flex-column">
                                    <p class="font-weight-bold" style="text-align: center;font-family: 'Gotham-Light' !important;font-weight: lighter;font-size: 1.0rem;font-weight: 500 !important;">Printing<br></p>
                                </div>
                            </div>
                            <div class="row icon-content" style="display: inline;text-align: center;"> <img class="icon" src="assets/shipped.png">
                                <div class="flex-column">
                                    <p class="font-weight-bold" style="text-align: center;font-family: 'Gotham-Light' !important;font-weight: lighter;font-size: 1.0rem;font-weight: 500 !important;">Order<br>Shipped</p>
                                </div>
                            </div>
                            <div class="row icon-content" style="display: inline;text-align: center;"> <img class="icon" src="assets/route.png">
                                <div class="flex-column">
                                    <p class="font-weight-bold" style="text-align: center;font-family: 'Gotham-Light' !important;font-weight: lighter;font-size: 1.0rem;font-weight: 500 !important;">Order<br>In Route</p>
                                </div>
                            </div>
                            <div class="row icon-content" style="display: inline;text-align: center;"> <img class="icon" src="assets/arrived.png">
                                <div class="flex-column">
                                    <p class="font-weight-bold" style="text-align: center;font-family: 'Gotham-Light' !important;font-weight: lighter;font-size: 1.0rem;font-weight: 500 !important;">Order<br>Arrived</p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                       
                    </div>
                </div>
                <div class="card" >
                    <h6 style="display: inline-block;font-weight: 550;" class="font-mediums top">Events:</h6>
                    <div id="events">
                        <div class="row justify-content-between px-2 top">
                            <div>
                                <h6 class='eventclass'  style="font-family: 'Gotham-Light' !important;font-weight: lighter;font-weight: 100 !important;font-size: 1.0rem;">
                                    <span style="color:#2b71b8; !important;font-size: 1.0rem;display: inline-block;width: 20em;" ><?php echo $date; ?></span> ORDER MADE
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </body>
    </main>
<?php include "footer.php"; ?> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        var traking_number   = document.getElementById('traking').value;
        var parametros = 'traking='+ traking_number;
        var saveme =$.ajax({
            type: 'POST',
            url: "ups/track.php",
            data: parametros,
            success: function(result){
                $.ajax({
                    type: "GET",
                    url: "ups/track.xml",
                    dataType: "xml",
                    success: function(xml)
                    {
                        $(xml).find('Activity').each(function()
                        {
                            
                            var city                = $(this).find('City').text();
                            var StateProvinceCode   = $(this).find('StateProvinceCode').text();
                            var CountryCode         = $(this).find('CountryCode').text();

                            var Code                = $(this).find('StatusType > Code').text();
                            var Description         = $(this).find('StatusType > Description').text();

                            var DateT               = $(this).find('Date').text();
                            var Time                = $(this).find('Time').text();        
                            var formattedDate       = DateT.slice(0, 4) + "-" + DateT.slice(4, 6) + "-" + DateT.slice(6, 8);
                            var timeconcat          = Time.slice(0, 2) + ":" + Time.slice(2, 4) + ":" + Time.slice(4, 6);
                            var formDate            = new Date(formattedDate+"T"+timeconcat);
                            var recortada           = formDate.toString();
                            
                            var elemento = document.getElementById("events");                            
                            if(Code.toString() == "D")
                            {
                                var html =
                                "<div class='row justify-content-between px-2 top'>"+
                                    "<div>"+
                                        "<h6 class='eventclass' style='font-family: \"Gotham-Light\" !important;font-weight: lighter;font-weight: 100 !important;font-size: 1.0rem;'>"+
                                            "<span style='color:#2b71b8; !important;font-size: 1.0rem;display: inline-block;width: 20em;' >"+recortada.slice(0, 24)+"</span>"+city+", "+StateProvinceCode+" "+CountryCode+" DELIVERED"+
                                        "</h6>"+
                                    "</div>"+
                                "</div>";
                                document.getElementById("arrived").classList.add("active_t");
                                elemento.insertAdjacentHTML("beforeend", html);
                                update_complte(); 
                            }else if(Code.toString() == "P" || Code.toString() == "M")
                            {
                                var html =
                                "<div class='row justify-content-between px-2 top'>"+
                                    "<div>"+
                                        "<h6 class='eventclass' style='font-family: \"Gotham-Light\" !important;font-weight: lighter;font-weight: 100 !important;font-size: 1.0rem;'>"+
                                            "<span style='color:#2b71b8; !important;font-size: 1.0rem;display: inline-block;width: 20em;' >"+recortada.slice(0, 24)+"</span>"+CountryCode+" "+Description+
                                        "</h6>"+
                                    "</div>"+
                                "</div>";
                                document.getElementById("shipped").classList.add("active_t");
                                elemento.insertAdjacentHTML("beforeend", html); 
                            }else if(Code.toString() == "I"){
                                var html =
                                "<div class='row justify-content-between px-2 top'>"+
                                    "<div>"+
                                        "<h6 class='eventclass' style='font-family: \"Gotham-Light\" !important;font-weight: lighter;font-weight: 100 !important;font-size: 1.0rem;'>"+
                                            "<span style='color:#2b71b8; !important;font-size: 1.0rem;display: inline-block;width: 20em;' >"+recortada.slice(0, 24)+"</span>"+city+", "+StateProvinceCode+" "+CountryCode+" "+Description+
                                        "</h6>"+
                                    "</div>"+
                                "</div>";
                                document.getElementById("route").classList.add("active_t");
                                elemento.insertAdjacentHTML("beforeend", html); 
                            }
                            

                        });
                        
                    },
                error: function() {
                }
                });
            }
        });
        function update_complte()
        {
            var id_order = document.getElementById('id_order').value;
			
            var form_data2 = new FormData();                  
            form_data2.append('id_order', id_order);
            $.ajax({
                type: 'POST',
                url: 'php/complete.php',
                contentType: false,
                processData: false,
                data: form_data2,
                success:function(response) {
                },
                onFailure: function(response){
                }
            });
        }
    </script>
</html>