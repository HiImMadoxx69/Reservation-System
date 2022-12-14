<?php

if(!isset($_SESSION))
{
    session_start();
}

require_once "../connections/connections.php";     


$sql = "SELECT * FROM tblloginuser";
$user = $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();
$total = $user->num_rows;
if ($_SESSION['Access']!="admin") {
     echo header ("Location:../home.php");
}
if(!isset($_SESSION['UserLogin'])){

    echo header ("Location: login.php");
}



if(isset($_POST['submit'])){
 $fname = $_POST["fname"];
 $lname = $_POST["lname"];
 $contact = $_POST["contact"];
 $username = $_POST["username"];
 $pass1 = $_POST["pass1"];
 $pass2 = $_POST["pass2"];
 $access=$_POST["access"];
if($pass1 == $pass2){
     $username = $_POST['username'];
      $pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
    $sql = "SELECT * FROM tblloginuser where username= '$username'";
 $result = mysqli_query($con, $sql);
$checkRow = mysqli_affected_rows($con);
 if ($checkRow <= 0) {
       
    $sql = "INSERT INTO `tblloginuser` (`firstname`, `lastname`, `contact`, `username`, `password`, `access`, `verified`) VALUES ('$fname', '$lname', '$contact', '$username', '$pass', '$access','1');";

     $result = mysqli_query($con, $sql);
     
     echo '<script>alert("Account Created");';
            echo 'window.location.replace("viewadmindentistaccount.php");</script>';
         }
         else{
            echo '<script>alert("Account Already Exist");';
            echo 'window.location.replace("register.php");</script>';
         }
   }
  
 }

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:  #c2855a;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img src="../images/comialogo.png" style="height: 70px;">
                <div class="sidebar-brand-text mx-3">Comia Dental Clinic</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
           

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    
                    <span>Accounts</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="viewuseraccount.php">View User Accounts</a>
                         <a class="collapse-item" href="viewadmindentistaccount.php">View Admin<br>/Dentist Accounts</a>
                      
                        <a class="collapse-item" href="utilities-other.php">Reset Password</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    
                    <span>Appointment</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="viewappointment.php">View Appointment</a>
                        
                        
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports"
                    aria-expanded="true" aria-controls="collapseReports">
                    
                    <span>Reports</span>
                </a>
                <div id="collapseReports" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="buttons.php">View Reports</a>
                        <a class="collapse-item" href="cards.php">Daily Reports</a>
                        <a class="collapse-item" href="cards.php">Monthly Reports</a>
                        <a class="collapse-item" href="cards.php">Yearly REports</a>
                        
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArchive"
                    aria-expanded="true" aria-controls="collapseArchive">
                    
                    <span>Archives</span>
                </a>
                <div id="collapseArchive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="archiveappointment.php">Archive Appointment</a>
                          <a class="collapse-item" href="archiveuseraccount.php">Archive User Account</a>
                            <a class="collapse-item" href="archiveadmindentistaccount.php">Archive Admin/<br>/Dentist Accounts</a>
                    </div>
                </div>
            </li>
           
           
           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                               echo $_SESSION['UserLogin'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ADD Admin/Dentists Account</h6>
 
                           <form method="POST" action="">
                     <div class="col-sm-8"><input type="hidden" name="id" id="id" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        
                        <div class="col-sm-3"><label>First Name </label><span>:</span></div>
                        <div class="col-sm-8"><input style="width: 300px;" type="text" name="fname"id="fname" placeholder="First Name" name="name" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Last Name</label><span>:</span></div>
                        <div class="col-sm-8"><input style="width: 300px;"tstyle="width: 300px;"ype="text" name="lname"id="lname" placeholder="Last name" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Contact Number</label><span>:</span></div>
                        <div class="col-sm-8"><input style="width: 300px;"type="text"name="contact"id="contact" placeholder="Enter Mobile Number" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Username</label><span>:</span></div>
                        <div class="col-sm-8"><input style="width: 300px;"type="email"name="username"id="username" placeholder="Enter Username" class="form-control input-sm"></div>
                    </div>
                       <div class="row cont-row">
                        <div class="col-sm-3"><label>Password</label><span>:</span></div>
                        <div class="col-sm-8"><input style="width: 300px;"type="password"name="pass1"id="pass1" placeholder="Enter Password" class="form-control input-sm"></div>
                    </div>
                       
                       <div class="row cont-row">
                        <div class="col-sm-3"><label>Repeat Password</label><span>:</span></div>
                        <div class="col-sm-8"><input style="width: 300px;"type="password"name="pass2"id="pass2" placeholder="Enter Password" class="form-control input-sm"></div>
                    </div>
                      <div class="row cont-row">
                      <div class="col-sm-3"><label for="services"><span>Access:</span></label></div>
                                    <div class="col-sm-8"><select select style="width: 300px;" class="form-control form-control-user" name="access" id="access" required>
                                            <option value="" selected disabled>Please select access:</option>
                                            <option value="admin">admin</option>
                                            <option  value="dentist">dentist</option>
                                            </select>
                                    </div></div>
                   
            
                     
                
                     
                

                   
                  
                    <div style="margin-top:30px;" class="row">
                        
                    </div>
                </div>
                
                <div class="col-sm-8" >

                            <button class="btn btn-success btn-sm" name="submit" id="submit" style="background-color: #c2855a; border-color: #c2855a;">Submit</button>
                        </div>
                       
                    </form>
              
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>