<?php 
include('connect.php');
$mid = $_GET['mid'];
$q = "select * from movie where movie_id = $mid";
$res1 = mysqli_query($con,$q);

foreach ($res1 as $m) {

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title><?php echo $m['movie_title'] ?></title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

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
					</a><!-- #branding -->

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index">Home</a></li>
							<li class="menu-item"><a href="about">About Us</a></li>
							<li class="menu-item current-menu-item"><a href="review">Movie reviews</a></li>
						</ul> <!-- .menu -->

						<!-- <form action="#" class="search-form">
							<input type="text" placeholder="Search...">
							<button><i class="fa fa-search"></i></button>
						</form> -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
							<a href="index">Home</a>
							<a href="review">Movie Review</a>
							<span><?php echo $m['movie_title'] ?></span>
						</div>

						<div class="content">
							<div class="row">
								<div class="col-md-4">
									<figure class="movie-poster"><img src="mimages/<?php echo $m['m_img'] ?>" alt="#" style="    width: 100%;"></figure>
								</div>
								<div class="col-md-8">
									<h2 class="movie-title"><?php echo $m['movie_title'] ?></h2>
									<div class="movie-summary">
										<p><?php echo $m['m_sdes'] ?></p>
									</div>
									<ul class="movie-meta">
										<li><strong>Rating:</strong><img src="images/star.png" class="star"><span class="rate"><?php echo $m['m_rating'] ?></span> /10
										</li>
										<li><strong>Length:</strong> <?php echo $m['m_length'] ?></li>
										<li><strong>Premiere:</strong> <?php echo $m['m_premiere'] ?></li>
										<li><strong>Category:</strong> 
                                         			<?php
                                                        $c = "Select * from category where c_id IN (Select cat_id from movie_cat where movie_id = ".$m['movie_id'].")"; 
                                                         $res1 = mysqli_query($con,$c);
                                                         $ct = "";
                                                         foreach ($res1 as $c) {
                                                             $ct .= $c['c_name'].", ";
                                                           
                                                          }
                                                            echo substr($ct, 0, -2);
                                                        ?></li>
									</ul>

									<ul class="starring">
										<li><strong>Directors:</strong> <?php echo $m['m_director'] ?></li>
										<li><strong>Writers:</strong> <?php echo $m['m_writer'] ?></li>
										<li><strong>Stars:</strong> <?php echo $m['m_stars'] ?></li>
									</ul>
								</div>
							</div> <!-- .row -->
							<div class="entry-content">
								<p><?php echo $m['m_ldes'] ?></p>
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

					<div class="colophon">Copyright &copy; <script>document.write(new Date().getFullYear());</script> Tollywood Totality   </div>
				</div> <!-- .container -->

			</footer>
		</div>
		<!-- Default snippet for navigation -->
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>
<?php } ?>