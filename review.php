<?php
include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title> Review</title>

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
							<li class="menu-item"><a href="index">Home</a></li>
							<li class="menu-item"><a href="about">About Us</a></li>
							<li class="menu-item current-menu-item"><a href="review">Movie reviews</a></li>
						</ul> <!-- .menu -->

						<!-- <form action="#" class="search-form">
							<input type="text" placeholder="Search...">
							<button><i class="fa fa-search"></i></button>
						</form> -->
					</div>
					 <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
							<a href="index">Home</a>
							<span>Movie Review</span>
						</div>

						<div class="filters">
							<div class="row">
								<div class="col-md-8">
									<select name="#" id="#" class="comman_selector category" placeholder="Choose Category">
										<option value="f">Category</option>
										<?php 
		                                  $b = "SELECT * FROM category";
											$res2 = mysqli_query($con,$b);
												foreach ($res2 as $c) {
									       
								    		
										?>
										<option value="<?php echo $c['c_name']; ?>"><?php echo $c['c_name']; ?></option>
										<?php 
		                                    }
										?>
									</select>
									<select name="#" id="#" class="comman_selector year">
										<option value="f"> Year</option>
										<?php 
		                                  $y = "SELECT DISTINCT movie_year FROM movie";

											$resy = mysqli_query($con,$y);
												foreach ($resy as $y) {
													foreach ($y as $y1) {
														
													
										?>
										<option value="<?php echo $y1; ?>"><?php echo $y1; ?></option>
										<?php 
		                                    }}
										?>
									</select>
								</div>
								<div class="col-md-4">
									<div class="srch">
										<input type="text" placeholder="Search..." value="" class="search_data">
										<button><i class="fa fa-search"></i></button>
									</div>
										
								</div>
							</div>
							
							
						</div>
						
						
						
						<div class="movie-list filter_data">
					
							

							
						</div> <!-- .movie-list -->
                        <div class="pagination"></div>


<!-- 
						<div class="pagination">
							<a href="#" class="page-number prev"><i class="fa fa-angle-left"></i></a>
							<span class="page-number current">1</span>
							<a href="#" class="page-number">2</a>
							<a href="#" class="page-number">3</a>
							<a href="#" class="page-number">4</a>
							<a href="#" class="page-number">5</a>
							<a href="#" class="page-number next"><i class="fa fa-angle-right"></i></a>
						</div> -->

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
					</div>-->  <!-- .row -->

					<div class="colophon">Copyright &copy; <script>document.write(new Date().getFullYear());</script> Tollywood Totality   </div>
				</div> <!-- .container -->

			</footer>
		</div>
		<!-- Default snippet for navigation -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>

		<script>

			var items =$('.movie-list .movie');
			var numItems = items.length;
			var perPage = 8;

			items.slice(perPage).hide();

			$('.pagination').pagination({
				items: (numItems/perPage),
				itemsOnpage: perPage,
				prevText:"<",
				nextText:">",
				onPageClick : function(pageNumber){
					var showFrom = perPage * (pageNumber - 1);
					var showTo = showFrom + perPage;
					items.hide().slice(showFrom, showTo).show();
				}
			});


		</script>
      <script type="text/javascript">
      	$(document).ready(function(){
         filter_data();

      	function filter_data(){

           var action = 'fetch_data';
           var cat = $( ".category" ).children("option:selected").val();
           var year = $( ".year" ).children("option:selected").val();
           var sr = $( ".search_data" ).val();
           console.log(cat,year,sr);
           $.ajax({
           	url:"fetch.php",
           	method: "POST",
           	data: {action:action,cat:cat,year:year,search:sr},
           	success:function(data){
           		$('.filter_data').html(data);
           	}
           });
       }
       
       $('select').change(function(){
       	filter_data();
       })
       
        $('.search_data').keyup(function(){
       	filter_data();
       })

      	});
      </script>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>