<?php ob_start();?>
<?php session_start();?>
<?php
  if (isset($_SESSION['auth'])) {
      $name = $_SESSION['auth']['username'];
  }
?>
<?php include_once '../model/model.php'; ?>
<?php
	$model = new model();
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
		<style type="text/css" media="screen">
			<?php $getAllCates = $model->selectAll('categories'); ?>
			<?php foreach ($getAllCates as $obj): ?>
				.nav-menu li.cat-<?php echo $obj['id'] ?> a:after {
					     background-color: <?php echo $obj['color'] ?>;
				}
				.nav-menu li.cat-<?php echo $obj['id'] ?> a:hover, .nav-menu li.cat-<?php echo $obj['id'] ?> a:focus {
				     color: <?php echo $obj['color'] ?>;
				}
				.post-meta .post-category.cat-<?php echo $obj['id'] ?> {
				     background-color: <?php echo $obj['color'] ?>;
				}
			<?php endforeach ?>
		</style>
    </head>
	<body>
		<header id="header">
			<!-- Nav -->
			<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="../index.php" class="logo"><img src="../inc/img/logo.png" alt=""></a>
						</div>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<?php $getAllCates = $model->selectAll('categories'); ?>
							<?php foreach ($getAllCates as $obj) { ?>

								<li class="cat-<?php echo $obj['id']; ?>"><a href="?categories=<?php echo $obj['id'] ?>"><?php echo $obj['name']; ?></a></li>

							<?php }?>
						</ul>
						<!-- /nav -->
						
						<form action="../view/login.php" class="navbar-form navbar-right" method="post">
						
							<li style="display: inline-block;" class="dropdown user user-menu">
					            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					              <span class="hidden-xs"><?php echo isset($name) ? $name : '' ?></span>
					            </a>
					            <?php
					            	if (isset($_SESSION['auth'])) {
					            		$role = $_SESSION['auth']['role'];
					            		if ($role == 1) {
					            			echo '<a href="../view/admin-home.php"class="btn btn-default btn-flat dropdown-menu managerAdmin">Manager</a>';
					            		}
					            		else {
					            			echo '';
					            		}
					            	}
					             ?>
					            <a href="../view/log-out.php"class="btn btn-default btn-flat dropdown-menu">Sign out</a>
					         </li>
							<?php if (!isset($_SESSION['auth'])) : ?>
								<a href="../view/login.php" class="btn login-logo"><i class="fa fa-user"></i></a>
							<?php endif ?>
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
