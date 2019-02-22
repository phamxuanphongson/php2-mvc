<?php include_once '../layouts/header.php' ?>
<?php  
	$get2LastPosts = $model->getRecordsNOSL('posts','id','desc',2);
	$get20LastPosts = $model->getRecordsNOSL('posts','id','desc',20);
	$get3OlderPosts = $model->getRecordsNOSLT('posts','id','desc',20,3);
	$get6PostsMostView = $model->getRecordsNOSL('posts','view','desc',6);
	$getAllCates = $model->selectAll('categories');

?>


		<div class="section">
			
			<div class="container">
				
				<div class="row">	
					<?php 
					foreach ($get2LastPosts as $obj) { ?>
					<!-- lay tat ca cac categories theo cate_id	 -->
					<?php $cates = $model->getOne('categories',$obj['cate_id']); ?>
					<div class="col-md-6">
						<div class="post post-thumb">
							<a class="post-img" href="?id=<?php echo $obj
									['id']; ?>"><img src="../uploaded/images/<?php echo $obj['images'] ?>" alt=""></a>
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
							<?php $cates = $model->getOne('categories',$newArr[$random6Posts[$i]][2]); ?>
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
				<?php $cate = $model->getOne('categories',$post['cate_id']); ?>
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
							<?php $cates = $model->getOne('categories',$obj['cate_id']); ?>
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

