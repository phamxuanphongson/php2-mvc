<?php include_once '../layouts/header.php' ?>
<?php  
	$get2LastPosts = $model->get2LastRecords();
	$get20LastPosts = $model->get20LastRecords();

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
							<a class="post-img" href="blog-post.html"><img src="../inc/img/post-1.jpg" alt=""></a>
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
							$newArr[] = array($obj['id'],$obj['title'],$obj['cate_id']);
						}
						// lay ra 6 so random
						$random6Posts = array_rand($newArr,6);

						for ($i=0; $i <6 ; $i++) { ?>
							<!-- lay ra categories cua 6 random post -->
							<?php $cates = $model->getOneCate($newArr[$random6Posts[$i]][2]); ?>
							<div class="col-md-4">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="../inc/img/post-3.jpg" alt=""></a>
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

					
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="../inc/img/post-4.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.html">JavaScript</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="../inc/img/post-5.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-3" href="category.html">Jquery</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="../inc/img/post-3.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category.html">Web Design</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			
		</div>
	
		<div class="section">
			
			<div class="container">
			
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2>Most Read</h2>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="../inc/img/post-4.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.html">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
					

							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="../inc/img/post-6.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.html">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
						
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="../inc/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-4" href="category.html">Css</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">CSS Float: A Tutorial</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
						
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="../inc/img/post-2.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-3" href="category.html">Jquery</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
						
							
							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						
					
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							
						</div>
					
						
						
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<li><a href="#">Chrome</a></li>
									<li><a href="#">CSS</a></li>
									<li><a href="#">Tutorial</a></li>
									<li><a href="#">Backend</a></li>
									<li><a href="#">JQuery</a></li>
									<li><a href="#">Design</a></li>
									<li><a href="#">Development</a></li>
									<li><a href="#">JavaScript</a></li>
									<li><a href="#">Website</a></li>
								</ul>
							</div>
						</div>
					
					</div>
				</div>
				
			</div>
		</div>

<?php include_once '../layouts/footer.php'; ?>

