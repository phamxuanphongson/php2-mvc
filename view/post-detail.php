<?php include_once '../layouts/header.php'; ?>
<?php 
	$getThePost = $model->getOne('posts',$id);
	$view = $getThePost['view'];
	$view = $view+1;
	$doUpdateView = $model->updateView($view,$id);
	$getTheCate = $model->getOne('categories',$getThePost['cate_id']);
?> 
<?php 
	if (isset($_SESSION['auth'])) {
		if (isset($_POST['btn-cmt'])) {
			$name = $_SESSION['auth']['username'];
			$message = $_POST['message'];
			$post_id = $_POST['post_id'];
			$bool = true;
			if (empty($message)) {
				$bool = false;
				$err['message'] = "Vui long nhap binh luan truoc khi gui";
			}

			if ($bool == true) {
				$doAddCmt = $model->addCmt($name,null,$message,$post_id);
				if ($doAddCmt == true) {
					header("Location:../controller/controller.php?id=$post_id");
				}
			}

		}
	}
	else {
		if (isset($_POST['btn-cmt'])) {
			$guestname = $_POST['name'];
			$message = $_POST['message'];
			$post_id = $_POST['post_id'];
			$bool = true;
			if (empty($message)) {
				$bool = false;
				$err['message'] = "Vui long nhap binh luan truoc khi gui";
			}

			if ($bool == true) {
				$doAddCmt = $model->addCmt(null,$guestname,$message,$post_id);
				if ($doAddCmt == true) {
					header("Location:../controller/controller.php?id=$post_id");
				}
			}
		}
	}
?>
		<!-- /Header -->
		<div id="post-header" class="page-header">
				<div class="background-img" style="background-image: url('../uploaded/images/<?php echo $getThePost['images']; ?>');"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">
								<a class="post-category cat-<?php echo $getTheCate['id'] ?>" href="category.html"><?php echo $getTheCate['name'] ?></a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h1><?php echo $getThePost['title']; ?></h1>
						</div>
					</div>
				</div>
		</div>

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Post content -->
					<div class="col-md-8">
						<div class="section-row sticky-container">
							<div class="main-post">
								<h3><?php echo $getThePost['short_desc']; ?></h3>
								<p><?php echo $getThePost['content']; ?></p>
								
								
							</div>
							
						</div>

						<!-- ad -->
						
						<!-- author -->
						
						<!-- /author -->

						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								<h2>3 Comments</h2>
							</div>

							<div class="post-comments">
								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="../inc/img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>John Doe</h4>
											<span class="time">March 27, 2018 at 8:00 am</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

										<!-- comment -->
										
										<!-- /comment -->
									</div>
								</div>
								<!-- /comment -->

								
								<!-- /comment -->
							</div>
						</div>
						<!-- /comments -->

						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a reply</h2>
								<?php if (!isset($_SESSION['auth'])): ?>
									<p>your email address will not be published. required fields are marked *</p>
								<?php endif ?>
							</div>
							<form action="../controller/controller.php" method="post" class="post-reply">
								<input type="hidden" name="post_id" value="<?php echo $id ?>">
								<div class="row">

									<?php if (!isset($_SESSION['auth'])): ?>
										<div class="col-md-4">
											<div class="form-group">
												<span>Name *</span>
												<input class="input" type="text" name="name">
											</div>
										</div>
									<?php endif ?>

									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="message" placeholder="Message"></textarea>
											<span><?php echo isset($err) ? $err['message'] : '' ?></span>
										</div>
										<button name="btn-cmt" class="primary-button">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /reply -->
					</div>
					<!-- /Post content -->

					<!-- aside -->
					<div class="col-md-4">
						
						
						<!-- /ad -->

						<!-- post widget -->
						
						<!-- /post widget -->

						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Related Posts</h2>
							</div>
							<div class="post post-thumb">
								<a class="post-img" href="blog-post.html"><img src="../inc/img/post-2.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-3" href="#">Jquery</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
								</div>
							</div>

							<div class="post post-thumb">
								<a class="post-img" href="blog-post.html"><img src="../inc/img/post-1.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="#">JavaScript</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
								</div>
							</div>
						</div>
						<!-- /post widget -->
						
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<div class="category-widget">
								<ul>
									<li><a href="#" class="cat-1">Web Design<span>340</span></a></li>
									<li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
									<li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
									<li><a href="#" class="cat-3">CSS<span>35</span></a></li>
								</ul>
							</div>
						</div>
						<!-- ad -->
						<?php $getAllAds = $model->selectAll('ads') ?>
						<?php foreach ($getAllAds as $ads) {
							$newRandomAd[] = array($ads['id'],$ads['images'],$ads['link']);
							
						}
						
						$random2Ads = array_rand($newRandomAd,2);
						
						?>
						<div class="aside-widget text-center">
							<a href="<?php echo $newRandomAd[$random2Ads[0]][2]; ?> " style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="../uploaded/images/<?php echo $newRandomAd[$random2Ads[0]][1]; ?>" alt="">
							</a>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						
						<!-- /tags -->
						
						<!-- /archive -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<?php include_once '../layouts/footer.php'; ?>