<?php
include('connect.php');

if(isset($_POST['addmovie']))
{

$mtitle = $_POST["mtitle"];
$m_sdes = $_POST["m_sdes"];
$m_ldes = $_POST["m_ldes"];
$rt = $_POST["rt"];
$len = $_POST["len"];
$prm = $_POST["prm"];
$drt = $_POST["drt"];
$wrt = $_POST["wrt"];
$st = $_POST["st"];
$yr = $_POST["yr"];

$m1= $_FILES["m_img"]["name"];


$z= "INSERT INTO `movie`(`movie_title`, `m_img`, `m_sdes`, `m_ldes`, `m_rating`, `m_length`, `m_premiere`, `m_director`, `m_writer`, `m_stars`, `movie_year`,`m_status`) VALUES ('$mtitle','$m1','$m_sdes','$m_ldes', $rt ,'$len','$prm','$drt','$wrt','$st','$yr','True')";


$res = mysqli_query($con,$z);
if($res)
{
    $a1=move_uploaded_file($_FILES["m_img"]["tmp_name"],"../mimages/".$_FILES["m_img"]["name"]);
     // $last_id = $con->insert_id;
     // echo $last_id;
    
    if(isset($_POST['cate'])){
        $checkbox1=$_POST['cate'];

        $lid = " SELECT MAX(movie_id) FROM movie";
        $res1 = mysqli_query($con,$lid);
        foreach ($res1 as $mvid) {
            foreach($checkbox1 as $chk1)  
            {  
                $ct = "select c_id from category where c_name = '$chk1'";
                $rct = mysqli_query($con,$ct);
                foreach ($rct as $cid) {
                    print_r($mvid);
                   
                
                   $mct = "insert into `movie_cat`(`cat_id`,`movie_id`) values(".$cid['c_id'].",".$mvid['MAX(movie_id)'] ." )";
                   $rmct = mysqli_query($con,$mct);
                 }
            }  
            
        }
    }
      

echo "<script>
      alert('Movie added Successfully');
      window.location.href='allmovie.php';
      </script>";
}
else{
    echo "<script>
      alert('Fill all the fields')
      </script>";
}

}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Add Movie</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../images/fav.jpg">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
         <script src="ckeditor/ckeditor.js"></script>

    </head>


    <body class="fixed-left">
    
     <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="../index" class="logo">Tollywood Totality</a>
                    <a href="../index" class="logo-sm">TT</a>
                </div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->


            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        
                    </ul>

                    <ul class="nav navbar-right float-right list-inline">
                        
                        <li class="d-none d-sm-block">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light notification-icon-box"><i
                                    class="fas fa-expand"></i></a>
                        </li>


                        <li class="dropdown">
                            <a href="logout.php" class="dropdown-toggle profile waves-effect waves-light" 
                                aria-expanded="true">
                              <!--   <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle"> -->
                                <span class="profile-username">
                                   Logout
                                </span>
                            </a>
                          
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->

         <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <div class="user-details">
                    <div class="user-info">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Admin</a>
                            
                        </div>
                    </div>
                </div>
                <!--- Divider -->


                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="dashboard.php" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                        </li>
                        <li>
                            <a href="category.php" class="waves-effect"><i class="ti-layers-alt"></i><span> Category</span></a>
                        </li>
                        <li>
                            <a href="addmovie.php" class="waves-effect"><i class="ti-plus"></i><span> Add Movie </span></a>
                        </li>
                        <li>
                            <a href="allmovie.php" class="waves-effect"><i class="ti-pencil"></i><span> Manage Movies </span></a>
                        </li>


                        

                    </ul>
                </div>
                
                
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Add Movie</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">
                        
                            <div class="row">
                                <!-- Basic example -->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <form action="addmovie.php" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Movie Title</label>
                                                    <input type="text" class="form-control" name="mtitle" id="" placeholder="Enter Movie Title">
                                                </div>

                                                 <div class="form-group">
                                                    <label for="exampleInputEmail1">Image</label>
                                                    <input type="file" name="m_img" class="filestyle" data-buttonbefore="true" onchange="readURL1(this);">
                                                    <img src="#" id="blah1" alt="Selected Image Here.." style="height: auto;width: 150px;margin-top: 20px;">
                                                </div>

                                                 <div class="form-group">
                                                    <label class=" control-label">Category</label>
                                                    <div class="">
                                                    
                                                            <?php
                                                                 $a = "select * from category";
                                                                 $res1 = mysqli_query($con,$a);
            
                                                                    foreach ($res1 as $ct) {
                                                             ?>
                                                                <input type="checkbox" style="margin-left: 10px;" name="cate[]" value="<?php echo $ct['c_name']; ?>" >  <?php echo $ct['c_name']; ?>

                                                            <?php } ?>
                                                           
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Short Description </label>
                                                    <textarea class="form-control" id="" name="m_sdes" placeholder="Short Description " rows="3"></textarea>
                                                </div>

                                               <div class="form-group">
                                                <label for="exampleInputEmail1">Long Description </label>
                                                    <textarea id="editor" name="m_ldes" rows="30" ></textarea>
                                                
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Rating (In Float)</label>
                                                    <input type="text" class="form-control" id="" name="rt"  placeholder="Enter Rating">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Lenth</label>
                                                    <input type="text" class="form-control" id="" name="len"  placeholder="Enter Length">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Premiere</label>
                                                    <input type="text" class="form-control" id="" name="prm"  placeholder="Enter Premiere">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Director</label>
                                                    <input type="text" class="form-control" id="" name="drt"  placeholder="Enter Director">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Writer</label>
                                                    <input type="text" class="form-control" id="" name="wrt"  placeholder="Enter Writer">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Stars</label>
                                                    <input type="text" class="form-control" id="" name="st"  placeholder="Enter Stars">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Year</label>
                                                    <input type="text" class="form-control" id="" name="yr"  placeholder="Enter Year">
                                                </div>

                                               
                                                <button type="submit" name="addmovie" class="btn themebtn waves-effect waves-light">Add</button>
                                            </form>
                                        </div><!-- card-body -->
                                    </div> <!-- card -->
                                </div> <!-- col-->


                            </div> <!-- End row -->


                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

            <footer class="footer">
               Copyright ©2020 Tollywood Totality 
            </footer>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->




        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/app.js"></script>
       <!-- Bootstrap File Style -->
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
           <script type="text/javascript">
            $( document ).ready(function() {
        CKEDITOR.replace('editor');

    });
        </script>
  <script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah1')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>
    </body>
</html>
