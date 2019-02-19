<?php 
	$model = new model();
	$getAllCates = $model->selectAllCates();
 ?>
 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../inc/css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="../inc/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="../inc/css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<!-- Nav -->
			<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="index.html" class="logo"><img src="../inc/img/logo.png" alt=""></a>
						</div>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<?php foreach ($getAllCates as $element => $obj) { ?>

								<li class="cat-<?php echo $obj['id']; ?>"><a href="?categories-<?php echo $obj['id'] ?>"><?php echo $obj['name']; ?></a></li>

							<?php }?>
						</ul>
						<!-- /nav -->
						
						<form action="../view/login.php" class="navbar-form navbar-right" method="post">
							<a href="../view/admin-home.php" class="btn" title=""><i class="fa fa-user"></i></a>
							<button name="btn-search" type="submit" class="btn btn-default navbar-btn"><i class="fa fa-search"></i></button>
							<div class="form-group">
								<input class="form-control" type="text" name="search" placeholder="Enter Your Search ...">
							</div>
						</form>
						

						<!-- search & aside toggle -->
						
						<!-- /search & aside toggle -->
					</div>
				</div>
				<!-- /Main Nav -->

				
			</div>
			<!-- /Nav -->
		</header>
		<!-- /Header -->

		<!-- section -->