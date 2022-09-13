<?php
$msg = "";
  $msg_class = "";

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

  
if(!isset($_SESSION)){

    session_start();
}

require_once "connections/connections.php";
set_error_handler(function(int $errno, string $errstr) {
    if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
        return false;
    } else {
        return true;
    }
}, E_WARNING);
$sql = "SELECT * FROM tblloginuser";
$user = $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();
$total = $user->num_rows;
if(isset($_SESSION['Access'])){

    echo header ("Location: home.php");

}


$sql = "SELECT * FROM tblloginuser";
$user = $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();
$total = $user->num_rows;

if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $pass = $_POST['password'];

    $sql = "SELECT * FROM tblloginuser WHERE BINARY username='$username'";
        $result = mysqli_query($con, $sql);
        $checkRow = mysqli_affected_rows($con);

        if ($checkRow > 0) {
            $val = mysqli_fetch_assoc($result);
            if (password_verify($pass, $val['password'])) {
        $_SESSION['UserLogin'] = $val['username'];
         $_SESSION['Access'] = $val['Access'];
          $_SESSION['firstname']= $val['firstname'];
                $_SESSION['lastname']= $val['lastname'];
                $_SESSION['contact']= $val['contact'];
                $_SESSION['email']= $val['username'];
                $_SESSION['img']= $val['image'];
          
               

            if($_SESSION['Access']=="admin" || $_SESSION['Access']=="dentist"){
                echo header ("Location: admin/index.php");
                }
            if($_SESSION['Access']=="user" && $val['status']==0){
               
               $msg = "Account Deactivated";
               $msg_class = "alert-danger";
              

            }
            if($_SESSION['Access']=="user" && $val['verified']==1){
                
                echo header ("Location: home.php");
            }
            else{




$mail= new PHPMailer();
$mail->isSMTP();
$mail->Host="smtp.mail.yahoo.com";
$mail->SMTPAuth="true";
$mail->Port="587";
$mail->smtpClose();
$otp = mt_rand(100000,999999);
$mail->SMTPSecure = "tls";
$mail->Username ="harveygultiano29@yahoo.com";
$mail->Password ="vpbmrxghjjccbmyt";
$mail->Subject="Email Verification";
$mail->setFrom("harveygultiano29@yahoo.com");
$mail->Body="Your Email Verification Code is ".$otp;
$mail->addAddress("$username");
$mail->Send();

echo "Your Email Verification has been Sent";

setcookie("otp", $otp);
$date = date('H:i:s');
$date = strtotime($date);
$date = strtotime("+5 minute", $date);
echo $exdate= date('H:i:s', $date);
$date = date('H:i:s');
$date = strtotime($date);
$date = strtotime("+5 minute", $date);
echo $exdate= date('H:i:s', $date);

echo $d=date('H:i:s');



$sql = "UPDATE `tblloginuser` SET `vkey` = '$otp' WHERE `tblloginuser`.`username` = '$username'";
$result = mysqli_query($con, $sql);

$sql = "UPDATE `tblloginuser` SET `is_expired` = '$exdate' WHERE `tblloginuser`.`username` = '$username'";
$result = mysqli_query($con, $sql);
$sql = "SELECT * FROM tblloginuser where username= '$username'";
$result = mysqli_query($con, $sql);



              

               echo '<script>alert("Login Success");';
echo 'window.location.replace("verification.php?username='.$username.'");</script>';
            }

             
            }
      if ($_POST['password']==$val['password']) {
        $_SESSION['UserLogin'] = $val['username'];
        $_SESSION['Access'] = $val['Access'];
          
              

            if($_SESSION['Access']=="admin" || $_SESSION['Access']=="dentist"){
                echo header ("Location: admin/index.php");
                }
                 if($_SESSION['Access']=="user" && $val['verified']==1){
               echo header ("Location: home.php");
                 $_SESSION['Access']=="user";
                }
           else{
 
  echo '<script>alert("Login Success");';
echo 'window.location.replace("verification.php?username='.$username.'");</script>';
            }
              
            }
      
      
            else{
                $msg = "Invalid username or password";
               $msg_class = "alert-danger";
            }
        }
  
        else{
           $msg = "Invalid username or password";
               $msg_class = "alert-danger";
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
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
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
<section class="vh-100" style="background-color: white;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100" style="width:100%;margin-top: 0px;">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 1rem; margin-top: 0px;" >
          <div class="row g-0">
            
             
               
            </div>
            
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black" style="padding:0px;">
<form method="POST" action="">
            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
               <?php if (!empty($msg)): ?>
                            <div class="alert <?php echo $msg_class ?>" role="alert">
                              <?php echo $msg; ?>
                            </div>
                          <?php endif; ?>
  <!-- Email input -->
  <div class="form-outline mb-4">
       <?php if (!empty($msg)){
        echo'<input type="email" id="username" name="username" class="form-control" value="'.$username.'" />';
       }
       else{
   echo'<input type="email" id="username" name="username" class="form-control"  />';
       }
    ?>
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="password" name="password" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="resetpassword.php" style="color: #393f81;">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name="login" id="login">Sign in</button>

  <!-- Register buttons -->
   
                  <p class="mb-5 pb-lg-2" >Don't have an account? <a href="register.php"
                      style="color: #393f81;">Register here</a></p>
                  <a href="terms.php" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
</form>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    


    
    
    
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
    
  </body>
</html>