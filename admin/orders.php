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
            var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;//printB_
            var form_data = new FormData();                  
            form_data.append('email', email);//
            form_data.append('name', name);//
            form_data.append('id_user', id);//
            $.ajax({
                type: 'POST',
                url: '../../print_email.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                       alert("success");
                       document.getElementById('printB_'+id).disabled=true;
                       document.getElementById('printB_'+id).style.backgroundColor="azure";
                       document.getElementById('printB_'+id).style.color="darkgray";
                       //var name = document.getElementById('printB_'+id).value;//printB_
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
        function Traking_number(id)
        {
            var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;
            var traking_n = document.getElementById('traking_n'+id).value;
            var form_data2 = new FormData();                  
            form_data2.append('email', email);//
            form_data2.append('name', name);//
            form_data2.append('id_user', id);//
            form_data2.append('traking_n', traking_n);//
            $.ajax({
                type: 'POST',
                url: '../../admin/shipping_email.php',
                contentType: false,
                processData: false,
                data: form_data2,
                success:function(response) {
                       var traking_n = document.getElementById('traking_n'+id).value="";
                       document.getElementById('traking_b'+id).disabled=true;
                       document.getElementById('traking_b'+id).style.backgroundColor="azure";
                       document.getElementById('traking_b'+id).style.color="darkgray";
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
            

            $.ajax({
                type: 'POST',
                url: '../../php/sendproof.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                    document.getElementById("button"+id).innerHTML="Done!";
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
        function Download(name)
        {
            //var source = name.getAttribute('src');
            //alert(name);
            window.open(name, "Download");
            //      src="https://res.cloudinary.com/dgnrey9it/image/upload/co_white,e_outline:20:0/bomba.png"
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
    </script>
</head>
<?php
if(isset($_SESSION['email_admi']))
{
?>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<script>
					document.addEventListener("DOMContentLoaded", function(event) { 
						//Send_emails();
						});
				</script>
				<a class="sidebar-brand" href="dashboard.php">
					<span class="align-middle">Acme Sticker</span>
				</a>
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
					<?php
					if($_SESSION['tipe_admi']  == 10)
					{
					?>
					<li class="sidebar-item">
						<a class="sidebar-link" href="sales.php">
							<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Sales</span>
						</a>
					</li>
					<?php
					}
					?>
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

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3>Orders</h3>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
								<div class="container-fluid p-0">
									<div class="row">
										
										<div class="modal fade show" id="sizedModalMd" tabindex="-1" style="padding-right: 19px;visibility: hidden;display: none;" aria-modal="true" role="dialog">
											<div class="modal-dialog modal-md" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Medium modal</h5>
														<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
													</div>
													<div class="modal-body m-3">
														<p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user
															notifications, or completely custom content.</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary">Save changes</button>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-12">
											<div class="card">
												<div class="card-header pb-0">
													<h5 class="card-title mb-0">Orders</h5>
												</div>
												<div class="card-body" id="usr">
													<?php
													include "../php/conexion_be.php";
													$query    = "SELECT * FROM orders WHERE price > 0 ORDER BY id DESC ";
													$validar  = mysqli_query($conexion,$query);
                									if(mysqli_num_rows($validar)>0)
													{
														?>
														<table class="table table-striped" style="width:100%">
														<thead>
															<tr>
																<th class="col-md-2">Order</th>
																<th class="col-md-2">Product</th>
																<th class="col-md-2">Date received</th>
																<th class="col-md-2" style="text-align: center;">Status</th>
															</tr>
														</thead>
														<tbody>
														<?php
														while ($extraido= mysqli_fetch_array($validar))
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
															
															?>
															
																<tr>
																		
																		<td  style="cursor: pointer;"><a href="order_details.php?order=<?php echo $id;?>"><?php echo $id;?></a></td>
																	<?php
																	if($tipe!="Sample")
																	{
																	?>
																		<td><?php echo $width_inches."\" x ".$height_inches."\" ".$tipe. " Qty: ".$quantity ;?></td>
																	<?php
																	}else
																	{
																	?>
																		<td><?php echo $tipe;?></td>
																	<?php
																	}
																	?>
																		<td><?php echo $date ;?></td>
																	
																	<?php
																	if($statusp == 0)
																	{
																	?>
																	<td style="text-align: center;">
																		<span class="badge bg-warning">Pending Proof</span>
																	</td>
																	<?php
																	}
																	?>
																	<?php
																	if($statusp == 1)
																	{
																	?>
																	<td style="text-align: center;">
																		<span class="badge bg-primary">Pending Approval</span>
																	</td>
																	<?php
																	}
																	?>
																	<?php
																	if($statusp == 2)
																	{
																	?>
																	<td style="text-align: center;">
																		<span class="badge bg-primary">Approved</span>
																	</td>
																	<?php
																	}
																	?>
																	<?php
																	if($statusp == 4)
																	{
																	?>
																	<td style="text-align: center;">
																		<span class="badge bg-danger">canceled</span>
																	</td>
																	<?php
																	}
																	?>
																	<?php
																	if($statusp == 6)
																	{
																	?>
																	<td style="text-align: center;">
																		<span class="badge bg-secondary">Reorder</span>
																	</td>
																	<?php
																	}
																	?>
																	<?php
																	if($statusp == 7)
																	{
																	?>
																	<td style="text-align: center;">
																		<span class="badge bg-info">Printing</span>
																	</td>
																	<?php
																	}
																	?>
																	<?php
																	if($statusp == 8)
																	{
																	?>
																	<td style="text-align: center;">
																		<span class="badge bg-info">In route</span>
																	</td>
																	<?php
																	}
																	?>
																	<?php
																	if($statusp == 9)
																	{
																	?>
																	<td style="text-align: center;">
																		<span class="badge bg-success">Delivered</span>
																	</td>
																	<?php
																	}
																	?>
																</tr>
															
													<?php
														}
														?>
															
															<!--
																<tr>
																	<td>Ashton Cox</td>
																	<td>Levitz Furniture</td>
																	<td>ashton@cox.com</td>
																	<td><span class="badge bg-success">Active</span></td>
																</tr>
																<tr>
																	<td>Sonya Frost</td>
																	<td>Child World</td>
																	<td>sonya@frost.com</td>
																	<td><span class="badge bg-danger">Deleted</span></td>
																</tr>
																<tr>
																	<td>Jena Gaines</td>
																	<td>Helping Hand</td>
																	<td>jena@gaines.com</td>
																	<td><span class="badge bg-warning">Inactive</span></td>
																</tr>
															-->
															</tbody>
														</table>
														<?php
													}
													?>
												</div>
											</div>
										</div>
										<div class="col-xl-4" style="visibility: hidden;" id="info">
											<div class="card">
												<div class="card-header">
													<div class="card-actions float-end">
														<div class="dropdown show">
															<a onclick="close_info()">
																<i class="align-middle me-2 fas fa-fw fa-window-close"></i>
															</a>

															<!--<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="#">Action</a>
																<a class="dropdown-item" href="#">Another action</a>
																<a class="dropdown-item" href="#">Something else here</a>
															</div>-->
														</div>
													</div>
												</div>
												<div class="card-body">
													<div class="row g-0"><!--
														<div>
															<h5 class="card-title mb-0" style="text-align: center;"><strong><?php // echo $_SESSION['data_name']; ?></strong></h5>
														</div>-->
														<?php
														if(isset($_SESSION['data_avatar']) && $_SESSION['data_avatar'] != null)
														{
														?>
															<img src="data:image/png;base64,<?php echo base64_encode($_SESSION['data_avatar']);?>" class="rounded-circle mt-2" alt="<?php echo $_SESSION['data_name'];?>" width="64" height="64" style="height: 100%;">
														<?php
														}else
														{
														?>
															<img src="usr.png" class="rounded-circle mt-2" alt="<?php echo $_SESSION['data_name'];?>" width="64" height="64" style="height: 100%;">
														<?php
														}
														?>
														
													</div>

													<span id="prog_string"></span>
													<table class="table table-sm mt-2 mb-4">
														<tbody>
															<tr>
																<th>Name</th>
																<td><?php echo $_SESSION['data_name'];?></td>
															</tr>
															
															<tr>
																<th>Email</th>
																<td><?php echo $_SESSION['data_email'];?></td>
															</tr>
															<tr>
																<th>Phone</th>
																<td><?php echo  $_SESSION['data_code'].$_SESSION['data_phone'];?></td>
															</tr>
															<tr>
																<th>Register since</th>
																<td><?php echo $_SESSION['data_date_create'];?></td>
															</tr>
															<tr>
																<th>Default address</th>
																<td> 
																	<?php 
																	$id=$_SESSION['data_id'];
																	$query_address  = "SELECT * FROM address_t WHERE id_user ='$id' AND default_address='1'";
																	$result_address = mysqli_query($conexion,$query_address);
																	if(mysqli_num_rows($result_address)>0)
																	{
																	$extraido3      = mysqli_fetch_array($result_address);
																	$country        = $extraido3['country'];
																	$full_name      = $extraido3['full_name'];
																	$company        = $extraido3['company'];
																	$street_address1= $extraido3['street_address1'];
																	$street_address2= $extraido3['street_address2'];
																	$city           = $extraido3['city'];
																	$statedir       = $extraido3['statedir'];
																	$zip_code       = $extraido3['zip_code'];
																	
																	echo $street_address1." ".$street_address2;?><br><?php echo $city.", ".$statedir." ".$zip_code;?><br>
																	<?php
																}
																	else{
																		echo "";
																		echo "";
																	}
																	?>
																</td>
															</tr>
															<tr>
																<th>Status</th>
																<td>
																<?php
																		if($_SESSION['data_admi'] ==1)
																		{
																		?>
																				<span class="badge bg-success">Active</span>
																		<?php
																		}else{
																		?>
																				<span class="badge bg-warning">Inactive</span>
																		<?php
																		}
																		?>
																</td>
															</tr>
															<tr>
																<th>Help</th>
																<td>
																	<a style="color: #3b7ddd;" id="txt_reset" onclick="Reset_pswd(<?php echo $id;?>)">Reset paswoord</a>
																</td>
															</tr>
														</tbody>
													</table>
													<div class="col-sm-9 col-xl-12 col-xxl-9" style="visibility: hidden;display: none;">
														<strong>About me</strong>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
															magna aliqua.</p>
													</div>
													<strong>Activity</strong>

													<ul class="timeline mt-2 mb-0">
													<?php
													include "../php/conexion_be.php";
													$id=$_SESSION['data_id'];
													$query    = "SELECT * FROM orders WHERE  id_user  = '$id' ORDER BY dates DESC";
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
															?>
															<li class="timeline-item">
																<strong>Order</strong>
																
																<span class="float-end text-muted text-sm">
																	<?php
																	$date=date_create($date);//"Y/m/d H:i:s
																	$date1=date_format($date,"Y-m-d");
																	$date2=date_format($date,"H:i:s");
																	$datef=$date1."T".$date2."Z";
																	
																	?>
																	<time class="timeago" datetime="<?php echo $datef;?>"><?php echo $datef;?></time>
																</span>
																<p><?php echo $width_inches."\" x ".$height_inches."\" ".$tipe."&nbsp;&nbsp;&nbsp; X &nbsp;". $quantity." ";?></p>
															</li>
															
															<?php
														}
													}
														?>
														<!--
															<li class="timeline-item">
																<strong>Signed out</strong>
																<span class="float-end text-muted text-sm">
																
																</span>
																<p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit...</p>
															</li>
															<li class="timeline-item">
																<strong>Created invoice #1204</strong>
																<span class="float-end text-muted text-sm">2h ago</span>
																<p>Sed aliquam ultrices mauris. Integer ante arcu...</p>
															</li>
															<li class="timeline-item">
																<strong>Discarded invoice #1147</strong>
																<span class="float-end text-muted text-sm">3h ago</span>
																<p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit...</p>
															</li>
															<li class="timeline-item">
																<strong>Signed in</strong>
																<span class="float-end text-muted text-sm">3h ago</span>
																<p>Curabitur ligula sapien, tincidunt non, euismod vitae...</p>
															</li>
															<li class="timeline-item">
																<strong>Signed up</strong>
																<span class="float-end text-muted text-sm">2d ago</span>
																<p>Sed aliquam ultrices mauris. Integer ante arcu...</p>
															</li>
														-->
													</ul>

												</div>
											</div>
										</div>
									</div>
									
									</div>
								
								</div>
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
</html>