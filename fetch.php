<?php 
include('connect.php');

if(isset($_POST["action"])){
	$query = "SELECT * FROM movie where m_status= 'True'";

	if(isset($_POST["cat"])){
		if(strcmp($_POST["cat"],'f')){
			 $b = "select * from category where c_name='".$_POST["cat"]."'";
			 $resc = mysqli_query($con,$b);
     			foreach ($resc as $ct) {
			    $query .= " AND movie_id IN (SELECT movie_id FROM movie_cat WHERE cat_id = ".$ct['c_id'].")";
			}
		}
		
	}
	if(isset($_POST["year"])){
		if(strcmp($_POST["year"],'f')){
			$query .= " AND movie_year = '".$_POST["year"]."'";
		}
		
	}
	if(isset($_POST["search"])){
		if(strcmp($_POST["search"],'f')){
			$query .= " AND movie_title LIKE '%".$_POST["search"]."%'";
		}
		
	}
    
	$res1 = mysqli_query($con,$query);

    $output = ''; 
     foreach ($res1 as $movie) {
     	$output .= '<div class="movie">
						<figure class="movie-poster"><img src="mimages/'.$movie['m_img'].'" alt="#"></figure>
								<div class="movie-title"><a href="single.php?mid='.$movie['movie_id'].'">'.$movie['movie_title'].'</a></div>
								<p>'.$movie['m_sdes'].'</p>
							</div>';
     }
     echo $output;
}

?>