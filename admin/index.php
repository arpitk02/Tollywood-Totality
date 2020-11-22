<?php
session_start();
 $error = '';
if(isset($_POST["login-btn"]))
{
    $name = $_POST["username"];
    $p = $_POST["password"];
   

    if($name== 'Admin')
    {
        if($p=='123456')
        {
            $error= '';
            $_SESSION['username']= $name;
            $_SESSION['pass']= $p;
            header("location:dashboard.php");
        }
        else
        {
            $error = 'Invalid Password or Username!!';

        }
    }
    else    
    {
       $error = 'Invalid Username or Username!!';

    }   
}    
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Bellehom</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../images/fav.jpg">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card card-pages">

                <div class="card-body">
                    <div class="text-center m-t-0 m-b-15">
                            <a href="../index" class="logo logo-admin"><h2 style="font-family: 'Bookman old style, Sans Serif';">Tollywood Totality</h2></a>
                    </div>
                         <p class="text-center text-danger" style="color: red;"><?php echo $error;?></p>

                    <form class="form-horizontal m-t-20" action="index.php" method="post">
                       
                        <div class="form-group">
                            <div class="col-12">
                                <input class="form-control" name="username" type="text"  placeholder="Username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <input class="form-control" name="password" type="password" placeholder="Password" required>
                            </div>
                        </div>


                        <div class="form-group text-center m-t-40">
                            <div class="col-12">
                                <button name="login-btn" class="btn themebtn btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                            </div>
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

        <script src="assets/js/app.js"></script>

    </body>
</html>