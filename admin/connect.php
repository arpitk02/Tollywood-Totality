 <?php

$con=mysqli_connect("localhost",'root','',"movie_db");
session_start();
   
if(!isset($_SESSION['username']))
{
	header("location:index.php");
}
?> 

