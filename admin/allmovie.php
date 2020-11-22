<?php
include('connect.php');

$a= "Select * from `movie`";
$res1 = mysqli_query($con,$a);


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>All Movies</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../images/fav.jpg">

        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

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
                        <h4 class="page-title">All Movies</h4>
                    </div>
                </div>

                <div class="page-content-wrapper ">

                    <div class="container-fluid">
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Movie Title</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th>Rating</th>
                                                    <th>Length</th>
                                                    <th>Premiere</th>
                                                    <th>Director</th>
                                                    <th>Writer</th>
                                                    <th>Star</th>
                                                    <th>Short Description</th>
                                                    <th>Year</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
            
                                                    $index = 0;
                                                    if(!empty($res1))
                                                    {
                                                    foreach ($res1 as $m) {
                                                        $index++;
                                                        
                                        
                                                    ?>

                                                  
                                                    <tr>
                                                    <td><?php echo $index; ?></td>
                                                    <td><?php echo $m['movie_title']; ?></td>
                                                    <td><img src="../mimages/<?php echo $m['m_img']; ?>"></td>
                                                    <td>
                                                        <?php
                                                         $c = "Select * from category where c_id IN (Select cat_id from movie_cat where movie_id = ".$m['movie_id'].")"; 
                                                         $res1 = mysqli_query($con,$c);
                                                         $ct = "";
                                                         foreach ($res1 as $c) {
                                                             $ct .= $c['c_name'].", ";
                                                           
                                                          }
                                                           echo substr($ct, 0, -2);
                                                        ?>

                                                    </td>
                                                    <td><?php echo $m['m_rating']; ?></td>
                                                    <td><?php echo $m['m_length']; ?></td>
                                                    <td><?php echo $m['m_premiere']; ?></td>
                                                    <td><?php echo $m['m_director']; ?></td>
                                                    <td><?php echo $m['m_writer']; ?></td>
                                                    <td><?php echo $m['m_stars']; ?></td>
                                                    <td><?php echo $m['m_sdes']; ?></td>
                                                    <td><?php echo $m['movie_year']; ?></td>
                                                    
                                                   
                                                    <td><a href="editmovie.php?mid=<?php echo $m['movie_id']; ?>">Edit</a> | 
                                                        <a id="" class="delete_movie" onclick="deletemv(this)" data-id="<?php echo $m['movie_id']; ?>" >Delete</a>
                                                    </td>
                                                    </tr>
                                                    <?php
                                                        }
                
                                                    } else {
                
                                                    ?>
                                                        <tr>
                                                        <td colspan="7">No Movies Found</td>
                                                        </tr>
                                                        <?php
                                                        
                                                    }
                                                    ?>
                                                    
                                                
                                                
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            </div> <!-- End Row -->
                        <!-- end row -->

                    </div><!-- container-fluid -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <footer class="footer">
               Copyright ©2020 Tollywood Totality 
            </footer>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


<div class="modal fade" id="delmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Movie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="delete.php" method="post">

          <div class="modal-body">
            <input type="hidden" name="del_id" id="del_id">
            <h5>Do You Want To Delete This Movie ??</h5>
          </div>
          <div class="modal-footer">
            <button type="submit" name = 'delete_movie' class="btn yes">Yes</button>
            <button type="button" class="btn no" data-dismiss="modal">No</button>
          </div>
      </form>    
    </div>
  </div>
</div>

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

        <!-- Required datatable js-->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>


        <script src="assets/js/app.js"></script>
 <script type="text/javascript">
     function deletemv(elem){
            $('#delmodal').modal('show');
               
            var fId = $(elem).data("id");

                console.log(fId);
                $('#del_id').val(fId);
            }
 </script>
    </body>
</html>