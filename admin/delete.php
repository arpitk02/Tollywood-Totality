<?php
include('connect.php');
   


    if(isset($_POST["delete_cat"]))
    {
        $delid = $_POST['del_id'];
        $delq1 = "DELETE FROM `category` WHERE c_id = $delid";
        mysqli_query($con,$delq1);
        echo "<script>window.location.href='category.php'; </script>";
    } 
     if(isset($_POST["delete_movie"]))
    {
        $delid = $_POST['del_id'];
        $delq1 = "DELETE FROM `movie` WHERE movie_id = $delid";
        mysqli_query($con,$delq1);
        echo "<script>window.location.href='allmovie.php'; </script>";
    } 

   
      

    ?>