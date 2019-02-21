<?php include_once '../layouts/header.php' ?>
<?php  
	$get2LastPosts = $model->get2LastRecords();
	$get20LastPosts = $model->get20LastRecords();
	$get3OlderPosts = $model->get3LastRecordsAfter20Posts();
	$get6PostsMostView = $model->get6PostsMostView();
	$getAllCates = $model->selectAllCates();

?>


		<div class="section">
			
			<div class="container">
				
				<div class="row">	
					<?php 
					foreach ($get2LastPosts as $obj) { ?>
					<!-- lay tat ca cac categories theo cate_id	 -->
					<?php $cates = $model->getOneCate($obj['cate_id']); ?>
					<div class="col-md-6">
						<div class="post post-thumb">
							<a class="post-img" href="blog-post.html"><img src="../uploaded/images/<?php echo $obj['images'] ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-<?php echo $cates['id'];?>" href=""><?php echo $cates['name']; ?></a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="?id=<?php echo $obj
									['id']; ?>"><?php echo $obj['title'] ?></a></h3>
							</div>
						</div>
					</div>
					<?php } ?>



					
					
					

					
				</div>
				

				
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent Posts</h2>
						</div>
					</div>

					<?php  
						foreach ($get20LastPosts as $index => $obj) {
							// ep title va cate id vao  1 mang, sau do ep tat ca vao 1 mang moi
							$newArr[] = array($obj['id'],$obj['title'],$obj['cate_id'],$obj['images']);
						}
						// lay ra 6 so random
						$random6Posts = array_rand($newArr,6);

						for ($i=0; $i <6 ; $i++) { ?>
							<!-- lay ra categories cua 6 random post -->
							<?php $cates = $model->getOneCate($newArr[$random6Posts[$i]][2]); ?>
							<div class="col-md-4">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="../uploaded/images/<?php echo $newArr[$random6Posts[$i]][3]; ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-<?php echo $cates['id'];?>" href="category.html"><?php echo $cates['name'] ?></a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="?id=<?php echo $newArr[$random6Posts[$i]][0]; ?>"><?php echo $newArr[$random6Posts[$i]][1]; ?></a></h3>
									</div>
								</div>
							</div>
							<?php } ?>
						
					<div class="clearfix visible-md visible-lg"></div>

				
					<!-- <div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="../inc/img/post-6.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.html">JavaScript</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
							</div>
						</div>
					</div> -->

				</div>
	
			</div>
		</div>

		<!-- /section -->
		
		<!-- section -->

		<div class="section section-grey">
		
			<div class="container">
				
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-left">
							<h2>Older Posts</h2>
						</div>
					</div>

					
				<?php foreach ($get3OlderPosts as $post): ?>
				<?php $cate = $model->getOneCate($post['cate_id']); ?>
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="../uploaded/images/<?php echo $post['images'] ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-<?php echo $cate['id'] ?>" href="category.html"><?php echo $cate['name'] ?></a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h3>
							</div>
						</div>
					</div>
				<?php endforeach ?>
					
					
					
				</div>
				
			</div>
			
		</div>
	
		<div class="section">
			
			<div class="container">
			
				<div class="row">
					<div class="col-md-8 ">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2>Most Read</h2>
								</div>
							</div>
							<?php foreach ($get6PostsMostView as $posts): ?>
							<?php $cates = $model->getOneCate($obj['cate_id']); ?>
								<div class="col-md-12 mostview">
									<div class="post post-row">
										<a class="post-img" href="blog-post.html"><img src="../uploaded/images/<?php echo $posts['images'] ?>" alt=""></a>
										<div class="post-body">
											<div class="post-meta">
												<a class="post-category cat-<?php echo $cates['id'] ?>" href="category.html"><?php echo $cates['name'] ?></a>
												<span class="post-date">March 27, 2018</span>
											</div>
											<h3 class="post-title"><a href="blog-post.html"></a><?php echo $posts['title'] ?></h3>
											<p><?php echo $posts['short_desc'] ?></p>
										</div>
									</div>
								</div>
							<?php endforeach ?>
							
					

							
						
							
							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block loadMore">Load More</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						
					
						<div class="aside-widget">
							<div class="section-title">
								<h2>Categories</h2>
							</div>
							
						</div>
					
						
						
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<?php foreach ($getAllCates as $cates): ?>
										<li><a href="#"><?php echo $cates['name'] ?></a></li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>

						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="../uploaded/images/Screenshot from 2019-02-17 23-09-33.png" alt="">
							</a>
						</div>

						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="../uploaded/images/Screenshot from 2019-02-17 23-09-33.png" alt="">
							</a>
						</div>
					
					</div>
				</div>
				
			</div>
		</div>

<?php include_once '../layouts/footer.php'; ?>

