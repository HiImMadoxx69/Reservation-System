
<?php



require_once "connections/connections.php";     

require 'vendor/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;


if(!isset($_SESSION)){

    session_start();
}

require_once "connections/connections.php";
$sql = "SELECT * FROM tblloginuser";
$user = $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();
$total = $user->num_rows;
// if(isset($_SESSION['Access'])){

//     echo header ("Location: home.php");

// }
if (isset($_POST['register'])) {

 $fname = $_POST["fname"];
 $lname = $_POST["lname"];
 $contact = $_POST["contact"];
 $username = $_POST["username"];
 $pass1 = $_POST["pass1"];
 $pass2 = $_POST["pass2"];
 $access="user";
 $img="admin/img/undraw_profile.svg";
if($pass1 == $pass2){
     $username = $_POST['username'];
      $pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
    $sql = "SELECT * FROM tblloginuser where username= '$username'";
 $result = mysqli_query($con, $sql);
$checkRow = mysqli_affected_rows($con);
 if ($checkRow <= 0) {



   $sql ="INSERT INTO `tblloginuser` (`firstname`, `lastname`, `contact`, `username`, `password`, `Access`, `image`) VALUES ('$fname', '$lname', '$contact', '$username', '$pass', '$access', '$img');";
 $result = mysqli_query($con, $sql);
   $_SESSION['Access']=="user";
  echo '<script>alert("Account Created");';
echo 'window.location.replace("login.php");</script>';

   

     
    
         }
         else{
            echo '<script>alert("Account Already Exist");';
            echo 'window.location.replace("register.php");</script>';
         }
   }
  

}


if(isset($_POST['submit'])){
   
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $contact = $_POST['contact'];
   $email = $_POST['email'];
   $clinic = $_POST['clinic'];
   $date=$_POST['date'];
   $time = $_POST['time'];
    $status="Pending";
$checkbox1=$_POST['services'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  

 
 $sql = "SELECT * FROM tblappointment WHERE date='$date' AND time='$time' AND status='Confirmed'";
$result = mysqli_query($con, $sql);
$val=mysqli_fetch_assoc($result);
 $checkRow = mysqli_affected_rows($con);
if ($checkRow>0) {
 


    echo '<script>alert("Slot Already Taken");';

    echo 'window.location.replace("home.php");</script>';

  


}

else{

  

$sql = "INSERT INTO `tblappointment` (`firstname`, `lastname`, `contact`, `email`, `clinic`, `date`, `time`, `service`,`status`) VALUES ('$firstname', '$lastname', '$contact', '$email', '$clinic', '$date', '$time','$chk','$status');";
$result = mysqli_query($con, $sql);



// Configure client
$config = Configuration::getDefaultConfiguration();
$config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTY1NTQ2MDQ5OSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjk1MTU3LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.8kYEkoHLAKaDqIU01UwicboSvKNRRXP79OFyQc5Px78');
$apiClient = new ApiClient($config);
$messageClient = new MessageApi($apiClient);

// Sending a SMS Message
$sendMessageRequest1 = new SendMessageRequest([
    'phoneNumber' => '$contact',
    'message' => 'Your Appointment Request is Pending Please wait For Confirmation We will send a SMS Notification if Confirmed',
    'deviceId' => 128701
]);

$sendMessages = $messageClient->sendMessages([
    $sendMessageRequest1
 
]);
print_r($sendMessages);



    echo '<script>alert("Form Submitted");';

    echo 'window.location.replace("book.php");</script>';

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
<div class="site-blocks-cover inner-page" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
 
     <div style="padding-top:50px;padding-bottom: 0px;margin-left: 80px;margin-right: 80px;"class="col-md-7">
            <span class="sub-text">Get in touch</span>
            <h1><strong></strong>Contact US</h1>
           
          </div>

           <main>

        <a href="https://www.facebook.com/comiadentalclinic" class="p-2 pl-0" style="position: fixed;bottom: 0;"><span class="icon-facebook">  </span>https://www.facebook.com/comiadentalclinic</a>
     </main>
</div>  
   
    <div style="margin-top:0px;" class="row no-margin">

        <iframe  width="100%" height="450"  style="border:0;" allowfullscreen="" loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1932.3821714331211!2d120.97689667264869!3d14.383042080242037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d3b2987a57cb%3A0x3f09c4d999e3467a!2sComia%20Dental%20Clinic%20(Molino%20-%20Bacoor%20Branch)!5e0!3m2!1sen!2sph!4v1654064264022!5m2!1sen!2sph" height="450" frameborder="0" style="border:0" allowfullscreen"></iframe>

    </div> 


          

<?php    
if(isset($_SESSION['UserLogin'])){

    echo '<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-6 mb-5 mb-lg-0">
          
            <h2 class="site-heading text-black mb-5"><strong>Appointment</strong></h2>
          
           <form method="POST" action="" class="p-5 bg-white">

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="firstname">First Name</label>
                  <input type="text" id="firstname"name="firstname" class="form-control" placeholder="First Name">
                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold" for="lastname">Last Name</label>
                  <input type="text"id="lastname"name="lastname" class="form-control" placeholder="Last Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="font-weight-bold" for="contact">Contact</label>
                  <input type="text"id="contact"name="contact" class="form-control" placeholder="Contact">
                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                </div>
              </div>
            <div class="row form-group">
                 <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fname">Date</label>
                  <input type="date" id="date" name="date" id="date" class="form-control">
                </div>


                <div class="col-md-6">
                  <label class="font-weight-bold" for="">Clinic</label>
                   <select class="form-control" name="clinic" id="clinic">
                    <option value="bacoor">bacoor</option>
                    <option value="paliparan">paliparan</option>
                                       
                   </select>
                </div>
              </div>

             <div class="row form-group">
                <div class="col-md-6">
                  <label class="font-weight-bold" for="contact">Time</label>
                   <select class="form-control" name="time" id="time">
                    <option id="time" name="time" value="10:30 AM">10:30 AM</option>
                    <option id="time" name="time" value="11:30 AM">11:30 AM</option>
                    <option id="time" name="time" value="1:00 PM">1:00 PM</option>
                    <option id="time" name="time" value="1:30 PM">1:30 PM</option>
                    <option id="time" name="time" value="2:30 PM">2:00 PM</option>
                    <option id="time" name="time" value="2:30 PM">2:30 PM</option>
                    <option id="time" name="time" value="3:00 PM">3:00 PM</option>
                    <option id="time" name="time" value="3:30 PM">3:30 PM</option>
                    <option id="time" name="time" value="4:00 PM">4:00 PM</option>
                    <option id="time" name="time" value="4:30 PM">4:30 PM</option>
                  </select>

                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold" for="email">Services</label> 
                <div class="form-check">
      <input type="checkbox" name="services[]" value="General Dentistry" ></input>
      <label>General Dentistry
       
         </div>
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
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                   <button class="btn btn-primary" name="submit" id="submit">Submit</button>

                </div>
              </div>

  
            </form>

      
        
          </div>';

        }

        else{
 echo '<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-6 mb-5 mb-lg-0">
          
            <h2 class="site-heading text-black mb-5">Sign<strong> up Now</strong></h2>
            <a class="small" href="login.php" style="color:blue;">Already have an account? Login!</a>
          
           <form method="POST" action="" class="p-5 bg-white">

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="firstname">First Name</label>
                  <input type="text" id="fname"name="fname" class="form-control" placeholder="First Name">
                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold" for="lastname">Last Name</label>
                  <input type="text"id="lname"name="lname" class="form-control" placeholder="Last Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="font-weight-bold" for="contact">Contact</label>
                  <input type="text"id="contact"name="contact" class="form-control" placeholder="Contact">
                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold" for="email">Email</label> 
                  <input type="email" id="username" name="username" class="form-control" placeholder="Email">

                </div>
                   <div class="col-md-6">
                  <label class="font-weight-bold" for="email">Password</label> 
                  <input type="password" id="pass1" name="pass1" class="form-control" placeholder="password">

                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold" for="email">Repeat Password</label> 
                  <input type="password" id="pass2" name="pass2" class="form-control" placeholder="Repeat Password">

                </div>

              </div>

              <div class="row form-group">
                <div class="col-md-12">
                   <button class="btn btn-primary" type="submit" name="register" id="register">Submit</button>
                </div>
              </div>
            

  
            </form>
          </div>';

        }


        ?>

          <div class="col-md-12 col-lg-6">
               <h2 class="site-heading text-black mb-5">Contact  <strong>US</strong></h2>
          <div style="padding-top:30px;"></div>
         
         
            <form action="#" class="p-5 bg-white">

              <div class="row form-group" >
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Enter Name</label>
                  <input type="text" id="fullname" class="form-control" placeholder="Full Name">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" id="email" class="form-control" placeholder="Email Address">
                </div>
              </div>

              

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send" class="btn btn-primary">
                </div>
              </div>

  
            </form>

          </div>
        </div>
      </div>
    </div>

  <!--   
    <div class="promo py-5 bg-primary">
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