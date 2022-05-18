<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../../assets/Logo_2.png"> 
	

	<title>Acme Sticker</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<!--<link rel="canonical" href="https://demo.adminkit.io/" />
	<script src="js/settings.js"></script>-->
	<script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
	<script>
        function removefile(id)
        {
            document.getElementById("imgInp"+id).value = null;
            document.getElementById("img"+id).src="";
            var oculta ="removefile_id"+id;
            $('#'+oculta).hide();
        }
        function inputf(input,id) 
        {
            if (input.files && input.files[0]) 
            {
                var reader = new FileReader();
                reader.onload = function(e) {
                var imagen="img"+id;
                $('#'+imagen).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
            $('#removefile_id'+id).css("display", "");
        }
        function Printing_alert(id)
        {
			//alert(id);
			//var id_order = document.getElementById('id_order').value; id_order id_user
			var form_data = new FormData();  
            var email = document.getElementById('email'+id).value;
            var name = document.getElementById('nameU'+id).value;
			var id_order = document.getElementById('id_order').value;
			var id_user = document.getElementById('id_user').value;
			
			//alert(name);
			
            form_data.append('email', email);//
            form_data.append('name', name);//
            form_data.append('id', id_user);//
			form_data.append('id_order', id_order);//
            $.ajax({
                type: 'POST',
                url: 'priv/print_email.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
						$("#buttons_status").load(location.href + " #buttons_status>*", "");
                       document.getElementById('printB_'+id).disabled=true;
                       document.getElementById('printB_'+id).style.backgroundColor="white";
                       document.getElementById('printB_'+id).style.color="darkgray";
					   location.reload(); 
                       //var name = document.getElementById('printB_'+id).value;//printB_
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
        function Traking_number(id)
        {
			//alert(id);
			var email = document.getElementById('email'+id).value;
            var name = document.getElementById('nameU'+id).value;
            var traking_n = document.getElementById('traking_n').value;
			var id_user = document.getElementById('id_user').value;
			var id_order = document.getElementById('id_order').value;
			var tipe = document.getElementById('tipe').value;
			//alert(email +" " +name +" "+traking_n +" "+ id_order+" "+id_user+ " "+ tipe);
            var form_data2 = new FormData();                  
			
            form_data2.append('email', email);//
            form_data2.append('name', name);//
            form_data2.append('id_user', id_user);//
            form_data2.append('traking_n', traking_n);//
			form_data2.append('id_order', id_order);//
			form_data2.append('tipe', tipe);
            $.ajax({
                type: 'POST',
                url: 'priv/shipping_email.php',
                contentType: false,
                processData: false,
                data: form_data2,
                success:function(response) {
						//alert("success");
						$("#buttons_status").load(location.href + " #buttons_status>*", "");
                       document.getElementById('traking_n').value = "";
                       document.getElementById('traking_b').disabled = true;
                       document.getElementById('traking_b').style.backgroundColor = "white";
                       document.getElementById('traking_b').style.color = "darkgray";
					   location.reload(); 
                },
                onFailure: function(response){
                }
            });

        }

        function ajax_file_upload(file_obj) 
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
                url: '../../php/upload_file_drop.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                       alert("success");
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
        function SendProof(id)
        {
            /*
				$link       = $_POST['link'];
				$coment     = $_POST['coment'];
				$id_order   = $_POST['id_order'];
				$email      = $_POST['email'];
				$name       =$_POST['name'];
				$code       =$_POST['phone'];
				$phone      =$_POST['code'];//id_user
            	$id_user      =$_POST['id_user'];link2
				basename
            */
            var link = document.getElementById("txt"+id).value;
            var coment = document.getElementById("coment"+id).value;
            var id_order = id;
            var email = document.getElementById("email"+id).value;
            var name = document.getElementById("nameU"+id).value;
            var code = document.getElementById("code"+id).value;
            var phone = document.getElementById("phone"+id).value;
            var id_user = document.getElementById("id_user"+id).value;
            var link2 = document.getElementById("link2"+id).value;
			var basename = document.getElementById("basename"+id).value;

            var form_data = new FormData();
            form_data.append('link',link);
            form_data.append('coment',coment);
            form_data.append('id_order',id_order);
            form_data.append('email',email);
            form_data.append('name',name);
            form_data.append('code',code);
            form_data.append('phone',phone);
            form_data.append('id_user',id_user);
            form_data.append('link2',link2);
            form_data.append('basename',basename);

            $.ajax({
                type: 'POST',
                url: '../../php/sendproof.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                    document.getElementById("button"+id).innerHTML="Done!";
					location.reload(); 
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
		function Send_emails()
		{
			$.ajax({
                type: 'POST',
                url: 'priv/send_emails.php',
                contentType: false,
                processData: false,
                success:function(response) {
                       //alert("success");
                },
                onFailure: function(response){
                    //alert("fail");
                }
            });
		}
        function Download(num,id)
        {
			var src;
            var source;
			if(num == 1)
			{
				src = document.getElementById("imagen_download");
            	source = src.getAttribute('src');
				id = id+"_original";
			}
			else{
				src = document.getElementById("donwload_pro");
            	source = src.getAttribute('src');
				id = id+"_proof";
			}
			forceDownload(source,id);
        }
		function forceDownload(url, fileName)
		{
			var xhr = new XMLHttpRequest();
			xhr.open("GET", url, true);
			xhr.responseType = "blob";
			xhr.onload = function(){
				var urlCreator = window.URL || window.webkitURL;
				var imageUrl = urlCreator.createObjectURL(this.response);
				var tag = document.createElement('a');
				tag.href = imageUrl;
				tag.download = fileName;
				document.body.appendChild(tag);
				tag.click();
				document.body.removeChild(tag);
			}
			xhr.send();
		}
		/*function forceDownload(link)
		{
			var url = link.getAttribute("data-href");
			var fileName = link.getAttribute("download");
			link.innerText = "Working...";
			var xhr = new XMLHttpRequest();
			xhr.open("GET", url, true);
			xhr.responseType = "blob";
			xhr.onload = function(){
				var urlCreator = window.URL || window.webkitURL;
				var imageUrl = urlCreator.createObjectURL(this.response);
				var tag = document.createElement('a');
				tag.href = imageUrl;
				tag.download = fileName;
				document.body.appendChild(tag);
				tag.click();
				document.body.removeChild(tag);
				link.innerText="Download Image";
			}
			xhr.send();
		}*/
		function refresh_proof(id)
		{
			//	alert(id);
			//alert(document.getElementById("txt"+id).value);
			document.getElementById("2").src =document.getElementById("txt"+id).value;
			//alert("ya");
		}
    </script>
	<style>
		.zoom:hover {
			transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
		}
		.btn{
			color: white;
			width: 100%;
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="dashboard.php">
          <span class="align-middle">Acme Sticker</span>
        </a>
		<script>
			document.addEventListener("DOMContentLoaded", function(event) { 
				//Send_emails();
				});
		</script>
		<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="dashboard.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="orders.php">
							<i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Orders</span>
						</a>
					</li>
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="customers.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Customers</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="sales.php">
							<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Sales</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="settings.php">
							<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
					<i class="hamburger align-self-center"></i>
				</a>

				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
              <i class="align-middle" data-feather="search"></i>
           		 </button>
					</div>
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator"></span>
								</div>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<!--<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="<?php echo $_SESSION['e_admi'];?>" /> -->
								<?php
									if(isset($_SESSION['email_admi']))
									{
										if($_SESSION['source_admi'] == "google")
										{
									?>
												<img src="<?php echo ($_SESSION['avatar_admi']);?>"  class="avatar img-fluid rounded me-1" alt="<?php echo $_SESSION['e_admi'];?>" >
									<?php
										}
										if(isset($_SESSION['avatar_admi']) && $_SESSION['avatar_admi'] != null && !isset($_SESSION['source_admi']))
										{
									?>
												<img src="data:image/png;base64,<?php echo base64_encode($_SESSION['avatar_admi']);?>"  class="avatar img-fluid rounded me-1" alt="<?php echo $_SESSION['e_admi'];?>">
									<?php
										}
										if(!isset($_SESSION['avatar_admi']) || $_SESSION['avatar_admi'] == null )
										{
									?>
												<img src="/assets/avatar.png"  class="avatar img-fluid rounded me-1" alt="<?php echo $_SESSION['e_admi'];?>">
									<?php
										}
										?>
									<?php
									}
								?>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="settings.php"><i class="align-middle me-1" data-feather="user"></i> Settings</a>
								<a class="dropdown-item" href="#" style="display: none;visibility: hidden;"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="priv/logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				
				<div class="container-fluid p-0">

					
					
					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							
							<div class="w-100">
								<div class="row">
								<?php
									if(isset($_SESSION['email_admi']))
									{
									?>
										<main style="position: relative;width: 100% !important;background-color:white;" >
											<div class="row mb-2 mb-xl-3" style="background-color: darkgrey;">
												<h3 style="color: white;">Order</h3>
											</div>
											<div class="content">
												<div class="container">
													<?php
													include "../php/conexion_be.php";
													require_once "../vendor/autoload.php";
													require_once "../config_cloud.php";
													$get_id = $_GET["order"];
													$query    = "SELECT * FROM orders WHERE id ='$get_id'";
													$result = mysqli_query($conexion,$query);
													if(mysqli_num_rows($result)>0)
													{
															while ($extraido= mysqli_fetch_array($result))
															{
																$id            = $extraido['id'];
																$id_user       = $extraido ['id_user'];
																$width_inches  = $extraido['width_inches'];
																$height_inches = $extraido ['height_inches'];
																$price         = $extraido['price'];
																$tipe          = $extraido ['tipe'];
																$quantity      = $extraido['quantity'];
																$id_images     = $extraido ['id_images'];
																$txt_details   = $extraido['txt_details'];
																$date          = $extraido['dates'];
																$statusp       = $extraido['statusp'];
																$id_address    = $extraido['id_address'];
																$guie   	   = $extraido['guie'];
																$query_user    = "SELECT * FROM users WHERE id='$id_user'";
																$result_user   = mysqli_query($conexion,$query_user);
																$extraido2     = mysqli_fetch_array($result_user);
																$name          = $extraido2['usrname'];
																$email         = $extraido2['email'];
																$code          = $extraido2['code'];
																$phone         = $extraido2['phone'];
																//id	id_user	country	full_name	company	street_address1	street_address2	city	zip_code	statedir
																$query_address = "SELECT * FROM address_t WHERE id='$id_address'";
																$result_address= mysqli_query($conexion,$query_address);
																$extraido3     = mysqli_fetch_array($result_address);
																$country       = $extraido3['country'];
																$full_name     = $extraido3['full_name'];
																$company       = $extraido3['company'];
																$street_address1= $extraido3['street_address1'];
																$street_address2= $extraido3['street_address2'];
																$city          = $extraido3['city'];
																$statedir      = $extraido3['statedir'];
																$zip_code      = $extraido3['zip_code'];
																$query_images  = "SELECT * FROM images WHERE id ='$id_images'";
																$result_images = mysqli_query($conexion,$query_images);
																$extraido4     = mysqli_fetch_array($result_images);
															
															?>
															<form action="../php/sendproof.php" class="orderslist .col-md-12 " method="post" enctype="multipart/form-data" style="padding-bottom:100px;">
																<div class="col-md-12 d-inline-block">
																	<div class="col-md-4 d-inline-block">
																		<input type="text" value="<?php echo $get_id?>" id="id_order" style="display: none;">
																		<input type="text" value="<?php echo $id_user?>" id="id_user" style="display: none;">
																	</div>
																	<div class="row col-md-12" style="padding-bottom: 50px;">
																		<div class="col-md-6 ">
																			<div class="dataorder" style="display: inline-block;">
																				<label class="campos fontBold">Order Number: </label><small class="field-help-message dateuser" style="width: 90%;">&nbsp;&nbsp; AS<?php echo $id;?></small> <br>
																				<label class="campos fontBold">Date Ordered: </label><small class="field-help-message dateuser" style="width: 90%;">&nbsp;&nbsp;  <?php echo $date;?></small> <br>
																			</div>
																		</div>
																	</div>																	
																	<div class="row" style="padding-bottom: 50px;">
																		<div class="col-md-6 ">
																			<?php
																					if($country == "US")
																					{
																						$country = "USA";
																					}
																					$date = date_create($date);
																					$date = date_format($date,"m / d / Y");
																				?>
																			<div class="dataorder" style="display: inline-block;">
																				<label class="campos fontBold">Name: </label><small class="field-help-message dateuser" style="width: 90%;">&nbsp;&nbsp; <?php echo $name;?></small> <br>
																				<label class="campos fontBold">Email: </label><small class="field-help-message dateuser" style="width: 90%;">&nbsp;&nbsp; <?php echo $email;?></small> <br>
																				<label class="campos fontBold">Address: </label><small class="field-help-message dateuser" style="width: 90%;">&nbsp;&nbsp; <?php  echo  $street_address1." " .$street_address2." <br>".$city ." " . $statedir ." " .$zip_code." " .$country;?></small> <br>
																				<input type="text" name="id_order" value="<?php echo $id;?>" style="display: none;" >
																				
																			</div>
																		</div>
																		
																		<div class="col-md-6 ">
																			<div class="row">
																				<div class="col-md-6 ">
																				</div>	
																				<div class="col-md-6 ">
																					<?php
																					if( $_SESSION['d_admi'] == 1 ||$_SESSION['e_admi'] == 1 || $_SESSION['tipe_admi']  == 10)
																					{
																						if($statusp !=6 && $statusp !=4)
																						{		
																							if($statusp == 0)
																							{
																							?>
																								<div type="button" class="btn btn-outline-primary btn-primary" style="margin-bottom: 50px;" id="button<?php echo $id;?>" onclick="SendProof(<?php echo $id;?>)">Send proof</div>
																							
																							<?php
																							}
																							if($statusp == 1)
																							{
																							?>
																								<div type="button" class="btn btn-outline-primary btn-primary" style="margin-bottom: 50px;" id="button<?php echo $id;?>" onclick="SendProof(<?php echo $id;?>)">Send new proof</div>
																							
																							<?php
																							}
																						}
																						if($statusp == 2 || $statusp == 6)
																						{
																							if($tipe != "Sample")
																							{
																						?>
																						<input class="button yellow large pr-4" style="width: 100%;margin-bottom: 10px;" id="printB_<?php echo $id;?>" onclick="Printing_alert(<?php echo $id;?>)" type="button" value="Send printing">
																						<?php
																							}
																							else
																							{
																						?>
																						<div class="figure" style="width: 100%;margin-bottom: 10px;">
																						
																							<input type="text" style="width: 100%;" placeholder=" Input traking number" class="figure" id="traking_n" name="traking_n<?php echo $id;?>">
																							<input class="button green large pr-4 figure" style="width: 100%;margin-bottom: 10px;" id="traking_b" onclick="Traking_number(<?php echo $id;?>)" type="button" value="Send traking #">
																						</div>
																						<?php
																							}
																						}
																						if($statusp == 7)
																						{
																							if($tipe != "Sample")
																							{
																						?>
																						<input class="button yellow large pr-4" style="width: 100%;margin-bottom: 10px;background-color: white;color: darkgray" disabled id="printB_<?php echo $id;?>" onclick="Printing_alert(<?php echo $id;?>)" type="button" value="Sent printing alert">
																						<?php
																							}
																						?>
																						<div class="figure" style="width: 100%;margin-bottom: 10px;">
																						
																							<input type="text" style="width: 100%;" placeholder=" Input traking number" class="figure" id="traking_n" name="traking_n<?php echo $id;?>">
																							<input class="button green large pr-4 figure" style="width: 100%;margin-bottom: 10px;" id="traking_b"onclick="Traking_number(<?php echo $id;?>)" type="button" value="Send traking #">
																						</div>
																						<?php
																						}
																						if($statusp == 8)
																						{
																							if($tipe != "Sample")
																							{
																						?>
																						<input class="button yellow large pr-4" style="width: 100%;margin-bottom: 10px;background-color: white;color: darkgray;" disabled id="printB_<?php echo $id;?>" onclick="Printing_alert(<?php echo $id;?>)" type="button" value="Sent printing alert">
																						<?php
																							}
																						?>
																						<div class="figure" style="width: 100%;margin-bottom: 10px;">
																						
																							<input type="text" style="width: 100%;" placeholder=" Input traking number"  class="figure" id="traking_n" name="traking_n">
																							<input class="button green large pr-4 figure" style="width: 100%;margin-bottom: 10px;background-color: white;color: darkgray;" disabled id="traking_b"onclick="Traking_number(<?php echo $id;?>)" type="button" value="Sent traking number">
																						</div>
																						<?php
																						}
																						if($guie != null)
																						{
																							?>
																							
																							<a href="http://wwwapps.ups.com/WebTracking/track?track=yes&trackNums=<?php echo $guie;?>" target="_blank" style="text-align: center;width: 100%;display: inline-block;"><?php echo $guie;?></a>
																							<?php
																						}
																						?>
																						<label style="width: 100%;text-align: center;">Status</label>
																						<?php
																						if($statusp == 0)
																						{
																						?>
																						<td style="text-align: center;">
																							<span class="btn  bg-warning">Pending Proof</span>
																						</td>
																						<?php
																						}
																						?>
																						<?php
																						if($statusp == 1)
																						{
																						?>
																						<td style="text-align: center;">
																							<span class="btn  bg-primary">Pending Approval</span>
																						</td>
																						<?php
																						}
																						?>
																						<?php
																						if($statusp == 2)
																						{
																						?>
																						<td style="text-align: center;">
																							<span class="btn  bg-primary">Approved</span>
																						</td>
																						<?php
																						}
																						?>
																						<?php
																						if($statusp == 4)
																						{
																						?>
																						<td style="text-align: center;">
																							<span class="btn  bg-danger">canceled</span>
																						</td>
																						<?php
																						}
																						?>
																						<?php
																						if($statusp == 6)
																						{
																						?>
																						<td style="text-align: center;">
																							<span class="btn  bg-secondary">Reorder</span>
																						</td>
																						<?php
																						}
																						?>
																						<?php
																						if($statusp == 7)
																						{
																						?>
																						<td style="text-align: center;">
																							<span class="btn  bg-info">Printing</span>
																						</td>
																						<?php
																						}
																						?>
																						<?php
																						if($statusp == 8)
																						{
																						?>
																						<td style="text-align: center;">
																							<span class="btn  bg-info">In route</span>
																						</td>
																						<?php
																						}
																						?>
																						<?php
																						if($statusp == 9)
																						{
																						?>
																						<td style="text-align: center;">
																							<span class="btn  bg-success">Delivered</span>
																						</td>
																						<?php
																						}
																						
																					}
																					?>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="row" style="padding-bottom: 50px;">
																		<div class="col-md-6 ">
																			<h4 class="customerinfo" >Shipping Address:</h4>
																			<small class="dataorder" style="display: grid;">
																				<?php  echo $name."<br>" . $street_address1." " .$street_address2." <br> ".$city ." " . $statedir ." " .$zip_code." " .$country;?>
																			</small>
																		</div>
																	</div>
																	<div class="row" style="padding-bottom: 50px;">
																		<div class="col-md-6 " style="display: inline-block;">
																			<label class="campos fontBold">Product:</label><small class="field-help-message dateuser" style="width: 90%;">&nbsp;&nbsp; <?php echo $tipe;?></small> <br>
																			<?php
																			if($tipe != "Sample")
																			{
																			?>
																			<label class="campos fontBold">Size:</label><small class="field-help-message dateuser" style="width: 90%;">&nbsp;&nbsp; <?php echo $width_inches."\" x ".$height_inches ."\"";?></small><br>
																			<label class="campos fontBold">Qty:</label><small class="field-help-message dateuser" style="width: 90%;">&nbsp;&nbsp; <?php echo $quantity;?></small><br>
																			<?php
																			}
																			?>
																		</div>
																	</div>
																</div>
																<div class="col-md-12">
																	<div class="row">
																		<?php
																		if($tipe != "Sample")
																		{
																		?>
																			<div class="col-md-4">
																		<?php
																		}
																		else
																		{
																		?>
																			<div class="col-md-11">
																		<?php
																		}
																		?>
																		
																			
																			<?php
																				if($statusp ==6)
																				{
																					?>
																						<label class="campos"></label><small class="field-help-message dateuser" style="width: 80%;font-size: 20px;text-align: center;">Reorder</small>
																					<?php
																				}
																			?>
																			<?php
																				if($statusp ==4)
																				{
																					?>
																					<img class="img_approved" alt="Approved" src="/assets/cancelled.png" style="height: 262px;padding-left: 20%;z-index: 99999;position: absolute;
																					-webkit-transform: translateY(-75%);-ms-transform: translateY(-75%); -moz-transform: translateY(-75%);  -o-transform: translateY(-75%);">
																					<?php
																				}
																			?>
																			<div class="row">
																				<div class="row">
																				</div>
																				<div class="col-md-12" style="background-color: gray;height: 400px;display: flex;width: 100%;margin: 20px;border: 1px solid black;position: relative;">
																					<h6 style="width: 100%;text-align: center;padding-top: 10px;color: white;font-weight: bold;">Original Artwork</h6>
																					<?php
																						$name_image = $extraido4['nombre'];
																						$file = base64_encode($extraido4['images']);
																						$extension = pathinfo($name_image , PATHINFO_EXTENSION);
																						$nombre_base = basename($name_image , '.'.$extension);  
																						$folder = 'usr_'.$id_user;
                                       													$nombre_base = $folder."/".$nombre_base;
																						$imagen = cl_image_tag($nombre_base,array("format" => "png","width"=>150));
																						if($tipe != "Sample")
																						{
																							?>
																								<img id="imagen_download" src="data:image/<?php echo $extension?>;base64,<?php echo $file;?>" style="width: 150px !important;max-height: 100%;max-width: 100%;position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;">
																							<?php
																						}
																						else{
																							?>
																								<img src="../assets/FondoStickers.webp" alt="Sample" style="width: 400px !important;height: 200px;max-height: 100%;max-width: 100%;position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;">
																							<?php
																						}
																						 ?>
																				</div>
																				<div style="width: 100%;margin: 20px;">
																					<div type="button" class="btn btn-info" style="width: 100%;" onclick="Download(1,<?php echo $id;?>)">
																						<i class="align-middle me-2" data-feather="download-cloud" id="donwload_or" ></i> <span class="align-middle"> Download
																					</div>
																				</div>
																			</div>
																		</div>
																		
																		
																		<?php																				
																			if($statusp == 6 || $statusp == 7)
																			{
																				if($_SESSION['e_admi'] || $_SESSION['d_admi'] || $_SESSION['tipe_admi']  == 10)
																				{
																				?>
																					<div style="float:right;display: none;width: 190px;padding-right: 20px;">
																						<input type="text" name="email" id="email<?php echo $id;?>" value="<?php echo $email;?>" style="display: none;">
																						<a href="#" id="removefile_id<?php echo $id;?>" onclick="removefile(<?php echo $id;?>)" style="position: absolute;display: none;"><i class='fas fa-times-circle'></i></a> 
																						<input type="text" name="email" id="email<?php echo $id;?>" value="<?php echo $email;?>" style="display: none;">
																						<input type="text" name="name" id="nameU<?php echo $id;?>" value="<?php echo $name;?>" style="display: none;">
																						<input type="text" name="code" id="code<?php echo $id;?>" value="<?php echo $code;?>" style="display: none;">
																						<input type="text" name="phone" id="phone<?php echo $id;?>" value="<?php echo $phone;?>" style="display: none;">
																						<input type="text" name="id_user" id="id_user<?php echo $id;?>" value="<?php echo $id_user;?>" style="display: none;">
																						
																						<input type="text" name="basename" id="basename<?php echo $id;?>" value="<?php echo $name_image;?>" style="display: none;">
																					</div>
																				<?php
																				}
																			}
																			if($statusp != 6)
																			{
																				$query_coments = "SELECT * FROM coments WHERE id_orders ='$id' AND coment_client ='1'";
																				$coments_result= mysqli_query($conexion,$query_coments);
																				$coments_cont = mysqli_num_rows($coments_result);
																				$coment_proof  = 0;
																				$cont=1;
																				while ($extraido5 = mysqli_fetch_array($coments_result))
																				{
																					$id_coments    = $extraido5['id'];
																					$id_orders     = $extraido5['id_orders'];
																					$coment_usr    = $extraido5['coment_usr'];
																					$coment_client = $extraido5['coment_client'];
																					$date_coment   = $extraido5['date_coment'];
																					$file_coment   = $extraido5['file_coment'];
																					$link          = $extraido5['link'];
																					$namefile 	   = $extraido5['namefile'];
																					if($cont == $coments_cont)
																					{
																						if($tipe != "Sample")
																						{
																						?>
																						<div class="col-md-4">
																						</div>
																						<div class="col-md-4">
																							<div class="row">
																								<div class="row">
																								</div>
																								<div class="col-md-12" style="background-color: gray;height: 400px;display: flex;width: 100%;margin: 20px;border: 1px solid black;position: relative;">
																									<h6 style="width: 100%;text-align: center;padding-top: 10px;color: white;font-weight: bold;">
																									<?php
																									if($statusp == 0)
																									{
																										echo "Proof";
																									}
																									if($statusp == 1)
																									{
																										echo "Proof Sent";
																									}
																									?></h6>
																									<img style="width: 150px !important;max-height: 100%;max-width: 100%;position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;" class="zoom" id="donwload_pro" src="<?php echo($link);?>">
																								</div>
																								<div style="width: 100%;margin: 20px;">
																									<div type="button" class="btn btn-info" style="width: 100%;"  onclick="Download(2,<?php echo $id;?>)">
																										<i class="align-middle me-2" data-feather="download-cloud"></i> <span class="align-middle"> Download
																									</div>
																								</div>
																							</div>
																						</div>
																						<?php
																						}
																						if($tipe != "Sample")
																						{
																							?>
																								<div class="col-md-12" style="height: 200px;">
																							<?php
																						}
																						else{
																							?>
																								<div class="col-md-1">
																							<?php
																						}
																							if($_SESSION['e_admi'] || $_SESSION['d_admi'] || $_SESSION['tipe_admi']  == 10)
																							{
																								?>
																									<a href="#" id="removefile_id<?php echo $id;?>" onclick="removefile(<?php echo $id;?>)" style="position: absolute;display: none;"><i class='fas fa-times-circle'></i></a> 
																									
																									<input type="text" name="email" id="email<?php echo $id;?>" value="<?php echo $email;?>" style="display: none;">
																									<input type="text" name="tipe" id="tipe" value="<?php echo $tipe;?>" style="display: none;">
																									<?php
																										$imagen = cl_image_tag($nombre_base,array("format" => "png"));
																										$html = $imagen;
																										$doc = new DOMDocument();
																										$doc->loadHTML($html);
																										$xpath = new DOMXPath($doc);
																										$src = $xpath->evaluate("string(//img/@src)");
																									?>
																									<input type="text" name="link2" id="link2<?php echo $id;?>" value="<?php echo $src;?>" style="display: none;">
																									<input type="text" name="name" id="nameU<?php echo $id;?>" value="<?php echo $name;?>" style="display: none;">
																									<input type="text" name="code" id="code<?php echo $id;?>" value="<?php echo $code;?>" style="display: none;">
																									<input type="text" name="phone" id="phone<?php echo $id;?>" value="<?php echo $phone;?>" style="display: none;">
																									<input type="text" name="id_user" id="id_user<?php echo $id;?>" value="<?php echo $id_user;?>" style="display: none;">
																									
																									<input type="text" name="basename" id="basename<?php echo $id;?>" value="<?php echo $name_image;?>" style="display: none;">
																									<?php
																									if($tipe != "Sample"  && $statusp !=2  && $statusp !=6  && $statusp !=7  && $statusp !=8)
																									{
																										?>
																										<label for="">Link</label>
																										<input type="text" name="link" id="txt<?php echo $id;?>"style="width: 100%;" onkeyup="refresh_proof(<?php echo $id;?>)">
																										
																										<label for="">Coment</label>
																										<?php
																										$extension = pathinfo($name_image , PATHINFO_EXTENSION);
																										$nombre_base = basename($name_image , '.'.$extension);  
																										$tag = cl_image_tag($name_image,  array('flags'=>'attachment:'.$nombre_base, 'fetch_format'=>$extension));
																										
																										
																										preg_match('/ src=(".*?"|\'.*?\'|.*?)[ >]/i', $tag, $m);
																										$src = $m[1];
																										if($statusp !=6 && $statusp !=4)
																										{		
																											?>
																												<textarea id="coment<?php echo $id;?>" name="coment" style="font-family:'Gotham-Light';width: 100%;height: 100%;"></textarea>
																											<?php
																										}
																									}
																							
																							}
																							?>
																						
																						</div>
																						<?php
																					}
																					$cont++;
																				}
																			}
																			if($coment_proof==1)
																			{
																			
																			}
																			
																			else{
																				?>
																						<img style="height:100%;">
																					</div>
																					<!--
																					<div style="float:right;width: 190px;padding-right: 20px;">
																					</div>-->
																				<?php
																			}
																			?>
																	</div>
																</div>
															</form>
														<?php
														}
													}
													?>
												</div>
											</div>
										</main>
									<?php
									}
									else{
										echo'
											<script>
												window.location = "index.php";
											</script>
											';
									}
									?>
								</div>
								<table>
									<tr>
										<?php
										if($pag>1)
										{
											?>
												<td class="prev" title="Previous"><a href="contact_all.php?pag=<?php echo $ant; ?>"><<<</a></td>
											<?php
										}else
										{
											?>
												<td class="prev" style="visibility: hidden;" title="Previous"><a href="contact_all.php?pag=<?php echo $ant; ?>"><<<</a></td>
											<?php
										}
										?>
										<td class="" title="number" style="text-align: center;"><?php echo $pag; ?></td>
										<?php
										if($pag+2<$cantidad)
										{
											?>
												<td class="next" title="Next" style="float: right;"><a href="contact_all.php?pag=<?php echo $sig; ?>"> >>></a></td>
											<?php
										}
										else{
											?>
												<td class="next" style="visibility: hidden;" title="Next" style="float: right;"><a href="">>>></a></td>
											<?php
										}
										?>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>Acme Sticker</strong></a> &copy;
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				}
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
			});
		});
	</script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</body>

</html>