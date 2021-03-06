<?php
include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Tollywood Totality</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">

	</head>


	<body>
		

		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="index" id="branding">
						<img src="" alt="" class="logo">
						<div class="logo-copy">
							<h1 style="font-family: 'Bookman old style, Sans Serif';">Tollywood Totality</h1>
							<small class="site-description"></small>
						</div>
					</a> <!-- #branding -->

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="index">Home</a></li>
							<li class="menu-item"><a href="about">About Us</a></li>
							<li class="menu-item"><a href="review">Movie reviews</a></li>
						</ul> <!-- .menu -->

						<!-- <form action="#" class="search-form">
							<input type="text" placeholder="Search...">
							<button><i class="fa fa-search"></i></button>
						</form> -->
					</div>

					<div class="mobile-navigation"></div>
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="row">
							<div class="col-md-9">
								<div class="slider">
									<ul class="slides">
										<li><a href="#"><img src="dummy/slide-1.jpg" alt="Slide 1"></a></li>
										<li><a href="#"><img src="dummy/slide-3.jpg" alt="Slide 3"></a></li>	
										<li><a href="#"><img src="dummy/slide-2.jpg" alt="Slide 2"></a></li>	
									</ul>
								</div>
							</div>
							<div class="col-md-3">
								<div class="row">
									
									<?php 
										$a= "Select * from `movie` order by movie_id desc limit 2";
										$res1 = mysqli_query($con,$a);
			                                if(!empty($res1))
			                                    {
			                                        foreach ($res1 as $m) {
										?>
										<div class="col-sm-6 col-md-12">
											<div class="latest-movie">
												<a href="single.php?mid=<?php echo $m['movie_id'] ?>"><img src="mimages/<?php echo $m['m_img'] ?>" alt="Movie 3"></a>
											</div>
										</div>
										<?php }} ?>
								</div>
							</div>
						</div> <!-- .row -->
						<div class="row">
							<?php 
							$a= "Select * from `movie` order by movie_id desc limit 6 OFFSET 2";
							$res1 = mysqli_query($con,$a);
                                if(!empty($res1))
                                    {
                                        foreach ($res1 as $m) {
							?>
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="single.php?mid=<?php echo $m['movie_id'] ?>"><img src="mimages/<?php echo $m['m_img'] ?>" alt="Movie 3"></a>
								</div>
							</div>
							<?php }} ?>
							
						</div> <!-- .row -->
						
						<div class="row">
							<div class="col-md-4">
								<h2 class="section-title">December premiere</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
								<ul class="movie-schedule">
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
								</ul> <!-- .movie-schedule -->
							</div>
							<div class="col-md-4">
								<h2 class="section-title">November premiere</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
								<ul class="movie-schedule">
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
								</ul> <!-- .movie-schedule -->
							</div>
							<div class="col-md-4">
								<h2 class="section-title">October premiere</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
								<ul class="movie-schedule">
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
									<li>
										<div class="date">16/12</div>
										<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
									</li>
								</ul> <!-- .movie-schedule -->
							</div>
						</div>
					</div>
				</div> <!-- .container -->
			</main>
			<footer class="site-footer">
				<div class="container">
					<!--<div class="row">
						<div class="col-md-12">
							<div class="widget">
								<h3 class="widget-title">About Us</h3>
								<p>We aim to provide you the best management system of Ratings, Reviews, Suggestions, Queries, and many more related to Tollywood movies.</p>
							</div>
						</div>
					</div>--> <!-- .row -->

					<div class="colophon">Copyright &copy; <script>document.write(new Date().getFullYear());</script> Tollywood Totality  </div>
				</div> <!-- .container -->

			</footer>
		</div>
		<!-- Default snippet for navigation -->
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>