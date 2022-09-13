<?php

if(!isset($_SESSION))
{
    session_start();
}

require_once "connections/connections.php";     

$msg = "";
  $msg_class = "";
$sql = "SELECT * FROM tbllogin";
$user = $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();
$total = $user->num_rows;

if(!isset($_SESSION['UserLogin'])){

    echo header ("Location: login.php");
}


if(isset($_POST['submit'])){
  $username=$_SESSION['UserLogin'];
 $fname = $_POST["fname"];
 $lname = $_POST["lname"];
 $contact = $_POST["contact"];
 $username = $_POST["username"];
 $pass1 = $_POST["pass1"];
 $pass2 = $_POST["pass2"];

    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "UPDATE `tblloginuser` SET `profile_image` = '$target_file' WHERE `tblloginuser`.`username` = '$username';";
        if(mysqli_query($con, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } 
    }

  

 if($pass1 == $pass2 && $pass1!=null){
        $pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
  $sql = "UPDATE `tblloginuser` SET `firstname` = '$fname', `lastname` = '$lname', `contact` = '$contact', `username` = '$username', `password` = '$pass' WHERE `tblloginuser`.`username` = '$username';";
$result = mysqli_query($con, $sql);
$msg = "Account Updated";
          $msg_class = "alert-success";


}

  else
{
 $sql = "UPDATE `tblloginuser` SET `firstname` = '$fname', `lastname` = '$lname', `contact` = '$contact', `username` = '$username' WHERE `tblloginuser`.`username` = '$username';";
$result = mysqli_query($con, $sql);
 $msg = "Account Updated";
          $msg_class = "alert-success";

}
  
 }

?>




<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Dente &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
   
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
      $(function() {
       $(".toggle").on("click", function(){

          if($(".item").hasClass("active")){
             $(".item").removeClass("active");

          }
          else{
             $(".item").addClass("active");
          }
       });
      });


    </script>
  </head>
  <body>
  
   <div class="site-block-3" style="position: sticky;
   top: 0; background-color: #333333;;
   z-index: 100;margin: 0px 0px;padding-top: 0px;padding-bottom: 0px; margin-top: 0px; margin-bottom: 0px;">
       <nav class="navbar" style="position: sticky;
   top: 0;
   z-index: 100; padding-top: 0px;padding-bottom: 0px;margin-top: 0px; margin-bottom: 0px;">
            <a href="#" class="d-flex align-items-center"> <span class="icon-envelope mr-2"></span>
                  <span class="d-none d-md-inline-block">comiadentalclinic@gmail.com</span>
            </a> 
         
            <a href="#" class="d-flex align-items-center ml-auto mr-4">
                  <span class="icon-phone mr-2"></span>
                  <span class="d-none d-md-inline-block">0919 935 4455 / 0995 466 8622 / 0915-4561079</span>
            </a>
               <style type="text/css">
              .anav:hover{
                      text-decoration: none;
                    
                    }
            </style>
     </nav>
    

  <div class="site-block-3" style=" background-color: #333333;position: sticky;
   top: 0;
   z-index: 100; padding-top:0px;padding-bottom: 0px;margin-left: 80px;margin-right: 80px;">
       <nav class="navbar" style="position: sticky;
   top: 0;
   z-index: 100; padding-top:0px;padding-bottom: 0px;margin-left: 80px;margin-right: 80px;">
          <h2 class="mb-0 site-logo" style="padding-right: 0px;"><a href="home.php"><img class="logo" src="images/comialogo.png">Comia</a></h2>
      <ul class="menu">
     
         <li class="item"><a class="anav"href="home.php">Home</a></li>
         <li class="item"><a class="anav"href="about.php">About</a></li>
         <li class="item"><a class="anav"href="services.php">Services</a></li>
         <li class="item"><a class="anav"href="contact.php">Contact</a></li>
      
      
             <?php

if(isset($_SESSION['UserLogin'])){
 $username  = $_SESSION['UserLogin'];
$sql = "SELECT * FROM tblloginuser WHERE username='$username'";
$result = mysqli_query($con, $sql);
$val=mysqli_fetch_assoc($result);
 

 $img  = $val['profile_image']; 
  echo'  <li class="item">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               

                                    <img class="img-profile rounded-circle"
                                    src="'.$img.'" style ="max-width:50px;max-height:50px;">
                                     <span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$username.'</span>                       </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="edituseraccount.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Account
                                </a>
                                <a class="dropdown-item" href="book.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Reservation
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>';
}
else{
       echo '<li class="item button"><a class="anav"href="login.php">Login</a></li>
         <li class="item secondary button"><a href="register.php">Sign-up</a></li>';
}
?>
             
       <li class="toggle"><a class="anav"href="#"><span class="bars"></span></a></li>
      </ul>
     </nav>
   
        
     </div>  
  </div>
<!-- <div class="site-blocks-cover inner-page" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div style="padding-top:50px;padding-bottom: 0px;margin-left: 80px;margin-right: 80px;"class="col-md-7">
            <span class="sub-text">WE PRIORITY YOUR</span>
            <h1>Your <strong>NEW SMILE</strong></h1>
          </div>
           <main>

        <a href="https://www.facebook.com/comiadentalclinic" class="p-2 pl-0" style="position: fixed;bottom: 0;"><span class="icon-facebook">  </span>https://www.facebook.com/comiadentalclinic</a>
     </main>
</div>   -->

    <div class="site-section bg-light" style="width:100%">
      <div class="container"style="width:100%">
        <div class="row mb-5 justify-content-center"style="width:100%">
          <div class="col-md-6 text-center"style="width:100%">
            <h2 class="site-heading text-black mb-5"style="width:100%">UPDATE YOUR<strong> ACCOUNT</strong></h2>
             <?php if (!empty($msg)): ?>
                            <div class="alert <?php echo $msg_class ?>" role="alert">
                              <?php echo $msg; ?>
                            </div>
                          <?php endif; ?>
          </div>
        </div>
    
  <div class="container-fluid">

         <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit User Account</h6>
                        </div>
                           <div class="card-body">
 <?php
        $sql = "SELECT * FROM tblloginuser WHERE username = '$username'";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_array($result)):
    ?>
                           <form method="POST" action="" enctype="multipart/form-data" style="display: block;">
                     <div class="col-sm-8"><input type="hidden" name="id" id="id" class="form-control input-sm"></div>
                   
                    <div class="row cont-row">
                        
                        <div class="col-sm-3"><label>First Name </label><span>:</span></div>
                        <div class="col-sm-8"><input value="<?php echo $row['firstname'];?>" style="width: 300px;" type="text" name="fname"id="fname" placeholder="First Name" name="name" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Last Name</label><span>:</span></div>
                        <div class="col-sm-8"><input value="<?php echo $row['lastname'];?>"style="width: 300px;"tstyle="width: 300px;"ype="text" name="lname"id="lname" placeholder="Last name" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Contact Number</label><span>:</span></div>
                        <div class="col-sm-8"><input value="<?php echo $row['contact'];?>"style="width: 300px;"type="text"name="contact"id="contact" placeholder="Enter Mobile Number" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Username</label><span>:</span></div>
                        <div class="col-sm-8"><input value="<?php echo $row['username'];?>"style="width: 300px;"type="email"name="username"id="username" placeholder="Enter Username" class="form-control input-sm"></div>
                    </div>
                       <div class="row cont-row">
                        <div class="col-sm-3"><label>New Password</label><span>:</span></div>
                        <div class="col-sm-8"><input style="width: 300px;"type="password"name="pass1"id="pass1" placeholder="Enter Password" class="form-control input-sm"></div>
                    </div>
                       
                       <div class="row cont-row">
                        <div class="col-sm-3"><label>Repeat Password</label><span>:</span></div>
                        <div class="col-sm-8"><input  style="width: 300px;"type="password"name="pass2"id="pass2" placeholder="Enter Password" class="form-control input-sm"></div>
                    </div>
                     
                        <br>
                        <h2 class="col-sm-3">Update profile</h2>
                         
                          <div class="col-sm-8" style="position: relative;" >
                            <span class="img-div">
                              <div class="text-center img-placeholder"  onClick="triggerClick()">
                                <h4>Update image</h4>
                              </div>
                              <img class="img-profile rounded-circle" src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
                            </span>
                            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                           
                          </div>
                        
<style type="text/css">
    .form-div { margin-top: 100px; border: 1px solid #e0e0e0; }
#profileDisplay { display: block; height: 210px; width: 210px; margin: 0px auto; border-radius: 50%; }
.img-placeholder {
  width: 60%;
  color: white;
  height: 100%;
  background: black;
  opacity: .7;
  height: 210px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: none;
}

.img-div:hover {
  display: block;
  cursor: pointer;
}

</style>

                     <!--  <div class="row cont-row">
                        <div class="col-sm-3"><label>Enter Old Password</label><span>:</span></div>
                        <div class="col-sm-8"><input  style="width: 300px;"type="password"name="pass3"id="pass3" placeholder="Enter Password" class="form-control input-sm"></div>
                    </div> -->
                   
            
                     
                
                     
                

                          
                 
                
                
                <div class="col-sm-8" >

                            <button class="btn btn-success btn-sm" name="submit" id="submit" style="background-color: #c2855a; border-color: #c2855a;">Submit</button>
                        </div>
                       
                    </form>

                    <?php endwhile; ?>
              
               
                    <div style="margin-top:30px;" class="row">
                        
                    </div>
      </div>
    <!-- <div class="promo py-5 bg-primary">
      <div class="container text-center">
        <span class="d-block h4 mb-3 font-weight-light text-white">Promo For Tooth Cleaning from <del>$140.00</del> now <strong class="font-weight-bold">$50.00</strong></span>
        <div id="date-countdown" class="mt-0 mb-2"></div>
      </div>
    </div> -->
    
 <footer class="site-footer border-top">
      <div class="container">
<!--         <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigation</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="#">Team</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Membership</a></li>
                </ul>
              </div>
            </div>

            
          </div>
          <div class="col-lg-4">
           

            <div class="mb-5">
              <h3 class="footer-heading mb-4">Recent News</h3>
              <div class="block-25">
                <ul class="list-unstyled">
                  <li class="mb-3">
                    <a href="#" class="d-flex">
                      <figure class="image mr-4">
                        <img src="images/hero_bg_1.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="small text-uppercase date">Sep 16, 2018</span>
                        <h3 class="heading font-weight-light">Lorem ipsum dolor sit amet consectetur elit</h3>
                      </div>
                    </a>
                  </li>
                  <li class="mb-3">
                    <a href="#" class="d-flex">
                      <figure class="image mr-4">
                        <img src="images/hero_bg_1.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="small text-uppercase date">Sep 16, 2018</span>
                        <h3 class="heading font-weight-light">Lorem ipsum dolor sit amet consectetur elit</h3>
                      </div>
                    </a>
                  </li>
                  <li class="mb-3">
                    <a href="#" class="d-flex">
                      <figure class="image mr-4">
                        <img src="images/hero_bg_1.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="small text-uppercase date">Sep 16, 2018</span>
                        <h3 class="heading font-weight-light">Lorem ipsum dolor sit amet consectetur elit</h3>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            
          </div>
          

          <div class="col-lg-4 mb-5 mb-lg-0">

            <div class="mb-5">
              <h3 class="footer-heading mb-2">Subscribe Newsletter</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit minima minus odio.</p>

              <form action="#" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-white text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="button-addon2">Send</button>
                  </div>
                </div>
              </form>

            </div>

            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Follow Us</h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>
              </div>
            </div>


          </div>
          
        </div> -->
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
         
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This Website is made by Gultiano, Harvey D., Tubo Camille D., Valderama, Jeric Ramos<i class="icon-heart-o" aria-hidden="true"></i><!--  by <a href="https://colorlib.com" target="_blank" >Colorlib</a> -->
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div> 
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    <script type="text/javascript">
  
  function triggerClick(e) {
  document.querySelector('#profileImage').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>
  </body>
</html>

