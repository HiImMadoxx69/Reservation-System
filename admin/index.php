<?php

if(!isset($_SESSION))
{
    session_start();
}
if ($_SESSION['Access']!="admin" && $_SESSION['Access']!="dentist") {
     echo header ("Location:../home.php");
}

require_once "../connections/connections.php";     
$date = date('20y-m-d');
$sql = "SELECT * FROM tblappointment WHERE date='$date'";
$user = $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();
 $totalappointment = $user->num_rows;

$sql = "SELECT * FROM tblappointment WHERE date='$date' AND status='Confirmed'";
$user = $con->query($sql) or die ($con->error);
 $row = $user->fetch_assoc();
 $todayappointment = $user->num_rows;

$sql = "SELECT * FROM tblappointment WHERE status='Pending'";
$user = $con->query($sql) or die ($con->error);
 $row = $user->fetch_assoc();
 $totalpendingappointment = $user->num_rows;

$sql = "SELECT * FROM tblappointment WHERE status='Cancelled'";
$user = $con->query($sql) or die ($con->error);
 $row = $user->fetch_assoc();
 $totalcancelled = $user->num_rows;

$sql = "SELECT * FROM tblloginuser";
$user = $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();
 $total = $user->num_rows;
if(!isset($_SESSION['Access'])){

    echo header ("Location: login.php");
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                     <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                 <a type="button" id="apt">  <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                APPOINTMENTS FOR TODAY</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $todayappointment?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $( document ).ready(function() { 
                                    $("#apt").on('click', function(){
                                         $( "#sec" ).remove();
                                            $( "#cont" ).append(' <div class="card shadow mb-4" id="sec"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Appointments for Today<br><form method="POST" action="addappointment.php"><br><button class="btn-success">ADD</button></form></h6></div><div class="card-body"><div class="table-responsive"><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead><tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Contact</th><th>Email</th><th>Clinic</th><th>Date</th><th>Time</th><th>Service</th><th>Status</th><th>Action</th></tr></thead><tbody><?php 
                            $sql = "SELECT * FROM tblappointment WHERE date='$date' AND status='Confirmed'";
                            $result = mysqli_query($con,$sql);
                            while ($row = mysqli_fetch_array($result)):
                   ?><tr><td><?php echo $row['ID'];?></td><td><?php echo $row['firstname']; ?></td><td><?php echo $row['lastname']; ?></td><td><?php echo $row['contact']; ?> </td><td><?php echo $row['email']; ?></td><td><?php echo $row['clinic']; ?></td><td><?php echo $row['date']; ?></td><td><?php echo $row['time']; ?></td><td><?php echo $row['service']; ?></td><td><?php echo $row['status']; ?></td><td style="width:150px"><a style="box-sizing: border-box;"  class="btn btn-success btn-sm" href="#myModaledit" data-toggle="modal" name="<?php echo $row['ID'];?>" id="edit">EDIT</a>&nbsp;<a class="btn btn-success btn-sm"  href="#myModal" data-toggle="modal"  name="<?php echo $row['ID'];?>" id="delete" style="background-color:red; border-color:red">DELETE</a></td></tr><?php endwhile; ?>
                                    </tbody></table></div></div></div></div>');

                              });

                                      $("#cft").on('click', function(){
                                            $( "#sec" ).remove();
                                            $( "#cont" ).append('<div class="card shadow mb-4" id="sec"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Clients for Today<br><form method="POST" action="addappointment.php"><br><button class="btn-success">ADD</button></form></h6></div><div class="card-body"><div class="table-responsive"><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead><tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Contact</th><th>Email</th><th>Clinic</th><th>Date</th><th>Time</th><th>Service</th><th>Status</th><th>Action</th></tr></thead><tbody><?php 
$sql = "SELECT * FROM tblappointment WHERE date='$date'";
                            $result = mysqli_query($con,$sql);
                            while ($row = mysqli_fetch_array($result)):
                   ?><tr><td><?php echo $row['ID'];?></td><td><?php echo $row['firstname']; ?></td><td><?php echo $row['lastname']; ?></td><td><?php echo $row['contact']; ?> </td><td><?php echo $row['email']; ?></td><td><?php echo $row['clinic']; ?></td><td><?php echo $row['date']; ?></td><td><?php echo $row['time']; ?></td><td><?php echo $row['service']; ?></td><td><?php echo $row['status']; ?></td><td style="width:150px"><a style="box-sizing: border-box;"  class="btn btn-success btn-sm" href="#myModaledit" data-toggle="modal" name="<?php echo $row['ID'];?>" id="edit">EDIT</a>&nbsp;<a class="btn btn-success btn-sm" href="#myModal" data-toggle="modal"   name="<?php echo $row['ID'];?>" id="delete" style="background-color:red; border-color:red">DELETE</a></td></tr><?php endwhile; ?>
                                    </tbody></table></div></div></div></div>');

                              });

                         $("#par").on('click', function(){
                                         $( "#sec" ).remove();
                                            $( "#cont" ).append('<div class="card shadow mb-4" id="sec"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Pending Appointment Requests<br><form method="POST" action="addappointment.php"><br><button class="btn-success">ADD</button></form></h6></div><div class="card-body"><div class="table-responsive"><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead><tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Contact</th><th>Email</th><th>Clinic</th><th>Date</th><th>Time</th><th>Service</th><th>Status</th><th>Action</th></tr></thead><tbody><?php 
$sql = "SELECT * FROM tblappointment WHERE status='Pending'";
                            $result = mysqli_query($con,$sql);
                            while ($row = mysqli_fetch_array($result)):
                   ?><tr><td><?php echo $row['ID'];?></td><td><?php echo $row['firstname']; ?></td><td><?php echo $row['lastname']; ?></td><td><?php echo $row['contact']; ?> </td><td><?php echo $row['email']; ?></td><td><?php echo $row['clinic']; ?></td><td><?php echo $row['date']; ?></td><td><?php echo $row['time']; ?></td><td><?php echo $row['service']; ?></td><td><?php echo $row['status']; ?></td><td style="width:150px"><a style="box-sizing: border-box;"  class="btn btn-success btn-sm" href="#myModaledit" data-toggle="modal" name="<?php echo $row['ID'];?>" id="edit">EDIT</a>&nbsp;<a class="btn btn-success btn-sm" href="#myModal" data-toggle="modal" name="<?php echo $row['ID'];?>" id="delete" style="background-color:red; border-color:red">DELETE</a></td></tr><?php endwhile; ?>
                                    </tbody></table></div></div></div></div>');
                                $('.btn-sm').on('click', function(){

                                $ID = $(this).attr('name');
                           console.log($(this).attr('name'));
                              
                               $('.btn-danger').click(function(){
                                 window.location = 'deleteappointment.php?ID=' + $ID;
                              });

                            });
                                  $('.btn-sm').on('click', function(){

                                $ID = $(this).attr('name');
                          
                                 $tr = $(this).closest('tr');
                                
                                var data = $tr.children("td").map(function() {
                                    return $(this).text();
                                }).get();

                                console.log(data);

                                $('#id').val(data[0]);
                                $('#firstname').val(data[1]);
                                $('#lastname').val(data[2]);
                                $('#contact').val(data[3]);
                                $('#email').val(data[4]);
                                $('#clinic').val(data[5]);
                                $('#date').val(data[6]);
                                $('#time').val(data[7]);
                                $('#service').val(data[8]);
                                $('#status').val(data[9]);
                            });


                              });
                         $("#ca").on('click', function(){
                                         $( "#sec" ).remove();
                                            $( "#cont" ).append(' <div class="card shadow mb-4" id="sec"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Cancelled Appointments<br><form method="POST" action="addappointment.php"><br><button class="btn-success">ADD</button></form></h6></div><div class="card-body"><div class="table-responsive"><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead><tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Contact</th><th>Email</th><th>Clinic</th><th>Date</th><th>Time</th><th>Service</th><th>Status</th><th>Action</th></tr></thead><tbody><?php 
$sql = "SELECT * FROM tblappointment WHERE status='Cancelled'";
                            $result = mysqli_query($con,$sql);
                            while ($row = mysqli_fetch_array($result)):
                   ?><tr><td><?php echo $row['ID'];?></td><td><?php echo $row['firstname']; ?></td><td><?php echo $row['lastname']; ?></td><td><?php echo $row['contact']; ?> </td><td><?php echo $row['email']; ?></td><td><?php echo $row['clinic']; ?></td><td><?php echo $row['date']; ?></td><td><?php echo $row['time']; ?></td><td><?php echo $row['service']; ?></td><td><?php echo $row['status']; ?></td><td style="width:150px"><a style="box-sizing: border-box;"  class="btn btn-success btn-sm" href="#myModaledit" data-toggle="modal" name="<?php echo $row['ID'];?>" id="edit">EDIT</a>&nbsp;<a class="btn btn-success btn-sm" href="#myModal" data-toggle="modal"  name="<?php echo $row['ID'];?>" id="delete" style="background-color:red; border-color:red">DELETE</a></td></tr><?php endwhile; ?>
                                    </tbody></table></div></div></div></div>');

                              });
                   

                            }); 

                        </script>



                          <!-- Delete Modal -->
                           <div id="myModal" class="modal fade">
                              <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                  <div class="modal-header flex-column">
                                    <div class="icon-box">
                                      <i class="material-icons">&#xE5CD;</i>
                                    </div>            
                                    <h4 class="modal-title w-100">Are you sure?</h4>  
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                  </div>
                                  <div class="modal-footer justify-content-center">
                                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </div>
                                </div>
                              </div>
                            </div>     
                                  <script typ
                            e="text/javascript">
                      
                         

                            </script>
    
         <!-- EDIT Modal -->
                          <div id="myModaledit" class="modal fade">
                              <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                  <div class="modal-header flex-column">
                                <h5 class="modal-title">EDIT</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                
                     
  <div class="container-fluid">

                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      
                        <div class="card-body">

                            <div class="table-responsive">

                     
                           <form method="POST" action="editappointment.php">
                     <div class="col-sm-8"><input type="hidden" name="id" id="id" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        
                        <div class="col-sm-3"><label>First Name </label><span>:</span></div>
                        <div class="col-sm-8"><input type="text" name="firstname"id="firstname" placeholder="First Name" name="name" class="form-control input-sm"value="<?php echo $row['firstname'];?>" disabled></div>
                    </div>
                      <div class="row cont-row">
                        
                       
                        <div class="col-sm-8"><input type="hidden" name="firstname"id="firstname" placeholder="First Name" name="name" class="form-control input-sm"value="<?php echo $row['firstname'];?>" ></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Last Name</label><span>:</span></div>
                        <div class="col-sm-8"><input type="text" name="lastname"id="lastname" placeholder="Last name" class="form-control input-sm"value="<?php echo $row['lastname'];?>" disabled></div>
                    </div>
                     <div class="row cont-row">
                     
                        <div class="col-sm-8"><input type="hidden" name="lastname"id="lastname" placeholder="Last name" class="form-control input-sm"value="<?php echo $row['lastname'];?>" ></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Contact Number</label><span>:</span></div>
                        <div class="col-sm-8"><input type="text"name="contact"id="contact" placeholder="Enter Mobile Number" class="form-control input-sm"value="<?php echo $row['contact'];?>" disabled></div>
                    </div>
                     <div class="row cont-row">
                     
                        <div class="col-sm-8"><input type="hidden"name="contact"id="contact" placeholder="Enter Mobile Number" class="form-control input-sm"value="<?php echo $row['contact'];?>" ></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Email</label><span>:</span></div>
                        <div class="col-sm-8"><input type="email" name="email" id="email" placeholder="Enter Mobile Number" class="form-control input-sm"value="<?php echo $row['email'];?>" disabled></div>
                    </div>
                    <div class="row cont-row">
                      
                        <div class="col-sm-8"><input type="hidden" name="email" id="email" placeholder="Enter Mobile Number" class="form-control input-sm"value="<?php echo $row['email'];?>" ></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Date</label><span>:</span></div>
                        <div class="col-sm-8"><input type="date" id="date" name="date" id="date"value="<?php echo $row['date'];?>"></div>

                    </div>

<script>
    var date= new Date();
    var tdate= date.getDate();
    var month = date.getMonth() + 1;
    if(tdate<10){
        tdate='0' + month;
    }

    if(month<10){
        month='0' + month;
    }
var year=date.getUTCFullYear();
var minDate = year + "-" + month + "-" + tdate;
document.getElementById("date").setAttribute('min', minDate)
    console.log(minDate);
</script>



                    <div class="row cont-row">
                       
                                 
                                   <div class="col-sm-8"><label for="clinic"><span>Clinic:</span></label>     </div>
                                   <br>  <br>
                                      <select class="form-control input-sm" name="clinic" id="clinic">
                                        <option value="bacoor">bacoor</option>
                                        <option value="paliparan">paliparan</option>
                                       
                                      </select>
                                      <br><br>
                                    
                                  
                    </div>

                           <div class="row cont-row">
                       
                                 
                                   <div class="col-sm-8"><label for="time"><span>Time:</span></label>     </div>
                                   <br>  <br>
                                      <select class="form-control input-sm" name="time" id="time">
                                        <option value="10:30 AM">10:30 AM</option>
                                        <option value="11:30 AM">11:30 AM</option>
                                       
                                        <option value="1:00 PM">1:00 PM</option>
                                        
                                     
                                         <option value="1:30 PM">1:30 PM</option>
                                        <option  value="2:00 PM">2:00 PM</option>
                                        <option  value="2:30 PM">2:30 PM</option>
                                         <option  value="3:00 PM">3:00 PM</option>
                                        <option value="3:30 PM">3:30 PM</option>
                                        <option  value="4:00 PM">4:00 PM</option>
                                        <option  value="4:30 PM">4:30 PM</option>
                                       
                                      </select>
                                      <br><br>
                                    
                                  
                    </div>

                    <br>
                      <div class="col-sm-8"><label for="services"><span>Services:</span></label></div>
                          <br>       
                      <div class="row cont-row">

                                 
                                    <div class="form-check">

      <input type="checkbox" name="services[]" value="General Dentistry" ></input>
      <label>General Dentistry</div>
      </label>  
      <div class="form-check">
      <input type="checkbox" name="services[]" value="Oral Surgery">
      <label>Oral Surgery
        
      </label>  
      </div>
        <div class="form-check">
      <input type="checkbox" name="services[]" value="Orthodontics"> 
      <label>Orthodontics
        
      </label> 
     </div>
     <div class="form-check">
      <input type="checkbox" name="services[]" value="Endodontics">
      <label>Endodontics
       
      </label> 
      </div>
      <div class="form-check">
      <input type="checkbox" name="services[]" value="Periodontics"> 
      <label>Periodontics
        
      </label>
     </div>
       <div class="form-check">
      <input type="checkbox" name="services[]" value="Cosmetic Dentistry">
      <label>Cosmetic Dentistry 
       
      </label> 
  </div>
</div>  
                                    
                           <br>       
                 
                       <div class="row cont-row">
                       
                                 
                                   <div class="col-sm-8"><label for="services"><span>Status:</span></label>     </div>
                                   <br>  <br>
                                      <select class="form-control input-sm" name="status" id="status">
                                        <option value="Pending">Pending</option>
                                       <option value="Confirmed">Confirmed</option>
                                        <option value="Canceled">Cancelled</option>
                                      
                                      </select>
                                      <br><br>
                                    
                                  
                    </div>
                      

                          
                  
                    <div style="margin-top:30px;" class="row">
                        
                    </div>
                </div>
                  <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                              </div>
               
                       
                    </form>
              
            
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
              
                              </div>
                            
                            </div>
                        
                  
                        



                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <a type="button" id="cft"> <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               CLIENTS FOR TODAY</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalappointment?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <a type="button" id="ca"><div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cancelled Appointments
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalcancelled?>
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div></div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                              <a type="button" id="par">   <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Appointment Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalpendingappointment?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                      
                    <!-- Content Row -->
                 
                        
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <div class="container-fluid" id="cont">
            </div>
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
                        <span aria-hidden="true">×</span>
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