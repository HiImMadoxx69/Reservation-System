<?php

error_reporting (E_ALL ^ E_NOTICE);
// if(!isset($_SESSION)){

//     session_start();
// }
require_once "connections/connections.php";
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


set_error_handler(function(int $errno, string $errstr) {
    if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined index') === false)) {
        echo header ("Location: login.php");
        return false;
    } else {
        return true;
    }
}, E_WARNING);






// if(isset($_SESSION['Access']) && $val['verified']==1){

//     echo header ("Location: home.php");

// }



// if ($val['verified']>=1) {
//       echo header ("Location: login.php");
// }
// if (isset($_POST['verify'])) {
//   if ($val['vkey']!=$_POST['ver']) {
//   echo "Invalid Code";
//   }
//  elseif ($d>=$val['is_expired']) {

//   echo "Code is expired";
//   }

//   else{
//     $key=$_POST['ver'];
//     $sql ="UPDATE `tblloginuser` SET `verified` = 1 WHERE `tblloginuser`.`vkey` = '$key';";
//     $result = mysqli_query($con, $sql);
 
//   echo '<script>alert("Your Account Has Been Verified");';
//                 echo 'window.location.replace("login.php");</script>';

//   }


// }

if (isset($_POST['reset'])) {


$username=$_POST['email-for-pass'];

$mail= new PHPMailer(true);
try{


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
 
setcookie("otp", $otp);
$date = date('H:i:s');
$date = strtotime($date);
$date = strtotime("+5 minute", $date);
echo $exdate= date('H:i:s', $date);
$date = date('H:i:s');
$date = strtotime($date);
$date = strtotime("+5 minute", $date);
 $exdate= date('H:i:s', $date);

 $d=date('H:i:s');



$sql = "UPDATE `tblloginuser` SET `vkey` = '$otp' WHERE `tblloginuser`.`username` = '$username'";
$result = mysqli_query($con, $sql);

$sql = "UPDATE `tblloginuser` SET `is_expired` = '$exdate' WHERE `tblloginuser`.`username` = '$username'";
$result = mysqli_query($con, $sql);   
$sql = "SELECT * FROM tblloginuser where username= '$username'";
$result = mysqli_query($con, $sql);
 echo header ("Location: resetpassword.php?username=".$username);
 }
catch (Exception $e) {
        echo '<script>alert("Invalid Email");';
echo 'window.location.replace("resetpassword.php?username='.$username.'");</script>';
}
}

 $username=$_GET['username'];
$sql = "SELECT * FROM `tblloginuser` WHERE username='$username'";
   $result = mysqli_query($con, $sql);
   $val = mysqli_fetch_assoc($result);

    if(isset($_POST['verify'])){

 if ($val['vkey']!=$_POST['email-for-pass']) {
   echo '<script>alert("Invalid Code!");';
echo 'window.location.replace("resetpassword.php?username='.$username.'");</script>';
  }
 elseif ($d>=$val['is_expired']) {

   echo '<script>alert("Code is expired!");';
echo 'window.location.replace("resetpassword.php?username='.$username.'");</script>';
  }

  else{
  

  echo header ("Location: passwordreset.php?username=".$username);
  }

  
}


 if(isset($_POST['cancel'])){
    echo header ("Location: login.php");
  
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
   <body style="background-color:#e9ebee;">
    
 
  <div class="site-block-3" style="background-color:white;">
       <nav class="navbar" style="padding-top:0px;padding-bottom: 0px;margin-left: 80px;margin-right: 80px;">
          <h2 class="mb-0 site-logo">Comia</h2>
      <ul class="menu">
     
         <li class="item">
      
   
 </li>
      
    
             
       <li class="toggle"><a class="anav"href="#"><span class="bars"></span></a></li>
      </ul>
     </nav>
   
        
   
  </div>

  <?php  

  $sql = "SELECT * FROM tblloginuser WHERE username='$username'";
  $result = mysqli_query($con, $sql);
  $checkRow = mysqli_affected_rows($con);

      if ($checkRow>0) {
      echo '<div class="container padding-bottom-3x mb-2 mt-5" id="bodycont">
      <div class="row justify-content-center" id="secbody">
        <div class="col-lg-8 col-md-10">
          <div class="forgot">
            
            <h2>Forgot your password?</h2>
          <p>Change your password in three easy steps. This will help you to secure your password!</p>
          <ol class="list-unstyled">
            <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
            <li><span class="text-primary text-medium">2. </span>Our system will send you a code</li>
            <li><span class="text-primary text-medium">3. </span>Enter code to reset your password</li>
          </ol>

          </div>  
          
          <form method="POST" class="card mt-4">
            <div class="card-body">
              <div class="form-group">
                <label for="email-for-pass">Enter Code</label>
                <input class="form-control" type="text" id="email-for-pass" name="email-for-pass" >
                <small>We sent your code to your email</small>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-success" type="submit" name="verify" id="verify">Enter Code</button>
              <button class="btn btn-danger" type="submit" name="cancel" id="cancel">Back to Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>';


      }
      else
      {
     echo '<div class="container padding-bottom-3x mb-2 mt-5" >
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="forgot">
            
            <h2>Forgot your password?</h2>
          <p>Change your password in three easy steps. This will help you to secure your password!</p>
          <ol class="list-unstyled">
            <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
            <li><span class="text-primary text-medium">2. </span>Our system will send you a code</li>
            <li><span class="text-primary text-medium">3. </span>Enter code to reset your password</li>
          </ol>

          </div>  
          
          <form method="POST" class="card mt-4">
            <div class="card-body">
              <div class="form-group">
                <label for="email-for-pass">Enter your email address</label>
                <input class="form-control" type="text" id="email-for-pass" name="email-for-pass" >
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-success" type="submit" name="reset" id="reset">Get New Password</button>
              <button class="btn btn-danger" type="submit" name="cancel" id="cancel">Back to Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>';

}
?>
<script type="text/javascript">
  
  let email_search = document.getElementById('email-for-pass');
  let alert_element= document.createElement("div");
  alert_element.className = "alert alert-success";
  alert_element.innerHTML = "Email Found";
  alert_element.id = "email-found";

  email_search.addEventListener("blur",function(){


    let xhttp = new XMLHttpRequest();
    xhttp.open("POST","server.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("email=".concat(email_search.value));


    
    xhttp.onreadystatechange= function(){
      if(this.readyState==4){
   
     console.log(this.responseText);
    if (this.responseText==="true") {

        email_search.parentNode.insertBefore(alert_element,this.nextSibling);
      
      }

      // else{

      //     // email_search.parentNode.remove(alert_element);
        
       
      // }
      

    
        }
     
        

 
      
      
    }
  


  })


</script>


   <div style="margin-top:500px;"></div>
    
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