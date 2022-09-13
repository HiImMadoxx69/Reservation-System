
<?php






if(!isset($_SESSION)){

    session_start();
}

require_once "connections/connections.php";


require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




$sql = "SELECT * FROM tblloginuser";
$user = $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();
$total = $user->num_rows;
if(isset($_SESSION['Access'])){

    echo header ("Location: home.php");

}
if (isset($_POST['register'])) {

 $fname = $_POST["fname"];
 $lname = $_POST["lname"];
 $contact = $_POST["contact"];
 $username = $_POST["username"];
 
 $pass1 = $_POST["pass1"];
 $pass2 = $_POST["pass2"];
 $access="user";
 $img="admin/img/undraw_profile.svg";
 $status= "1";
if($pass1 == $pass2){
     $username = $_POST['username'];
    
      $pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
    $sql = "SELECT * FROM tblloginuser where username= '$username'";
 $result = mysqli_query($con, $sql);
$checkRow = mysqli_affected_rows($con);
 if ($checkRow <= 0) {
      $val = mysqli_fetch_assoc($result);


   $sql ="INSERT INTO `tblloginuser` (`firstname`, `lastname`, `contact`, `username`, `password`, `Access`, `profile_image`, `status`) VALUES ('$fname', '$lname', '$contact', '$username', '$pass', '$access', '$img', '$status');";
 $result = mysqli_query($con, $sql);
  // $_SESSION['email']==$result['username'];



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
  
  echo '<script>alert("Account Created");';
echo 'window.location.replace("verification.php?username='.$username.'");</script>';





  

   

     
    
         }
         else{
            echo '<script>alert("Account Already Exist");';
            echo 'window.location.replace("register.php?username='.$username.'");</script>';
         }
   }
  

}



   



?>
<!doctype html>
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
          
   


<section class="vh-100" style="background-color: white;padding-top: 48px;padding-bottom:48px;padding-left: 15px;padding-right: 15px;" >
  <div class="container h-100"style="background-color: white;" style="padding-top: 48px;padding-bottom:48px;padding-left: 15px;padding-right: 15px;">
    <div class="row d-flex justify-content-center align-items-center h-100" style="width:100%; ">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
    
                <form class="mx-1 mx-md-4" method="POST" action="">


                

       
               
               
         <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                       <label class="form-label" for="form3Example1c">First Name</label>
                      <input type="text" name="fname"  id="form3Example1c" class="form-control" required/>
                   
                    </div>
                  </div>
              
         
                  
             
        <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                       <label class="form-label" for="form3Example1c">Last Name</label>
                      <input type="text" name="lname" id="form3Example1c" class="form-control" required/>
                   
                    </div>
                  </div>
              
            
        <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c">Contact</label>
                      <input  minlength="11" maxlength="14"type="text" name="contact" id="form3Example3c" class="form-control" required/>
                      
                    </div>
                  </div>
           
                  
        <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Email  </label>
                      <input type="email"size="32" minlength="3" maxlength="64" name="username" id="username" class="form-control" required/>
                  
                    </div>
                  </div>
             
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"type="password" name="pass1" id="form3Example4c" class="form-control" required/>
                    
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"type="password" name="pass2" id="form3Example4cd" class="form-control"required />
                  
                    </div>

                  </div>
                    <div class="form-check d-flex">
                    <label class="form-check-label" for="form2Example3"></label>
                    <input required class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
              
                      I agree all statements in &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="terms.php">Terms of service</a>
                  
                  </div>
                  <br>

                

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button style="background-color: #c2855a; border-color:#c2855a;"type="submit" id="register" name="register"class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>
 <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                                  </form>
                            </div>
              </div>
         

              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="images/signup.jpg" style="height: 800px;" 
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <section class="services container-fluid">
    <div class="container">
        <div class="row section-title">
            <h2>Our Services</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper in magna quis tincidunt. Donec at nisi et eros blandit elementum fermentum eget augue</p>
        </div>
        <div class="servic-row row">
            <div class="servic-col col-md-4">
                <div class="servcover" style="height: 383px;">
                    <img src="assets/images/icon/001.png" alt="" >
                    <h4>General Dentistry</h4>
                    <p>General dentistry covers a range of treatment options and procedures fundamental to protecting and maintaining a good standard of oral health. Treatments are in place to keep your mouth, gums, and teeth healthy and free of pain.                                    </p>
                </div>
                <div class="span mx-auto">
                   <a href="register.php">More</a>
                </div>
            </div>
            <div class="servic-col col-md-4">
                <div class="servcover" style="height: 383px;">
                    <img src="assets/images/icon/002.png" alt="">
                    <h4>Oral Surgery</h4>
                    <p>Oral surgery refers to any surgical procedure performed on your teeth, gums, jaws or other oral structures. This includes extractions, implants, gum grafts and jaw surgeries. Oral surgery is usually performed by an oral and maxillofacial surgeon or a periodontist.</p>
                </div>
                <div class="span mx-auto">  <a href="oral-prophylaxis.php">More</a></div>
            </div>
            <div class="servic-col col-md-4" >
                <div class="servcover" style="height: 383px;">
                    
                    <img src="assets/images/icon/004.png" alt="">
                    <h4 >Orthodontics</h4>
                    <p>the treatment of irregularities in the teeth (especially of alignment and occlusion) and jaws, including the use of braces.                                                                                                                                              </p>
                </div>
                <div class="span mx-auto">More</div>
            </div>
            <div class="servic-col col-md-4">
                <div class="servcover" style="height: 431px;">
                    <img src="assets/images/icon/003.png" alt="">
                    <h4>Endodontics</h4>
                    <p>Endodontics is the branch of dentistry concerning dental pulp and tissues surrounding the roots of a tooth. “Endo” is the Greek word for “inside” and “odont” is Greek for “tooth.” Endodontic treatment, or root canal treatment, treats the soft pulp tissue inside the tooth.</p>
                </div>
                <div class="span mx-auto">More</div>
            </div>
            <div class="servic-col col-md-4">
                <div class="servcover" style="height: 431px;">
                    <img src="assets/images/icon/005.png" alt="">
                    <h4>Periodontics</h4>
                    <p>Periodontics is the dental specialty focusing exclusively in the inflammatory disease that destroys the gums and other supporting structures around the teeth. A periodontist is a dentist who specializes in the prevention, diagnosis, and treatment of periodontal, or disease, and in the placement of dental implants.</p>
                </div>
                <div class="span mx-auto">More</div>
            </div>
            <div class="servic-col col-md-4">
                <div class="servcover" style="height: 431px;">
                    <img src="assets/images/icon/006.png" alt="">
                    <h4>Cosmetic Dentistry</h4>
                    <p>Cosmetic dentistry is dentistry aimed at creating a positive change to your teeth and to your smile. The American Academy of Cosmetic Dentistry (AACD) is the primary dental resource for patients as they strive to maintain their health, function, and appearance for their lifetime.</p>
                </div>
                <div class="span mx-auto">More</div>
            </div>
        </div>
    </div>
</section> -->

<!-- ################# Testimonial Starts Here#######################--->



 <!--  ************************* Blog Starts Here ************************** -->
   

<!--********************************* Footer Starts Here ********************************************-->



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
</body>


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
    
</html>